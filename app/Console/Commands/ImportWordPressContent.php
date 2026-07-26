<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportWordPressContent extends Command
{
    protected $signature = 'import:wordpress';

    protected $description = 'Import blog posts from the WordPress REST API (idempotent)';

    private const BASE_URL = 'https://lescoporcostarica.com/wp-json/wp/v2';

    public function handle(): int
    {
        $page = 1;
        $imported = 0;

        $this->info('Importing posts from WordPress...');
        $this->newLine();

        do {
            $response = Http::timeout(30)->get(self::BASE_URL.'/posts', [
                'per_page' => 100,
                'page' => $page,
                '_embed' => true,
            ]);

            if ($response->failed()) {
                $this->error("HTTP {$response->status()} fetching page {$page}.");

                return self::FAILURE;
            }

            $posts = $response->json();
            $totalPages = (int) $response->header('X-WP-TotalPages');

            foreach ($posts as $wpPost) {
                $title = html_entity_decode($wpPost['title']['rendered'], ENT_QUOTES, 'UTF-8');
                $slug = $this->deriveSlug($wpPost['slug'], $title);
                $content = $this->cleanContent($wpPost['content']['rendered']);
                $excerpt = $this->generateExcerpt($content);
                $featuredImage = $this->fetchFeaturedImage($wpPost);

                Post::updateOrCreate(
                    ['wp_id' => $wpPost['id']],
                    [
                        'title' => $title,
                        'slug' => $slug,
                        'content' => $content,
                        'excerpt' => $excerpt,
                        'featured_image' => $featuredImage,
                        'published_at' => $wpPost['date'],
                    ]
                );

                $this->line("  <info>✓</info> [{$wpPost['id']}] {$title}");
                $imported++;
            }

            $page++;
        } while ($page <= $totalPages);

        $this->newLine();
        $this->info("Done. Imported/updated {$imported} post(s).");

        return self::SUCCESS;
    }

    private function cleanContent(string $html): string
    {
        // Extract content from Visual Composer column text blocks
        if (str_contains($html, '[vc_column_text]')) {
            preg_match_all('/\[vc_column_text\](.*?)\[\/vc_column_text\]/s', $html, $matches);
            $html = implode("\n\n", $matches[1]);
        }

        // Strip any remaining shortcodes
        $html = (string) preg_replace('/\[[^\]]*?\]/', '', $html);

        return trim($html);
    }

    private function generateExcerpt(string $cleanHtml): string
    {
        $text = html_entity_decode(strip_tags($cleanHtml), ENT_QUOTES, 'UTF-8');
        $text = (string) preg_replace('/\s+/', ' ', $text);

        return Str::limit(trim($text), 200);
    }

    private function deriveSlug(string $wpSlug, string $title): string
    {
        // If the WP slug has percent-encoding (e.g. emoji slugs), derive from title
        if (str_contains($wpSlug, '%')) {
            return Str::slug($title);
        }

        return $wpSlug;
    }

    /**
     * @param  array<string, mixed>  $wpPost
     */
    private function fetchFeaturedImage(array $wpPost): ?string
    {
        if (empty($wpPost['featured_media'])) {
            return null;
        }

        $imageUrl = $wpPost['_embedded']['wp:featuredmedia'][0]['source_url'] ?? null;

        if (! $imageUrl) {
            return null;
        }

        $filename = basename((string) parse_url($imageUrl, PHP_URL_PATH));
        $storagePath = 'imported/'.$filename;

        if (Storage::disk('public')->exists($storagePath)) {
            $this->line("    (image cached: {$filename})");

            return $storagePath;
        }

        $response = Http::timeout(30)->get($imageUrl);

        if ($response->failed()) {
            $this->warn("    Could not download image: {$filename}");

            return null;
        }

        Storage::disk('public')->put($storagePath, $response->body());
        $this->line("    Downloaded: {$filename}");

        return $storagePath;
    }
}

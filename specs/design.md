# Design — Sitio público LESCO por Costa Rica (Laravel)

## 1. Stack técnico
- **Laravel 12** (última versión estable al iniciar el proyecto).
- **Blade** para vistas, sin Livewire/Inertia (no se necesita reactividad
  compleja para un sitio de contenido).
- **Tailwind CSS** vía **Vite** para estilos.
- **Alpine.js** (CDN o npm) solo para interactividad ligera: widget de
  accesibilidad, menú móvil, carrusel de testimonios.
- **SQLite** en desarrollo local (simplicidad), **MySQL** en producción.
- **Laravel Mail** con driver `log` en desarrollo y SMTP real en producción.

## 2. Modelo de datos

| Modelo | Campos principales | Notas |
|---|---|---|
| `Post` | title, slug, excerpt, content (HTML/markdown), featured_image, published_at | Blog |
| `TeamMember` | name, role, bio, photo, order | Página Equipo |
| `Testimonial` | name, role, photo, content, order | Home |
| `Service` | title, description, target_population, price, images (json), order | Servicios |
| `ContactMessage` | name, email, message, ip, created_at | Respaldo de envíos del formulario |
| `SiteStat` | key (students/hours/workshops), value | Contadores del Home, editables sin código |

Todas las tablas con `order` para permitir reordenar sin migraciones.
Imágenes se guardan en `storage/app/public/...` y se sirven vía symlink
`public/storage` (`php artisan storage:link`).

## 3. Rutas

```
GET  /                    HomeController@index
GET  /equipo              TeamController@index
GET  /blog                BlogController@index
GET  /blog/{post:slug}    BlogController@show
GET  /servicios           ServiceController@index
GET  /contacto             ContactController@create
POST /contacto             ContactController@store
```

Sin autenticación, sin middleware especial más allá de throttling en
`POST /contacto`.

## 4. Estructura de carpetas relevante

```
app/
  Http/Controllers/
    HomeController.php
    TeamController.php
    BlogController.php
    ServiceController.php
    ContactController.php
  Models/
    Post.php
    TeamMember.php
    Testimonial.php
    Service.php
    ContactMessage.php
    SiteStat.php
  Mail/
    ContactFormSubmitted.php
  Console/Commands/
    ImportWordPressContent.php   (comando artisan import:wordpress)

resources/
  views/
    layouts/app.blade.php
    components/
      accessibility-widget.blade.php
      testimonial-card.blade.php
      service-card.blade.php
      seo-meta.blade.php
    home.blade.php
    team/index.blade.php
    blog/index.blade.php
    blog/show.blade.php
    services/index.blade.php
    contact/create.blade.php
  css/app.css   (Tailwind)
  js/app.js     (Alpine.js)

database/
  migrations/...
  seeders/
    PostSeeder.php
    TeamMemberSeeder.php
    TestimonialSeeder.php
    ServiceSeeder.php
    SiteStatSeeder.php
```

## 5. Importación de contenido desde WordPress
Comando `php artisan import:wordpress` que:
1. Consulta `https://lescoporcostarica.com/wp-json/wp/v2/posts` y
   `/pages` (si el endpoint está habilitado públicamente).
2. Descarga las imágenes destacadas referenciadas y las guarda en
   `storage/app/public/imported/`.
3. Crea/actualiza registros de `Post` con `title`, `slug`, `excerpt`,
   `content` (HTML tal cual, sanitizado con `strip_tags` selectivo o
   `HTMLPurifier` si se agrega la dependencia).
4. Si el endpoint no expone algún tipo de contenido (p. ej. testimonios,
   que en WordPress viven dentro de la página de inicio vía Elementor),
   ese contenido se deja en los seeders manuales (`TestimonialSeeder`,
   `ServiceSeeder`, `TeamMemberSeeder`) con los datos ya confirmados en
   `requirements.md`.
5. El comando debe ser idempotente (se puede correr varias veces sin
   duplicar registros — usar `updateOrCreate` por slug/id externo).

Este comando es una herramienta de migración puntual, no queda como
dependencia permanente del sitio.

## 6. Widget de accesibilidad
Componente Blade (`<x-accessibility-widget />`) incluido en el layout
principal. Estado manejado con Alpine.js y persistido en `localStorage`
del navegador (aumento de fuente, contraste, escala de grises). No
requiere backend.

## 7. SEO
Componente `<x-seo-meta :title="" :description="" :image="" />` incluido
en cada vista de página, alimentado por los mismos modelos (p. ej.
`$post->excerpt` como description, `$post->featured_image` como og:image).

## 8. Formulario de contacto
- `ContactController@store` valida (`name`, `email`, `message` requeridos)
  y un campo honeypot oculto (`website`) que debe llegar vacío.
- Al validar: guarda `ContactMessage`, despacha `Mail::to(config('mail.contact_recipient'))->send(new ContactFormSubmitted($message))`.
- Redirige con mensaje flash de éxito.

## 9. Decisiones abiertas / a confirmar con el usuario
- Contenido exacto de la página "Equipo" (no se pudo verificar en el
  sitio en vivo durante esta fase de diseño).
- Si el `wp-json` del sitio original está público o requiere que el
  usuario lo habilite temporalmente / exporte un XML de WordPress como
  alternativa.
- Proveedor SMTP a usar en producción (Mailgun, SES, etc. — no asumido
  aquí).

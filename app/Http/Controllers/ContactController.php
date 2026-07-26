<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactFormSubmitted;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contact.create');
    }

    public function store(ContactFormRequest $request): RedirectResponse
    {
        // Honeypot: si el campo oculto tiene valor, es un bot — silenciar sin procesar
        if ($request->filled('website')) {
            return redirect()->route('contact.create')
                ->with('success', '¡Gracias por tu mensaje! Te responderemos pronto.');
        }

        $contactMessage = ContactMessage::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'message' => $request->validated('message'),
            'ip' => $request->ip(),
        ]);

        Mail::to(config('mail.contact_recipient'))
            ->send(new ContactFormSubmitted($contactMessage));

        return redirect()->route('contact.create')
            ->with('success', '¡Gracias por tu mensaje! Te responderemos pronto.');
    }
}

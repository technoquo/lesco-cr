<x-mail::message>
# Nuevo mensaje de contacto

Recibiste un mensaje desde el formulario de contacto del sitio.

**Nombre:** {{ $contactMessage->name }}

**Correo:** {{ $contactMessage->email }}

**Mensaje:**

{{ $contactMessage->message }}

---

*Recibido el {{ $contactMessage->created_at->locale('es')->isoFormat('D [de] MMMM [de] YYYY, HH:mm') }}*
*IP: {{ $contactMessage->ip }}*

{{ config('app.name') }}
</x-mail::message>

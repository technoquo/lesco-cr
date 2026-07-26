# Tasks — Migración a Laravel

> Reglas: trabajar en orden. No marcar `[x]` hasta verificar que funciona.
> Si una tarea requiere una decisión no cubierta en `design.md`, preguntar
> antes de continuar.

## Fase 0 — Setup
- [ ] Instalar Laravel 12 (`laravel new lesco-cr` o `composer create-project`).
- [ ] Configurar `.env` (SQLite local, `MAIL_MAILER=log`).
- [ ] Instalar y configurar Tailwind CSS + Vite.
- [ ] Instalar Alpine.js.
- [ ] Configurar `php artisan storage:link`.
- [ ] Crear `layouts/app.blade.php` base (header, footer, nav, slot de contenido).

## Fase 1 — Modelos y base de datos
- [ ] Migraciones: `posts`, `team_members`, `testimonials`, `services`,
      `contact_messages`, `site_stats`.
- [ ] Modelos Eloquent correspondientes con `$fillable` y casts (`price` como
      decimal, `images` como array/json en `Service`).
- [ ] Seeders con datos reales confirmados en `requirements.md`
      (servicios, testimonios del home, contadores iniciales).
- [ ] Factory de `Post` para datos de prueba en desarrollo.

## Fase 2 — Layout, navegación y componentes base
- [ ] Header con navegación (Inicio, Equipo, Blog, Servicios, Contacto).
- [ ] Footer con contacto, redes sociales, copyright.
- [ ] Componente `<x-seo-meta>`.
- [ ] Componente `<x-accessibility-widget>` (tamaño de letra, contraste,
      escala de grises, persistido en localStorage).
- [ ] Verificar navegación funcional en móvil (menú hamburguesa).

## Fase 3 — Páginas de contenido
- [ ] `HomeController` + vista: hero, quiénes somos, contadores,
      testimonios, alianzas, CTA a servicios.
- [ ] `TeamController` + vista Equipo (confirmar contenido real con el
      usuario antes de darla por terminada).
- [ ] `ServiceController` + vista Servicios (tarjetas por servicio con
      precio y población objetivo).

## Fase 4 — Blog
- [ ] `BlogController@index` con paginación.
- [ ] `BlogController@show` por slug.
- [ ] Vistas de listado y detalle, con imagen destacada y fecha.

## Fase 5 — Contacto
- [ ] `ContactController` (create/store), validación + honeypot.
- [ ] `Mailable ContactFormSubmitted` + vista de correo.
- [ ] Página de confirmación (mensaje flash).
- [ ] Prueba manual con `MAIL_MAILER=log` verificando el contenido del correo.

## Fase 6 — Importación de contenido real
- [ ] Verificar si `https://lescoporcostarica.com/wp-json/wp/v2/` responde
      públicamente (posts, pages). Si no, pedir al usuario un export XML
      de WordPress como alternativa.
- [ ] Implementar `php artisan import:wordpress` (posts del blog como
      mínimo).
- [ ] Correr el import y revisar manualmente que el contenido importado
      se vea bien (HTML del editor de WordPress puede traer estilos raros).
- [ ] Descargar y reasignar rutas de imágenes destacadas.

## Fase 7 — SEO y accesibilidad
- [ ] Confirmar meta tags por página contra los valores actuales del
      sitio (title, description, og:image).
- [ ] Auditoría de accesibilidad (Lighthouse / axe) en Home, Blog, Servicios,
      Contacto — corregir hasta llegar a ≥ 90 en Accesibilidad.
- [ ] Revisar contraste de colores y texto alternativo en todas las imágenes.

## Fase 8 — Pulido y despliegue
- [x] Optimización de imágenes (tamaños responsive).
- [ ] Configurar SMTP real de producción (proveedor a definir con el usuario).
- [ ] Configurar dominio/hosting de destino.
- [x] Redirects 301 si alguna URL cambia respecto a la original (evitar
      perder SEO).
- [ ] Revisión final página por página comparando con el sitio en vivo.

# Requirements — Sitio público LESCO por Costa Rica

## 1. Propósito
Migrar el sitio público actual (WordPress + Elementor) a Laravel,
manteniendo el contenido, la estructura de navegación y el compromiso con
la accesibilidad, con una base de código mantenible y editable por
desarrolladores (no por un CMS visual).

**Fuera de alcance en esta fase:** login/perfil de estudiantes, área
privada, cursos, pagos.

## 2. Páginas y funcionalidad

### 2.1 Inicio (`/`)
- Hero con mensaje principal ("La LESCO cambia vidas") e imagen destacada.
- Sección "¿Quiénes somos?" (texto + imagen).
- Contadores animados: Estudiantes, Horas Invertidas, Talleres (valores
  configurables, no hardcodeados en la vista).
- Carrusel/lista de testimonios (foto, nombre, rol, texto). Debe soportar
  agregar/quitar testimonios sin tocar código.
- Sección "Alianzas" (logos de organizaciones aliadas).
- Bloque de contacto rápido (dirección, teléfono, correo, redes sociales)
  repetido en el footer de todas las páginas.
- CTA hacia "Servicios".

### 2.2 Equipo (`/equipo`)
- Listado de integrantes del equipo (foto, nombre, rol/descripción).
  *(Nota: no se pudo inspeccionar el contenido exacto de esta página en el
  sitio original — confirmar contenido real antes de dar por completa esta
  sección; si no hay acceso, dejar estructura lista para poblar a mano.)*

### 2.3 Blog (`/blog`, `/blog/{slug}`)
- Listado paginado de entradas (título, extracto, imagen destacada, fecha).
- Vista de detalle de cada entrada con contenido completo.
- Debe soportar HTML enriquecido en el contenido (negritas, listas,
  imágenes embebidas) igual que un post de WordPress.

### 2.4 Servicios (`/servicios`)
- Listado de servicios/talleres ofrecidos, cada uno con: título,
  descripción, población objetivo, costo, imágenes opcionales.
- Servicios identificados en el contenido actual (usar como semilla,
  confirmar vigencia con el usuario antes de publicar):
  1. Aprendiendo LESCO — taller virtual, ₡80,000
  2. Programa LESCO como herramienta de comunicación — 10 talleres, ₡30,000/persona
  3. Aprendiendo de cultura sorda y LESCO básico — taller virtual, ₡90,000
  4. Curso de LESCO Empresarial — 3 niveles, sin matrícula, aval de ANS.

### 2.5 Contacto (`/contacto`)
- Formulario: nombre, correo, mensaje (mínimo). Validación server-side.
- Al enviar: (a) envío de correo de notificación al equipo, y
  (b) mensaje de confirmación al usuario. Registrar el mensaje en base de
  datos como respaldo.
- Mostrar también: dirección (San José, Costa Rica), teléfono, correo,
  enlaces a Facebook e Instagram.
- Protección anti-spam básica (honeypot o similar; no depender de
  servicios de pago).

## 3. Requisitos no funcionales

### 3.1 Accesibilidad (prioridad alta)
- Widget de accesibilidad visible en todas las páginas con:
  - Aumentar/disminuir tamaño de letra.
  - Modo de alto contraste con selección de color.
  - Escala de grises / invertir colores.
  - Navegación por teclado mejorada.
- Todo el sitio debe cumplir WCAG 2.1 AA como mínimo: contraste de color,
  texto alternativo en imágenes, estructura semántica de encabezados,
  formularios con labels asociados.

### 3.2 SEO
- Cada página debe preservar equivalentes a los meta tags actuales
  (title, description, Open Graph, imagen destacada).
- URLs amigables equivalentes a las actuales donde sea razonable
  (`/servicios`, `/blog`, `/contacto`, etc.) para no romper enlaces
  existentes ni el SEO acumulado.

### 3.3 Rendimiento
- Imágenes optimizadas/responsive (no servir imágenes a resolución
  completa en miniaturas).
- CSS/JS empaquetados vía Vite, sin dependencias innecesarias.

### 3.4 Idioma y contenido
- Todo el contenido de cara al usuario en español (es-CR).
- El contenido debe poder editarse (vía seeders/DB) sin tocar las vistas.

### 3.5 Responsive
- Debe verse correctamente en móvil, tablet y escritorio (el sitio actual
  es mobile-first vía Elementor).

## 4. Criterios de aceptación generales
- Cada página migrada debe mostrar el mismo contenido informativo que la
  original (verificado manualmente contra el sitio en vivo).
- El formulario de contacto debe entregar el correo correctamente en un
  entorno de prueba (Mailtrap/log driver).
- El widget de accesibilidad debe funcionar sin JavaScript pesado
  (Alpine.js es suficiente).
- Lighthouse (Accesibilidad) ≥ 90 en las páginas principales.

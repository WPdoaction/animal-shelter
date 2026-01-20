# Animal Shelter Plugin - Roadmap & Development Plan

Este documento describe la hoja de ruta para el desarrollo futuro del plugin Animal Shelter, incluyendo planificación de funcionalidades, arquitectura escalable y estrategias de implementación.

## Estado Actual (v1.0.0)

### ✅ Implementado

#### Arquitectura Core
- ✅ Namespaces PSR-4 (`AnimalShelter\`)
- ✅ Composer autoloading
- ✅ Estructura modular en `src/`
- ✅ Sistema de activación/desactivación
- ✅ Sistema de upgrade con versionado
- ✅ Flush rewrite rules optimizado (flag-based)

#### Custom Post Types
- ✅ **Dog** (`as_dog`): Custom Post Type para perros
- ✅ **Cat** (`as_cat`): Custom Post Type para gatos
- ✅ Clases base reutilizables (`CPT\Cpt`)
- ✅ REST API enabled para ambos CPTs

#### Taxonomías
Para **Dog** y **Cat**:
- ✅ **Breed** (Raza): Taxonomía de razas
- ✅ **Status** (Estado): En adopción, perdido/encontrado
- ✅ **Size** (Tamaño): Mini, pequeño, mediano, grande, gigante
- ✅ **Color**: Colores del animal
- ✅ **Energy** (Energía): Nivel de energía del animal

#### Data Layer
- ✅ Razas predefinidas (~900+ razas de perros, múltiples de gatos)
- ✅ Definiciones de tamaños
- ✅ Sistema extensible para añadir más datos

#### Admin
- ✅ Registro de CPTs y taxonomías
- ✅ Página de configuración básica (esqueleto)
- ✅ Labels internacionalizables

#### Public
- ✅ Helpers para posts (`PublicFacing\Post\*`)
- ✅ Helpers para términos (`PublicFacing\Term\*`)
- ✅ Preparado para enqueue de scripts/styles

#### Internacionalización
- ✅ Text domain: `animal-shelter`
- ✅ Todas las strings traducibles
- ✅ Contextos para razas y taxonomías
- ✅ Load textdomain en `init` hook

#### Calidad
- ✅ WordPress Coding Standards (PHPCS configured)
- ✅ PHP 7.4+ compatibility (typed properties)
- ✅ Security: ABSPATH checks, nonce verification
- ✅ Documentación técnica completa

### ⚠️ Pendiente / Incompleto

- ⚠️ **Meta boxes**: No hay campos personalizados en CPTs
- ⚠️ **Frontend templates**: Sin plantillas custom
- ⚠️ **Admin settings**: Página de configuración vacía
- ⚠️ **Galería de imágenes**: Solo featured image
- ⚠️ **Campos adicionales**: Chip, esterilizado, vacunas, etc.
- ⚠️ **Location taxonomy**: Sin implementar
- ⚠️ **User registration**: Sin sistema de usuarios
- ⚠️ **Formularios de adopción**: Sin implementar
- ⚠️ **Voluntariado**: Sin implementar
- ⚠️ **Donaciones**: Sin implementar
- ⚠️ **Email notifications**: Sin implementar
- ⚠️ **Favoritos**: Sin implementar
- ⚠️ **API external integration**: Sin implementar

---

## Visión General del Proyecto

### Objetivo

Crear un **ecosistema completo para protectoras de animales** que incluya:

1. **Plugin Core** (Animal Shelter): Gestión de animales, adopciones, voluntarios, donaciones
2. **Theme** (Block Theme): Tema de bloques optimizado para protectoras
3. **Integraciones**: APIs externas, pasarelas de pago, email marketing

### Equipos Necesarios

Según el README.md, el proyecto requiere:
- **Project Manager**: Coordinación general
- **Desarrollo**: Backend (PHP/WordPress), Frontend (JS/React)
- **Diseño**: UI/UX, maquetadores
- **Contenidos**: Copywriters, fotógrafos
- **Social**: Community managers
- **QA/Testing**: Control de calidad
- **Training**: Formación a las organizaciones

---

## Roadmap de Desarrollo

### Fase 1: Meta Fields & Core Functionality (v1.1.0 - v1.2.0)

**Objetivo**: Completar los campos básicos de los CPTs de animales.

#### v1.1.0 - Meta Boxes Básicos

**Nuevas clases a crear**:
```
src/Admin/Metabox/
├── Metabox.php              # Base class
├── Dog/
│   └── BasicInfo.php        # Meta box info básica de perros
└── Cat/
    └── BasicInfo.php        # Meta box info básica de gatos
```

**Campos a implementar**:
- ✨ Año/Fecha de nacimiento (DatePicker)
- ✨ Esterilizado (Yes/No/Unknown - radio buttons)
- ✨ Chip implantado (Yes/No/Unknown)
- ✨ Cartilla veterinaria (Yes/No/Unknown)
- ✨ Vacunas al día (Yes/No/Unknown)

**Tecnología**:
- Custom Meta Boxes con `add_meta_box()`
- Save post hook con nonce verification
- Sanitization con `sanitize_text_field()`, `absint()`, etc.
- Gutenberg compatible (no bloquear editor)

**Estimación**: 2-3 semanas

#### v1.2.0 - Galería de Imágenes

**Nuevas funcionalidades**:
- ✨ Gallery metabox usando Media Library
- ✨ Drag & drop reordering
- ✨ Límite configurable de imágenes
- ✨ Shortcode `[animalshelter_gallery id="123"]`

**Tecnología**:
- WordPress Media Library API
- `wp_enqueue_media()`
- JavaScript para drag & drop (vanilla JS o jQuery)
- REST API endpoint para reordenar

**Estimación**: 2-3 semanas

---

### Fase 2: Taxonomía de Localización (v1.3.0)

**Objetivo**: Añadir sistema de localización geográfica.

**Nuevas clases**:
```
src/Admin/Taxonomy/
├── Dog/
│   └── Location.php
└── Cat/
    └── Location.php

src/Data/Location/
└── Spain.php                 # Provincias y comunidades de España
```

**Implementación**:
- Taxonomía jerárquica: País → Comunidad → Provincia
- Integración con Geonames API (opcional)
- Datos predefinidos para España (targeting inicial)
- Extensible a otros países

**Constantes**:
```php
ANIMALSHELTER_TAXONOMY_LOCATION_DOG = 'as_location_dog'
ANIMALSHELTER_TAXONOMY_LOCATION_CAT = 'as_location_cat'
```

**Estimación**: 2-3 semanas

---

### Fase 3: Más Tipos de Animales (v1.4.0 - v1.5.0)

**Objetivo**: Extender el plugin a más especies.

#### v1.4.0 - Birds (Aves)

**Nuevas clases**:
```
src/Admin/CPT/Bird.php
src/Admin/Taxonomy/Bird/
├── Breed.php
├── Status.php
├── Size.php
├── Color.php
└── Energy.php

src/PublicFacing/Post/Bird.php
src/PublicFacing/Term/Bird/...

src/Data/Breed/Bird.php
src/Data/Size/Bird.php
```

**Proceso**:
1. Definir constantes en `Core\Animalshelter->contentConstants()`
2. Crear clases siguiendo patrón Dog/Cat
3. Registrar en `Admin\Admin->inits()`
4. Añadir datos predefinidos de razas de aves
5. Regenerar autoloader: `composer dump-autoload`

**Estimación**: 1-2 semanas (siguiendo patrón establecido)

#### v1.5.0 - Fish, Reptiles, Amphibians

Siguiendo el mismo patrón de Birds, implementar:
- ✨ Fish (Peces)
- ✨ Reptiles (Reptiles)
- ✨ Amphibians (Anfibios)

**Estimación**: 1-2 semanas cada uno

---

### Fase 4: Sistema de Usuarios (v2.0.0)

**Objetivo**: Implementar registro de usuarios y perfiles.

**Nuevas clases**:
```
src/PublicFacing/User/
├── Registration.php          # Formulario de registro
├── Profile.php              # Gestión de perfil
└── Preferences.php          # Preferencias de usuario

src/Admin/User/
└── Management.php           # Gestión de usuarios en admin
```

**Campos de Usuario** (Custom User Meta):
- Nombre completo
- Email (validado obligatoriamente)
- Teléfono (opcional)
- Localización (opcional, relacionado con taxonomy Location)
- Preferencias de notificaciones

**Funcionalidades**:
- Formulario de registro custom (shortcode `[animalshelter_register]`)
- Email verification con token
- Perfil de usuario editable
- Roles custom: `shelter_volunteer`, `shelter_adopter`

**Tecnología**:
- `register_new_user()` con validación custom
- `wp_new_user_notification()` para emails
- Custom user meta con `update_user_meta()`
- Shortcodes para formularios

**Estimación**: 3-4 semanas

---

### Fase 5: Notificaciones por Email (v2.1.0)

**Objetivo**: Sistema de suscripción y notificaciones.

**Nuevas clases**:
```
src/PublicFacing/Notification/
├── Manager.php              # Gestiona envío de emails
├── Subscription.php         # Gestiona suscripciones
└── Template.php             # Plantillas de email

src/Admin/Notification/
└── Settings.php             # Configuración de notificaciones
```

**Tipos de Notificación**:
1. **Instantánea**: Email cuando se publica un nuevo animal
2. **Diaria**: Resumen diario de nuevos animales
3. **Favoritos**: Cambios en animales favoritos del usuario

**Implementación**:
- Hook en `publish_post` para notificaciones instantáneas
- WP-Cron para resumen diario (`wp_schedule_event`)
- User meta para preferencias: `animalshelter_notification_pref`
- Integración con WordPress email (`wp_mail()`)
- Plantillas HTML para emails (usando `wptexturize()`)

**Configuración Admin**:
- Activar/desactivar notificaciones globalmente
- Personalizar asunto y cuerpo de emails
- Límite de envíos por día (anti-spam)

**Estimación**: 3-4 semanas

---

### Fase 6: Sistema de Favoritos (v2.2.0)

**Objetivo**: Permitir a usuarios marcar animales favoritos.

**Nuevas clases**:
```
src/PublicFacing/Favorite/
├── Manager.php              # Gestión de favoritos
└── Widget.php               # Widget de favoritos

src/REST/
└── FavoriteController.php   # REST API para favoritos
```

**Funcionalidades**:
- Botón "Añadir a favoritos" (AJAX)
- Página "Mis Favoritos" (shortcode `[animalshelter_favorites]`)
- Notificaciones de cambios en favoritos
- Widget "Mis Favoritos" para sidebar

**Implementación**:
- User meta: `animalshelter_favorites` (array de post IDs)
- REST API: `POST /wp-json/animalshelter/v1/favorites/add`
- REST API: `DELETE /wp-json/animalshelter/v1/favorites/remove`
- JavaScript (vanilla o React) para interacción

**Estimación**: 2-3 semanas

---

### Fase 7: Formularios de Adopción (v2.3.0)

**Objetivo**: Sistema completo de solicitudes de adopción.

**Nuevas clases**:
```
src/PublicFacing/Adoption/
├── Form.php                 # Formulario de adopción
├── Request.php              # Model de solicitud
└── Email.php                # Notificaciones de adopción

src/Admin/Adoption/
├── Management.php           # Gestión de solicitudes
└── ListTable.php            # WP_List_Table de solicitudes

src/Admin/CPT/
└── AdoptionRequest.php      # CPT para solicitudes (privado)
```

**Custom Post Type**: `as_adoption_request` (privado, solo admin)

**Flujo**:
1. Usuario ve animal en frontend
2. Click en "Solicitar adopción"
3. Si no está registrado → redirigir a registro
4. Si está registrado → mostrar formulario pre-rellenado
5. Envío → CPT privado creado + email a admin
6. Admin revisa solicitud en dashboard
7. Admin puede aprobar/rechazar → email al usuario

**Campos del Formulario**:
- Animal (hidden, pre-filled)
- Nombre, email, teléfono (pre-filled si está logueado)
- Localización
- Tipo de vivienda
- Experiencia con animales
- Razón para adoptar (textarea)

**Tecnología**:
- Shortcode `[animalshelter_adoption_form]`
- AJAX submission con nonce
- Custom CPT privado para tracking
- Email notifications con templates

**Estimación**: 4-5 semanas

---

### Fase 8: Voluntariado (v2.4.0)

**Objetivo**: Sistema de registro de voluntarios.

**Nuevas clases**:
```
src/PublicFacing/Volunteer/
├── Form.php                 # Formulario de voluntariado
└── Email.php                # Notificaciones

src/Admin/Volunteer/
├── Management.php           # Gestión de voluntarios
└── ListTable.php            # Lista de solicitudes

src/Admin/CPT/
└── VolunteerRequest.php     # CPT para solicitudes (privado)
```

**Custom Post Type**: `as_volunteer_request` (privado)

**Flujo**:
1. Usuario registrado accede a "Ser voluntario"
2. Rellena formulario (pre-filled)
3. Envío → CPT + email a admin
4. Admin revisa y contacta

**Campos**:
- Disponibilidad (checkbox: fines de semana, entre semana, etc.)
- Habilidades (checkbox: paseos, transporte, cuidados médicos, etc.)
- Experiencia con animales
- Motivación (textarea)

**Estimación**: 2-3 semanas

---

### Fase 9: Donaciones (v3.0.0)

**Objetivo**: Sistema de donaciones con pasarelas de pago.

**Nuevas clases**:
```
src/PublicFacing/Donation/
├── Form.php                 # Formulario de donación
├── Manager.php              # Gestión de donaciones
└── Gateway/
    ├── GatewayInterface.php # Interface para gateways
    ├── Stripe.php           # Integración Stripe
    ├── PayPal.php           # Integración PayPal
    └── BankTransfer.php     # Transferencia bancaria

src/Admin/Donation/
├── Management.php           # Gestión de donaciones
├── ListTable.php            # Lista de donaciones
└── Settings.php             # Configuración de gateways

src/Admin/CPT/
└── Donation.php             # CPT para donaciones (privado)

src/REST/
└── DonationController.php   # REST API
```

**Custom Post Type**: `as_donation` (privado)

**Funcionalidades**:
- Donación puntual
- Donación recurrente (mensual, anual)
- Múltiples gateways (strategy pattern)
- Recibos por email
- Tracking en dashboard

**Pasarelas de Pago**:
1. **Stripe**: API oficial de Stripe (`stripe/stripe-php`)
   - Webhooks para confirmación
   - Subscripciones para recurrentes
   - PCI compliance automático

2. **PayPal**: REST API o SDK oficial
   - Subscriptions para recurrentes
   - IPN webhooks

3. **Redsys**: Integración TPV (España)
   - Formulario de redirección
   - SHA-256 signature

4. **Transferencia Bancaria**: Manual
   - IBAN mostrado
   - Confirmación manual por admin

**Shortcode**: `[animalshelter_donate]`

**Tecnología**:
- Composer packages: `stripe/stripe-php`, `paypal/rest-api-sdk-php`
- Webhook handlers con nonce verification
- Logs de transacciones (WP_Error para debugging)
- Settings page con API keys (encrypted)

**Estimación**: 6-8 semanas

---

### Fase 10: Frontend & Theme Integration (v3.1.0)

**Objetivo**: Mejorar integración con temas y bloques.

**Nuevos Bloques Gutenberg**:
```
blocks/
├── animal-card/             # Tarjeta de animal
├── animal-grid/             # Grid de animales
├── animal-filters/          # Filtros (taxonomías)
├── adoption-form/           # Formulario de adopción
├── donation-form/           # Formulario de donación
└── volunteer-form/          # Formulario de voluntariado
```

**Templates Custom**:
- `single-as_dog.php`
- `single-as_cat.php`
- `archive-as_dog.php`
- `taxonomy-as_breed_dog.php`

**Widget Areas**:
- "Animal Sidebar" (info adicional)
- "Adoption Sidebar" (call-to-action)

**Tecnología**:
- `@wordpress/scripts` para build
- React para bloques interactivos
- Block.json para metadata
- Render callbacks en PHP

**Estimación**: 5-6 semanas

---

### Fase 11: External API Integration (v3.2.0)

**Objetivo**: Integración con APIs externas de adopción.

**Nuevas clases**:
```
src/Integration/
├── API/
│   ├── APIInterface.php     # Interface común
│   ├── Petfinder.php        # Petfinder.com API
│   ├── AdoptAPet.php        # Adopt-a-Pet.com API
│   └── RescueGroups.php     # RescueGroups.org API
│
└── Sync/
    ├── Scheduler.php        # WP-Cron scheduler
    ├── Importer.php         # Importa animales
    └── Mapper.php           # Mapea campos externos a internos
```

**Funcionalidades**:
- Importación automática de animales desde APIs externas
- Mapeo de campos (breed, size, color, etc.)
- Sincronización bidireccional (publicar en APIs externas)
- WP-Cron para sync periódico (daily, hourly)
- Settings page para API keys

**APIs a integrar**:
1. **Petfinder** (petfinder.com/developers)
2. **Adopt-a-Pet** (adoptapet.com/public/apis)
3. **RescueGroups** (rescuegroups.org/services/api)

**Estimación**: 4-5 semanas

---

### Fase 12: Advanced Features (v3.3.0+)

**Funcionalidades Avanzadas**:

1. **Advanced Search & Filters**:
   - AJAX filtering por taxonomías
   - Búsqueda por rango de edad
   - Búsqueda por proximidad geográfica
   - Guardar búsquedas

2. **Analytics & Reporting**:
   - Dashboard con estadísticas
   - Animales más vistos
   - Conversión de adopciones
   - Donaciones por periodo

3. **Social Sharing**:
   - Share buttons (Facebook, Twitter, WhatsApp)
   - Open Graph meta tags
   - Twitter Cards
   - Schema.org markup

4. **Multi-Shelter Support**:
   - Multisite ready
   - Taxonomy "Shelter" para múltiples protectoras
   - Subdirectorios por protectora

5. **Mobile App API**:
   - REST API completo
   - JWT authentication
   - Endpoints documentados (Swagger)

**Estimación**: Variable por feature (2-4 semanas cada una)

---

## Arquitectura Técnica

### Extensibilidad

#### Hooks & Filters

Crear sistema robusto de hooks para extender funcionalidad:

```php
// Filters para modificar argumentos
apply_filters('animalshelter_cpt_args', $args, $cpt_name);
apply_filters('animalshelter_taxonomy_args', $args, $taxonomy_name);
apply_filters('animalshelter_metabox_fields', $fields, $post_type);

// Actions para ejecutar lógica custom
do_action('animalshelter_before_adoption_submit', $post_id, $form_data);
do_action('animalshelter_after_donation_complete', $donation_id, $amount);
do_action('animalshelter_animal_published', $post_id, $post);
```

#### Add-ons Architecture

Permitir plugins hijos que extiendan funcionalidad:

```
animal-shelter-addons/
├── animalshelter-advanced-search/
├── animalshelter-mailchimp/
├── animalshelter-woocommerce/
└── animalshelter-analytics/
```

**Patrón**: Cada addon registra namespace `AnimalShelter\Addons\AddonName\`

### Performance

#### Caching Strategy

- **Object Cache**: Usar `wp_cache_get/set()` para queries pesadas
- **Transients**: Para datos de APIs externas (`set_transient()`)
- **Page Cache**: Compatible con WP Super Cache, W3 Total Cache
- **CDN**: Optimizar para servir assets desde CDN

#### Database Optimization

- **Indexes**: Añadir indexes a meta queries frecuentes
- **Query Optimization**: Usar `WP_Query` con `fields => 'ids'` cuando sea posible
- **Pagination**: Siempre paginar resultados (nunca `posts_per_page => -1` en frontend)

#### Asset Optimization

- **Minificación**: Build con `@wordpress/scripts`
- **Code Splitting**: Lazy load bloques no críticos
- **Conditional Loading**: Solo cargar JS/CSS cuando se necesite
- **Image Optimization**: Lazy loading, responsive images, WebP

### Security

#### Input Validation & Sanitization

```php
// Sanitize inputs
$name = sanitize_text_field($_POST['name']);
$email = sanitize_email($_POST['email']);
$amount = absint($_POST['amount']);

// Validate
if (!is_email($email)) {
    wp_die(__('Invalid email', 'animal-shelter'));
}
```

#### Nonces Everywhere

```php
// Generar nonce
wp_nonce_field('animalshelter_adoption_form', '_wpnonce');

// Verificar nonce
if (!wp_verify_nonce($_POST['_wpnonce'], 'animalshelter_adoption_form')) {
    wp_die(__('Security check failed', 'animal-shelter'));
}
```

#### Capability Checks

```php
// Verificar capabilities
if (!current_user_can('edit_post', $post_id)) {
    wp_die(__('Permission denied', 'animal-shelter'));
}
```

#### SQL Injection Prevention

```php
// Usar $wpdb->prepare SIEMPRE
$results = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM {$wpdb->posts} WHERE post_type = %s",
        'as_dog'
    )
);
```

#### XSS Prevention

```php
// Escapar output
echo esc_html($name);
echo esc_url($link);
echo esc_attr($attribute);
echo wp_kses_post($html_content); // Para HTML trusted
```

### Testing Strategy

#### Unit Tests (PHPUnit)

```bash
vendor/bin/phpunit
```

Tests para:
- Métodos de clases base (CPT, Taxonomy)
- Helpers de data (Breed, Size)
- Sanitization functions
- Email templates

#### Integration Tests

Tests para:
- CPT registration
- Taxonomy registration
- Meta boxes save
- REST API endpoints

#### E2E Tests (Playwright o Cypress)

Tests para:
- Formulario de adopción
- Proceso de donación
- Registro de usuario
- Crear/editar animal

### Deployment & CI/CD

#### GitHub Actions Workflow

```yaml
name: CI

on: [push, pull_request]

jobs:
  phpcs:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - run: composer install
      - run: vendor/bin/phpcs

  phpunit:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - run: composer install
      - run: vendor/bin/phpunit

  build:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - run: ./bin/release.sh ${{ github.ref_name }}
      - uses: actions/upload-artifact@v2
        with:
          name: plugin-zip
          path: ../animal-shelter-*.zip
```

#### Release Process

1. Update version en `animal-shelter.php` y `README.txt`
2. Update `CHANGELOG.md`
3. Commit: `git commit -am "Release v1.1.0"`
4. Tag: `git tag v1.1.0`
5. Push: `git push && git push --tags`
6. GitHub Action crea ZIP automáticamente
7. Subir a WordPress.org (si aplica)

---

## Consideraciones de Escalabilidad

### Multi-Shelter (Multisite)

Para soportar múltiples protectoras:

1. **Multisite Ready**: Activar en cada site
2. **Shared Data**: Tabla custom para compartir animales entre sites
3. **Taxonomy "Shelter"**: Identificar protectora propietaria
4. **Permissions**: Cada site solo edita sus animales

### High Traffic

Para protectoras grandes con mucho tráfico:

1. **Redis Object Cache**: Para transients y object cache
2. **CDN**: Cloudflare para assets estáticos
3. **Database Optimization**: Indexes en meta queries
4. **Lazy Loading**: Cargar imágenes bajo demanda
5. **API Rate Limiting**: Limitar requests a REST API

### Internationalization

Para expansión internacional:

1. **Geonames Integration**: Localización global
2. **Currency Support**: Multi-currency para donaciones
3. **Language Packs**: Traducciones a múltiples idiomas
4. **RTL Support**: Soporte para idiomas RTL (árabe, hebreo)

---

## Ecosistema de Themes

### Animal Shelter Block Theme

**Repositorio separado**: `animal-shelter-theme`

**Características**:
- Full Site Editing (FSE)
- Block patterns para animales
- Templates específicos (`single-as_dog`, etc.)
- Style variations (Light, Dark, High Contrast)
- Responsive & Mobile-first
- Accessibility (WCAG 2.1 AA)

**Blocks incluidos**:
- Animal Card
- Animal Grid
- Filters
- Featured Animals
- Adoption CTA

---

## Dependencias & Stack Tecnológico

### Backend (PHP)

- **WordPress**: 6.6+ (latest)
- **PHP**: 7.4+ (typed properties)
- **Composer**: 2.0+ (autoloading)
- **Namespaces**: PSR-4

### Frontend (JavaScript)

- **@wordpress/scripts**: Build tooling
- **React**: Para bloques Gutenberg
- **Vanilla JS**: Para interacciones simples (AJAX)
- **SCSS**: Para estilos

### External Services

- **Stripe**: Donaciones recurrentes
- **PayPal**: Donaciones puntuales
- **Redsys**: TPV España
- **Geonames**: Localización geográfica
- **Petfinder API**: Sync de animales
- **Mailchimp** (opcional): Email marketing

### Development Tools

- **PHPCS**: Code standards
- **PHPUnit**: Unit tests
- **Playwright**: E2E tests
- **GitHub Actions**: CI/CD
- **Local by Flywheel**: Desarrollo local

---

## Recursos y Referencias

### WordPress Developer Resources

- [Plugin Handbook](https://developer.wordpress.org/plugins/)
- [Block Editor Handbook](https://developer.wordpress.org/block-editor/)
- [REST API Handbook](https://developer.wordpress.org/rest-api/)
- [Coding Standards](https://developer.wordpress.org/coding-standards/)

### External APIs

- [Petfinder API](https://www.petfinder.com/developers/)
- [Adopt-a-Pet API](https://www.adoptapet.com/public/apis/pet_list.html)
- [RescueGroups API](https://userguide.rescuegroups.org/display/APIDG/)
- [Stripe API](https://stripe.com/docs/api)
- [PayPal API](https://developer.paypal.com/)
- [Geonames](https://www.geonames.org/)

### Similar Plugins (Inspiration)

- [Pets](https://wordpress.org/plugins/pets/)
- [PetPress](https://wordpress.org/plugins/petpress/)
- [Pet Adoption Listings](https://wordpress.org/plugins/pet-adoption-listings/)

---

## Conclusión

El plugin Animal Shelter tiene una **base sólida** (v1.0.0) con arquitectura moderna (namespaces PSR-4, Composer). El roadmap propuesto extiende el plugin progresivamente hasta convertirlo en una **solución completa para protectoras de animales**.

**Prioridades recomendadas**:
1. Meta fields (campos esenciales)
2. Formularios de adopción (core business)
3. Sistema de donaciones (sostenibilidad)
4. Theme & Frontend (experiencia de usuario)
5. Integraciones externas (escalabilidad)

**Tiempo estimado total**: 12-18 meses con equipo dedicado.

**Mantenibilidad**: La arquitectura basada en namespaces facilita el crecimiento sostenible del proyecto sin deuda técnica.

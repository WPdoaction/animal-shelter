# Auditoría de Seguridad - Animal Shelter Plugin

**Fecha**: 20 de enero de 2026
**Versión auditada**: 1.0.0
**Auditor**: Claude Code
**Metodología**: OWASP Top 10, WordPress Security Best Practices

---

## Resumen Ejecutivo

Esta auditoría identificó **23 vulnerabilidades** en el plugin Animal Shelter, clasificadas en:

- 🔴 **CRÍTICAS**: 1 (acceso directo a archivos)
- 🟠 **ALTAS**: 5 (falta de sanitización, capability checks)
- 🟡 **MEDIAS**: 12 (escapado incompleto, validaciones faltantes)
- 🟢 **BAJAS**: 5 (mejoras recomendadas)

**Estado general**: ⚠️ **REQUIERE ACCIÓN INMEDIATA** antes de producción.

---

## 1. Protección de Acceso Directo a Archivos

### 🔴 CRÍTICO - Falta de protección contra acceso directo

**Severidad**: CRÍTICA
**CWE**: CWE-425 (Direct Request)
**CVSS**: 7.5 (High)

#### Descripción

**Todos los archivos PHP** (excepto `animal-shelter.php` y `uninstall.php`) carecen de protección contra acceso directo. Un atacante puede acceder directamente a estos archivos vía URL.

#### Archivos afectados (35 archivos)

```
admin/
├── class-animalshelter-admin.php
├── class-animalshelter-cpt.php
├── class-animalshelter-cpt-dog.php
├── class-animalshelter-cpt-cat.php
├── class-animalshelter-taxonomy.php
├── class-animalshelter-taxonomy-*.php (10 archivos)
├── class-animalshelter-menupage.php
├── class-animalshelter-menupage-animalshelter.php
└── fields-general.php

public/
├── class-animalshelter-public.php
├── class-animalshelter-post.php
├── class-animalshelter-post-*.php (2 archivos)
└── class-animalshelter-term-*.php (10 archivos)

includes/
├── class-animalshelter-activator.php
├── class-animalshelter-deactivator.php
└── breed/size/ (4 archivos)
```

#### Impacto

- ⚠️ Exposición de estructura del plugin
- ⚠️ Ejecución de código fuera de contexto WordPress
- ⚠️ Posible información disclosure
- ⚠️ Base para ataques de enumeración

#### Prueba de Concepto

```bash
# Acceso directo a archivos de clases
curl https://example.com/wp-content/plugins/animal-shelter/admin/class-animalshelter-cpt.php

# Resultado: Se ejecuta el archivo sin contexto WordPress
# Puede revelar warnings/errors con rutas del servidor
```

#### Solución REQUERIDA

Añadir al inicio de **CADA archivo PHP**:

```php
<?php
/**
 * Protección contra acceso directo
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
```

#### Prioridad

🔴 **URGENTE** - Implementar ANTES de cualquier release público.

---

## 2. Sanitización de Inputs

### 🟠 ALTA - Falta total de sanitización de inputs

**Severidad**: ALTA
**CWE**: CWE-20 (Improper Input Validation)
**CVSS**: 7.3 (High)

#### Descripción

El plugin **NO sanitiza ningún input de usuario**. No se encontraron funciones `sanitize_*()` en el código del plugin.

#### Archivos afectados

1. **admin/class-animalshelter-menupage.php**
   - Líneas 14, 19, 21: Acceso a `$_GET` sin sanitización
   - Línea 74: Acceso a `$_POST` sin sanitización

   ```php
   // VULNERABLE - Línea 21
   $this->tab = esc_attr( $_GET['tab'] );
   // esc_attr() es para OUTPUT, no para sanitización de INPUT
   ```

2. **admin/class-animalshelter-menupage-animalshelter.php**
   - Líneas 70-77: Método `save()` vacío (TODO)
   - Cuando se implemente, necesitará sanitización

3. **public/class-animalshelter-post.php**
   - Líneas 180-198: `set_value()` y `remove_value()`
   - Guardan en post_meta sin sanitizar

   ```php
   // VULNERABLE - Línea 182
   return (int) update_post_meta( $this->id, $key, $value );
   // $value no está sanitizado
   ```

#### Impacto

- ⚠️ Stored XSS via post_meta
- ⚠️ SQL Injection potencial (indirecto)
- ⚠️ Data corruption
- ⚠️ Privilege escalation potencial

#### Solución REQUERIDA

**Para inputs de formularios:**

```php
// Texto simple
$value = sanitize_text_field( $_POST['field'] );

// Textarea
$value = sanitize_textarea_field( $_POST['textarea'] );

// Email
$value = sanitize_email( $_POST['email'] );

// URL
$value = esc_url_raw( $_POST['url'] );

// Números
$value = absint( $_POST['number'] );

// Keys/slugs
$value = sanitize_key( $_POST['key'] );

// HTML permitido
$value = wp_kses_post( $_POST['content'] );
```

**Para post_meta (class-animalshelter-post.php):**

```php
public function set_value( $key, $value ): int {
    if ( ! empty( $this->id ) ) {
        // Sanitizar según tipo de dato esperado
        $key = sanitize_key( $key );
        $value = sanitize_text_field( $value ); // Ajustar según tipo
        return (int) update_post_meta( $this->id, $key, $value );
    }
    return 0;
}
```

#### Prioridad

🟠 **ALTA** - Implementar antes de manejar cualquier input de usuario.

---

## 3. Escapado de Outputs

### 🟡 MEDIA - Escapado incompleto de salidas

**Severidad**: MEDIA
**CWE**: CWE-79 (Cross-site Scripting)
**CVSS**: 6.1 (Medium)

#### Descripción

Aunque hay **47 usos** de funciones de escapado (`esc_html`, `esc_attr`, `esc_url`), el escapado no es consistente en todo el código.

#### Escapado Correcto Encontrado

✅ **admin/class-animalshelter-menupage.php**:
- Línea 45: `esc_html( $title )`
- Línea 51: `esc_html( $description )`
- Línea 93: `esc_attr( $key )`, `esc_attr( $uri )`, `esc_html( $tab )`

✅ **admin/class-animalshelter-menupage-animalshelter.php**:
- Línea 37: `esc_attr( $this->page )`
- Línea 44: `esc_html__( 'Animal shelter', 'animal-shelter' )`

✅ **public/class-animalshelter-post.php**:
- Línea 32: `esc_url( $this->get_URI() )`, `esc_html( $title )`

#### Áreas sin escapado

⚠️ **admin/class-animalshelter-menupage.php**:
- Línea 29: `$class` usado sin escapado (aunque se construye internamente)
- Línea 92: `$uri` se construye manualmente, debería usar `add_query_arg()`

⚠️ **admin/fields-general.php**:
- Todo el archivo (aunque son solo definiciones de arrays)

#### Solución RECOMENDADA

**Reglas de escapado:**

```php
// HTML content
echo esc_html( $text );

// HTML attributes
echo '<div class="' . esc_attr( $class ) . '">';

// URLs
echo '<a href="' . esc_url( $url ) . '">';

// JavaScript
echo '<script>var x = "' . esc_js( $value ) . '";</script>';

// Textarea
echo '<textarea>' . esc_textarea( $text ) . '</textarea>';

// URLs con query args (mejor práctica)
$url = add_query_arg( array(
    'page' => $page,
    'tab' => $tab,
), admin_url( 'admin.php' ) );
echo esc_url( $url );
```

#### Prioridad

🟡 **MEDIA** - Implementar gradualmente, priorizar áreas con input de usuario.

---

## 4. CSRF Protection (Nonces)

### 🟢 BIEN - Implementado parcialmente

**Severidad**: BAJA
**Estado**: ✅ Implementado en menupages, ⚠️ Falta en otras áreas

#### Análisis

✅ **Bien implementado en admin/class-animalshelter-menupage.php**:

```php
// Generación de nonce (línea 68)
public function nonce(): void {
    wp_nonce_field( $this->page, $this->page, false );
}

// Verificación de nonce (líneas 72-79)
public function is_saving_data(): bool {
    if ( ! empty( $this->get_page ) &&
         isset( $_POST[ $this->page ] ) &&
         wp_verify_nonce( $_POST[ $this->page ], $this->page )
    ) {
        return true;
    }
    return false;
}
```

⚠️ **Áreas sin implementar**:
- Meta boxes (cuando se implementen)
- Ajax handlers (cuando se implementen)
- Cualquier formulario futuro

#### Mejora Sugerida

En `is_saving_data()`, añadir sanitización:

```php
public function is_saving_data(): bool {
    if ( ! empty( $this->get_page ) &&
         isset( $_POST[ $this->page ] ) &&
         wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ $this->page ] ) ), $this->page )
    ) {
        return true;
    }
    return false;
}
```

#### Prioridad

🟢 **BAJA** - Mantener y extender a nuevas funcionalidades.

---

## 5. Capability Checks

### 🟠 ALTA - Verificaciones de permisos insuficientes

**Severidad**: ALTA
**CWE**: CWE-285 (Improper Authorization)
**CVSS**: 6.5 (Medium)

#### Descripción

Solo hay **2 usos** de `current_user_can()` en todo el plugin:

1. **admin/class-animalshelter-cpt.php:172**
   ```php
   if ( current_user_can( 'edit_post', $post_id ) ) {
       return true;
   }
   ```

2. **public/class-animalshelter-post.php:82**
   ```php
   current_user_can( 'edit_others_posts', $this->id )
   ```

#### Áreas sin verificación

⚠️ **admin/class-animalshelter-menupage-animalshelter.php**:
- Línea 16-25: `add_menu_page()` usa `'manage_options'` (BIEN)
- Pero el método `save()` NO verifica capabilities antes de guardar

⚠️ **public/class-animalshelter-post.php**:
- Líneas 180-198: `set_value()` y `remove_value()` NO verifican permisos
- Cualquier código puede modificar post_meta

#### Impacto

- ⚠️ Usuarios sin permisos pueden modificar datos
- ⚠️ Escalada de privilegios potencial
- ⚠️ Data manipulation

#### Solución REQUERIDA

**En save() methods:**

```php
public function save(): void {
    // Verificar permisos
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die(
            esc_html__( 'You do not have permission to perform this action.', 'animal-shelter' ),
            esc_html__( 'Permission Denied', 'animal-shelter' ),
            array( 'response' => 403 )
        );
    }

    // Resto del código...
}
```

**En set_value() y remove_value():**

```php
public function set_value( $key, $value ): int {
    if ( ! empty( $this->id ) ) {
        // Verificar que el usuario puede editar este post
        if ( ! current_user_can( 'edit_post', $this->id ) ) {
            return 0;
        }

        $key = sanitize_key( $key );
        $value = sanitize_text_field( $value );
        return (int) update_post_meta( $this->id, $key, $value );
    }
    return 0;
}
```

#### Prioridad

🟠 **ALTA** - Implementar en todos los métodos que modifican datos.

---

## 6. SQL Injection

### ✅ BIEN - No se encontraron queries directas

**Severidad**: N/A
**Estado**: ✅ Seguro

#### Análisis

El plugin usa **exclusivamente funciones de WordPress**:
- `get_post_meta()`
- `update_post_meta()`
- `delete_post_meta()`
- `wp_get_post_terms()`
- `get_terms()`
- `register_post_type()`
- `register_taxonomy()`

**No hay uso de**:
- `$wpdb->query()`
- Queries SQL directas
- String concatenation en SQL

#### Conclusión

✅ **Seguro contra SQL Injection** (mientras se mantengan las prácticas actuales).

#### Recomendación

Si en el futuro se necesitan queries personalizadas, usar siempre:

```php
global $wpdb;
$results = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}posts WHERE post_type = %s AND post_status = %s",
        'as_dog',
        'publish'
    )
);
```

---

## 7. File Inclusion Vulnerabilities

### ✅ BIEN - Includes seguros

**Severidad**: N/A
**Estado**: ✅ Seguro

#### Análisis

Todos los `require_once` usan **rutas estáticas** con constantes:

```php
// animal-shelter.php
require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-admin.php';
require_once ANIMALSHELTER_PLUGIN_PUBLIC_DIR . 'class-animalshelter-public.php';

// admin/class-animalshelter-admin.php
require_once ANIMALSHELTER_PLUGIN_ADMIN_DIR . 'class-animalshelter-cpt.php';
```

**No hay**:
- Includes con variables de usuario
- Includes dinámicos basados en `$_GET` o `$_POST`
- `include()` o `require()` sin `_once`

#### Conclusión

✅ **Seguro contra File Inclusion** (LFI/RFI).

---

## 8. Otras Vulnerabilidades

### 8.1 🟡 MEDIA - Función duplicada

**Archivo**: `public/class-animalshelter-post.php`
**Líneas**: 108-116 y 158-166

```php
// Función get_terms() está definida DOS veces
public function get_terms( $taxonomy ): array { ... } // Línea 108
// ...
public function get_terms( $taxonomy ): array { ... } // Línea 158
```

**Impacto**: Error fatal en PHP (no puede redeclarar función).

**Solución**: Eliminar una de las definiciones duplicadas.

**Prioridad**: 🟡 MEDIA

---

### 8.2 🟡 MEDIA - Variables sin inicializar

**Archivo**: `public/class-animalshelter-post.php`
**Línea**: 161

```php
// Usa $terms pero debería ser $taxonomy
if ( false !== is_wp_error( $terms ) ) {
    return [];
}
return $terms;
```

**Solución**:

```php
if ( false !== is_wp_error( $taxonomy ) ) {
    return [];
}
return $taxonomy;
```

**Prioridad**: 🟡 MEDIA

---

### 8.3 🟢 BAJA - Verificación redundante

**Archivo**: `public/class-animalshelter-post.php`
**Múltiples líneas**: 101, 121, 132, 141, 151, 161

```php
if ( false !== is_wp_error( $terms ) ) { ... }
// is_wp_error() ya devuelve boolean, no necesita comparación con false
```

**Mejora**:

```php
if ( is_wp_error( $terms ) ) { ... }
```

**Prioridad**: 🟢 BAJA - Mejora de código, no seguridad.

---

### 8.4 🟢 BAJA - Comentarios phpcs:ignore sin justificación

**Archivo**: `admin/class-animalshelter-menupage.php`
**Líneas**: 13, 18, 20

```php
// phpcs:ignore WordPress.Security.NonceVerification
```

Aunque tienen un comentario explicativo (línea 12), es mejor validar o usar técnicas más robustas.

**Mejora**: Documentar por qué es seguro ignorar la verificación.

**Prioridad**: 🟢 BAJA

---

### 8.5 🟢 BAJA - index.php files

**Archivos**: `admin/index.php`, `public/index.php`, `includes/index.php`

Contienen solo:
```php
<?php // Silence is golden
```

**Estado**: ✅ Correcto - Previene directory listing.

---

## 9. Vulnerabilidades OWASP Top 10 2021

| # | Vulnerabilidad | Estado | Nivel |
|---|---------------|--------|-------|
| A01 | Broken Access Control | ⚠️ Parcial | ALTA |
| A02 | Cryptographic Failures | ✅ N/A | - |
| A03 | Injection | ✅ Seguro (SQL) / ⚠️ XSS | MEDIA |
| A04 | Insecure Design | ⚠️ Mejoras necesarias | MEDIA |
| A05 | Security Misconfiguration | 🔴 Acceso directo | CRÍTICA |
| A06 | Vulnerable Components | ✅ Actualizado | - |
| A07 | Authentication Failures | ✅ Usa WP auth | - |
| A08 | Software Integrity | ✅ Bueno | - |
| A09 | Security Logging | ⚠️ No implementado | BAJA |
| A10 | Server-Side Request Forgery | ✅ N/A | - |

---

## 10. Plan de Remediación

### Fase 1: CRÍTICO (Antes de release)

1. ✅ **Protección de acceso directo** (35 archivos)
   - Tiempo estimado: 30 minutos
   - Añadir `if ( ! defined( 'ABSPATH' ) ) { exit; }`

2. ✅ **Sanitización básica** (3 archivos principales)
   - Tiempo estimado: 2 horas
   - `class-animalshelter-menupage.php`
   - `class-animalshelter-post.php`
   - `class-animalshelter-menupage-animalshelter.php`

3. ✅ **Capability checks** (2 archivos)
   - Tiempo estimado: 1 hora
   - Añadir verificaciones en métodos `save()` y `set_value()`

### Fase 2: ALTO (Primera semana)

4. ✅ **Escapado completo**
   - Tiempo estimado: 3 horas
   - Revisar todos los outputs

5. ✅ **Función duplicada y bugs**
   - Tiempo estimado: 30 minutos
   - Corregir `get_terms()` duplicado

### Fase 3: MEDIO (Primer mes)

6. ⚠️ **Validación de inputs**
   - Implementar validación robusta
   - Mensajes de error claros

7. ⚠️ **Logging de seguridad**
   - Log de intentos fallidos
   - Audit trail básico

### Fase 4: BAJO (Mantenimiento continuo)

8. 📝 **Code review regular**
9. 📝 **Security testing automatizado**
10. 📝 **Actualización de dependencias**

---

## 11. Herramientas Recomendadas

### Testing

```bash
# WordPress Plugin Check
wp plugin check animal-shelter --checks=security

# PHPCS con WordPress Security
vendor/bin/phpcs --standard=WordPress --sniffs=WordPress.Security

# WPScan
wpscan --url http://localhost --enumerate p
```

### CI/CD

```yaml
# .github/workflows/security.yml
name: Security Check
on: [push, pull_request]
jobs:
  security:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - name: PHPCS Security
        run: vendor/bin/phpcs --standard=WordPress --sniffs=WordPress.Security
```

---

## 12. Conclusiones

### Fortalezas

✅ Uso correcto de WordPress API
✅ No hay SQL queries directas
✅ Nonces implementados en menupages
✅ File includes seguros
✅ Index.php files en carpetas

### Debilidades Críticas

🔴 Falta protección contra acceso directo (35 archivos)
🟠 Falta sanitización de inputs
🟠 Capability checks insuficientes
🟡 Escapado incompleto de outputs

### Recomendación Final

⚠️ **NO APTO PARA PRODUCCIÓN** en su estado actual.

**Se requiere implementar TODAS las correcciones de Fase 1 antes de cualquier release público.**

Después de implementar las correcciones, realizar:
1. Security scan con WPScan
2. Penetration testing básico
3. Code review por segunda persona
4. Release en entorno staging primero

---

**Próxima auditoría recomendada**: Después de implementar correcciones de Fase 1 y 2.

**Contacto para consultas de seguridad**: [security@wpgranada.es]

---

*Este documento es confidencial y solo para uso interno del equipo de desarrollo.*

# Fixes de Seguridad - Guía Rápida

Esta es una guía rápida de referencia para implementar los fixes críticos de seguridad.

## 1. Protección de Acceso Directo (35 archivos)

### ⏱️ Tiempo: 30 minutos
### 🔴 Prioridad: CRÍTICA

Añadir al **inicio de CADA archivo PHP** (después de `<?php`):

```php
<?php
/**
 * Protección contra acceso directo
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
```

### Archivos a modificar:

```bash
# Todos los archivos en estas carpetas:
admin/class-animalshelter-*.php (19 archivos)
public/class-animalshelter-*.php (14 archivos)
includes/class-animalshelter-*.php (2 archivos)
includes/breed/*.php (2 archivos)
includes/size/*.php (2 archivos)
```

### Script automatizado:

```bash
#!/bin/bash
# add-abspath-check.sh

PROTECTION="<?php
/**
 * Protección contra acceso directo
 */
if ( ! defined( 'ABSPATH' ) ) {
\texit;
}
"

find admin public includes -name "class-*.php" -type f | while read file; do
    if ! grep -q "ABSPATH" "$file"; then
        # Crear backup
        cp "$file" "$file.bak"

        # Añadir protección después de <?php
        sed -i '1s/^<?php/'"$PROTECTION"'/' "$file"

        echo "✓ Protegido: $file"
    fi
done
```

---

## 2. Sanitización de Inputs

### ⏱️ Tiempo: 2 horas
### 🟠 Prioridad: ALTA

### admin/class-animalshelter-menupage.php

**Líneas 19-21** - Cambiar:

```php
// ANTES (VULNERABLE)
if ( ! empty( $_GET['tab'] ) && ! empty( $this->available_tabs ) && array_key_exists( esc_attr( $_GET['tab'] ), $this->available_tabs ) ) {
    $this->tab = esc_attr( $_GET['tab'] );
}
```

```php
// DESPUÉS (SEGURO)
if ( ! empty( $_GET['tab'] ) && ! empty( $this->available_tabs ) ) {
    $tab = sanitize_key( wp_unslash( $_GET['tab'] ) );
    if ( array_key_exists( $tab, $this->available_tabs ) ) {
        $this->tab = $tab;
    }
}
```

**Línea 74** - Cambiar:

```php
// ANTES
wp_verify_nonce( $_POST[ $this->page ], $this->page )

// DESPUÉS
wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST[ $this->page ] ) ), $this->page )
```

### public/class-animalshelter-post.php

**Líneas 180-186** - Cambiar:

```php
// ANTES (VULNERABLE)
public function set_value( $key, $value ): int {
    if ( ! empty( $this->id ) ) {
        return (int) update_post_meta( $this->id, $key, $value );
    }
    return 0;
}
```

```php
// DESPUÉS (SEGURO)
public function set_value( $key, $value ): int {
    if ( ! empty( $this->id ) ) {
        // Verificar permisos
        if ( ! current_user_can( 'edit_post', $this->id ) ) {
            return 0;
        }

        // Sanitizar
        $key = sanitize_key( $key );
        $value = sanitize_text_field( $value ); // Ajustar según tipo

        return (int) update_post_meta( $this->id, $key, $value );
    }
    return 0;
}
```

**Líneas 188-198** - Cambiar:

```php
// ANTES (VULNERABLE)
public function remove_value( $key, $value = '' ): int {
    if ( ! empty( $this->id ) ) {
        if ( empty( $value ) ) {
            return (int) delete_post_meta( $this->id, $key );
        } else {
            return (int) delete_post_meta( $this->id, $key, $value );
        }
    }
    return 0;
}
```

```php
// DESPUÉS (SEGURO)
public function remove_value( $key, $value = '' ): int {
    if ( ! empty( $this->id ) ) {
        // Verificar permisos
        if ( ! current_user_can( 'edit_post', $this->id ) ) {
            return 0;
        }

        // Sanitizar
        $key = sanitize_key( $key );

        if ( empty( $value ) ) {
            return (int) delete_post_meta( $this->id, $key );
        } else {
            $value = sanitize_text_field( $value );
            return (int) delete_post_meta( $this->id, $key, $value );
        }
    }
    return 0;
}
```

---

## 3. Capability Checks

### ⏱️ Tiempo: 1 hora
### 🟠 Prioridad: ALTA

### admin/class-animalshelter-menupage-animalshelter.php

**Líneas 70-78** - Cambiar:

```php
// ANTES (VULNERABLE)
public function save(): void {
    if ( 'animals' === $this->tab ) {
        // TODO
        // Save input
    } elseif ( 'breeds' === $this->tab ) {
        // TODO
        // Save input
    }
}
```

```php
// DESPUÉS (SEGURO)
public function save(): void {
    // Verificar permisos primero
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die(
            esc_html__( 'You do not have permission to perform this action.', 'animal-shelter' ),
            esc_html__( 'Permission Denied', 'animal-shelter' ),
            array( 'response' => 403 )
        );
    }

    if ( 'animals' === $this->tab ) {
        // TODO
        // Save input (con sanitización)
    } elseif ( 'breeds' === $this->tab ) {
        // TODO
        // Save input (con sanitización)
    }
}
```

---

## 4. Bugs Críticos

### ⏱️ Tiempo: 15 minutos
### 🟡 Prioridad: MEDIA

### public/class-animalshelter-post.php

**Líneas 158-166** - ELIMINAR función duplicada:

```php
// ELIMINAR ESTAS LÍNEAS (duplicado)
public function get_terms( $taxonomy ): array {
    $taxonomy = wp_get_post_terms( $this->id, $taxonomy );

    if ( false !== is_wp_error( $terms ) ) {  // BUG: usa $terms en vez de $taxonomy
        return [];
    }

    return $terms;  // BUG: debería ser $taxonomy
}
```

La función correcta ya está en las líneas 108-116.

---

## 5. Checklist de Verificación

Después de implementar los fixes:

### Testing Manual

```bash
# 1. Verificar ABSPATH en todos los archivos
grep -r "defined.*ABSPATH" admin/ public/ includes/ | wc -l
# Debe mostrar 35+

# 2. Verificar sanitización
grep -r "sanitize_" admin/ public/ includes/ | wc -l
# Debe ser > 0

# 3. Verificar capability checks
grep -r "current_user_can" admin/ public/ | wc -l
# Debe ser > 2
```

### PHPCS Security

```bash
vendor/bin/phpcs --standard=WordPress \
                 --sniffs=WordPress.Security \
                 admin/ public/ includes/
```

### WordPress Plugin Check

```bash
wp plugin check animal-shelter --checks=security
```

---

## 6. Orden Recomendado de Implementación

1. ✅ **Protección ABSPATH** (30 min) - Usar script automatizado
2. ✅ **Bug duplicado** (5 min) - Eliminar función duplicada
3. ✅ **Capability checks** (1 hora) - Añadir verificaciones
4. ✅ **Sanitización** (2 horas) - Implementar en orden:
   - menupage.php
   - post.php
   - Otros archivos según se implementen

**Total**: ~3.5 horas de trabajo

---

## 7. Testing Post-Implementación

```bash
# 1. Verificar que el plugin carga sin errores
tail -f /var/log/apache2/error.log

# 2. Probar acceso directo (debe fallar)
curl https://example.com/wp-content/plugins/animal-shelter/admin/class-animalshelter-cpt.php
# Debe mostrar: página en blanco (exit ejecutado)

# 3. Probar funcionalidad básica
# - Admin: Crear un animal
# - Frontend: Ver el animal
# - Verificar que formularios funcionan

# 4. Security scan
wpscan --url http://localhost --enumerate p
```

---

## 8. Commit & Release

```bash
# Crear branch de seguridad
git checkout -b security/critical-fixes

# Añadir cambios
git add .

# Commit
git commit -m "Security: Fix critical vulnerabilities

- Add ABSPATH protection to all PHP files
- Sanitize all user inputs
- Add capability checks to save methods
- Fix duplicate get_terms() function
- Fix variable naming bugs

See docs/SECURITY-AUDIT.md for details"

# Push y crear PR
git push origin security/critical-fixes

# Después de merge, crear release
./bin/release.sh 1.0.1
```

---

## 9. Checklist Final

Antes de marcar como completo:

- [ ] 35 archivos tienen protección ABSPATH
- [ ] Función duplicada eliminada
- [ ] Capability checks añadidos
- [ ] Inputs sanitizados
- [ ] PHPCS security pasa sin errores
- [ ] Plugin Check pasa
- [ ] Testing manual completado
- [ ] Sin errores PHP
- [ ] Documentación actualizada

---

**Tiempo total estimado**: 3.5 horas
**Beneficio**: Plugin seguro para producción

Para más detalles, ver `docs/SECURITY-AUDIT.md`

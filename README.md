# Animal Shelter (protectora de Snimales)

WordPress para Protectoras de Animales es un proyecto do_action de la Comunidad WordPress de Granada (España).

## Equipo de organización

El equipo de organización estará formado por entre 2 y 6 organizadores.

- Guillermo García (lead)
- Javier Casares @javiercasares
- David Pérez @davidperezgar

## Equipos de trabajo

Para cada uno de los proyectos será necesario contar con varios equipos de trabajo:
- Project Manager: Responsable de cada uno de los proyectos que se planteen.
- Desarrollo: Desarrolladores, tanto de plugins y temas, como de frontal y backend.
- Diseño: Diseñadores y maquetadores de temas WordPress.
- Contenidos: Fotógrafos, copywriters y maquetadores.
- Social: Gestores de redes sociales, tanto para el mismo día del evento, como para apoyar a las organizaciones.
- Calidad / Test: Resposnables de revisar que todo lo que se publica es correcto y pasa unos mínimos de calidad.
- Training: Responsables de la formacióna a las organizaciones del funcionamiento de WordPress y de los componentes que se creen.

## Proyectos

### Custom Post Type: Perro / Gato / Ave / Pez / Reptil / Anfibio

Se deberán crear varios Custom post Type para la gestiónd e los distintos tipos de animales que se planteen añadir a la plataforma. Inicialmente perros y gatos, aunque con esta base se podría crear cualquier tipo de animal.

Existen una serie de campos que estarán disponibles en cualquier tipo de animal:

- Fotografía destacada
- Galería de fotografías
- Nombre del animal
- Slug
- Raza (¿selección? ¿taxonomía?)
- Snippet
- Descripción
- Localización (¿selección? ¿taxonomía?)
- Año / Fecha de nacimiento
- Talla (¿selección? ¿taxonomía?)
- Color (¿selección? ¿taxonomía?)
- Estirilizado (S/N/?)
- Energía (¿selección? ¿taxonomía?)
- Tiene chip (S/N/?)
- Tiene cartilla veterinaria (S/N/?)
- Tiene vacunas (S/N/?)
- Estado (Perdido / En Adopción)

#### Taxonomía: Raza / Tipo / Especie (Perro / Gato / Ave / Pez / Reptil / Anfibio)

- Nombre
- Snippet
- Descripción
- Slug

#### Taxonomía: Localización (Provincia / País)

Se puede plantear una base de datos general y traducida basada en [Geonames](https://www.geonames.org/)

- Lugar
- Región
- País

#### Taxonomía: Talla

Normalmente es una lista breve: mini, pequeño, mediano, grande...

#### Taxonomía: Color

Se debería poder elegir una selección de colores básicos. Máximo 3 colores.

#### Taxonomía: Energía

Normalmente es una lista breve: tranquilo, mucha energía...

#### Taxonomía: Estado

Normalmente es una lista concisa: En Adopción, Perdido / Encontrado, Acogida

### Registro de Usuario

El registro de usuario debe permitir añadir elementos muy básicos y mínimos:
- Nombre
- Correo electrónico (validado)
- Teléfono (opcional)
- Localización (opcional)

Un usuario registrado puede suscribirse a varias listas de correo:
- Automática, instantánea (cada vez que se añada un animal, se le manda un correo)
- Automática, resumen (cada dia, se le manda un correo)
- Manual, puede marcar como favorito un animal y cada día recibir un mensaje de resumen de sus cambios.

### Adopción

Cada uno de los elementos que exista en el Custom Post Type, deberá permitir el acceso a solicitar información.

El usuario puede estar registrado o no estar registrado.

Si está registrado (y validado) podrá rellenar un formulario de contacto (pre rellenado) para saber más sobre el animal, pidiendo de forma obligatoria el Nombre, correo electrónico y teléfonod e contacto (si no está en el perfil) además de la localización.

Si no está registrado, se le solicitará el registro para evitar Spam (indicar claramente que se hace por esa razón).

### Voluntariado

Un usuario registrado puede rellenar un formulario mostrando el interés de ser voluntario en la organización.

### Donaciones

Se podrán realizar donaciones mediante distintos métodos de pago, recurrentes o puntuales:
- Stripe
- Redsys?
- Paypal
- Transferencia bancaria

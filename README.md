# Animal Shelter (Protectora de Animales)

WordPress para Protectoras de Animales es un proyecto _do_action_ de la [Comunidad WordPress de Granada](https://wpgranada.es/) (España).

## Equipo de organización

- [Javier Casares](https://github.com/javiercasares) - Organizer

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

### Theme (Tema) Animal Shelter

El proyecto necesitará de un theme para WordPress, a ser posible un tema de bloques, en el que se incluya una variación de estilos simple (puede ser basada en una de las que se incluyen con TT3) y una serie de plantillas (templates) que dependerán principalmente de los proyectos anteriormente mencionados, sobre todo, los CPT de los distintos tipos de anmal (cada uno debería tener su plantilla propia).

El resto de elementos pueden ser bloques o conteidos que vengan dados por plugins ya establecidos.

## Asociaciones y Organizaciones

Se han tenido en cuenta distintas asociaciones y organizaciones que están en la zona de Granada (provincia). La mayoría no disponen de sitio web.
- Asociación Peludisimos Granada - peludisimos.granada (at) gmail.com
- Asociación protectora Animales HELP Carchuna - help.carchuna (at) gmail.com
- Nomaypa (Protectora animales Alpujarra - momaypa (at) gmail.com
- Hope Animals - info (at) hopeanimals.com - www.hopeanimals.com
- Animales sin hogar Léchar y Pañuelas - avbaanimales (at) gmail.com
- A este lado del arcoiris - aesteladodelarcoiris (at) gmail.com
- Asociación ladridos vagabundos - infoladridosvagabundos (at) gmail.com - chuchos-gr.org
- Proyecto maullidos invisibles - maullidosinvisibles (at) gmail.com - maullidosinvisibles.blogspot.com.es
- Amiko - info (at) amikoprotectora.org
- Corazones Olvidados - corazonesolvidados.granada (at) gmail.com - www.corazonesolvodados.es

## API y fuentes de información

### API de adopción
- [Adopt-a-Pet.com Pet List API Documentation for Partners](https://www.adoptapet.com/public/apis/pet_list.html) de [Adopt a Pet](https://www.adoptapet.com/)
- [Petfinder for Developers](https://www.petfinder.com/developers/) de [Petfinder](https://www.petfinder.com/)
- [RescueGroups.org APIs](https://userguide.rescuegroups.org/display/APIDG/API+Developers+Guide+Home) de [RescueGroups](https://rescuegroups.org/)

### API varias
- [FishWatch.gov Species Content API](https://www.fishwatch.gov/developers) de [FishWatch](https://www.fishwatch.gov/)
- [The internet's biggest collection of open source dog pictures](https://dog.ceo/dog-api/) de [Dog CEO Zine](https://dog.ceo/)
- [get cute dogs as placeholders](https://place.dog/)
- [placekitten](https://placekitten.com/)

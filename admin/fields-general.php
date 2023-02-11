<?php
// to be merged in class-animalshelter-cpt.php
$this->fields = array(
	array(
		'label' => __( 'Breed', 'animal-shelter' ),
		'key'   => 'breed',
		'type'  => 'taxonomy',
	),
	array(
		'label' => __( 'Excerpt', 'animal-shelter' ),
		'key'   => 'excerpt',
		'type'  => 'excerpt',
	),
	array(
		'label' => __( 'Location', 'animal-shelter' ),
		'key'   => 'location',
		'type'  => 'taxonomy',
	),
	array(
		'label' => __( 'Birthday', 'animal-shelter' ),
		'key'   => 'birthday',
		'type'  => 'date',
	),
	array(
		'label' => __( 'Size', 'animal-shelter' ),
		'key'   => 'size',
		'type'  => 'taxonomy',
	),
	array(
		'label' => __( 'Colour', 'animal-shelter' ),
		'key'   => 'colour',
		'type'  => 'taxonomy',
	),
	array(
		'label' => __( 'Stirilized', 'animal-shelter' ),
		'key'   => 'stirilized',
		'type'  => 'checkbox',
	),
	array(
		'label' => __( 'Energy', 'animal-shelter' ),
		'key'   => 'energy',
		'type'  => 'taxonomy',
	),
	array(
		'label' => __( 'Chip?', 'animal-shelter' ),
		'key'   => 'chip',
		'type'  => 'checkbox',
	),
	array(
		'label' => __( 'Status', 'animal-shelter' ),
		'key'   => 'status',
		'type'  => 'taxonomy',
	),
);

/*
Raza (¿selección? ¿taxonomía?)
Snippet
Descripción
Localización (¿selección? ¿taxonomía?)
Año / Fecha de nacimiento
Talla (¿selección? ¿taxonomía?)
Color (¿selección? ¿taxonomía?)
Estirilizado (S/N/?)
Energía (¿selección? ¿taxonomía?)
Tiene chip (S/N/?)
Tiene cartilla veterinaria (S/N/?)
Tiene vacunas (S/N/?)
Estado (Perdido / En Adopción)
*/
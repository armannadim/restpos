<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => ":attribute ha de ser acceptada.",
	"active_url"           => ":attribute no és un URL vàlid.",
	"after"                => ":attribute debe ser una fecha después de :date.",
	"alpha"                => ":attribute sólo puede contener letras.",
	"alpha_dash"           => ":attribute sólo puede contener letras, números y guiones.",
	"alpha_num"            => ":attribute sólo puede contener letras y números.",
	"array"                => ":attribute debe ser una matriz.",
	"before"               => ":attribute debe ser una fecha anterior que :date.",
	"between"              => array(
		"numeric" => ":attribute debe estar entre :min i/a :max.",
		"file"    => ":attribute debe estar entre :min i/a :max kilobytes.",
		"string"  => ":attribute debe estar entre :min i/a :max characters.",
		"array"   => ":attribute debe estar entre :min i/a :max items.",
	),
	"confirmed"            => ":attribute confirmación no coincide.",
	"date"                 => ":attribute no es una fecha válida.",
	"date_format"          => ":attribute no coincide con el formato :format.",
	"different"            => ":attribute i/o :other deben ser diferentes.",
	"digits"               => ":attribute debe tener :digits dígitos.",
	"digits_between"       => ":attribute debe estar entre :min i/a :max dígitos.",
	"email"                => ":attribute debe ser una dirección de correo electrónico válida.",
	"exists"               => "El/la :attribute seleccionado no es válido.",
	"image"                => ":attribute debe ser una imagen.",
	"in"                   => "El/la :attribute seleccionado no es válido.",
	"integer"              => ":attribute debe ser un entero.",
	"ip"                   => ":attribute debe ser una dirección IP válida.",
	"max"                  => array(
		"numeric" => ":attribute may not be greater than :max.",
		"file"    => ":attribute may not be greater than :max kilobytes.",
		"string"  => ":attribute may not be greater than :max characters.",
		"array"   => ":attribute may not have more than :max items.",
	),
	"mimes"                => ":attribute must be a file of type: :values.",
	"min"                  => array(
		"numeric" => ":attribute must be at least :min.",
		"file"    => ":attribute must be at least :min kilobytes.",
		"string"  => ":attribute must be at least :min characters.",
		"array"   => ":attribute must have at least :min items.",
	),
	"not_in"               => "The selected :attribute is invalid.",
	"numeric"              => ":attribute must be a number.",
	"regex"                => ":attribute format is invalid.",
	"required"             => ":attribute field is required.",
	"required_if"          => ":attribute field is required when :other is :value.",
	"required_with"        => ":attribute field is required when :values is present.",
	"required_with_all"    => ":attribute field is required when :values is present.",
	"required_without"     => ":attribute field is required when :values is not present.",
	"required_without_all" => ":attribute field is required when none of :values are present.",
	"same"                 => ":attribute and :other must match.",
	"size"                 => array(
		"numeric" => ":attribute must be :size.",
		"file"    => ":attribute must be :size kilobytes.",
		"string"  => ":attribute must be :size characters.",
		"array"   => ":attribute must contain :size items.",
	),
	"unique"               => ":attribute has already been taken.",
	"url"                  => ":attribute format is invalid.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);

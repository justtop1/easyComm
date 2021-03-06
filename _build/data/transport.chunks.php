<?php

$chunks = array();

$tmp = array(
	'tpl.ecMessages.Row' => array(
		'file' => 'ec_messages_row',
		'description' => '',
	),
    'tpl.ecForm' => array(
        'file' => 'ec_form',
        'description' => '',
    ),
    'tpl.ecForm.Success' => array(
        'file' => 'ec_form_success',
        'description' => '',
    ),
    'tpl.ecForm.New.Email.User' => array(
        'file' => 'ec_form_new_email_user',
        'description' => '',
    ),
    'tpl.ecForm.New.Email.Manager' => array(
        'file' => 'ec_form_new_email_manager',
        'description' => '',
    ),
    'tpl.ecForm.Update.Email.User' => array(
        'file' => 'ec_form_update_email_user',
        'description' => '',
    ),
    'tpl.ecThreadRating' => array(
        'file' => 'ec_thread_rating',
        'description' => '',
    ),
);

// Save chunks for setup options
$BUILD_CHUNKS = array();

foreach ($tmp as $k => $v) {
	/* @avr modChunk $chunk */
	$chunk = $modx->newObject('modChunk');
	$chunk->fromArray(array(
		'id' => 0,
		'name' => $k,
		'description' => @$v['description'],
		'snippet' => file_get_contents($sources['source_core'] . '/elements/chunks/chunk.' . $v['file'] . '.tpl'),
		'static' => BUILD_CHUNK_STATIC,
		'source' => 1,
		'static_file' => 'core/components/' . PKG_NAME_LOWER . '/elements/chunks/chunk.' . $v['file'] . '.tpl',
	), '', true, true);

	$chunks[] = $chunk;

	$BUILD_CHUNKS[$k] = file_get_contents($sources['source_core'] . '/elements/chunks/chunk.' . $v['file'] . '.tpl');
}

unset($tmp);
return $chunks;
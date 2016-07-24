<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "ods_autocomplete".
 *
 * Auto generated 22-07-2016 21:36
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
	'title' => 'Autocomplete for indexed_search',
	'description' => 'Multilingual autocomplete for indexed search. It uses autocomplete function of jQuery UI or scriptaculous',
	'category' => 'fe',
	'author' => 'Andreas Heling, Robert Heel',
	'author_email' => 'typo3@bobosch.de',
	'state' => 'stable',
	'uploadfolder' => false,
	'createDirs' => '',
	'clearCacheOnLoad' => false,
	'version' => '1.2.0',
	'constraints' => array (
		'depends' => array (
			'indexed_search' => '',
			'typo3' => '6.2.0-7.99.99',
		),
		'conflicts' => array (
		),
		'suggests' => array (
		),
	),
);
?>

<?php

########################################################################
# Extension Manager/Repository config file for ext "ods_autocomplete".
#
# Auto generated 09-07-2012 14:28
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Autocomplete for indexed_search',
	'description' => 'Multilingual autocomplete for indexed search. It uses autocomplete function of jQuery UI or scriptaculous',
	'category' => 'fe',
	'author' => 'Andreas Heling, Robert Heel',
	'author_email' => 'info@1drop.de',
	'shy' => '',
	'dependencies' => 'indexed_search',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => 'http://www.1drop.de/',
	'version' => '1.2.0',
	'constraints' => array(
		'depends' => array(
			'indexed_search' => '',
			'typo3' => '4.5.0-6.2.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:32:{s:9:"ChangeLog";s:4:"0965";s:26:"class.ods_autocomplete.php";s:4:"8b25";s:21:"ext_conf_template.txt";s:4:"a5f3";s:12:"ext_icon.gif";s:4:"42c6";s:17:"ext_localconf.php";s:4:"0f7a";s:14:"ext_tables.php";s:4:"aaba";s:16:"locallang_db.xml";s:4:"1fe8";s:12:"t3jquery.txt";s:4:"dfa3";s:14:"doc/manual.sxw";s:4:"49b8";s:36:"pi1/class.tx_odsautocomplete_pi1.php";s:4:"8a43";s:17:"pi1/locallang.xml";s:4:"dfe1";s:25:"pi1/ods_autocomplete.html";s:4:"e312";s:21:"res/scriptaculous.css";s:4:"b4d2";s:30:"res/jquery/jquery-1.6.4.min.js";s:4:"9118";s:38:"res/jquery/jquery-ui-1.8.16.custom.css";s:4:"e610";s:41:"res/jquery/jquery-ui-1.8.16.custom.min.js";s:4:"6159";s:59:"res/jquery/images/ui-bg_diagonals-thick_18_b81900_40x40.png";s:4:"95f9";s:59:"res/jquery/images/ui-bg_diagonals-thick_20_666666_40x40.png";s:4:"f040";s:49:"res/jquery/images/ui-bg_flat_10_000000_40x100.png";s:4:"c18c";s:50:"res/jquery/images/ui-bg_glass_100_f6f6f6_1x400.png";s:4:"5f18";s:50:"res/jquery/images/ui-bg_glass_100_fdf5ce_1x400.png";s:4:"d26e";s:49:"res/jquery/images/ui-bg_glass_65_ffffff_1x400.png";s:4:"e5a8";s:56:"res/jquery/images/ui-bg_gloss-wave_35_f6a828_500x100.png";s:4:"58d2";s:59:"res/jquery/images/ui-bg_highlight-soft_100_eeeeee_1x100.png";s:4:"384c";s:58:"res/jquery/images/ui-bg_highlight-soft_75_ffe45c_1x100.png";s:4:"b806";s:45:"res/jquery/images/ui-icons_222222_256x240.png";s:4:"ebe6";s:45:"res/jquery/images/ui-icons_228ef1_256x240.png";s:4:"79f4";s:45:"res/jquery/images/ui-icons_ef8c08_256x240.png";s:4:"ef9a";s:45:"res/jquery/images/ui-icons_ffd27a_256x240.png";s:4:"ab8c";s:45:"res/jquery/images/ui-icons_ffffff_256x240.png";s:4:"342b";s:37:"static/ods_autocomplete/constants.txt";s:4:"2200";s:33:"static/ods_autocomplete/setup.txt";s:4:"55c3";}',
	'suggests' => array(
	),
);

?>
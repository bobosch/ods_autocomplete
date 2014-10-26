<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

$TYPO3_CONF_VARS['FE']['eID_include']['ods_autocomplete'] = 'EXT:ods_autocomplete/class.ods_autocomplete.php';
t3lib_extMgm::addPItoST43($_EXTKEY,"pi1/class.tx_odsautocomplete_pi1.php","_pi1","list_type",1);

if(!empty($TYPO3_CONF_VARS['EXTCONF']['indexed_search']['use_tables'])) $TYPO3_CONF_VARS['EXTCONF']['indexed_search']['use_tables'] .= ',index_phash,index_rel,index_words';
?>
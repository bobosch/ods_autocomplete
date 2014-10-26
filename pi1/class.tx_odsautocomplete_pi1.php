<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009  <rheel@1drop.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

/**
 * Plugin 'Autocomplete for indexed_search' for the 'ods_autocomplete' extension.
 *
 * @author	Robert Heel <rheel@1drop.de>
 * @package	TYPO3
 * @subpackage	tx_odsautocomplete
 */
class tx_odsautocomplete_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_odsautocomplete_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_odsautocomplete_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'ods_autocomplete';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();

		$config=unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ods_autocomplete']);

		$template['file']=$this->cObj->fileResource($conf['template']);
		$template['ODS_AUTOCOMPLETE']=$this->cObj->getSubpart($template['file'],'###ODS_AUTOCOMPLETE###');

		$pre=$this->prefixId.$this->cObj->data['uid'];
		$marker['###SEARCH###']=$this->pi_getLL('search');
		$marker['###SUBMIT###']=$this->pi_getLL('submit');
		$marker['###LANGUAGE###']=$GLOBALS['TSFE']->config['config']['sys_language_uid'];
		$marker['###SEARCHPAGE###']=$this->pi_getPageLink($conf['searchpage']);
		$marker['###FORM_ID###']=$this->config['id']=$pre.'_form';
		$marker['###WORD_ID###']=$this->config['id']=$pre.'_word';
		$marker['###AUTO_ID###']=$this->config['id']=$pre.'_auto';

		$content=$this->cObj->substituteMarkerArrayCached($template['ODS_AUTOCOMPLETE'],$marker);

		switch($conf['JSlibrary']){
			case 'jqueryui':
				$script='
jQuery("#'.$pre.'_word").autocomplete({
	source: "index.php?eID=ods_autocomplete&language='.$marker['###LANGUAGE###'].'",
	appendTo: "#'.$pre.'_auto",
	minLength: '.intval($config['min_chars']).',
	select: function(event, ui) {
		jQuery("#'.$pre.'_word").value=ui.item.value;
		window.setTimeout("'.$pre.'_autocomplete_submit()",10);
	}
});

function '.$pre.'_autocomplete_submit(){
	jQuery("#'.$pre.'_form").submit();
}
';
			break;
			case 'scriptaculous':
				$script='
new Ajax.Autocompleter("'.$pre.'_word","'.$pre.'_auto",document.URL,{
	minChars: '.intval($config['min_chars']).',
	afterUpdateElement: function(){
		$("'.$pre.'_form").submit();
	},
	parameters: "eID=ods_autocomplete&language='.$marker['###LANGUAGE###'].'"
});
';
			break;
			default:
				$script=false;
			break;
		}

		if($script) $content.="<script type=\"text/javascript\">/*<![CDATA[*/\n".$script."\n/*]]>*/</script>";

		return($content);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ods_autocomplete/pi1/class.tx_odsautocomplete_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ods_autocomplete/pi1/class.tx_odsautocomplete_pi1.php']);
}
?>
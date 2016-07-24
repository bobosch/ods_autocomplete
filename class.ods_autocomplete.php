<?php
$obj = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('ods_autocomplete');
$obj->main();

class ods_autocomplete {
	function main() {
		if(isset($_POST['tx_indexedsearch']['sword'])){
			$res=$this->getList($_POST['tx_indexedsearch']['sword'],$_POST['language']);
			echo '<ul>';
			while($row=$GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
				echo '<li>'.$row['baseword'].'</li>';
			}
			echo '</ul>';
		}elseif(isset($_GET['term'])){
			$res=$this->getList($_GET['term'],$_GET['language']);
			$ret=array();
			while($row=$GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)){
				$ret[]=array(
					'id'=>$row['baseword'],
					'label'=>$row['baseword'],
					'value'=>$row['baseword'],
				);
			}
			echo json_encode($ret);
		}
	}

	function getList($search,$language){
		$config=unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['ods_autocomplete']);

		$words=\TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(' ',$search, 1);

		$where_array=array();
		foreach($words as $word){
			$where_array[]='baseword LIKE '.$GLOBALS['TYPO3_DB']->fullQuoteStr('%'.$word.'%','index_words');
		}

		$from='index_words';
		$where='('.implode(' AND ',$where_array).')'.$this->multipleGroupsWhereClause;
			
		// Join with index_phash table
		$from.=',index_rel,index_phash';
		$where.=
			' AND index_words.wid=index_rel.wid '.
			' AND index_rel.phash = index_phash.phash'.
			' AND index_phash.gr_list="0,-1"'.
			' AND index_phash.sys_language_uid='.intval($language);

		$query=
			'SELECT DISTINCT baseword'.
			' FROM '.$from.
			' WHERE '.$where.
			' ORDER BY LENGTH(baseword)'.
			($config['max_results'] ? 'LIMIT '.intval($config['max_results']) : '');

		$res=$GLOBALS['TYPO3_DB']->sql_query($query);
		return $res;
	}
}
?>
<?php
// This script and data application were generated by AppGini 5.31
// Download AppGini for free from http://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");

	header("Content-type: text/javascript; charset=UTF-8");

	$mfk=$_GET['mfk'];
	$id=makeSafe($_GET['id']);
	$rnd1=intval($_GET['rnd1']); if(!$rnd1) $rnd1='';

	if(!$mfk){
		die('// no js code available!');
	}

	switch($mfk){

		case 'token_sequence':
			if(!$id){
				?>
				$('token<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				<?php
				break;
			}
			$res = sql("SELECT `biblio_token`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`memberID`) || CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS('',   `biblio_author1`.`memberID`, '  ', `biblio_author1`.`last_name`), '') as 'author', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '  ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_trascript1`.`trascriber_memberID`) || CHAR_LENGTH(`biblio_trascript1`.`transcript_title`), CONCAT_WS('',   `biblio_trascript1`.`trascriber_memberID`, '- ', `biblio_trascript1`.`transcript_title`), '') as 'transcript', `biblio_token`.`token_sequence` as 'token_sequence', `biblio_token`.`token` as 'token' FROM `biblio_token` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`biblio_token`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`biblio_token`.`bibliography` LEFT JOIN `biblio_trascript` as biblio_trascript1 ON `biblio_trascript1`.`id`=`biblio_token`.`transcript`  WHERE `biblio_token`.`id`='$id' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$('token<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['id'].'  '.$row['token']))); ?>&nbsp;';
			<?php
			break;


	}

?>
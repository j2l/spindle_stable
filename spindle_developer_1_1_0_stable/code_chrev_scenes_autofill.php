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
			$('token<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['token_sequence'].'  '.$row['token']))); ?>&nbsp;';
			<?php
			break;

		case 'invivo_code':
			if(!$id){
				?>
				$('startdate<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				$('end_date<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				$('person<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				$('place<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				$('freecode<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				<?php
				break;
			}
			$res = sql("SELECT `code_invivo`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`memberID`) || CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS('',   `biblio_author1`.`memberID`, '  ', `biblio_author1`.`last_name`), '') as 'author', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '  ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_trascript1`.`trascriber_memberID`) || CHAR_LENGTH(`biblio_trascript1`.`transcript_title`), CONCAT_WS('',   `biblio_trascript1`.`trascriber_memberID`, '- ', `biblio_trascript1`.`transcript_title`), '') as 'transcript', IF(    CHAR_LENGTH(`biblio_token1`.`token_sequence`), CONCAT_WS('',   `biblio_token1`.`token_sequence`), '') as 'token_sequence', IF(    CHAR_LENGTH(`biblio_token1`.`token`), CONCAT_WS('',   `biblio_token1`.`token`), '') as 'token', `code_invivo`.`invivo` as 'invivo', `code_invivo`.`start_date` as 'start_date', `code_invivo`.`end_date` as 'end_date', `code_invivo`.`person` as 'person', `code_invivo`.`place` as 'place', `code_invivo`.`freecode` as 'freecode' FROM `code_invivo` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`code_invivo`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`code_invivo`.`bibliography` LEFT JOIN `biblio_trascript` as biblio_trascript1 ON `biblio_trascript1`.`id`=`code_invivo`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`code_invivo`.`token_sequence`  WHERE `code_invivo`.`id`='$id' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$('startdate<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['start_date']))); ?>&nbsp;';
			$('end_date<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['end_date']))); ?>&nbsp;';
			$('person<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['person']))); ?>&nbsp;';
			$('place<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['place']))); ?>&nbsp;';
			$('freecode<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['freecode']))); ?>&nbsp;';
			<?php
			break;

		case 'herme_code':
			if(!$id){
				?>
				$('impression<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				$('noetictension<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				$('comment<?php echo $rnd1; ?>').innerHTML='&nbsp;';
				<?php
				break;
			}
			$res = sql("SELECT `code_herme`.`id` as 'id', IF(    CHAR_LENGTH(`biblio_author1`.`memberID`) || CHAR_LENGTH(`biblio_author1`.`last_name`), CONCAT_WS('',   `biblio_author1`.`memberID`, '  ', `biblio_author1`.`last_name`), '') as 'author', IF(    CHAR_LENGTH(`biblio_doc1`.`id`) || CHAR_LENGTH(`biblio_doc1`.`title`), CONCAT_WS('',   `biblio_doc1`.`id`, '  ', `biblio_doc1`.`title`), '') as 'bibliography', IF(    CHAR_LENGTH(`biblio_trascript1`.`trascriber_memberID`) || CHAR_LENGTH(`biblio_trascript1`.`transcript_title`), CONCAT_WS('',   `biblio_trascript1`.`trascriber_memberID`, ' - ', `biblio_trascript1`.`transcript_title`), '') as 'transcript', IF(    CHAR_LENGTH(`biblio_token1`.`token_sequence`), CONCAT_WS('',   `biblio_token1`.`token_sequence`), '') as 'token_sequence', IF(    CHAR_LENGTH(`biblio_token1`.`id`) || CHAR_LENGTH(`biblio_token1`.`token`), CONCAT_WS('',   `biblio_token1`.`id`, '  ', `biblio_token1`.`token`), '') as 'token', IF(    CHAR_LENGTH(`class_im1`.`impression`), CONCAT_WS('',   `class_im1`.`impression`), '') as 'impression', IF(    CHAR_LENGTH(`class_nt1`.`noetictension`), CONCAT_WS('',   `class_nt1`.`noetictension`), '') as 'noetictension', `code_herme`.`freecode` as 'freecode' FROM `code_herme` LEFT JOIN `biblio_author` as biblio_author1 ON `biblio_author1`.`id`=`code_herme`.`author` LEFT JOIN `biblio_doc` as biblio_doc1 ON `biblio_doc1`.`id`=`code_herme`.`bibliography` LEFT JOIN `biblio_trascript` as biblio_trascript1 ON `biblio_trascript1`.`id`=`code_herme`.`transcript` LEFT JOIN `biblio_token` as biblio_token1 ON `biblio_token1`.`id`=`code_herme`.`token_sequence` LEFT JOIN `class_im` as class_im1 ON `class_im1`.`id`=`code_herme`.`impression` LEFT JOIN `class_nt` as class_nt1 ON `class_nt1`.`id`=`code_herme`.`noetictension`  WHERE `code_herme`.`id`='$id' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$('impression<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['impression']))); ?>&nbsp;';
			$('noetictension<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['noetictension']))); ?>&nbsp;';
			$('comment<?php echo $rnd1; ?>').innerHTML = '<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['freecode']))); ?>&nbsp;';
			<?php
			break;


	}

?>
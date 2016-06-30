<?php
	session_start();
	$guser = $_SESSION['guser'];
	$url = "https://gitshame.io/api/contributions/" . $guser;
	$json = file_get_contents($url);
	$json_array = json_decode($json, true);

	$obj = new stdClass();
	$obj->success="1";
	for($i=0; $i<count($json_array['contributions'])-1; $i++) {
		for ($y = 0; $y <= 6; $y++) {
			if ($json_array['contributions'][$i][$y]['count'] > 0)
			{
				
				$obj->result[] = array(
									'id' => $json_array['contributions'][$i][$y]['date'], 
									'title' => $json_array['contributions'][$i][$y]['count'] . ' contributions for ' . $json_array['contributions'][$i][$y]['date'], 
									'title' => $json_array['contributions'][$i][$y]['count'] . ' contributions for ' . $json_array['contributions'][$i][$y]['date'], 
									'url' => 'http://www.github.com/' . $guser . '?tab=overview&from=' . $json_array['contributions'][$i][$y]['date'], 
									'class' => 'event-info', 
									'start' => '' . strtotime($json_array['contributions'][$i][$y]['date']) * 1000 . '', 
									'end' => '' . strtotime($json_array['contributions'][$i][$y]['date']) * 1000 . ''
										);
				}
		}
	  
	}
	echo json_encode($obj);
?>
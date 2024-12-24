<?php

session_start();

require_once( '../../../config.php' );
require_once( '../../../init.php' );

if(is_login() && USER_ADMIN){
	if(isset($_POST['sid'])){
		$sid = $_POST['sid'];
		$data = Game::getListBySource('gamepix', 10000);
		$games = $data['results'];
		if(count($games)){
			foreach ($games as $game) {
				$url = $game->url;
				if(substr($url, strpos($url, 'sid=') + 4) != $sid){
					$new_url = substr($url, 0, strpos($url, 'sid=')).'sid='.$sid;
					$game->url = $new_url;
					$game->update();
				}
			}
			echo('ok');
		} else {
			echo('no-games');
		}
	}
}

?>
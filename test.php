<?php
require_once('utils.php');

//function findDate($string, $yearPattern, $monthPattern, $dayPattern, $dateFormat){
echo findDate('Photo on 2013-07-11 at 21.46 #5.jpg', '/.*(\d{4})-\d{2}-\d{2} at.*/', '/.*\d{4}-(\d{2})-\d{2} at.*/', '/.*\d{4}-\d{2}-(\d{2}) a', '//		m/d/Y');
		

//function download_youtube_video($url, $upload_path)
echo download_youtube_video('https://www.youtube.com/watch?v=LI7-Cu-9wWM', getcwd() . "/");
?>
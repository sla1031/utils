<?php
/* Samantha Ashley Utils Set */

/*
	download_youtube_video downloads a video using the command line tool youtube-dl
	@param $url - youtube url
	@param $upload_path - path where the video needs to be stored
*/
function download_youtube_video($url, $upload_path){
	$results = "";
	exec('youtube-dl --restrict-filenames -o "%(title)s_%(id)s.%(ext)s" ' . escapeshellarg($url), $out);	
	$valid = false;

	foreach($out as $r){
		$track = strpos($r, "[download] Destination: ");
		if( $track < 0 ){
			$track = strpos($r, "[ffmpeg] Merging formats");
		}
		if($track !== false){
			$valid = true;
			$fileArr =  explode(": ",$r);
			if($fileArr == ""){
				$fileArr =  explode("\"",$r);
			}
			$fileNameShort = $fileArr[1];
			$filename= $upload_path . $fileNameShort;

			chmod($fileNameShort,0775);
			chgrp($fileNameShort,'bluewall');
			$result = rename($fileNameShort,$filename);
			if($result != false){
				$results = $results . "$fileNameShort has been uploaded.<br />";
			}
			else {
				echo ('ERROR MOVING FILE '.print_r(error_get_last(),true));
			}
		}
	}
	if (!$valid){
		$results = "There an issue with $url and cannot be downloaded.";
	}

	return $results;
	
}


?>
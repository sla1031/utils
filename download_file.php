<?php
/* Samantha Ashley Utils Set */


require_once('get_http_response_code.php');

/*
	download_file downloads a file from the internet and stores it locally. Only a fully qualified URL with an extension will work
	@param $url - file url
	@param $upload_path - path where the video needs to be stored
*/
function download_file($url, $upload_path){
	$results = "";
	$fileArray = explode("/", $url);
	$filename = end($fileArray);
	

	$code = get_http_response_code($url);
	if($code == 200){
		exec('curl -o ' . $upload_path . $filename .' ' . $url);
		if (filesize($upload_path . $filename )>0) $results ="$filename has been uploaded.";
		else return $results = "Error download file";
	}
	else {
		$results = "File does not exist";
	}

	return $results;   

}

?>
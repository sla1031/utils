<?php

function get_http_response_code($theURL) {
	$headers = get_headers($theURL, 1);
	return (int)substr($headers[0], 9, 3);
}

?>
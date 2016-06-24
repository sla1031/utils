<?php
/* Samantha Ashley Utils Set */

/*
	findDate takes a string and turns it into the requested date format
	@param $string - string containing date
	@param $yearPattern - regex pattern for the year ex: '/ .*(\d{4})-\d{2}-\d{2} at.* /' the year must be in ()
	@param $monthPattern - regex pattern for the year.  the month must be in ()
	@param $dayPattern - regex pattern for the year. the day must be in ()
	@param $dateFormat - standard PHP formatting for datetime objects ex: M/d/Y
*/
function findDate($string, $yearPattern, $monthPattern, $dayPattern, $dateFormat){
	//preg_match($pattern, $subject, $matches)
	preg_match($yearPattern, $string, $yearArr);
	preg_match($monthPattern, $string, $monthArr);
	preg_match($dayPattern, $string, $dayArr);

	$year = $yearArr[1];
	if(strlen($year) == 2){
		$yearformat = 'y';
	}
	elseif (strlen($year) == 4){
		$yearformat = 'Y';
	}


	$month = $monthArr[1];
	if(is_numeric(substr($month, 0,1))){
		if(strlen($month) == 2){
			if(substr($month, 0,1) == 0){
				$monthformat = 'm';
			}
			else {
				$monthformat = 'n';
			}
			
		}
		elseif (strlen($month) == 1){
			$monthformat = 'n';
		}
	}
	else {
		if(strlen($month) >3){
			$monthformat = 'F';
		}
		elseif (strlen($month) == 4){
			$monthformat = 'M';
		}
	}
	

	$day = $dayArr[1];
	if(substr($day, 0,1) == 0){
		$dayformat = 'd';
	}
	else {
		$dayformat = 'j';
	}
			

	$createDateFormat = $monthformat.'/'.$dayformat.'/'.$yearformat;
	$createdDate = $month.'/'.$day.'/'.$year;

	$date = DateTime::createFromFormat($createDateFormat, $createdDate);
	$return_date = $date->format($dateFormat);
	
	return $return_date;
}
?>

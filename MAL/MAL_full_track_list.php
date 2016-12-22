<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<title>Media/Artist List</title>
<link rel="stylesheet" type="text/css" href="MAL.css">
</head>
<body>
<?php
// Copyright (C) 2016 Mike B O'Shea - Version 1.00
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 3
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//


include 'MAL_menu.php';
include 'MAL_SQL_queries.php';

// ini_set('display_errors', 'On');
// error_reporting(E_ALL | E_STRICT);

	if(open_db()) {
		$sort = $_GET['a'];
		$result = "";
		if($sort == 2) {
			$context = 8;	// CSV option will save an alphabetic sorted list
            $result = $GLOBALS['db']->query(get_sql('full_track_list_title_content'));
			side_menu(get_sql('full_track_list_title_index'));	// Create the side menu
			echo "\n<div id='for_side_menu'>";
        } else {
			$context = 6;	// CSV option will save a track frequency sorted list
            $result = $GLOBALS['db']->query(get_sql('full_track_list_freq_content'));
		}
		
		echo "\n<h1 id=\"Top_index\">Media/Artist List - Full Track List</h1>\n";
		app_menu();
		display_menu(0, $context);
		
		$current_letter = "";
		echo "<center>\n<table style=\"width: 70%;\">\n\t<colgroup>\n\t\t<col style=\"width:60%\">\n\t\t<col style=\"width:8%\">\n\t</colgroup>\n\t<tbody>\n";
		echo "\t<tr><th>Track Title</th><th>Frequency</th></tr>\n";
		while ($row = $result->fetchArray()) {
			$track	 	=	$row['Track Title'];	
			$Frequency  	= 	$row['Frequency'];
			if($context == 8) {
				$namesort 	= 	$row['index_name'];
				if($namesort == '') {	// Skip over the row  in the database that has a blank name
					continue;
				}				
				$first_char = strtoupper($namesort[0]);	// the uppercasing is just precutionary could remove it
			
				echo "\t<tr>";	// Start the row
				if ($current_letter == $first_char) {
					echo "<td>";
				}else {
					echo "<td id=\"" . $first_char . "_index\">";
					$current_letter = $first_char;
				}
			} else {
				echo "\t<tr><td>";	// Start the row
			}	 
			echo $track . "</td><td>$Frequency</td></tr>\n";
		}
		echo "</center>\n</table>\n";
		echo "<br /><center class='no-print' id=\"End_index\"> - The End - </center><br />";
		echo "\n</div>\n";
	}
?>
</body>
</html>

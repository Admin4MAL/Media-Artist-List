<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
<title>Media/Artist List</title>
<link rel="stylesheet" type="text/css" href="MAL/MAL.css">
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

//ini_set('display_errors', 'On');
//error_reporting(E_ALL | E_STRICT);

include 'MAL/MAL_menu.php';
include 'MAL/MAL_SQL_queries.php';

    if(open_db()) {
			side_menu(get_sql('full_artist_list_index'));	// Create the side menu

			echo "\n<div id='for_side_menu'>";
			echo "\n<h1 id=\"Top_index\">Media/Artist List - Artist List</h1>\n";
			app_menu();
			display_menu(0, 0);

			$result = $GLOBALS['db']->query(get_sql('full_artist_list_content'));
			$current_letter = "";
			
			echo "\n\t<table>\n\t<colgroup>\n\t\t<col style=\"width:10%\">\n\t\t<col style=\"width:90%\">\n\t</colgroup>\n\t<tbody>\n";
			
			while ( $row = $result->fetchArray() ) {
				$name = 	$row['Artist'];
				$namesort = $row['index_name'];
				if($namesort == '') {	// Skip over the row  in the database that has a blank name
					continue;
				}				
				$first_char = strtoupper($namesort[0]);	// the uppercasing is just precutionary could remove it
				
				echo "\t\t<tr>";
				if(strcmp($first_char, $current_letter) != 0) {
					echo "<td><center><h2 id=\"" . $first_char . "_index\">$first_char</h2></center></td><td></td></tr>\n\t\t<tr>";
					$current_letter = $first_char;
				}
				echo "<td></td><td>$name</td>";
				echo "</tr>\n";
			}
			echo "\t</tbody>\n</table>\n";
			echo "<br /><center id=\"End_index\"> - The End - </center><br />";
			echo "\n</div>\n";
	} else {
		echo "Could not copy the library.db file.";
	}
?>
</body>
</html>

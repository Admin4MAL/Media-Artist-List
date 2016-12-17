<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Media/Artist Lists</title>
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

	if(open_db()) {
		$artist_key = $_GET['a'];
		$artist_name = artist_name($artist_key);
		
		side_menu(get_sql('artist_track_list_index', 0, $artist_key, 0, 6));	// Create the side menu

		echo "\n<div id='for_side_menu'>";
		echo "<h1 id=\"Top_index\"><center>Media/Artist List - Artist Track List</center></h1>\n";
		echo "<h2><center>Complete List of Tracks within the collection that include <i>'$artist_name'</i></center></h2><br />\n";
		app_menu();
	 	display_menu($artist_key, 4);
	
	
	
		$result = $GLOBALS['db']->query(get_sql('artist_track_list_content', 0, $artist_key, 0, 6));
		$current_track = "";
		$current_letter = "";
		echo "<center>\n<table>\n";
		while ($row = $result->fetchArray()) {
			$track_title 	= 	$row['Track Title'];
			$album   		=	$row['Album Title'];
			$dedup   		=	$row['title'];  // This just holds the title and is used for deduplicating in the list.
			$year  			=	add_year($row['year']);
			$titlesort		=	$row['titlesort'];
			if($titlesort == '') {	// Skip over the row  in the database that has blank name
				continue;
			}				
			$first_char = strtoupper($titlesort[0]);	// the uppercasing is just precutionary could remove it
			echo "\t<tr>";	// Start the row
			if(strcmp($current_track, $dedup) !== 0) {
				echo "<td id=\"" . $first_char . "_index\">$track_title</td>";
				$current_track = $dedup;
			}else {
				echo "<td></td>";
			}
			echo "<td>$album - ($year)</td>";
			echo "</tr>\n"; // End the row
		}
		echo "</center>\n</table>\n";
		echo "<br /><center class='no-print' id=\"End_index\"> - The End - </center><br />";
		echo "\n</div>\n";
	}
?>
</body>
</html>

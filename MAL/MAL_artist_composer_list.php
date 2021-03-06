<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
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
		$key = $_GET['a'];
		$artist_name = artist_name($key);
		
		side_menu(get_sql('artist_track_list_index', 0, $key, 0, 2));	// Create the side menu

		echo "\n<div id='for_side_menu'>";
		echo "<h1 id=\"Top_index\"><center>Media/Artist List - Tracks Composed by Artist</center></h1>\n";
		echo "<h2><center>Tracks within the collection Composed by <i>'$artist_name'</i></center></h2><br />\n";
		app_menu();
	 	display_menu($key, 5);

		$result = $GLOBALS['db']->query(get_sql('artist_track_list_content', 0, $key, 0, 2));
		$current_track = "";
		$current_letter = "";
		echo "<center>\n<table>\n";
		while ( $row = $result->fetchArray() ) {
			$track_title 		= 	$row['Track Title'];
			$album   		=	$row['Album Title'];
			$dedup   		=	$row['title'];  // This just holds the title and is used for deduplicating in the list.
			$year  			=	add_year($row['year']);
			$album_key		=	$row['album_key'];
			$titlesort		=	$row['titlesort'];
			$trackartists		=	$row['artist'];
			if($titlesort == '') {	// Skip over the row  in the database that has blank name
				continue;
			}				
			$first_char = strtoupper($titlesort[0]);	// the uppercasing is just precutionary could remove it
			echo "\t<tr>";	// Start the row
			if (strcmp($current_track, $dedup) !== 0) {
				echo "<td id=\"" . $first_char . "_index\"><span id=\"track\">$track_title</span></td>";
				$current_track = $dedup;
			}else {
				echo "<td></td>";
			}
			echo "<td><a href=\"MAL_artist_album_list.php?a=$key\"><span id=\"artist\">$trackartists</span></a></td>";
			echo "<td><a href=\"MAL_album_detail.php?a=$album_key\"><span id=\"album\">$album</span></a> - ($year)</td>";
			echo "</tr>\n"; // End the row
		}
		echo "</center>\n</table>\n";
		echo "<br /><center class='no-print' id=\"End_index\"> - The End - </center><br />";
		echo "\n</div>\n";
	}
?>
</body>
</html>

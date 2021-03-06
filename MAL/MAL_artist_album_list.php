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
 
// ini_set('display_errors', 'On');
// error_reporting(E_ALL | E_STRICT);
 
include 'MAL_menu.php';
include 'MAL_SQL_queries.php';
 
	if(open_db()) {
		$key = $_GET['a'];
		$artist_name = artist_name($key);
		echo "<h1 id=\"Top_index\"><center>Media/Artist List - Artist Album List</center></h1>\n";
		echo "<h2><center>Albums that include <i>'$artist_name'</i> Tracks</center></h2><br />\n";
		app_menu();
	 	display_menu($key, 2);

		$sub_heads=array(
		"<h3>Albums by <i>'$artist_name'</i>:</h3>\n",
		"<h3>Albums on which <i>'$artist_name'</i> is a guest:</h3>\n",
		"<h3>Various-Artist Albums that include <i>'$artist_name'</i> tracks:</h3>\n",
		"<h3>Albums on which <i>'$artist_name'</i> composed tracks:</h3>\n"
		);
		
		for($i = 0; $i <= 3; $i++) {
			$result = $GLOBALS['db']->query(sql_artist_albums($i, $key));
			$state = true;
			$album_count = 0;
			while ( $row = $result->fetchArray() ) {
				if($state) {
					echo $sub_heads[$i];
					echo "<center>\n<table>\n\t<colgroup>\n\t\t<col style=\"width:80%\" >\n\t\t<col style=\"width:20%\">\n\t</colgroup>\n\t<tbody>\n";
					$state = false;
				}
				$title = 	$row['Album Title'];
				$year  =	add_year($row['year']);			
				
				$addition = "";
				if(($i == 3) OR ($i == 1)) {
    				    $album_artist = $row['artist'];
    				    $artist_key = artist_key($album_artist);		
				    if(!empty($album_artist)) {
					$addition = " - (<a href=\"MAL_artist_album_list.php?a=$artist_key\"><div id='artist'>$album_artist</div></a>)";
				    }
				}
				$album_count++;
				echo "\t\t<tr><td>$title$addition</a></td><td><center>($year)</center></td></tr>\n";
			}
			if(!$state) {
				echo "\t<tbody>\n</table>\n</center>\n";		
				echo "<h4>Count: $album_count Albums</h4><br/>";
			}
	    }
		echo "<br /><center class='no-print' id=\"End_index\"> - The End - </center><br />\n";
	}
?>
</body>
</html>

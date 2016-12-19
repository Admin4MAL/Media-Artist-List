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


include 'MAL_functions.php';
include 'MAL_SQL_queries.php';

// ini_set('display_errors', 'On');
// error_reporting(E_ALL | E_STRICT);

    header('Content-type: text/plain');
    $file_name = $_GET['file']; 
    header('Content-disposition: attachment; filename=' . $file_name);
     
	if(open_db()) {
        $search = $_GET['query'];
		$fp = fopen('php://output', 'w');
		fwrite($fp, "#CURTRACK 0\n#EXTM3U\n"); // Add the header to the file
        // Add the rows of data to the file
   		$result = $GLOBALS['db']->query($search);
     	while($row = $result->fetchArray(PDO::FETCH_ASSOC)) {
            fwrite($fp, "#" . $row[0] . "\n#" . $row[1] . "\n" . rawurldecode($row[2]) . "\n\n");
    	}
   		fclose($fp);
    }
?>

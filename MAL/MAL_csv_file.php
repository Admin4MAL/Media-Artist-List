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

// ini_set('display_errors', 'On');
// error_reporting(E_ALL | E_STRICT);

	header('Content-type: application/vnd.ms-excel');
    $file_name = $_GET['file']; 
    header('Content-disposition: attachment; filename=' . $file_name);

	if(open_db()) {
		$search = $_GET['query'];
		$fp = fopen('php://output', 'w');
		// Add the column headings to the file
		$headers = $GLOBALS['db']->query($search);
		$fields = array_keys($headers->fetchArray(PDO::FETCH_OBJ));
  	    fputcsv($fp, $fields);

  	    // Add the rows of data to the file
		$result = $GLOBALS['db']->query($search);
     	while($row = $result->fetchArray(PDO::FETCH_ASSOC)) {
        	fputcsv($fp, $row);
    	}
   			  fclose($fp);
    }
?>

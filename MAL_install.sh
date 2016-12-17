#!/usr/bin/env bash
# Copyright (C) 2016 Mike B O'Shea
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 3
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#

sudo mkdir /var/www/html/MAL

sudo yum install php-pdo

sudo usermod -a -G squeezeboxserver apache 

sudo cp /storage/MAL_Install/MAL_start.php 	                               /var/www/html/MAL_start.php
sudo chown apache:apache 			                                       /var/www/html/MAL_start.php
sudo chmod 755 					                                           /var/www/html/MAL_start.php

sudo cp /storage/MAL_Install/MAL/MAL.css  	                               /var/www/html/MAL/MAL.css
sudo chown apache:apache 			                                       /var/www/html/MAL/MAL.css
sudo chmod 755 					                                           /var/www/html/MAL/MAL.css

sudo cp /storage/MAL_Install/MAL/MAL_SQL_queries.php  	                   /var/www/html/MAL/MAL_SQL_queries.php
sudo chown apache:apache 			                                       /var/www/html/MAL/MAL_SQL_queries.php
sudo chmod 755 					                                           /var/www/html/MAL/MAL_SQL_queries.php

sudo cp /storage/MAL_Install/MAL/MAL_menu.php  	                           /var/www/html/MAL/MAL_menu.php
sudo chown apache:apache 			                                       /var/www/html/MAL/MAL_menu.php
sudo chmod 755 					                                           /var/www/html/MAL/MAL_menu.php

sudo cp /storage/MAL_Install/MAL/MAL_help.html  	                       /var/www/html/MAL/MAL_help.html
sudo chown apache:apache 				                                   /var/www/html/MAL/MAL_help.html
sudo chmod 755 						                                       /var/www/html/MAL/MAL_help.html

sudo cp /storage/MAL_Install/MAL/MAL_full_album_list.php  	               /var/www/html/MAL/MAL_full_album_list.php
sudo chown apache:apache 					                               /var/www/html/MAL/MAL_full_album_list.php
sudo chmod 755 							                                   /var/www/html/MAL/MAL_full_album_list.php

sudo cp /storage/MAL_Install/MAL/MAL_csv_file.php  	                       /var/www/html/MAL/MAL_csv_file.php
sudo chown apache:apache 					                               /var/www/html/MAL/MAL_csv_file.php
sudo chmod 755 							                                   /var/www/html/MAL/MAL_csv_file.php

sudo cp /storage/MAL_Install/MAL/MAL_csv_album_detail.php  	               /var/www/html/MAL/MAL_csv_album_detail.php
sudo chown apache:apache 					                               /var/www/html/MAL/MAL_csv_album_detail.php
sudo chmod 755 							                                   /var/www/html/MAL/MAL_csv_album_detail.php

sudo cp /storage/MAL_Install/MAL/MAL_csv_artist_album_list.php             /var/www/html/MAL/MAL_csv_artist_album_list.php
sudo chown apache:apache 					                               /var/www/html/MAL/MAL_csv_artist_album_list.php
sudo chmod 755 							                                   /var/www/html/MAL/MAL_csv_artist_album_list.php

sudo cp /storage/MAL_Install/MAL/MAL_artist_track_list.php  	           /var/www/html/MAL/MAL_artist_track_list.php
sudo chown apache:apache 					                               /var/www/html/MAL/MAL_artist_track_list.php
sudo chmod 755 							                                   /var/www/html/MAL/MAL_artist_track_list.php

sudo cp /storage/MAL_Install/MAL/MAL_artist_composer_list.php  	           /var/www/html/MAL/MAL_artist_composer_list.php
sudo chown apache:apache 					                               /var/www/html/MAL/MAL_artist_composer_list.php
sudo chmod 755 							                                   /var/www/html/MAL/MAL_artist_composer_list.php

sudo cp /storage/MAL_Install/MAL/MAL_artist_album_list.php  	           /var/www/html/MAL/MAL_artist_album_list.php
sudo chown apache:apache 					                               /var/www/html/MAL/MAL_artist_album_list.php
sudo chmod 755 							                                   /var/www/html/MAL/MAL_artist_album_list.php

sudo cp /storage/MAL_Install/MAL/MAL_album_detail.php  	                   /var/www/html/MAL/MAL_album_detail.php
sudo chown apache:apache 				                                   /var/www/html/MAL/MAL_album_detail.php
sudo chmod 755 						                                       /var/www/html/MAL/MAL_album_detail.php

sudo cp /storage/MAL_Install/MAL/MAL_csv_album_detail.php  	               /var/www/html/MAL/MAL_csv_album_detail.php
sudo chown apache:apache 				                                   /var/www/html/MAL/MAL_csv_album_detail.php
sudo chmod 755 						                                       /var/www/html/MAL/MAL_csv_album_detail.php

sudo cp /storage/MAL_Install/MAL/MAL_full_track_list.php  	               /var/www/html/MAL/MAL_full_track_list.php
sudo chown apache:apache 				                                   /var/www/html/MAL/MAL_full_track_list.php
sudo chmod 755 						                                       /var/www/html/MAL/MAL_full_track_list.php

sudo cp /storage/MAL_Install/MAL/MAL_functions.php  	                   /var/www/html/MAL/MAL_functions.php
sudo chown apache:apache 				                                   /var/www/html/MAL/MAL_functions.php
sudo chmod 755 						                                       /var/www/html/MAL/MAL_functions.php

sudo cp /storage/MAL_Install/MAL/MAL_m3u_file.php                          /var/www/html/MAL/MAL_m3u_file.php
sudo chown apache:apache 				                                   /var/www/html/MAL/MAL_m3u_file.php
sudo chmod 755 						                                       /var/www/html/MAL/MAL_m3u_file.php

sudo cp /storage/MAL_Install/MAL/MAL_full_album_list.php  	               /var/www/html/MAL/MAL_full_album_list.php
sudo chown apache:apache 					                               /var/www/html/MAL/MAL_full_album_list.php
sudo chmod 755 							                                   /var/www/html/MAL/MAL_full_album_list.php














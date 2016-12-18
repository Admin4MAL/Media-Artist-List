MAL (Media/Artist List) is an open source add-on for the LMS/Squeezebox Media player, that will work with the Vortexbox distribution that provides a preconfigured LMS server.

The software is server based, it is installed on the LMS/Vortexbox server and is then accessible from all computers and mobile devices that have access to your network, without doing anything on the machine that uses it.

I have used Vortexbox, with LMS within it for many years and would strongly recomend it.

This is a web based application built with PHP, HTML and CSS that copies the SQLite LMS database and uses the copy to provide lists of the Albums, Artists and Tracks within your music collection in what I hope is a useful way. 

The application is fairly simple, it shouldn't affect Vortexbox or LMS in any way as it doesn't change any configuration. The installation routine installs a standard PHP library and then just copies its own files in to the webservers folder.  They should then be accessible from your browser.

The application displays webpages listing including:
All the Albums in your collection ordered by Artist
All the Albums by a specific Artist, including guest appearances and Various Artist albums
Every Artist included in your collection (including composers)
Lists of Tracks by specific Artists
Details of individual Albums, including cover art that's on the system.

Each page has a menus taking you to further pages and all the Artist, Album and Track names are links taking you to further pages.

The pages can be printed (using the browser print functionality, the CSS makes the pages more printer friendly), saved to CSV files (for importing into spreadsheets for further manipulation) and some pages can be saved to M3U playlist files.

I have put the application in GitHub, so that it is freely available for download.  It has an open source licence, so it is free and you can access its code and change it if you wish (similar to Vortexbox and LMS).  

If you download the zip file from GitHub and extract it you will find the installation instructions in install.txt.  They are simple, providing you can copy the files to your server (in the same way as you would music), logon and change to a specific folder and execute the commands given in the file as root.  

A problem with the meta-data/tags held within music files is that unless you have manually entered the information yourself and/or have meticulously checked it, the information won't be consistent.  Things like punctuation, capitalisation, spelling, spacing, naming variations, different opinions on Genre, how multi-disc and various-artist albums should be stored along with different priorities about which tags should be included, will mean the chances of consistency are very slim.
The lists this application displays will provide a way to spot the inconsistencies, either ignoring them or taking a lot of time to correct them.
Let me know what you think, suggest improvements and point out any problems, remembering it works with your data and within the constraints of the structure of the LMS database.

Add links to 
Vortexbox
LMS


Add License file
add how to download from github to the forum post
Add the web page to the github page, removing the links at the top

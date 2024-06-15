<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

$path = '/var/www/html/public/counter/epaper.txt';

// Opens txt file to read the number of hits.
if ( file_exists($path) ) {

$file = fopen($path, "rb");
$content = fgets( $file, 1000 );
fclose( $file );

}

// Update the count.
$count = abs( intval( $content ) ) + 1;
echo $count;

// Opens txt file again to change new hit number.
if ( file_exists($path) ) {

$file = fopen($path, "w");
fwrite( $file, $count );
fclose( $file );

}

?>
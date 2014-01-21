<?php

$rsync = "rsync --archive --verbose %s %s";

if ( ! isset( $argv[1] ) || ! isset( $argv[2] ) )
{
	die( "wrong arguments!\n" );
}

$path = getcwd();

$from = ( $argv[1][0] == '/' ) ? $argv[1] : $path . '/' . $argv[1];
$to = $argv[2];

if ( ! file_exists( $from ) || ! is_dir( $from ) )
{
	printf( "File or directory not found!" );
	exit( 1 );
}

echo "One way sync from $from to $to...\n";


$last_hash = '';
while ( true )
{
	$hash = md5( `ls -laR $from` );
	if ( $hash !== $last_hash )
	{
		echo date( 'ymd-H:i:s' ) . ": File Change Detected!\n";
		echo shell_exec( sprintf( $rsync, $from, $to ) );
		echo "\7";
	}
	$last_hash = $hash;
	usleep( 300 );
}

?>
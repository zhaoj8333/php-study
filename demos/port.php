<?php

$port = 6379;

//error_reporting( E_ALL );
set_time_limit( 0 );
ob_implicit_flush();
$socket = socket_create( AF_INET, SOCK_STREAM, SOL_TCP );

if ( $socket === false ) {
    echo "socket_create() failed:reason:" . socket_strerror( socket_last_error() ) . "\n";
}
$ok = socket_bind( $socket, '0.0.0.0', $port );
if ( $ok === false ) {
    echo "socket_bind() failed:reason:" . socket_strerror( socket_last_error( $socket ) );
}
socket_listen( $socket,100);
$k = array();
while(true){
    echo $i, "\n";
    $k[$i] = socket_accept($socket);

    socket_getpeername($k[$i], $clientAddr, $clientPort);
    $peerInfo = date(DATE_ISO8601, time())."\t".$clientAddr.':'.$clientPort."\n";
    file_put_contents('access-'.date('Y-m-d').'.log', $peerInfo, FILE_APPEND);
    echo "sucessful\n";
    socket_shutdown($k[$i],2);
    $i++;

}
socket_close($socket);

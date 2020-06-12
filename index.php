<?php
include 'vendor/autoload.php';
use Hybridauth\Hybridauth;
use Hybridauth\HttpClient;
$config = [
    'callback' => HttpClient\Util::getCurrentUrl(),
    'providers' => [
        'Line' => [ 
            'enabled' => true,
            'keys'    => [ 'id' => '1654337857', 'secret' => 'd21a27cf5b7f21a408063198d9341068' ], 
        ],
    ],
];
try {    
    $hybridauth = new Hybridauth( $config );
    $adapter = $hybridauth->authenticate( 'Line' );
    $tokens = $adapter->getAccessToken();
    $userProfile = $adapter->getUserProfile();
    // print_r( $tokens );
    print_r( $userProfile );
    $adapter->disconnect();
}
catch (\Exception $e) {
    echo $e->getMessage();
}

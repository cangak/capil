<?php
require_once 'AES.class.php';

function twig($x) {
    $id = decode($x);
    return $id['id'];

}
function urlc($x) {
    $Cipher = new AES();
    $key_128bit = '2b7e151628aed2a6abf7158809cf4f3c';
    $n = ceil(strlen($x) / 16);
    $encrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($x, $i * 16, 16)), $key_128bit);
        $encrypt .= $cryptext;
    }

    return $encrypt;
}

function urld($x) {
    $Cipher = new AES();
    $key_128bit = '2b7e151628aed2a6abf7158809cf4f3c';

    $n = ceil(strlen($x) / 32);
    $decrypt = "";

    for ($i = 0; $i <= $n - 1; $i++) {
        $result = $Cipher->decrypt(substr($x, $i * 32, 32), $key_128bit);
        $decrypt .= $Cipher->hexToString($result);
    }
    return $decrypt;
}

function decode($x) {

    $pecahURI = explode('?', $x);
    $parameter = $pecahURI[1];

    $pecahParam = explode('&', urld($parameter));

    for ($i = 0; $i <= count($pecahParam) - 1; $i++) {
        $decode = explode('=', $pecahParam[$i]);
        $var[$decode[0]] = $decode[1];
    }
    return $var;
}
function urltes($x) {

    $pecahURI = explode('?', $x);
    $parameter = $pecahURI[1];

    $pecahParam = explode('&', usecr($parameter));

    for ($i = 0; $i <= count($pecahParam) - 1; $i++) {
        $decode = explode('=', $pecahParam[$i]);
        $var[$decode[0]] = $decode[1];
    }
    echo $decode[1];
    return $var;
}

?>
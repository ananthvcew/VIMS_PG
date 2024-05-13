<?php
session_start();
error_reporting(0);
ini_set('date.timezone', 'Asia/Kolkata');
spl_autoload_register(function($class_name){
	include "classes/".$class_name.'.php';
});
include_once '../vendor/autoload.php';
	global $pagename;
	global $CONFIG_ ;
	$currentFile = $_SERVER["PHP_SELF"];
	$parts = Explode('/', $currentFile);
	$pagename = $parts[count($parts) - 1];

	/************************************/
/* global functions                 */
/************************************/
function hex2dec($color = "#000000"){
    $tbl_color = array();
    $tbl_color['R']=hexdec(substr($color, 1, 2));
    $tbl_color['G']=hexdec(substr($color, 3, 2));
    $tbl_color['B']=hexdec(substr($color, 5, 2));
    return $tbl_color;
}

function px2mm($px){
    return $px*25.4/72;
}

function txtentities($html){
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans = array_flip($trans);
    return strtr($html, $trans);
}


?>
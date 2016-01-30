<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Teodor Muraru <temuraru@gmail.com> 
 * Date: 7/21/13
 * Time: 10:52 PM
 */

$dir    = APPLICATION_PATH . '/public/img/foto/nunta/andreea-alin/thumbs';
$scanned_directory = array_diff(scandir($dir), array('..', '.'));
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

//print_r($files1);
//print_r($scanned_directory);
var_dump($dir);die;


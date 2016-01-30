<?php

magic_quotes_runtime(false);
set_magic_quotes_runtime(false);
//var_dump(get_magic_quotes_gpc());die;
//phpinfo();
//die;
/**
 * index.php
 *
 * @version $0.1$
 * @copyright Temuraru.ro 2011
 * @author Teodor Muraru
 */
error_reporting(E_ALL ^ E_NOTICE);ini_set("display_errors", "On");

$dir = dirname(__FILE__);
$appPath = realpath($dir . '/');
define('APPLICATION_PATH', $appPath); // /home/studioan/public_html/
define('SITE_NAME', 'StudioAndy');

define('ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] . '/');

require(APPLICATION_PATH . '/library/Smarty/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = APPLICATION_PATH . '/templates/';
$smarty->compile_dir = APPLICATION_PATH . '/templates_c/';
//require_once(ROOT_DIR . 'library/Smarty/Smarty.class.php');
//$smarty = new Smarty;
//$smarty->template_dir = ROOT_DIR . '';
//$smarty->compile_dir = ROOT_DIR . 'templates_c/';

//require_once ROOT_DIR . 'library/Twig/Autoloader.php';
//Twig_Autoloader::register();
//$loader = new Twig_Loader_Filesystem(ROOT_DIR . 'templates/');
//$twig = new Twig_Environment($loader, array(
//    'cache' => ROOT_DIR . 'templates_c/',
//    'autoescape' => false
//));

//include_once('include/functions.php');
//$configObject = simplexml_load_file('public/xml/site.xml');
//$site = array();
//convertXmlObjToArr($configObject, $site);

//$allowedPages = array('index', 'despre','galerie-foto','galerie-video','contact', 'sitemap');
//$template = $allowedPages[0];
//$request = substr($_SERVER['REQUEST_URI'], 1);
//if (in_array($request, $allowedPages)){
//    $template = $request;
//
//    switch ($template){
//        case 'galerie':
//            break;
//        case 'contact':
//            break;
//        default:
////            $template = 'contact';
//            break;
//    }
//}
////var_dump($request, $template, $configObject);die;
////$smarty->assign('site', $site);
//$templatePath = $template . '.html';
//$smarty->assign('template', $template);
////var_dump($templatePath, $template);die;
//$smarty->assign('templatePath', $templatePath);


include_once(APPLICATION_PATH . '/include/lists.php');
//var_dump(APPLICATION_PATH . '/include/lists.php');die;
include_once(APPLICATION_PATH . '/include/functions.php');
include_once(APPLICATION_PATH . '/include/menu.php');
//
include_once(APPLICATION_PATH . '/include/custom.php');
include_once(APPLICATION_PATH . '/include/mvc.php');

$smarty->display('layout.html');

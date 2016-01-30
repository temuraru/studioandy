<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Teodor Muraru <temuraru@gmail.com>
 * Date: 9/15/12
 * Time: 10:41 PM
 */

$titlePrefix = false;
$bodyClass = 'index';

$allowedPages = $menu;
$template = current(array_keys($allowedPages));

$requestUri = rtrim(ltrim($_SERVER['REQUEST_URI'], '/'), '?');
$path = explode('/', $requestUri);
$request = null;//$path[0];
$mvc = array('controller' => false, 'action' => false, 'subaction' => false, 'error' => false);
if (empty($path[0])) {
//    $template = 'error';
    $request = current(array_keys($allowedPages));
    $mvc['controller'] = $request;
}
elseif (in_array($path[0], array_keys($allowedPages))) {
    $mvc['controller'] = $path[0];
    if (!empty($path[1])) {
        if (in_array($path[1], array_keys($allowedPages[$path[0]]))) {
            $mvc['action'] = $path[1];
            if (!empty($path[2])) {
                if (in_array($path[2], array_keys($allowedPages[$path[0]][$path[1]]))) {
                    $mvc['subaction'] = $path[2];
                }
                else {
                    $mvc['error'] = true;
                }
            }
        }
        else {
            $mvc['error'] = true;
        }
    }
}
else {
    $mvc['error'] = true;
}

//$template = implode('/', $mvc);
$template = $mvc['controller'];
$template = rtrim($template, '/') . '.html';
$bodyClass = rtrim(implode('-', $mvc), '-');
if (!empty($mvc['error'])) {
    $template = 'widgets/error.html';
    $errorVersion = rand(1,2);
    $smarty->assign('errorVersion', $errorVersion);
    header('HTTP/1.0 404 Not Found');
}
else {
    include_once(APPLICATION_PATH . '/include/custom-mvc.php');
}
//var_dump($template, '<hr />', $bodyClass, '<hr />', $mvc);die;
$meta['title'] = ($titlePrefix ? $titlePrefix . ' &raquo; ' : '') . $meta['title'];
$smarty->assign('meta', $meta);
$smarty->assign('mvc', $mvc);

$smarty->assign('bodyClass', $bodyClass);
$smarty->assign('template', $template);
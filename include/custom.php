<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Teodor Muraru <temuraru@gmail.com>
 * Date: 9/15/12
 * Time: 10:52 PM
 */

$currentLang = 'ro';
$availableLangs = array_keys($languages);
if (!in_array($currentLang, $availableLangs)) {
    $currentLang = 'ro';
}
$smarty->assign('lang', $languages[$currentLang]);

$site = array();
$smarty->assign('site', $site);

$smarty->assign('galleries', $galleries);

$featuredTestimonial = $lists['testimonial'][rand(0,count($lists['testimonial']) - 1)];
$smarty->assign('featuredTestimonial', $featuredTestimonial);


$meta = array('title' => SITE_NAME, 'currentUrl' => 'http://'.$_SERVER['SERVER_NAME'] .  $_SERVER['REQUEST_URI']);
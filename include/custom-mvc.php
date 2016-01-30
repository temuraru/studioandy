<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Teodor Muraru <temuraru@gmail.com>
 * Date: 9/16/12
 * Time: 12:23 PM
 */
//var_dump($mvc);die;
$smarty->assign('lists', $lists);
//var_dump($mvc);die;
switch ($mvc['controller']) {
    case 'galerie-foto':
        if (!empty($galleries['foto'][$mvc['action']])) {
            $smarty->assign('currentGallery', $galleries['foto'][$mvc['action']]);
        }
        break;
    case 'galerie-video':
        if (!empty($mvc['action'])) {
            $smarty->assign('currentFilter', $mvc['action']);
        }
        if (!empty($galleries['video'])) {
            $smarty->assign('videoGallery', $galleries['video']);
        }
        break;
    case 'contact':
        $titlePrefix = 'Contact';
        include (APPLICATION_PATH . '/include/contact.php');
        break;
    case 'index':
        $smarty->assign('homepageQuotes', $homepageQuotes);
//        var_dump($homepageQuotes);die;
        $template = 'index.html';
        break;
    case 'extra':
        $smarty->assign('fullPageLayout', true);
        $smarty->assign('extraActivities', $extraActivities);
        break;
    case 'despre-noi':
    case 'despre':
        break;
    case 'test':
        include (APPLICATION_PATH . '/include/test.php');
        exit;
        break;
    default:

        break;
}
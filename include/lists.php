<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Teo
 * Date: 8/28/12
 * Time: 10:47 PM
 * To change this template use File | Settings | File Templates.
 */

$photos = getAllPhotos();
$videos = getAllVideos();
//var_dump($photos['diverse']);die;
$galleries = array(
    'flexSlider' => getSliderPhotos(),
    'video' => array(
        'filters' =>array(
            array('class' => 'absolvire', 'name' => 'Absolvire'),
            array('class' => 'botez', 'name' => 'Botez'),
            array('class' => 'diverse', 'name' => 'Diverse'),
            array('class' => 'nunta', 'name' => 'Nunta'),
            array('class' => 'videoclipuri', 'name' => 'Videoclipuri'),
        ),
        'videos' => $videos
    ),
    'foto' => array(
        'botez' => array(
            'name' => 'Botez',
            'layoutMode' => 'fitRows',
            'filtersClass' => '',
            'filters' =>array(
                array('class' => 'daria', 'name' => 'Daria'),
            ),
            'thumbsFolder' => 'thumbs',
            'baseHref' => '/public/img/foto/botez/',
            'photos' => $photos['botez']
        ),
        'default' => getDefaultPhotos(),
        'copii' => array(
            'name' => 'Copii',
            'layoutMode' => 'fitRows',
            'filtersClass' => '',
            'filters' =>array(
                array('class' => 'roberta', 'name' => 'Aniversare Roberta'),
            ),
            'thumbsFolder' => 'thumbs',
            'baseHref' => '/public/img/foto/copii/',
            'photos' => $photos['copii'],
        ),
        'diverse' => array(
            'name' => 'Diverse',
            'layoutMode' => 'fitRows',
            'filtersClass' => '',
            'filters' =>array(
				array('class' => 'miting-aviatic', 'name' => 'Miting Aviatic 2013'),
            ),
            'thumbsFolder' => 'thumbs',
            'baseHref' => '/public/img/foto/diverse/',
            'photos' => $photos['diverse'],
        ),
        'nunta' => array(
            'name' => 'Nunta',
            'layoutMode' => 'masonry',
            'filtersClass' => '',
            'filters' =>array(
                array('class' => 'andreea_alin', 'name' => 'Andreea & Alin'),
                array('class' => 'alina_adrian', 'name' => 'Alina & Adrian'),
                array('class' => 'daniela_alexandru', 'name' => 'Daniela & Alexandru'),
            ),
            'thumbsFolder' => 'thumbs',
            'baseHref' => '/public/img/foto/nunta/',
            'photos' => $photos['nunta'],
        ),
    ),
);
$languages = array(
    'ro' => array(
        'short' => 'ro',
        'full' => 'ro-RO'
    ),
);

function getDefaultPhotos() {
    return array(
        'name' => '',
        'layoutMode' => 'fitRows',
        'filtersClass' => '',
        'filters' =>array(
            array('class' => 'one', 'name' => 'One'),
            array('class' => 'two', 'name' => 'Two'),
            array('class' => 'three', 'name' => 'Three'),
            array('class' => 'four', 'name' => 'Four'),
            array('class' => 'five', 'name' => 'Five'),
        ),
        'baseHref' => '/public/img/photos/',
        'photos' => array(
            array(
                'class' => 'one three',
                'title' => '',
                'img' => 'a.jpg',
                'thumb' => '1.jpg',
            ),
            array(
                'class' => 'two one',
                'title' => '',
                'img' => 'b.jpg',
                'thumb' => '2.jpg',
            ),
            array(
                'class' => 'three five',
                'title' => '',
                'img' => 'c.jpg',
                'thumb' => '3.jpg',
            ),
            array(
                'class' => 'four two',
                'title' => '',
                'img' => 'd.jpg',
                'thumb' => '4.jpg',
            ),


            array(
                'class' => 'five one',
                'title' => '',
                'img' => 'e.jpg',
                'thumb' => '5.jpg',
            ),
            array(
                'class' => 'four five',
                'title' => '',
                'img' => 'b.jpg',
                'thumb' => '6.jpg',
            ),
            array(
                'class' => 'three one',
                'title' => '',
                'img' => 'g.jpg',
                'thumb' => '7.jpg',
            ),
            array(
                'class' => 'three one',
                'title' => '',
                'img' => 'h.jpg',
                'thumb' => '8.jpg',
            ),


            array(
                'class' => 'five two',
                'title' => '',
                'img' => 'i.jpg',
                'thumb' => '9.jpg',
            ),
            array(
                'class' => 'three four',
                'title' => '',
                'img' => 'j.jpg',
                'thumb' => '10.jpg',
            ),
        ),

    );
}
function getAllVideos() {
    $videos = array(
        array(
            'title' => 'Clip Anca & Adrian',
            'class' => 'nunta',
            'img' => 'https://i.ytimg.com/vi/9GEsm33YtDU/mqdefault.jpg',
            'youtube' => 'https://www.youtube.com/watch?v=9GEsm33YtDU',
        ),
        array(
            'title' => 'Clip Diana & Nicolae',
            'class' => 'nunta',
            'img' => 'https://i.ytimg.com/vi/jzvYU_tULFs/mqdefault.jpg',
            'youtube' => 'https://www.youtube.com/watch?v=jzvYU_tULFs&authuser=0',
        ),
        array(
            'title' => 'Clip Adina & Florin',
            'class' => 'nunta',
            'img' => 'https://i1.ytimg.com/vi/zRUOGNdmdbU/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=zRUOGNdmdbU',
        ),
        array(
            'title' => 'Clip nunta Daniel & Irina',
            'class' => 'nunta',
            'img' => 'http://i.ytimg.com/vi/lypEpK4rNc0/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=lypEpK4rNc0',
        ),
        array(
            'title' => 'Clip nunta Daniela & Alexandru',
            'class' => 'nunta',
            'img' => 'http://i.ytimg.com/vi/r8WZtNLDiV0/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=r8WZtNLDiV0',
        ),

        array(
            'title' => 'Clip nunta Lore & Mihai',
            'class' => 'nunta',
            'img' => 'http://i1.ytimg.com/vi/DagyGf5gYxM/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=DagyGf5gYxM',
        ),
        array(
            'title' => 'Clip nunta Cipri & Anca',
            'class' => 'nunta',
            'img' => 'http://i2.ytimg.com/vi/G7UscxryaVc/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=G7UscxryaVc',
        ),
        array(
            'title' => 'Clip nunta Bianca & Ony',
            'class' => 'nunta',
            'img' => 'http://i.ytimg.com/vi/qG7obkCvObo/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=qG7obkCvObo',
        ),
        array(
            'title' => 'Clip Andreea & Alin',
            'class' => 'nunta',
            'img' => 'https://i1.ytimg.com/vi/2lB6Lxl0VlU/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=2lB6Lxl0VlU',
        ),
        array(
            'title' => 'Clip nunta Cozmin & Crina',
            'class' => 'nunta',
            'img' => 'http://i.ytimg.com/vi/sJIs8ys0I6k/mqdefault.jpg',
            'youtube' => 'https://www.youtube.com/watch?v=sJIs8ys0I6k',
        ),
        array(
            'title' => 'Clip Alexandru & Ioana',
            'class' => 'nunta',
            'img' => 'https://i1.ytimg.com/vi/GyIacxF5md4/mqdefault.jpg',
            'youtube' => 'https://www.youtube.com/watch?v=GyIacxF5md4',
        ),
        array(
            'title' => 'Andra Costea & Actual Band - Nunta live',
            'class' => 'diverse',
            'img' => 'http://i2.ytimg.com/vi/X71YpNld3os/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=X71YpNld3os',
        ),
        array(
            'title' => 'Bianca & Ony - Nunta live',
            'class' => 'diverse',
            'img' => 'http://i1.ytimg.com/vi/fx6c9cE4L60/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=fx6c9cE4L60',
        ),
        array(
            'title' => 'Ivan Dana - Momente nunta live Andrei & Aida',
            'class' => 'diverse',
            'img' => 'http://i1.ytimg.com/vi/eaGvowoRAx0/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=eaGvowoRAx0',
        ),
        array(
            'title' => 'Aurel Tamas - Momente live nunta Cozmin & Crina',
            'class' => 'diverse',
            'img' => 'https://i1.ytimg.com/vi/7j_dcBVWics/mqdefault.jpg',
            'youtube' => 'https://www.youtube.com/watch?v=7j_dcBVWics',
        ),
        array(
            'title' => 'Mihai Perian & Roxana Ilisie - Momente live nunta Lucian & Maria',
            'class' => 'diverse',
            'img' => 'https://i1.ytimg.com/vi/dQVoHr9rRLM/mqdefault.jpg',
            'youtube' => 'https://www.youtube.com/watch?v=dQVoHr9rRLM',
        ),
        array(
            'title' => 'Grupul Scolar Grigore Moisil - Promotia 2002 - Deva',
            'class' => 'absolvire',
            'img' => 'http://i2.ytimg.com/vi/AvA3o_yWMcs/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=AvA3o_yWMcs',
        ),
        array(
            'title' => 'Clip Botez Daria-Andreea',
            'class' => 'botez',
            'img' => 'http://i2.ytimg.com/vi/il_0pASVUsg/mqdefault.jpg',
            'youtube' => 'http://www.youtube.com/watch?v=il_0pASVUsg',
        ),
        array(
            'title' => 'Clip Botez Sofia Ioana',
            'class' => 'botez',
            'img' => 'https://i1.ytimg.com/vi/3RQ8SJTMm7Y/mqdefault.jpg',
            'youtube' => 'https://www.youtube.com/watch?v=3RQ8SJTMm7Y',
        ),
        array(
            'title' => 'Mihai Perian & Roxana Ilisie - Rozmarin in coltul mesei',
            'class' => 'videoclipuri',
            'img' => 'https://i.ytimg.com/vi/NWWRA7jWtxA/mqdefault.jpg',
            'youtube' => 'https://www.youtube.com/watch?v=NWWRA7jWtxA',
        ),
    );
    return $videos;
}

function getPhotos($category, $folder, $className) {
    $photos = array();

    $dirPhotos = APPLICATION_PATH . '/public/img/foto/'.$category.'/'.$folder.'/thumbs';
    if (!is_dir($dirPhotos)) {
        return $photos;
    }
    $files = array_diff(scandir($dirPhotos), array('..', '.'));
    if (!empty($files)) {
        foreach ($files as $fileName) {
            $photos[] = array(
                'class' => $className,
                'folder' => $folder,
                'img' => $fileName,
            );
        }
    }
    return $photos;
}

function getAllPhotos() {

    $photos = array('diverse', 'nunta', 'copii', 'botez');

    $photosAndreea_alin = getPhotos('nunta', 'andreea-alin', 'andreea_alin');
    $photosAlina_adrian = getPhotos('nunta', 'alina-adrian', 'alina_adrian');
    $photosDanielaAlexandru = getPhotos('nunta', 'daniela_alexandru', 'daniela_alexandru');

    $photos['nunta'] = array_merge($photosAndreea_alin, $photosAlina_adrian, $photosDanielaAlexandru);
    $photos['botez'] = getPhotos('botez', 'daria', 'daria');
    $photos['copii'] = getPhotos('copii', 'roberta', 'roberta');
    $photos['diverse'] = getPhotos('diverse', 'miting-aviatic', 'miting-aviatic');

    return $photos;
}

/**
 * @return array
 */
function getSliderPhotos() {
    $flexSliderPhotos = array(
        array(
            'id' => 2,
            'image' => '/public/img/flex-slider/s1.jpg',
            'title' => '',
//            'caption' => array(
//                'class' => 'bor',
//                'title' => '',
//                'text' => ''
//            ),
        ),
        array(
            'id' => 3,
            'image' => '/public/img/flex-slider/s2.jpg',
            'title' => '',
//            'caption' => array(
//                'class' => 'bor',
//                'title' => 'Lots of Pages',
//                'text' => 'Ut commodo ullamcer risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat.'
//            ),
        ),
        array(
            'id' => 4,
            'image' => '/public/img/flex-slider/s3.jpg',
            'title' => '',
//            'caption' => array(
//                'class' => 'bor',
//                'title' => 'Amazing Design',
//                'text' => 'Ut commodo ullamcer risus nec mattis. Fusce imperdiet ornare dignissim. Donec aliquet convallis tortor, et placerat.'
//            ),
        ),
    );
    $flexSliderPromos = array(
        array(
            // until '2013-12-21 00:00:00'
            'id' => 1,
            'image' => '/public/img/promo/reducere20_1200x500.jpg',
            'title' => '',
        ),
    );
    if (strtotime('2013-12-21 00:00:00') > time()) {
        $flexSliderPhotos = array_merge($flexSliderPromos ,$flexSliderPhotos);
    }

    return $flexSliderPhotos;
}


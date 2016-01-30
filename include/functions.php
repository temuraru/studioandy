<?php

function xml2array($fname) {
    $sxi = new SimpleXmlIterator($fname, null, true);
    return sxiToArray($sxi);
}
function sxiToArray($sxi) {
    $a = array();
    for( $sxi->rewind(); $sxi->valid(); $sxi->next() ) {
        if(!array_key_exists($sxi->key(), $a)) {
            //$a[$sxi->key()] = array();
        }
        if($sxi->hasChildren()) {
            $a[$sxi->key()][] = sxiToArray($sxi->current());
        }
        else {
            $a[$sxi->key()] = strval($sxi->current());
        }
    }
    return $a;
}
function convertXmlObjToArr( $obj, &$arr ) {
    $children = $obj->children();
    $executed = false;
    foreach ($children as $elementName => $node) {
        if( @array_key_exists( $elementName , $arr ) ) {
            if(@array_key_exists( 0 , $arr[$elementName] ) ) {
                $i = count($arr[$elementName]);
                convertXmlObjToArr ($node, $arr[$elementName][$i]);
            }
            else {
                $tmp = $arr[$elementName];
                $arr[$elementName] = array();
                $arr[$elementName][0] = $tmp;
                $i = count($arr[$elementName]);
                convertXmlObjToArr($node, $arr[$elementName][$i]);
            }
        }
        else {
            $arr[$elementName] = array();
            convertXmlObjToArr($node, $arr[$elementName]);
        }
        $executed = true;
    }
    if(!$executed&&$children->getName()=="") {
        $arr = (String)$obj;
    }

    return ;
}  
?>

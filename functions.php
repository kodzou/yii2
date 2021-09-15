<?php

function pre($var, $isBlock = false, $die = false)
{
    if ($isBlock) {
        echo '<div style="float: left; font-family: Monaco,monospace;font-size: 12px;line-height: 1.3;color: #0a2839"><pre>';
        print_r($var);
        echo '</pre></div>';
    } else {
        echo '<pre style="font-family: Monaco,monospace;font-size: 12px;line-height: 1.3;color: #0a2839">';
        print_r($var);
        echo '</pre><br/>';
    }
    if ($die)
        die('Debug in PRE');
}

function vd($var, $die = false)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if ($die)
        die('Debug in VD');
}


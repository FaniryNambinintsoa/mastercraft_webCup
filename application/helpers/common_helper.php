<?php

function trim_max($text, $size = 50) {
    return substr($text, 0, $size) . ' ...';
}
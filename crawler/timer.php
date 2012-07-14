<?php
function gettime() {
    list($usec, $sec) = explode(' ', microtime());
    return (float)$usec + (float)$sec;
}
?>

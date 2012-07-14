<?php
require_once('crawler/model.php');

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

if (isset($_GET['limit']))
    $limit = intval($_GET['limit']);
else
    $limit = 2 << 15;
echo json_encode(GetByCount($limit));
?>

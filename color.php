<?php
require_once('crawler/model.php');

header('Content-type: application/json');

if (isset($_GET['limit']))
    $limit = intval($_GET['limit']);
else
    $limit = 2 << 100;
echo json_encode(GetByCount($limit));
?>

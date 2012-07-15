<?php
require_once('rb.php');
require_once('config.php');

$table = $db['table'];
if (isset($db['port'])) {
    $connect = "mysql:host=" . $db['host'] . ':' . $db['port'] .  ";dbname=" . $db['name']; 
} else {
    $connect = "mysql:host=" . $db['host'] . ";dbname=" . $db['name']; 
}

R::setup($connect, $db['user'], $db['passwd']);

function _serialize($items)
{
    // just stay simple & use simply
    return implode(',', $items);
}


function _unserialize($item)
{
    return explode(',', $item);
}


function _hash($data)
{
    return sha1($data);
}


function Add($data)
{
    global $table;

    $hash = _hash($data['link']);
    if (GetByHash($hash))
        return False;

    $ret = R::dispense($table);
    $ret->name = $data['name'];
    $ret->link = $data['link'];
    $ret->hash = $hash;
    $ret->colors = _serialize($data['colors']);
    $id = R::store($ret);

    return $id;
}


function GetByCount($count)
{
    global $table;

    $ret = R::find($table, '1 ORDER BY id DESC LIMIT :count',
        array(':count' => $count));
    $result = array();
    foreach($ret as $r)
    {
        $result[] = array(
            'name' => $r->name,
            'link' => $r->link,
            'colors' => _unserialize($r->colors)
        );
    }
    return $result;
}


function GetByHash($hash)
{
    global $table;

    $ret = R::find($table, 'hash = :hash', array(':hash' => $hash));
    if ($ret)
        return $ret;
    else
        return False;
}
?>

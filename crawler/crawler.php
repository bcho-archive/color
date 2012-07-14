<?php
require_once('timer.php');
require_once('simple_html_dom.php');

require_once('model.php');

$url = 'http://design-seeds.com/';


function parse_colors($parser, $callback = Null)
{
    global $url;
    $parser->load_file($url);
    $palettes = $parser->find(".palette");
    $result = array();
    foreach($palettes as $palette)
    {
        $name = $palette->find("h2", 0)->plaintext;
        $link = $palette->find("a", 0)->href;
        $colors = array();
        $c = $palette->find(".similar", 0)->find("dd a");
        foreach($c as $i)
            $colors[] = $i->plaintext;
        if (sizeof($colors) > 5)
            array_pop($colors);
        $item = array(
            "name" => $name,
            "link" => $link,
            "colors" => $colors
        );
        if ($callback)
            $callback($item);
        $result[] = $item;
    }
    return $result;
}


function to_db($item)
{
    Add($item);
}


function test()
{
    $parser = new simple_html_dom;
    $result = parse_colors($parser, 'to_db');
}

$start = gettime();
test();
$end = gettime();
echo $end - $start;
?>

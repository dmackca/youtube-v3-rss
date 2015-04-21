<?php
require '../vendor/autoload.php';
require '../lib/config.php';

$link_parser = new \Misd\Linkify\Linkify();

use Handlebars\Handlebars;

$hb_engine = new Handlebars(array(
	'loader' => new \Handlebars\Loader\FilesystemLoader('../tpl/'),
	'partials_loader' => new \Handlebars\Loader\FilesystemLoader(
		'../tpl/',
		array(
			'prefix' => '_'
			)
		)
	));

$id = $_GET['id'];

use Madcoda\Youtube;

$yt = new Youtube(array('key' => YT_API_KEY));

$playlistitems = $yt->getPlaylistItemsByPlaylistId($id);
$playlist = $yt->getPlaylistById($id);


$items = array();
foreach ($playlistitems as $key => $item) {

	$item_link = 'https://www.youtube.com/watch?v=' . $item->contentDetails->videoId;
	$item_date = strtotime($item->snippet->publishedAt);
	$item_pubDate = date(DATE_RSS, $item_date);
	$item_date = date('Y-m-d, H:i', $item_date);
	$item_description = $link_parser->process($item->snippet->description);
	$item_description = nl2br($item_description);

	$items[] = array(
		'title' => $item->snippet->title,
		'description' => $item_description,
		'image' => array('url' => $item->snippet->thumbnails->medium->url,
						 'w' => $item->snippet->thumbnails->medium->width,
						 'h' => $item->snippet->thumbnails->medium->height),
		'date' => $item_date,
		'pubDate' => $item_pubDate,
		'link' => $item_link,
		'guid' => $item->contentDetails->videoId,

	);
}

$playlist_link = 'https://www.youtube.com/playlist?list=' . $id;

echo $hb_engine->render(
    'feed',
    array(
    	'title' => $playlist->snippet->title,
    	'description' => $playlist->snippet->description,
    	// 'image' => $playlist->snippet->thumbnails->medium,
    	'link' => $playlist_link,
        'items' => $items,
        'ttl' => '15',
    )
);

?>

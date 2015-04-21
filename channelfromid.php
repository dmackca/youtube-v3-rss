<?php
require 'vendor/autoload.php';
include 'lib/config.php';

$id = $_GET['id'];

use Madcoda\Youtube;

$yt = new Youtube(array('key' => YT_API_KEY));

$channel = $yt->getChannelById($id);


$id = $channel->id;
$title = $channel->snippet->title;
$thumb = $channel->snippet->thumbnails->default->url;
$faves = $channel->contentDetails->relatedPlaylists->favorites;
$uploads = $channel->contentDetails->relatedPlaylists->uploads;


?>

<h2>userID: <?php echo $id ?> <small><?php echo $title ?></small></h2>

<img src="<?php echo $thumb ?>">

<p>
Uploads: <a href="feed/playlist.php?id=<?php echo $uploads ?>"><?php echo $uploads ?></a> <br>
Favorites: <a href="feed/playlist.php?id=<?php echo $faves ?>"><?php echo $faves ?></a>
</p>

<pre style"font-size:.6em;">
<?php print_r($channel); ?>
</pre>
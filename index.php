<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Youtube RSS feeds</title>
	<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.4/spacelab/bootstrap.min.css" rel="stylesheet">
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body>
	<div class="container">
		<img class="pull-right" src="http://imgur.com/mIsIQP2.png" alt="Don't unplug my feed tube!">
		<h1>Youtube RSS feeds</h1>
		<p>A gift to the <a href="https://newsblur.com/">NewsBlur</a> community from ya boy <a href="https://dmack.newsblur.com/" title="the big boy with the Content">dmack</a>: Youtube RSS feeds.</p>
		<p>You can generate an RSS feed for a channel's latest uploads, or any other playlist.</p>

		<h2>Do like dis:</h2>
		<p>Use any public Playlist ID: <code>https://morning-retreat-1911.herokuapp.com/feed/playlist.php?id=PLAYLIST_ID</code></p>
		<h3>Generate RSS feed for Youtube playlist ID</h3>
		<form method="get" action="feed/playlist.php">
			<div class="form-group">
				<label for="playlistID">Playlist ID: </label>
				<input required type="text" class="form-control" id="playlistID" name="id" placeholder="PL9E048D617DF22F46">
			</div>
			<input class="btn btn-default" type="submit" value="Go &rarr;">
		</form>


		<h2>Find playlist IDs for uploads</h2>
		<div class="row">
			<div class="col-sm-6">
				<h3>By legacy username</h3>
				<form method="get" action="channelfromusername.php">
					<div class="form-group">
						<label for="username">Username: </label>
						<input required type="text" class="form-control" id="username" name="username" placeholder="MonsantoCo">
					</div>
					<input class="btn btn-default" type="submit" value="Go &rarr;">
				</form>
			</div>
			<div class="col-sm-6">
				<h3>By channel ID</h3>
				<form method="get" action="channelfromid.php">
					<div class="form-group">
						<label for="channelID">Channel ID: </label>
						<input required type="text" class="form-control" id="channelID" name="id" placeholder="UC8h8NJG9gacZ5lAJJvhD0fQ">
					</div>
					<input class="btn btn-default" type="submit" value="Go &rarr;">
				</form>
			</div>
		</div>
	</div>

</body>
</html>
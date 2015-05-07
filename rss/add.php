<?php
require_once 'rss_db.php';

header( 'Content-type: text/xml' );

FeedList::add( $_GET['url'] );
?>
<done />

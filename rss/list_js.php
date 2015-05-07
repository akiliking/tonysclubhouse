<?php
require_once 'rss_db.php';

header( 'Content-type: text/javascript' );

$rows = FeedList::getAll();

$feeds = array();

foreach( $rows as $row )
{
  $feed = "{ id:".$row['rss_feed_id'];
  $feed .= ", link:'".$row['url']."'";
  $feed .= ", name:'".$row['name']."' }";
  $feeds []= $feed;
}
?>
setFeeds( [ <?php echo( join( ', ', $feeds ) ); ?> ] );

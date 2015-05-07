<?php
require_once 'rss_db.php';

function js_clean( $str )
{
  $str = preg_replace( "/\'/", "", $str );
  return $str;
}

FeedList::update();

$id = array_key_exists( 'id', $_GET ) ? $_GET['id'] : 1;

$rows = Feed::get( $id );

$items = array();

foreach( $rows as $row )
{
  $js = "{ title:'".js_clean($row['title'])."'";
  $js .= ", link:'".js_clean($row['link'])."'";
  $js .= ", description:'".js_clean($row['description'])."' }";
  $items []= $js;
}
?>
addFeed( <?php echo( $id ); ?>,
[ <?php echo( join( ', ', $items ) ); ?> ] );

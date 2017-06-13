<?php
/**
 * c:\Apache24\htdocs\itc250\projects\project3\mytest\sp17\P3_News\getfeed.php
 *
 * @package default
 */


/**
 *
 * @param unknown $feed_url
 */
function getFeed($feed_url) {

	$content = file_get_contents($feed_url);
	$x = new SimpleXmlElement($content);
	//    echo "<ul>";
	//
	//    foreach($x->channel->item as $entry) {
	//
	//        echo "<li><a href='$entry->link' title='$entry->title' target='_blank'>" . $entry->title . "</a></li>";
	//        echo "<img src=\"" . $entry->image . "\">";
	//
	//    }
	//    echo "</ul>";
	//}



	$feeds = array();


	$i =0;

	foreach ($x->channel->item as $entry) {
		$parts = explode('<font size="-1">', $entry->description);

		$feeds[$i]['title'] = (string) $entry->title;
		$feeds[$i]['link'] = (string) $entry->link;
		if (preg_match('@src="([^"]+)"@', $entry->description, $match) == 1) {
			$feeds[$i]['image'] = $match[1];
		} else {
			$feeds[$i]['image'] = "placeholder.png";//http://nessaspillwebpages.com/itc250/projects/project3/mytest/P3_News/placeholder.png
		}

		$feeds[$i]['site_title'] = (string) $entry->site_title;
		$feeds[$i]['story'] = strip_tags($parts[2]);




		echo '<ul>';
		echo "<li><a href='$entry->link' title='$entry->title' target='_blank'>" . $entry->title . "</a></li>";
		echo "<p>" . $feeds[$i]['site_title'] . "</p>";
		echo "<img src='" . $feeds[$i]['image']  ."'>";
		echo '</ul>';
		$i++;
	}
}


?>

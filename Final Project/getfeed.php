<?php
/*getfeed.php

* category_view.php along with index.php provides a sample web application
*
* @version 2.10 2017/06/13
* @link http://nessaspillwebpages.com/itc250/projects/project3/mytest/P3_News/
* @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
* @todo none
* @author Erin, Anna, Frankie, Vanessa
* 
*/

/**
     * This function is used for getting the feeds and organize it in an array
     *
     * @todo none
     */

function getFeed($feed_url) {

	$content = file_get_contents($feed_url);
	$x = new SimpleXmlElement($content);

	$feeds = array();

	$i =0;

	foreach ($x->channel->item as $entry) {
		$parts = explode('<font size="-1">', $entry->description);

		$feeds[$i]['title'] = (string) $entry->title;
		$feeds[$i]['link'] = (string) $entry->link;
		if (preg_match('@src="([^"]+)"@', $entry->description, $match) == 1) {
			$feeds[$i]['image'] = $match[1];
		} else {
			$feeds[$i]['image'] = "placeholder.png";
		}

		$feeds[$i]['site_title'] = (string) $entry->site_title;
		$feeds[$i]['story'] = strip_tags($parts[2]);
    
		echo '<ul>';
		echo "<li><a href='" . $entry['link'] . " title='".$entry['title'] . " target='_blank'>" . $entry['title'] . "</a></li>";
		echo "<p>" . $entry['site_title'] . "</p>";
		echo "<img src='" . $entry['image']  ."'>";
		echo '</ul>';
	}
}

?>

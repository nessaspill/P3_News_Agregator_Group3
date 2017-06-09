<?php
/**
 * demo_view.php along with demo_list.php provides a sample web application
 * 
 * @package nmListView
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.10 2012/02/28
 * @link http://www.newmanix.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see demo_list.php
 * @todo none
 */

# '../' works for a sub-folder.  use './' for the root  
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
 
# check variable of item passed in - if invalid data, forcibly redirect back to demo_list.php page
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{
	myRedirect(VIRTUAL_PATH . "p3/category_list.php");
}

//sql statement to select individual item
$sql = "select DateAdded,Link, CategoryID,Title,Description from feed_categories where CategoryID =" . $myID;
//---end config area --------------------------------------------------

$foundRecord = FALSE; # Will change to true, if record found!
   
# connection comes first in mysqli (improved) function
$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	   $foundRecord = TRUE;	
	   while ($row = mysqli_fetch_assoc($result))
	   {
			$Title = dbOut($row['Title']);
			$Description = dbOut($row['Description']);
			$Link = dbOut($row['Link']);
            $DateAdded = DATE('DateAdded');
	   }
}

@mysqli_free_result($result); # We're done with the data!

if($foundRecord)
{#only load data if record found
	$config->titleTag = $Title . " muffins made with PHP & love!"; #overwrite PageTitle with Muffin info!
//	#Fills <meta> tags.  Currently we're adding to the existing meta tags in config_inc.php
//	$config->metaDescription = $MetaDescription . ' Seattle Central\'s ITC280 Class Muffins are made with pure PHP! ' . $config->metaDescription;
//	$config->metaKeywords = $MetaKeywords . ',Muffins,PHP,Fun,Bran,Regular,Regular Expressions,'. $config->metaKeywords;
}
/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/
# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to theme header or header_inc.php

include'getfeed.php';
?>
<h3 align="center"><?=smartTitle();?></h3>



<?php
if($foundRecord)
{#records exist - show muffin!
?>
	<h3 align="center">Check Out The <?=$Title;?> Feed!</h3>
	<div align="center"><a href="<?=VIRTUAL_PATH;?>p3/category_list.php">More Feeds?!?</a></div>
	<table align="center">
		<tr>
			<td>We view fresh <?=$Title;?> feeds daily!</td>
		</tr>
		<tr>
			<td colspan="2">
                <div id="accordion">
				<blockquote><?=$Description;?></blockquote>
                </div>
			</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
               
				<blockquote>
                    
                    <div id="accordion">
                <?php getFeed($Link); ?>
                    </div>
                    </blockquote>
			</td>
		</tr>
	</table>
<?
}else{//no such muffin!
    echo '<div align="center">What! No such feed? There must be a mistake!!</div>';
    echo '<div align="center"><a href="' . VIRTUAL_PATH . 'p3/category_list.php">Another Feed?</a></div>';
}

get_footer(); #defaults to theme footer or footer_inc.php
?>

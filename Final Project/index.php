<?php
    /**
    * index.php along with category_view.php provides a sample web application
    *
    * @version 2.10 2017/06/13
    * @link http://nessaspillwebpages.com/itc250/projects/project3/mytest/P3_News/
    * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
    * @todo none
    * @author Erin, Frankie, Anna, Vanessa
    * 
    * @see category_view.php
    */
    // '../' works for a sub-folder.  use './' for the root
    require '../inc_0700/config_inc.php'; //provides configuration, pathing, error handling, db credentials

    // SQL statement
    $sql = "SELECT c.CategoryID, c.FeedID, c.Title FROM feed_categories c";
    //Fills <title> tag. If left empty will default to $PageTitle in config_inc.php
    $config->titleTag = 'Feeds made with love & PHP in Seattle';
    //Fills <meta> tags.  Currently we're adding to the existing meta tags in config_inc.php
    $config->metaDescription = 'Seattle Central\'s ITC250 Class Feeds are made with pure PHP! ' . $config->metaDescription;
    $config->metaKeywords = 'Muffins,PHP,Fun,Bran,Regular,Regular Expressions,'. $config->metaKeywords;
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
    // END CONFIG AREA ----------------------------------------------------------
    get_header(); //defaults to theme header or header_inc.php
?>
        <h3 align="center"><?php echo smartTitle();?></h3>


<?php
    // connection comes first in mysqli (improved) function

    $result = mysqli_query(IDB::conn(), $sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));
    if (mysqli_num_rows($result) > 0) 
    {//records exist - process
        while ($row = mysqli_fetch_assoc($result)) 
        {// process each row

            switch((int)$row['FeedID'])
            { 
                case 1:
                    echo'<div class="panel panel-success"                       style="width:50%;">';
                    echo '<div class="panel-heading">';
                    break;
                case 2:
                    echo'<div class="panel panel-info"                          style="width:50%;">';
                    echo '<div class="panel-heading">';
                    break;
                case 3:
                    echo'<div class="panel panel-warning"                       style="width:50%;">';
                    echo '<div class="panel-heading">';
                    break;
                default:
                    echo'<div data-id="' . $row['FeedID'] . '"><div>';
                    break;
            }
            echo '<div align="center"><a style="color: #ffffff; text-shadow: 1px 1px 1px #000;"                  href="' . VIRTUAL_PATH .                                  'P3_News/category_view.php?id=' .                              (int)$row['CategoryID'] . '">' .                          dbOut($row['Title']) . '</a>';

            echo '</div>';
            echo '</div>';#close panel heading
            echo '</div>';#close panel 
        }
    }
    else 
    {//no records
        echo "<div align=center>What! No feeds?  There must be a mistake!!</div>";
    }
    @mysqli_free_result($result);
    get_footer(); //defaults to theme footer or footer_inc.php
?>

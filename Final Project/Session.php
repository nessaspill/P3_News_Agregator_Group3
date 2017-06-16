<?php
/**
    * category_view.php along with index.php provides a sample web application
    *
    * @version 2.10 2017/06/13
    * @link http://nessaspillwebpages.com/itc250/projects/project3/mytest/P3_News/
    * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
    * @todo none
    * @author Erin, Anna, Frankie, Vanessa
    * 
    * 
    */


//start of Session---------------------------------------------------
 if(!isset($_SESSION)){session_start();}
    //2) store Session in an array
    if(!isset($_SESSION['Session']))
    {//1) if session var does not exist, create it!
        $_SESSION['Session'] = array();
    }
date_default_timezone_set('America/Los_Angeles');
$time = date("m/d/y h:i:sa");
$_SESSION['Session'][] = new Session($response, $time);
//if there is no session time set, set it. 
if (array_key_exists($request,$_SESSION['Session']) == FALSE
    || strtotime($time) - strtotime($_SESSION['Session'][$request][1]) >= 600)#10 minutes
{
    $response = file_get_contents($request);
    $_SESSION['Session'][$request] = array($response, $time); 
}
else if(isset($_POST['clearFeed']))
{
    echo "<h4>reloaded after clearing cache</h4>";
    
}else if (isset($_POST['clearAll'])) {
    echo "<h4>All Feeds are cleared</h4>";
    
}

echo '<h2>Feeds refreshed every 10 minutes. Last refreshed at: ' .  $_SESSION['Session'][$request][1] . '</h2>';
//end of Session---------------------------------------------------
//Session class-----------------------------------
class Session 
{
    public $url = '';
    public $session_time = '';
    
    function __construct($url, $session_time)
    {
        $this->url = $url;
        $this->session_time = $session_time;
    }
}
//End of session class-----------------------------------------------

?>
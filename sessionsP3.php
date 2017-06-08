    //prevents warning notices if session is already started **aDDED
if(!isset($_SESSION)){session_start();}

//1) check if session exists, if not, start new ** Added
if(!isset($_SESSION['BallPlayers'])

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
    //$response = file_get_contents($request);
    $_SESSION['Session'][$request] = array($response, $time); 
}
/*else if(isset($_POST['clearFeed']))
{
    echo "<h4>reloaded after clearing cache</h4>";
    
}else if (isset($_POST['clearAll'])) {
    echo "<h4>All Feeds are cleared</h4>";
    
}
*/
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
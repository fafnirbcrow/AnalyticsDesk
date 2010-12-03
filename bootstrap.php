<?PHP
//config holds all information for Oauth and DB config
session_start();
include 'config.php';
require_once 'logger.class.php';
require_once '../PEAR/MDB2.php';

$db =& MDB2::singleton($dsn);
require_once 'twitter-async/EpiCurl.php';
require_once 'twitter-async/EpiOAuth.php';
require_once 'twitter-async/EpiTwitter.php';


if($_COOKIE['oauth_token_secret'] && $_COOKIE['oauth_token'])
{
$twitter_connected = true;
}

require_once 'twitter_data.class.php';

?>

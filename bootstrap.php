<?PHP
//config holds all information for Oauth and DB config
session_start();
include 'config.php';
require_once 'logger.class.php';
require_once '../PEAR/MDB2.php';

require_once 'twitter-async/EpiCurl.php';
require_once 'twitter-async/EpiOAuth.php';
require_once 'twitter-async/EpiTwitter.php';
if($_COOKIE['oauth_token_secret'] && $_COOKIE['ouath_token'])
{
$twitterObj = new EpiTwitter($twitter_consumer_key, $twitter_consumer_secret,
    $_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);
}
?>

<?PHP

require_once 'bootstrap.php';

$twitterObj = new EpiTwitter($twitter_consumer_key, $twitter_consumer_secret);
echo '<a href="' . $twitterObj->getAuthenticateUrl() . '">Authorize with Twitter</a>';

?>

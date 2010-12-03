<?PHP

require_once 'bootstrap.php';
if(!$twitterObj)
{
	$twitterObj = new EpiTwitter($twitter_consumer_key, $twitter_consumer_secret);
//echo '<a href="' . $twitterObj->getAuthenticateUrl() . '">Authorize with Twitter</a>';
header('Location: '. $twitterObj->getAuthenticateUrl());
}
else
{
header('Location: twiter-callback.php');
}
?>

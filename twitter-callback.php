<?PHP
require_once 'bootstrap.php';

$twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

$twitterObj->setToken($_GET['oauth_token']);
$token = $twitterObj->getAccessToken();
$twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);
setcookie('oauth_token', $token->oauth_token);
setcookie('oauth_token_secret', $token->oauth_token_secret);

?>

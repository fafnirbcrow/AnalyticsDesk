<?PHP

require_once 'bootstrap.php';

/* twitter_data.class.php
 * @author fafnir crow
 * @email fafnir.crow@gmail.com
 *
 * This is the object that will handle the collection and storage of twitter data
 * TODO: Move twitter login work to this class
 */

class twitter_data
{
	function twitter_data()
	{
		include 'config.php';
		$this->api = $twitterObj = new EpiTwitter($twitter_consumer_key, $twitter_consumer_secret, $_COOKIE['oauth_token'], $_COOKIE['oauth_token_secret']);
		$this->dbh =& MDB2::singleton($dsn);
		$this->dbh->setFetchMode(MDB2_FETCHMODE_ASSOC);
	}

	function get_account_credentials()
	{
		$creds = $this->api->get('/account/verify_credentials.json');
		$this->screen_name = $creds->screen_name;
		$this->followers_count = $creds->followers_count;
		$this->store_followers($this->followers_count);
	}
	function store_followers($follower_count)
	{
		$query = "INSERT INTO twitter_user_data SET";
		$query .= " screen_name='".$this->screen_name."', ";
		$query .= " followers_count='".$this->followers_count."'";
		$this->dbh->exec($query);
	}
	function get_follower_history()
	{
		$query = "SELECT * FROM twitter_user_data WHERE screen_name ='" .$this->screen_name."'";
		$results = $this->dbh->query($query);
		if(PEAR::isError($results))
		{
			$info = false;
		}
		else
		{
			while($row = $results->fetchRow())
			{
				$info[] = $row;
			}
		}
		return $info;
	}
	
}
?>

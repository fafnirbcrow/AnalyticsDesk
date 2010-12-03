<?PHP
require_once 'bootstrap.php';
if(!$twitter_connected)
{
print '<a href="twitter-login.php"> Twitter Login </a>';
}
else
{
print 'Logged in <br />';
}
?>


<?PHP
if($twitter_connected)
{
	$twitter_collector = new twitter_data();
	$twitter_collector->get_account_credentials();
	$follower_records = $twitter_collector->get_follower_history();
}
if($follower_records)
{
	print "<table>";
	foreach($follower_records as $follower_data)
	{
		print "<tr>";
		print "<td>";
		print $follower_data['screen_name'];
		print "</td>";
		print "<td>";
		print $follower_data['followers_count'];
		print "</td>";
		print "<td>";
		print $follower_data['created_at'];
		print "</td>";
		print "</tr>";
	}
	print "</table>";
}

?>

<?PHP

/* logger.class.php
 * @author fafnir crow
 * @email fafnir.crow@gmail.com
 *
 * Simple logger class to handle basic error/file logging. Need to add error levels, as well as more complete controls
 */

class logger
{
	var $log_file ="logging";
	var $error_logger = true;
	var $file_logger = true;
	private static $instance;
	function logger()
	{
	}
	
	function log_item($logged_item)
	{
		$output = $logged_item;
		if($this->backtrace)
		{
		$output .= print_r(debug_backtrace(),1);
		}
		
		$this->write_log($output);
	}
	private function write_log($string)
	{
		if($this->error_logger)
		{
			error_log($string);
		}
		if($this->file_logger)
		{
			if (!file_exists($this->log_file)) {
        			$logFile = fopen($this->log_file,"w");
    			}
    			else {
        			$logFile = fopen($this->log_file,"a");
    			}
			//error checking the logFile errorlogging
			//its kinda recursive I know...
			if($logFile)
			{
        			fwrite($logFile,print_r($this,1). "\n");
    				fwrite($logFile,$query. "\n");
    				fclose($logFile);
			}
			else
			{
				error_log('We cant write to the log file, this may be a FATAL ERROR, or possibly lead to one. Have you hugged your backup today?');
			}
		}
		if($this->remote)
		{
			//make call to remote server
		}
	}
	// allows for single instance of error_logger, that way you dont accidently 'reset' vaules in a local version
	static public function get_instance()
	{
		if(!isset(self::$instance))
		{
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}
}
?>

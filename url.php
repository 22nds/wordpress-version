<?php
      
// set feedback message variable
$html = "";

/* WAS URL SUBMITTED? does it have url appended to the URL */
if (isset($_GET['url'])) {
    
// Save the url in $input
$input = htmlspecialchars($_GET['url']);
// echo "input: " . $input . "<br /> ";

// If http not included, prepend it
if (!preg_match('#^http(s)?://#', $input)) {
    $input = 'http://' . $input;
}
// echo "input with http: " . $input . "<br /> ";

// Remove slashes at the beginning and the end of the URL, e.g., //www.google.com/
$input = trim($input, '/');
// echo "input without slashes: " . $input . "<br /> ";

// parse url and return associative array of its components: scheme=http, host=hostname, path=/path, query = arg=value
$urlParts = parse_url($input);

// print_r($urlParts); 
// echo "<br /> ";
    // $domain = $urlParts['host'];

// remove www
$domain = preg_replace('/^www\./', '', $urlParts['host']);
// echo "domain: " . $domain . "<br /> ";

    
/* If there is a folder where blog was installed save the path, then set the URL of the feed and if the xml file is not loaded check if wordpress has permalinks disabled and try to get the XML file again */
    
	if (isset($urlParts['path'])) {
		$path = $urlParts['path'];
		
		/* SET THE URL OF THE RSS FEED */
		$wpRSS = "http://www." . $domain . $path . "/feed/";
		
		/* load the RSS feed in an object if the feed exists and suppres possible errors if feed doesn't exist */
		$xml = @simplexml_load_file($wpRSS);
		
		/* if the object was not created try a different link */
			 if (!$xml) {
				$wpRSS = "http://www." . $domain . $path ."/?feed=rss2";
				
				$xml = @simplexml_load_file($wpRSS);
			 }
		
		/* Get the generator node from the XML i.e. the url with the version http://wordpress.org/?v=3.6  */
		$generator = $xml->channel->generator;
		//  echo $generator;    
		
	} else {
		/* If the web page doesn't have the path use only the domain */
		
		/* SET THE URL OF THE RSS FEED */
		$wpRSS = "http://www." . $domain ."/feed/";
		
		/* load the RSS feed in an object if the feed exists and suppres possible errors if feed doesn't exist */
		$xml = @simplexml_load_file($wpRSS);
		
		/* if the object was not created try a different link */
			if (!$xml) {
				$wpRSS = "http://www." . $domain ."/?feed=rss2";
			
				$xml = @simplexml_load_file($wpRSS);
			 }
		/* Get the generator node form the XML i.e. the url http://wordpress.org/?v=3.6  */
		$generator = $xml->channel->generator;
		// echo $generator;
	}  
?>
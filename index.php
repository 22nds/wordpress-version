<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en" ><!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Search for WordPress version</title>
<meta name="fb:admins" content="701068550"/>
<meta name="fb:app_id" content="119469354894717"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="WordPress version search"/>
<meta property="og:url" content="http://princessdesign.net/fbtab/wordpress-verzija/"/>
<meta property="og:image" content="img/WP-version.png"/>
<meta property="og:site_name" content="WordPress version search"/>
<meta property="og:description" content="Find your WordPress version. Enter the URL and get the version of the WordPress on your web page.">
<meta name="twitter:card" content="summary"/>
<meta name="robots" content="index, follow, noodp">
<meta name="author" content="Princessdesign, Ltd.">

<?php include 'versions.php'; ?>


<link rel="stylesheet" type="text/css" media="all" href="style.css" />
<?php
// LADDA STYLES AND JS
// <link rel="stylesheet" type="text/css" media="all" href="css/ladda-themeless.min.css" />
?>
	<link rel="stylesheet" type="text/css" media="all" href="css/ladda.min.css" />
	<?php // Typekit fonts ?>
	<script type="text/javascript" src="//use.typekit.net/wvy2xfm.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>


<body style="width:auto;">
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
// $domain = $urlParts['host'];
    
/* If there is a folder where blog was installed save the path, then set the URL of the feed and if the xml file is not loaded check if wordpress has permalinks disabled and try to get the XML file again */
    
if (isset($urlParts['path'])) {
	// Remove preceeding slash / and save the path
	$path = ltrim($urlParts['path'], '/');
	// add a slash at the end of the path
	$path .= "/";
}	

/* Set the possible locations of the RSS FEED */
$wpRSSSource = array (
	"http://" . $domain . "/" . $path . "feed/",
	"http://www." . $domain . "/" . $path ."feed/",
	"http://" . $domain . "/" . $path ."?feed=rss2",
	"http://www." . $domain . "/" . $path ."?feed=rss2",
	"http://www." . $domain . "/" . $path ."index.php/feed/",
	"http://" . $domain . "/" . $path ."index.php/feed/"
);
		
// set the counter to go through array of RSS feed locations 		
$i=0;

// Check which RSS feed is available
while (!$xml AND $i < count($wpRSSSource)){
	// set the source of the feed
	$wpRSS = $wpRSSSource[$i];
	// cULR
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $wpRSS);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$file = curl_exec($curl);
	curl_close($curl);
	// load the feed in an object if the feed exists and suppres possible errors if feed doesn't exist
	$xml = @simplexml_load_string($file);
	//echo $i;
	//print_r($xml);
	$i++;
} 

if ($xml) {
			/* Get the generator node from the XML i.e. the url with the version http://wordpress.org/?v=3.6  */
		$generator = $xml->channel->generator;
		//  echo $generator;
		if ($generator) {
		/* If RSS feed was found get the version number out of the generator string  e.g. 3.7 */        
        $version = str_replace('http://wordpress.org/?v=', '', $generator);
        // echo $version;
		} 
} 

if (!$generator OR !$version) {
		
	$wpReadmeSource = array (
	"http://" . $domain . "/" . $path . "readme.html",
	"http://www." . $domain . "/" . $path ."readme.html",
	);
		
	$j=0;
	
	while (!$version AND $j < count($wpReadmeSource)){
		$wpReadme = $wpReadmeSource[$j];
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $wpReadme);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$file = curl_exec($curl);
		curl_close($curl);
		//$xml = @simplexml_load_string($file);
	//echo $j;
	//echo $wpReadme;
	//print_r($file);
	//print_r($xml);
	
	$reader = new XMLReader;
	$reader->xml($file);
		while(@$reader->read() !== FALSE) {
			if($reader->name === 'h1' && $reader->getAttribute('id') && $reader->nodeType === XMLReader::ELEMENT) {
			$version = $reader->readString();	
			}
		}
	$j++;
	}
}
			
if (!$version) {
   	
	// generator meta tag
$wpMeta = array (
"http://" . $domain . "/" . $path,
"http://www." . $domain . "/" . $path
);

$j=0;

			while (!$file AND $j < count($wpMeta)){
			$wpReadme = $wpMeta[$j];
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $wpReadme);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				$file = curl_exec($curl);
				curl_close($curl);
			
				$reader = new XMLReader;
				@$reader->xml($file);
				
				while(@$reader->read() !== FALSE) {
					if($reader->name === 'meta' && $reader->getAttribute('name') == "generator" && $reader->nodeType === XMLReader::ELEMENT) {
						$version = $reader->getAttribute('content');
						//echo $version;
					}
				}
			$j++;
			}
	
	
   }

   if (!$version) {
         
		/* If RSS feed wasn't found display a message in English */
		
		$html .= "<div class='row collapse'><div class='small-9 large-6 small-centered columns text-center'>";
		
                
                $html .= "<div class='panel'><p><strong>We are sorry, Wordpress version is not available.</strong></p><p><small>There are several reasons: web page might not be using Wordpress, maybe Wordpress is not configured properly, perhaps the URL you have entered has a typing error or the version information is well hidden.</small><p>";
                $html .= "<p >For more information you can contact us at <strong><a href='mailto:digital@princessdesign.net'>digital@princessdesign.net</a></strong></p>";
                

         
		$html .= "</div></div></div>";
         
    } else {


   getVersionDate($version);
   
   

    // Set alert string 
    $alert = "";

         /* If the version of the web site is the latest display a notification in Slo and Eng */
         if($version == $latestVersion) {
            $alert .= "<div data-alert class='alert-box success'>Update is not needed.</div>";
            
        /* Else if the version of the web site is old display a notification about the upgrade */
         } elseif($version < $latestVersion) {
            $alert .= "<div data-alert class='alert-box alert'>Update is needed!</div>";	
         }

/* Start building the string for notification about the version */
         
		$html .= "<div class='large-12 columns text-center'>";
        $html .= "<p><strong>";
/* domain.com */
        $html .=  $domain;
/* is using */		

                $html .=  "</strong><br /><small>is using ";
		
/* the latest or old version of Wordpress */
		if($version == $latestVersion) {

                $html .= "the latest Wordpress version ";
		
		} elseif($version < $latestVersion) {
                $html .= "an old Wordpress version ";
		}
/* Echo the version number */         
            $html .=  $version; 
/* If date is set, echo the date */
         if(isset($version)) {   
            $html .= " (";
            $html .= getVersionDate($version);
            $html .= ").";            
        }

			$html .= "</small></p>";
			$html .= "</div>";

	} /* end of if $xml is set */
} /* end of if GET is set */
?>

<div class="large-centered">

    
	<div class="row">
		<div class="small-8 small-centered columns columns">
			<h1 class="text-center">Find out the version of your Wordpress</h1>
		</div>
	</div>
    
	<div class="row">
		<div class="small-12 columns">
            <p class="text-center">Enter the URL in the search field and you will find out if you need to upgrade your website!</p> 
			<div class="small-12 small-centered large-9 columns text-center">

				<form action="https://princessdesign.net/fbtab/wordpress-verzija/" target="_self" method="get">
				    <input type="hidden" name="lang" value="en">
					<div class="row collapse">
						<div class="small-12 large-8 small-centered columns">
							<div class="small-3 large-2 columns">
							<span class="prefix">http://</span></div>
							<div class="small-9 large-10 columns">
							<input name="url" id="submit" maxlength="255" type="text" placeholder="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="small-6 small-centered columns">
							
						<button class="ladda ladda-button" data-color="red" data-style="contract" style="z-index: 1000;"><span class="ladda-label">Check</span><span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>

						</div>
					</div>
				</form>
                
			</div>
		</div>
	</div>
    
	<div class="row">
		<div class="small-10 small-centered large-6 large-centered columns text-center">
			<?php echo $alert; ?>
		</div>	
		<?php echo $html; ?>
		<?php /* center the like button */ ?>
		<div style="text-align:center;width:100%;">
			<div class="fb-like-box" data-href="https://www.facebook.com/princessdesignnet" data-width="200" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
		</div>
	</div>
	
	<div class="row">
		<div class="small-12 small-centered columns text-center">
				<p>
					<small>
						Powered by:
                        <strong>
                            <a target='_blank' href='http://www.princessdesign.net/en/'>Princessdesign, digital communications, Ltd.</a>
                        </strong>
					</small>
				</p>
		</div>
	</div>
</div>

<div>


<!-- TROUBLESHOOTING VARIABLS
<?php
    //echo "WPRSS: ";
    //print_r($wpRSS);
    //echo "FILE: ";
    //print_r($file);
    //echo "XML: ";
    //print_r($xml);
    //echo "GENERATOR: ";
    //echo $generator;
    //echo "Version: ";
    //echo $version;
    //echo $j;
    //echo "WP readme: ";
    //echo $wpReadme;
    //print_r($file);
    //print_r($xml);
    //echo "READER: ";
    //echo $reader->readString();
?>
-->


</div>

    <script src="js/ladda/spin.min.js"></script>
    <script src="js/ladda/ladda.min.js"></script>
    <script>
    // Ladda Button Bind
    Ladda.bind( 'button.ladda', { timeout: 2044444400 } );
    </script>
</body>
</html>
<?php
 
// UPDATE - Set the latest version         
    $latestVersion = "4.5.2";
 
// Set the version release dates from http://codex.wordpress.org/WordPress_Versions
// UPDATE - add a new version when it becomes available
    
function getVersionDate($version) {    
    
    switch ($version) {
        case "4.5.2":
          $date = "May 6, 2016";
          break;
        case "4.5.1":
          $date = "April 26, 2016";
          break;
        case "4.5":
          $date = "April 12, 2016";
          break;
        case "4.4.3":
          $date = "May 6, 2016";
          break;
        case "4.4.2":
          $date = "February 2, 2016";
          break;
        case "4.4.1":
          $date = "January 6, 2016";
          break;
        case "4.4":
          $date = "December 8, 2015";
          break;
        case "4.3.4":
          $date = "May 6, 2016";
          break;
        case "4.3.3":
          $date = "February 2, 2016";
          break;
        case "4.3.2":
          $date = "January 6, 2016";
          break;
        case "4.3.1":
          $date = "September 15, 2015";
          break;
        case "4.3":
          $date = "August 18, 2015";
          break;
        case "4.2.8":
          $date = "May 6, 2016";
          break;
        case "4.2.7":
          $date = "February 2, 2016";
          break;
        case "4.2.6":
          $date = "January 6, 2016";
          break;
        case "4.2.5":
          $date = "September 15, 2015";
          break;
        case "4.2.4":
          $date = "August 4, 2015";
          break;
        case "4.2.3":
          $date = "July 23, 2015";
          break;
        case "4.2.2":
          $date = "May 7, 2015";
          break;
        case "4.2.1":
          $date = "April 27, 2015";
          break;
        case "4.2":
          $date = "April 23, 2015";
          break;
        case "4.1.11":
          $date = "May 6, 2016";
          break;
        case "4.1.10":
          $date = "February 2, 2016";
          break;
        case "4.1.9":
          $date = "January 6, 2016";
          break;
        case "4.1.8":
          $date = "September 15, 2015";
          break;
        case "4.1.7":
          $date = "August 4, 2015";
          break;
        case "4.1.6":
          $date = "July 23, 2015";
          break; 
        case "4.1.5":
          $date = "May 7, 2015";
          break;
        case "4.1.4":
          $date = "April 27, 2015";
          break;
        case "4.1.3":
          $date = "April 23, 2015";
          break;
        case "4.1.2":
          $date = "April 21, 2015";
          break;          
        case "4.1.1":
          $date = "February 18, 2015";
          break;
    	case "4.1":
          $date = "December 17, 2014";
          break;
        case "4.0.11":
          $date = "May 6, 2016";
          break;
        case "4.0.10":
          $date = "February 2, 2016";
          break;
        case "4.0.9":
          $date = "January 6, 2016";
          break;
        case "4.0.8":
          $date = "September 15, 2015";
          break;
        case "4.0.7":
          $date = "August 4, 2015";
          break;
        case "4.0.6":
          $date = "July 23, 2015";
          break;
        case "4.0.5":
          $date = "May 7, 2015";
          break;
        case "4.0.4":
          $date = "April 27, 2015";
          break;
        case "4.0.3":
          $date = "April 23, 2015";
          break;
        case "4.0.2":
          $date = "April 21, 2015";
          break;
        case "4.0.1":
          $date = "November 20, 2014";
          break;    	
    	case "4.0":
          $date = "September 4, 2014";
          break;
        case "3.9.12":
          $date = "May 6, 2016";
          break;
        case "3.9.11":
          $date = "February 2, 2016";
          break;
        case "3.9.10":
          $date = "January 6, 2016";
          break;
        case "3.9.9":
          $date = "September 15, 2015";
          break;
        case "3.9.8":
          $date = "August 4, 2015";
          break;
        case "3.9.7":
          $date = "July 23, 2015";
          break;
		case "3.9.6":
		  $date = "May 7, 2015";
          break;      
    	case "3.9.5":
		  $date = "April 23, 2015";
          break;      
    	case "3.9.4":
		  $date = "April 21, 2015";
          break;      
    	case "3.9.3":
		  $date = "November 20, 2014";
          break;      
    	case "3.9.2":
          $date = "August 6, 2014";
          break;
    	case "3.9.1":
          $date = "May 8, 2014";
          break;
		case "3.9":
          $date = "April 16, 2014";
          break;
        case "3.8.14":
          $date = "May 6, 2016";
          break;
        case "3.8.13":
          $date = "February 2, 2016";
          break;
        case "3.8.12":
          $date = "January 6, 2015";
          break;
        case "3.8.11":
          $date = "September 15, 2015";
          break;
        case "3.8.10":
          $date = "August 4, 2015";
          break;
        case "3.8.9":
          $date = "July 23, 2015";
          break;
        case "3.8.8":
		  $date = "May 7, 2015";
          break;
        case "3.8.7":
		  $date = "April 23, 2015";
          break;
		case "3.8.6":
		  $date = "April 21, 2015";
          break;
        case "3.8.5":
		  $date = "November 20, 2014";
          break;  
		case "3.8.4":
          $date = "August 6, 2014";
          break;
		case "3.8.3":
          $date = "April 14, 2014";
          break;
		case "3.8.2":
          $date = "April 8, 2014";
          break;
		case "3.8.1":
          $date = "January 23, 2014";
          break;
	    case "3.8":
          $date = "December 12, 2013";
          break;
        case "3.7.14":
          $date = "May 6, 2016";
          break;
        case "3.7.13":
          $date = "February 2, 2016";
          break;
        case "3.7.12":
          $date = "January 6, 2016";
          break;
        case "3.7.11":
          $date = "September 15, 2015";
          break;
        case "3.7.10":
          $date = "August 4, 2015";
          break;
        case "3.7.9":
          $date = "July 23, 2015";
          break;
        case "3.7.8":
		  $date = "May 7, 2015";
          break;
		case "3.7.7":
		  $date = "April 23, 2015";
          break;
        case "3.7.6":
		  $date = "April 21, 2015";
          break;
        case "3.7.5":
		  $date = "November 20, 2014";
          break;  
		case "3.7.4":
          $date = "August 6, 2014";
          break;
    	case "3.7.3":
          $date = "April 14, 2014";
          break;		  
    	case "3.7.2":
          $date = "April 8, 2014";
          break;
    	case "3.7.1":
          $date = "October 29, 2013";
          break;
    	case "3.7":
          $date = "October 24, 2013";
          break;
        case "3.6.1":
          $date = "September 11, 2013";
          break;
        case "3.6":
          $date = "August 1, 2013";
          break;
        case "3.5.2":
          $date = "June 21, 2013";
          break;
        case "3.5.1":
          $date = "January 24, 2013";
          break;
        case "3.5":
          $date = "December 11, 2012";
          break;
        case "3.4.2":
          $date = "September 6, 2012";
          break;    
        case "3.4.1":
          $date = "June 27, 2012";
          break;
        case "3.4":
          $date = "June 13, 2012";
          break;
        case "3.3.3":
          $date = "June 27, 2012";
          break;
        case "3.3.2":
          $date = "April 20, 2012";
          break;
        case "3.3.1":
          $date = "January 3, 2012";
          break;
        case "3.3":
          $date = "December 12, 2011";
          break;    
        case "3.2.1":
          $date = "July 12, 2011";
          break;    
        case "3.2":
          $date = "July 4, 2011";
          break;
        case "3.1.4":
          $date = "June 29, 2011";
          break;
        case "3.1.3":
          $date = "May 25, 2011";
          break;
        case "3.1.2":
          $date = "April 26, 2011";
          break;
        case "3.1.1":
          $date = "April 5, 2011";
          break;
        case "3.1":
          $date = "February 23, 2011";
          break; 
        case "3.0.6":
          $date = "April 26, 2011";
          break;    
        case "3.0.5":
          $date = "February 7, 2011";
          break;
        case "3.0.4":
          $date = "December 29, 2010";
          break;
        case "3.0.3":
          $date = "December 8, 2010";
          break;
        case "3.0.2":
          $date = "November 30, 2010";
          break;
        case "3.0.1":
          $date = "July 29, 2010";
          break;
        case "3.0":
          $date = "June 17, 2010";
          break; 
        case "2.9.2":
          $date = "February 15, 2010";
          break;    
        case "2.9.1":
          $date = "January 4, 2010";
          break;
        case "2.9":
          $date = "December 18, 2009";
          break;
        case "2.8.6":
          $date = "November 12, 2009";
          break;
        case "2.8.5":
          $date = "October 20, 2009";
          break;
        case "2.8.4":
          $date = "August 12, 2009";
          break;
        case "2.8.3":
          $date = "August 3, 2009";
          break; 
        case "2.8.2":
          $date = "July 20, 2009";
          break;    
        case "2.8.1":
          $date = "July 9, 2009";
          break;
        case "2.8":
          $date = "June 10, 2009";
          break;
        case "2.7.1":
          $date = "February 10, 2009";
          break;
        case "2.7":
          $date = "December 10, 2008";
          break;
        case "2.6.5":
          $date = "November 25, 2008";
          break;
        case "2.6.3":
          $date = "October 23, 2008";
          break; 
        case "2.6.2":
          $date = "September 8, 2008";
          break;
        case "2.6.1":
          $date = "August 15, 2008";
          break;
        case "2.6":
          $date = "July 15, 2008";
          break; 
        case "2.5.1":
          $date = "April 25, 2008";
          break;
        case "2.5":
          $date = "March 29, 2008";
          break;
        case "2.3.3":
          $date = "February 5, 2008";
          break; 
        case "2.3.2":
          $date = "December 29, 2007";
          break;
        case "2.3.1":
          $date = "October 26, 2007";
          break;
        case "2.3":
          $date = "September 24, 2007";
          break; 
        case "2.2.3":
          $date = "September 8, 2007";
          break;
        case "2.2.2":
          $date = "August 5, 2007";
          break;
        case "2.2.1":
          $date = "June 21, 2007";
          break; 
        case "2.2":
          $date = "May 16, 2007";
          break;
        case "2.1.3":
          $date = "April 3, 2007";
          break;
        case "2.1.2":
          $date = "March 2, 2007";
          break; 
        case "2.1.1":
          $date = "February 21, 2007";
          break;
        case "2.1":
          $date = "January 22, 2007";
          break;
        case "2.0.11":
          $date = "August 5, 2007";
          break;
        case "2.0.10":
          $date = "April 3, 2007";
          break;
        case "2.0.9":
          $date = "February 21, 2007";
          break; 
        case "2.0.8":
          $date = "February 8, 2007";
          break;
        case "2.0.7":
          $date = "January 15, 2007";
          break;
        case "2.0.6":
          $date = "January 5, 2007";
          break; 
        case "2.0.5":
          $date = "October 27, 2006";
          break;
        case "2.0.4":
          $date = "July 29, 2006";
          break; 
        case "2.0.3":
          $date = "June 1, 2006";
          break;
        case "2.0.2":
          $date = "March 10, 2006";
          break;
        case "2.0.1":
          $date = "January 31, 2006";
          break; 
        case "2.0":
          $date = "December 26, 2005";
          break;
        case "1.5.2":
          $date = "August 14, 2005";
          break; 
        case "1.5.1.3":
          $date = "June 29, 2005";
          break;
        case "1.5.1.2":
          $date = "May 27, 2005";
          break;
        case "1.5.1":
          $date = "May 9, 2005";
          break; 
        case "1.5":
          $date = "February 17, 2005";
          break;
        case "1.2.2":
          $date = "December 15, 2004";
          break; 
        case "1.2.1":
          $date = "October 6, 2004";
          break;
        case "1.2":
          $date = "May 22, 2004";
          break;
        case "1.0.2":
          $date = "March 11, 2004";
          break; 
        case "1.0.1":
          $date = "January 25, 2004";
          break;
        case "1.0":
          $date = "January 3, 2004";
          break; 
        case "0.72":
          $date = "October 11, 2003";
          break;
        case "0.711":
          $date = "June 25, 2003";
          break;
        case "0.71":
          $date = "June 9, 2003";
          break; 
        case "0.70":
          $date = "May 27, 2003";
          break;
		default:
		  $date = "Unknown release date";
        };
        
		return $date;
}      
?>
<?php

// require_once('SalesForceLibrary/soapclient/SforceEnterpriseClient.php');
// include_once('classes/config.php');
// include_once('classes/salesforce.php');
// include_once('classes/salesOrder.php');

//Salesforce Variables
// $SFProperty="a083x00001CcI1r"; //salesforce property id
// $SFSalesRepID="00530000004sSao"; //salesrep id
// $SFPublisherID="a073x000013W4dj"; //salesforce publisher id

//form variables
$FirstName = $_POST["FirstName"];
$LastName= $_POST["LastName"];
$CompanyName= $_POST["Company"];
$PhoneNumber= $_POST["Phone"];
$EmailAddress= $_POST["Email"];
$ArticleVideoName= $_POST["ArticleName"];
$ArticleVideoURL= $_POST["ArticleURL"];
//$ArticleVideoPubDate= date('Y-m-d\TH:i:sP', strtotime($_POST["article_video_pub_date"]));
$ArticleVideoPubDate= $_POST["ArticleDate"];
$HowWouldYouLikeToUse= $_POST["HowWouldYouUse"];

//return url provided by the form
$redirectURL = $_POST["retURL"];

header("Location: ".$redirectURL);

/* Talk to sf */
// $salesforce = new SalesForce($SFSalesRepID);

// var_dump($salesforce);
// die();

// Create contact
// $salesforce->createContact($FirstName,$LastName,$PhoneNumber,$EmailAddress,$SFSalesRepID);

// Create lead
// $salesforce->createLead($ArticleVideoName,$ArticleVideoURL,$HowWouldYouLikeToUse,$CompanyName,$FirstName,$LastName,$PhoneNumber,$EmailAddress,$ArticleVideoPubDate,$SFSalesRepID,$SFPublisherID);

$to = "scott.johnson@theygsgroup.com";
$headers = "From: breakingmedia@theygsgroup.com \r\n";
$email_subject = "Breaking Media form submission";
$email_body = "You have received a form submission from Breaking Media.\r\n";
$email_body .= "\r\n Name: {$FirstName} {$LastName}\r\n";
$email_body .= "Company: {$CompanyName} \r\n"; 
$email_body .= "Phone: {$PhoneNumber} \r\n"; 
$email_body .= "User Email: {$EmailAddress} \r\n"; 
$email_body .= "Article Video Name: {$ArticleVideoName} \r\n"; 
$email_body .= "Video URL: {$ArticleVideoURL} \r\n"; 
$email_body .= "Video Publish Date: {$ArticleVideoPubDate} \r\n"; 
$email_body .= "How would you use it: {$HowWouldYouLikeToUse} \r\n"; 

mail($to, $email_subject, $email_body, $headers);

?>

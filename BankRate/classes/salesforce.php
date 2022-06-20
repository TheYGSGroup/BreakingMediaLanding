<?php

class SalesForce
{
    public $NewContactID;

    public function __construct($SFSalesRepID)
    {
        $this->accountOwnerId = $SFSalesRepID;
        $this->login();
    }

    public function login()
    {
        $this->mySforceConnection = new SforceEnterpriseClient();
        $this->mySforceConnection->createConnection("./SalesForceLibrary/soapclient/enterprise.wsdl.xml");
        $this->mySforceConnection->login(USERNAME, PASSWORD . SECURITY_TOKEN);
    }

    function createLead($ArticleVideoName,$ArticleVideoURL,$HowWouldYouLikeToUse,$CompanyName,$FirstName,$LastName,$PhoneNumber,$EmailAddress,$ArticleVideoPubDate,$SFSalesRepID,$SFPublisherID)
    {
        $newLead = array();
        $newLead[0] = new stdclass();
        $newLead[0]->FirstName = $FirstName;
        $newLead[0]->LastName = $LastName;
        $newLead[0]->Phone = $PhoneNumber;
        $newLead[0]->Email = $EmailAddress;
        $newLead[0]->Company = $CompanyName;
        $newLead[0]->OwnerId = $SFSalesRepID;
        $newLead[0]->Article__c = $ArticleVideoName;
        $newLead[0]->Article_URL__c = $ArticleVideoURL;
        $newLead[0]->Comments__c = "Article/Video Published Date: ".$ArticleVideoPubDate."\n\r"."Landing Page URL: ".$_SERVER['HTTP_HOST']."/Bankrate";
        $newLead[0]->Description = $HowWouldYouLikeToUse;
        $newLead[0]->LeadSource = "Permissions Webform";
        $newLead[0]->Publisher__c = $SFPublisherID;
        $newLead[0]->Property__c = "a083x00001CGMyCAAX";

        global $NewContactID;
        $newLead[0]->Contact__c = $NewContactID;

        $response = $this->mySforceConnection->create($newLead, 'Lead');
        var_dump($response);
        var_dump($NewContactID);
        die();
        if (isset($response[0]->id)) {
            $this->quoteId = $response[0]->id;
        }
    }

    function createContact($FirstName,$LastName,$PhoneNumber,$EmailAddress,$SFSalesRepID)
    {
        $contact[0] = new stdclass();
        $contact[0]->FirstName = $FirstName;
        $contact[0]->LastName = $LastName;
        $contact[0]->Phone = $PhoneNumber;
        $contact[0]->Email = $EmailAddress;
        $contact[0]->OwnerId = $SFSalesRepID;

        $response = $this->mySforceConnection->create($contact, 'Contact');
        if (isset($response[0]->id)) {
            $this->contactId = $response[0]->id;
            global $NewContactID;
            $NewContactID = $response[0]->id;
        }
    }
}

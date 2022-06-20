<?php

class salesOrder
{
    public $mySforceConnection;
    public $fieldArray;

    public function __construct($productName, $email, $shippingService, $phone_number, $article)
    {
        $this->fieldArray = array(
            "Company_Name" => "",
            "Contact_Name" => "",
            "Rank" => 0,
            "Year" => date('Y'),
            "Award_Style" => "",
            "Article_Title" => $article,
            "Award_List" => "",
            "Sector" => "",
            "Award Name" => "",
            "Award City" => "",
            "Project_Name" => "",
            "Comments" => "",
            "Email" => $email,
            "Shipping Service" => $shippingService,
            "Phone Number" => $phone_number,
        );
    }

    public function addFieldsToSalesOrder($salesOrderID, $opportunityId, $opportunityOrderNumber, $lineItem, $product_sku, $issueId, $orderId, $co, $contact)
    {

        $this->fieldArray["Company_Name"] = $co;

        /*GBP Overrides:*/
        if (!empty($lineItem->field_hdn_gbp_award["und"][0]["value"])) {
            $this->fieldArray["Award Name"] = $lineItem->field_hdn_gbp_award["und"][0]["value"];
        }
        if (!empty($lineItem->field_hdn_gbp_category["und"][0]["value"])) {
            $this->fieldArray["Sector"] = $lineItem->field_hdn_gbp_category["und"][0]["value"];
        }

        $opportunitySalesOrder = array();
        $opportunitySalesOrder[0] = new stdclass();
        $opportunitySalesOrder[0]->Id = $salesOrderID;
        $this->createFieldArray($lineItem, $product_sku);
        $opportunitySalesOrder[0]->Product_Sku__c = $product_sku;
        $opportunitySalesOrder[0]->Property__c = "a083x00001CGMyCAAX";
        $opportunitySalesOrder[0]->Publisher__c = "a073x000013W4dj";
        $opportunitySalesOrder[0]->Issue__c = $issueId;
        $opportunitySalesOrder[0]->Article_Title__c = $this->fieldArray['Article_Title'];
        $opportunitySalesOrder[0]->Name = $opportunityOrderNumber . "-" . $this->getNumberOfOpportunitySalesOrders($opportunityId);
        $opportunitySalesOrder[0]->Company_Name__c = $this->fieldArray["Company_Name"];
        $opportunitySalesOrder[0]->Customer_Name__c = $contact;
        $opportunitySalesOrder[0]->Overall_Rank__c = $this->fieldArray["Rank"];
        $opportunitySalesOrder[0]->Award_Year__c = (string) $this->fieldArray["Year"];
        $opportunitySalesOrder[0]->Event_City__c = (string) $this->fieldArray["Award City"];
        $opportunitySalesOrder[0]->Award_List__c = $this->fieldArray["Award_List"];
        $opportunitySalesOrder[0]->Award_Name__c = $this->fieldArray["Award Name"];
        $opportunitySalesOrder[0]->Project_Name__c = $this->fieldArray["Project_Name"];
        $opportunitySalesOrder[0]->Award_Style__c = $this->fieldArray["Award_Style"];
        $opportunitySalesOrder[0]->Sector__c = $this->fieldArray["Sector"];
        $opportunitySalesOrder[0]->Email__c = $this->fieldArray["Email"];
        $opportunitySalesOrder[0]->Phone__c = $this->fieldArray["Phone Number"];
        $opportunitySalesOrder[0]->Shipping_Method__c = $this->fieldArray["Shipping Service"];


        $message = "";
        $response = $this->mySforceConnection->update($opportunitySalesOrder, 'Sales_Order__c');
        foreach ($response as $result) {
            $message .= $result->id . " updated<br/>\n";
        }
    }

    private function createFieldArray($lineItem, $sku)
    {
        // Load line item vars.
        $vars = get_object_vars($lineItem);

        foreach ($vars as $key => $value) {
            switch ($key) {
                case strpos($key, "rank") !== false:
                    $this->fieldArray['Rank'] = !empty($value['und'][0]['value']) ? (int) $value["und"][0]["value"] : 0;
                    break;
                case strpos($key, "eventcity") !== false:
                    $this->fieldArray['Award City'] = !empty($value['und'][0]['value']) ? $value["und"][0]["value"] : "";
                    break;
                case strpos($key, "sector") !== false:
                    $this->fieldArray['Sector'] = !empty($value['und'][0]['value']) ? $value["und"][0]["value"] : "";
                    break;
                case strpos($key, "year") !== false:
                    $this->fieldArray['Year'] = !empty($value['und'][0]['value']) ? $value["und"][0]["value"] : "";
                    break;
                case strpos($key, "company") !== false:
                    $this->fieldArray['Company_Name'] = !empty($value['und'][0]['value']) ? $value["und"][0]["value"] : "";

                    break;
                case strpos($key, "contact") !== false:
                    $this->fieldArray['Contact_Name'] = !empty($value['und'][0]['value']) ? $value["und"][0]["value"] : "";
                    break;
                case strpos($key, "field_award") !== false:
                    $this->fieldArray['Award Name'] = !empty($value['und'][0]['value']) ? $value["und"][0]["value"] : "";
                    break;
                case strpos($key, "list") !== false:

                    $sublists = array(
                        'design-build firms' => 'Top 100 design-build Firms',
                        'construction management-at-risk firms' => 'Top 100 cm-at-risk Firms',
                        'program management firms' => 'top 50 program management firms',
                        'cm for fee firms' => 'Top 100 cm-for-fee Firms',
                        'International Design Firms' => 'Top 225 International Design Firms',
                        'International Contractors' => 'Top 250 International Contractors',
                        'Global Contractors' => 'Top 250 Global Contractors',
                        'Environmental Firms' => 'Top 200 Environmental Firms',
                        'Green Contractors' => 'Top 100 Green Contractors',
                        'Green design Firms' => 'Top 100 Green Design Firms',
                    );
                    if (array_key_exists($value["und"][0]["value"], $sublists)) {
                        $this->fieldArray['Award_List'] = $sublists[$value["und"][0]["value"]];
                    } else {
                        $this->fieldArray['Award_List'] = !empty($value['und'][0]['value']) ? $value["und"][0]["value"] : "";
                    }
                    break;
                case strpos($key, "project") !== false:
                    $this->fieldArray['Project_Name'] = !empty($value['und'][0]['value']) ? $value["und"][0]["value"] : "";
                    break;
                default:
                    break;
            }
        }
    }

    private function getNumberOfOpportunitySalesOrders($opportunityId)
    {
        $number = 1;
        $query = "SELECT Id from Sales_Order__c WHERE Opportunity__c = '$opportunityId'";
        $response = $this->mySforceConnection->query($query);
        $ids = array();
        foreach ($response->records as $record) {
            array_push($ids, $record->Id);
        }
        $number = count($ids);
        return $number++;
    }
}

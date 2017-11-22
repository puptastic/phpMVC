<?php
/**
 * Created by PhpStorm.
 * User: dssupport
 * Date: 7/12/2017
 * Time: 2:07 PM
 */

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    try {
        // Verify that a specific input is received before moving forward
        if (!is_null(filter_input(INPUT_POST, "txtDescription"))) {
            $strType = "Incident"; // AS OF 7-12-17, NOT A DROP-DOWN FOR THE USER!!!
            //$intUnitID = filter_input(INPUT_POST, "cmbUnits");
            $intRequesterID = filter_input(INPUT_POST, "cmbRequesters");
            $strSubject = filter_input(INPUT_POST, "txtSubject");
            $strDetails = filter_input(INPUT_POST, "txtDetails");

            $strQB_URL = FindValue("QB_URL", $strFilePath);
            $strUserTicket = FindValue("UserTicket", $strFilePath); // qbapi@dir-systems.com
            $strAppToken = FindValue("AppTokenIT", $strFilePath); // AS OF 7-12-17, IS NOT IN THE TXT FILE!!!
            

            $strURL = $strQB_URL . $strTableID_TK . "?a=API_AddRecord&AppToken=" . $strAppToken . "&Ticket=" . $strUserTicket .
                "&_fid_7=" . $strType . "&_fid_32=" . $intRequesterID . "&_fid_6=" . $strSubject . "&_fid_10=" . $strDetails;

            echo '<br/><br/>' . "Thanks for your IT Ticket.  You should be receiving a confirmation email very soon.";
            
        }
    }
    catch (Exception $ex) {
        echo "Uh-Oh! Error : " . $ex->getMessage();
    }

    // most of the hard work is taken care of by the php_curl.dll
    function get_data($url)
    {
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
        $xml = curl_exec($ch);
        curl_close($ch);
        return $xml;
    }

    // Querying text file for certain key values
    function FindValue($strVariable, $strFileName)
    {
        $txt_file = file_get_contents($strFileName);
        $rows = explode("\n", $txt_file);

        foreach($rows as $row => $data)
        {
            // getting row data
            $row_data = explode('|', $data);

            $info[$row]['Name'] = $row_data[0];
            $info[$row]['Value'] = $row_data[1];

            if ($row_data[0] == "$strVariable")
            {
                return $row_data[1];
            }
        }
    }

    // Must format date information for QuickBase
    function ProcessQBDate($strInput)
    {
        if (is_null($strInput) || ($strInput == ""))
        {
            return null;
        }
        else
        {
            $strInputClean = str_replace('/', '-', $strInput);
            return $strInputClean;
        }
    }
?>
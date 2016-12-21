<?php
/**
 * Created by Sevio Solutions.
 * User: Denis DIMA
 * Product: payza-ipn
 * Date: 19.12.2016
 * Time: 16:21
 * All rights and copyrights are owned by Sevio Solutions®
 */


define("IPN_V2_HANDLER", "https://secure.payza.com/ipn2.ashx");
define("TOKEN_IDENTIFIER", "token=");

$token = urlencode($_POST['token']);

$token = TOKEN_IDENTIFIER . $token;

$response = '';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, IPN_V2_HANDLER);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $token);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

if (strlen($response) > 0) {
    if (urldecode($response) == "INVALID TOKEN") {
        //the token is not valid
    } else {

        $response = urldecode($response);
        $aps = explode("&", $response);
        $info = array();
        foreach ($aps as $ap) {
            $ele = explode("=", $ap);
            $info[$ele[0]] = $ele[1];
        }

        $receivedMerchantEmailAddress = $info['ap_merchant'];
        $transactionStatus = $info['ap_status'];
        $testModeStatus = $info['ap_test'];
        $purchaseType = $info['ap_purchasetype'];
        $totalAmountReceived = $info['ap_totalamount'];
        $feeAmount = $info['ap_feeamount'];
        $netAmount = $info['ap_netamount'];
        $transactionReferenceNumber = $info['ap_referencenumber'];
        $currency = $info['ap_currency'];
        $transactionDate = $info['ap_transactiondate'];
        $transactionType = $info['ap_transactiontype'];

        $customerFirstName = $info['ap_custfirstname'];
        $customerLastName = $info['ap_custlastname'];
        $customerAddress = $info['ap_custaddress'];
        $customerCity = $info['ap_custcity'];
        $customerState = $info['ap_custstate'];
        $customerCountry = $info['ap_custcountry'];
        $customerZipCode = $info['ap_custzip'];
        $customerEmailAddress = $info['ap_custemailaddress'];

        $myItemName = $info['ap_itemname'];
        $myItemCode = $info['ap_itemcode'];
        $myItemDescription = $info['ap_description'];
        $myItemQuantity = $info['ap_quantity'];
        $myItemAmount = $info['ap_amount'];

        $additionalCharges = $info['ap_additionalcharges'];
        $shippingCharges = $info['ap_shippingcharges'];
        $taxAmount = $info['ap_taxamount'];
        $discountAmount = $info['ap_discountamount'];

        $myCustomField_1 = $info['apc_1'];
        $myCustomField_2 = $info['apc_2'];
        $myCustomField_3 = $info['apc_3'];
        $myCustomField_4 = $info['apc_4'];
        $myCustomField_5 = $info['apc_5'];
        $myCustomField_6 = $info['apc_6'];

        if ($transactionStatus == 'Success') {
            // Transaction is processed, do whatever you want with the given information
        } else {
            // Transaction is not complete, do whatever you want with the given information
        }
    }
} else {
    //something is wrong, no response is received from Payza
}
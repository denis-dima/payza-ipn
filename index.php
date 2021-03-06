<?php
/**
 * Created by Sevio Solutions.
 * User: Denis DIMA
 * Product: payza-ipn
 * Date: 19.12.2016
 * Time: 16:21
 * All rights and copyrights are owned by Sevio Solutions®
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payza Payment Form</title>
    <style>
        label {
            display: block;
            padding: 5px 0;
        }

        input {
            display: block;
        }
    </style>
</head>

<body>

<form method="post" action="https://secure.payza.com/checkout">
    <input type="hidden" name="ap_merchant" value="youremail@domain.com"/>
    <input type="hidden" name="ap_purchasetype" value="item"/>
    <input type="hidden" name="ap_itemname" value="MP3 Player"/>
    <input type="hidden" name="ap_amount" value="2"/>
    <input type="hidden" name="ap_currency" value="USD"/>
    <input type="hidden" name="ap_description" value="Audio equipment"/>
    <input type="hidden" name="ap_itemcode" value="HIJ123"/>
    <input type="hidden" name="ap_quantity" value="2"/>
    <input type="hidden" name="ap_additionalcharges" value="1.19"/>
    <input type="hidden" name="ap_shippingcharges" value="7.99"/>
    <input type="hidden" name="ap_taxamount" value="2.49"/>
    <input type="hidden" name="ap_discountamount" value="4.99"/>
    <input type="hidden" name="ap_returnurl" value="http://www.example.com/finish.html"/>
    <input type="hidden" name="ap_cancelurl" value="http://www.example.com/cancel.html"/>
    <input type="hidden" name="apc_1" value="Blue"/>
    <input type="hidden" name="apc_2" value="UE plug"/>
    <input type="hidden" name="apc_3" value="UE plug 2"/>
    <input type="hidden" name="apc_4" value="UE plug 4"/>
    <input type="hidden" name="apc_5" value="UE plug 5"/>
    <input type="hidden" name="apc_6" value="UE plug 6"/>
    <input type="hidden" name="ap_alerturl" value="http://www.example.com/ipn.php"/>
    <input type="hidden" name="ap_ipnversion" value="2"/>
    <input type="hidden" name="ap_test" value="1"/>
    <input type="image" src="https://www.payza.com/images/payza-buy-now.png"/>
    <form>
</body>
</html>

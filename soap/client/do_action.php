<?php
/**
 * Client SOAP
 * @author Davide Ferrero
 */
$wsdl_url="http://127.0.0.1/soap/server/test.wsdl";
if(isset($_POST['name'])){
    if($_POST['name']!=null){
        $client=new SoapClient($wsdl_url);
        print_r($client->sayHello(htmlentities($_POST['name'])));
    }
}
?>

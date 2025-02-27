<?php
/**
 * Server SOAP
 * @author Davide Ferrero
 */
function sayHello($name){
    $salutation="Ciao ".$name.", sarai lieto di sapere che sto funzionando!";
    return $salutation;
}
$server= new SoapServer("test.wsdl");
$server->addFunction("sayHello");
$server->handle();
?>

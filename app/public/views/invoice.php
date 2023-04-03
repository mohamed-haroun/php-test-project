<?php
include __DIR__ . '/../html/header.php';

$form = <<<FORM
<form method="get" action="/invoice">
<input type="number" name="invoice" id="invoice">
<input type="submit" value="Pay">
</form>
FORM;

echo $form;

$invoice = $_GET['invoice'] ?? 0;

echo $parameters['invoice_services']->invoice($invoice);


include __DIR__ . '/../html/footer.php';

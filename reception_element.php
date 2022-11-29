<?php

include('include/function.php');

//$elements= Elements::readAll();

$element = new Elements();
$element->chargePOST();
$element->create();
header("Location: index.php");

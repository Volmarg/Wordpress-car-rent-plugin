<?php

#include libs
include_once '../common/databaseConnection.php';
include_once 'php/libs/data-convert.php';
include_once 'php/libs/type-convert.php';
include_once 'php/libs/price-calculate.php';

$type=$_GET['type'];

#get informations about the car type ID to get specific price in database based on car type
$typeID=type_conversion::columnNum($type);

#Get informations about prices fom datrabse
$db=new date_calculate();
$rangesInformations=$db->databaseDaysCalculation($typeID);
$rangeFullInformation=$db->database_calculateDaysBetween($rangesInformations);

#get informations about user picked date
$userInputInformations=$db->userInput($_GET['od'],$_GET['do']);
$userInputFullInformations=$db->user_calculateDaysBetween($userInputInformations);

#now calculate price for selected user range
$price = new calculatePrice($rangeFullInformation,$userInputFullInformations);
$price->sum_up();
# geting prices ranges from database in format: [[start day, start month, end day, end month, price for that interval], [], []]

?>

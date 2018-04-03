<?php
include_once 'dataManage.php';
$do=new backendDataManage($_GET);


if($_GET['action']=='removeCarModel'
|| $_GET['action']=='removeReservation'
|| $_GET['action']=='removeAdditionalSetup'){
  $do->remove();

}elseif($_GET['action']=='addSetup'){
  $do->addSetup($_POST);

}elseif($_GET['action']=='addCarModel'){
  $do->addCarModel($_POST);
}elseif($_GET['action']=='editCarModel'){
  $do->editCarModel($_GET);
}elseif($_GET['action']=='editPrices'){
  $do->editPrices($_GET);

}

?>

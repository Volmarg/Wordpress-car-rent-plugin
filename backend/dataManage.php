<?php

include_once '../common/databaseConnection.php';


class backendDataManage{

  var $data='';

  function __construct($data){
    $this->data=$data;
  }

  private function redirect(){
    $redirect=$_SERVER['HTTP_REFERER'];
    header('Location:'.$redirect);
  }

  public function remove(){

    $db=new askDatabase();
    $sql="DELETE FROM `".$this->data['table']."` WHERE `id`='".$this->data['id'].";'";
    $db->modifyDataInDatabase($sql);
    $this->redirect();
  }

  public function addSetup(){
    $db=new askDatabase();
    $sql="INSERT INTO `wp_car_setup` VALUES('','".$_POST['name']."','".$_POST['price']."');";
    $db->modifyDataInDatabase($sql);
    $this->redirect();

  }

  public function addCarModel(){
    $db=new askDatabase();
    $sql="INSERT INTO `wp_car_models` VALUES('','".$_POST['type']."','".$_POST['name']."','".$_POST['photo']."');";
    $db->modifyDataInDatabase($sql);
    $this->redirect();
  }

  public function editCarModel($data){
    $db=new askDatabase();
    $sql="UPDATE `wp_car_models`
          SET `description`='".$data['description']."'
          WHERE id=".$data['id'].";";
        ;
    if(isset($data['description'])){
      $db->modifyDataInDatabase($sql);
      echo $sql;
    }
    $this->redirect();
  }

  public function editPrices($data){
    $p='1';
    $db=new askDatabase();
    $sql="UPDATE `wp_prices_calendar` SET  `start_date`='".$data[1]."',`end_date`='".$data[2]."',`season`='".$data[3]."',`Premium +`='".$data[4]."',`Prestige`='".$data[5]."', `Comfort`='".$data[6]."',`Sport`='".$data[7]."',`Przyczepa kempingow`='".$data[8]."' WHERE `id`='".$data['id']."';";

    $db->modifyDataInDatabase($sql);
  }
}

?>

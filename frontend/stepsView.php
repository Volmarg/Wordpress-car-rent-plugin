<?php
include_once 'wp-content/plugins/register-car/common/databaseConnection.php';
include_once 'wp-content/plugins/register-car/frontend/registerForm.php';

class steps{

    var $type='';
    var $cars='';
    var $size='';

public function getTypesData(){# Car types Data
  $db=new askDatabase();
  $sql="SELECT * FROM `wp_car_types`;";
  $fetchedData=$db->getDataFromDatabase($sql);
  $data=$fetchedData[0];

  return $data;
}

  public function type($data){#Car types
      echo '<select class="tabs clearfix typesSelect" data-tabgroup="first-tab-group" id="types_" onchange="switchingCarTypes(this)">';
          foreach($data as $id=>$singleCar){
            echo '<option data-tab="#tab'.$singleCar[0].'">'.$singleCar[1].'</option>';
        }
      echo '</select>';
  }

  public function modelSwitcher($type){#selects for car models
    $db=new askDatabase();

    #Get id of type
    $sql="SELECT `id` FROM `wp_car_types` WHERE `name`='$type';";
    $fetchedData=$db->getDataFromDatabase($sql);
    $id_=$fetchedData[0][0][0];

    #Get cars of type of ID
    $sql="SELECT `name`,`photo`,`id`,`description` FROM `wp_car_models` WHERE `type`='$id_';";
    $fetchedData=$db->getDataFromDatabase($sql);
    $cars=$fetchedData[0];

    echo '<section id="modelSwitcher'.$id_.'">';
      echo '<select onchange="showCarImage(this)" id="'.$id_.'" name="model" '.($id_==5 ? 'disabled' : '').'>';
        foreach($cars as $id=>$car){
          //tu koniec
          if(count($cars)!=0){
            echo '<option type="radio" value="'.$car[0].'" data-value="'.$car[2].'" '.($id==0 ? 'selected':'').'>'.$car[0].'</option>';
          }
        }
        #case where przyczepa is not defined in database
        if($id_==5){
          echo '<option value="Przyczepa" >Standardowa przyczepa</option>';
        }
      echo '</select>';
    echo '</section>';
  }

  public function modelData($type){ #Car models data display
    $db=new askDatabase();

    #Get id of type
    $sql="SELECT `id` FROM `wp_car_types` WHERE `name`='$type';";
    $fetchedData=$db->getDataFromDatabase($sql);
    $id_=$fetchedData[0][0][0];

    #Get cars of type of ID
    $sql="SELECT `name`,`photo`,`id`,`description` FROM `wp_car_models` WHERE `type`='$id_';";
    $fetchedData=$db->getDataFromDatabase($sql);
    $cars=$fetchedData[0];

    echo '<section id="modelsWrapper-'.$id_.'" >';
          foreach($cars as $id=>$car){
            echo '
            <section style="'.($id==0 ? '':'display:none;').'" id="image-'.$car[2].'" class="flexableCarInfo">
              <img src="'.$car[1].'"/>
              <section class="modelDescriptionFront">'.$car[3].'</section>
            </section>
            ';
        }
    echo '</section>';

  }#Car model

  public function size($size,$id){#How many ppl in car
    echo '<select name="people" id="people'.$id.'">';
      for($x=1;$x<=$size;$x++){
        echo '<option value="'.$x.'" />'.$x.'</option>';
      }
    echo '</select>';

  }

  public function callendar(){#allendar
      #
  }

  public function price($id){#Price calculation

    echo '<section id="normalPrice'.$id.'" data-num="'.$id.'" class=""><i>Wybierz daty</i></section>';
    echo '<input type="hidden" value="0" id="normalPriceInput'.$id.'" name="normalPriceInput" data-num="'.$id.'" />';
    echo '<br/>';
  }

  public function additionalSetup($formNum){#Additional setup
    #Get setup information
    $db=new askDatabase();
    $sql="SELECT * FROM `wp_car_setup`;";
    $fetchedData=$db->getDataFromDatabase($sql);
    $setups=$fetchedData[0];

    echo '<section id="optionsWrapper'.$formNum.'" class="">';
    foreach($setups as $id=>$setup){

      if($id % 2 == 0){
          @$left.='<div class="singleCheckboxHolder"><input type="checkbox" id="setup-'.$id.'"  data-value="'.$setup[2].'" data-id="additionalSetup" onclick="additionalSummary(this)" data-num="'.$formNum.'" name="option-'.$id.'" value="'.$setup[1].'"/>'.$setup[1].'</div>';
      }else{
          @$right.='<div class="singleCheckboxHolder"><input type="checkbox" id="setup-'.$id.'"  data-value="'.$setup[2].'" data-id="additionalSetup" onclick="additionalSummary(this)" data-num="'.$formNum.'" name="option-'.$id.'" value="'.$setup[1].'"/>'.$setup[1].'</div>';
      }
    }

    echo '<section class="form-group col-md-4 flexable optionsSubWrap">
            <div class="additionalCheckboxesParent">
              '.$left.'
            </div>
            <div class="additionalCheckboxesParent">
              '.$right.'
            </div>
          </section>';
    echo '</section><br/>';
  }

  public function priceSummary($id){#Price summay of additional settings
    echo '<section id="additionalSummary'.$id.'"><i>Wybierz usługi</i></section>';
    echo '<input type="hidden" value="0" id="additionalSummaryInput'.$id.'" name="additionalSummaryInput" />';
  }

  public function totalSumUp($id){
    echo '<section id="totalSumUp_'.$id.'" data-num="'.$id.'" class=""><i></i></section>';
    echo '<input type="hidden" value="0" id="totalSumUp'.$id.'" name="fullSum" />';
  }

  public function registerFormStart($id){
    $registerForm=new form();
    $registerForm->viewStart($id);
  }

  public function registerForm($id){#Register form
    $registerForm=new form();
    $registerForm->view($id);
  }

  public function registerFormDates($id){#Register form
    $registerForm=new form();
    $registerForm->viewDates($id);
  }

  public function registerFormPermissions(){
    $registerForm=new form();
    $registerForm->permissions();
  }

  public function hidablePartStart($id){
    echo '<div class="hidable" id="hidable'.$id.'">';
  }

  public function hidablePartEnd(){

    echo '</div>';
  }

}

?>

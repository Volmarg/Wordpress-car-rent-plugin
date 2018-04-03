<?php

class calculatePrice{

  var $pricesArray='';
  var $userPick='';

  function __construct($rangeFullInformation,$userInputFullInformations){
    $this->pricesArray=$rangeFullInformation;
    $this->userPick=$userInputFullInformations;

  }

  private function in_range($day,$month){

    #now iterate over all rangers from database to check where this one day fits in

    foreach($this->pricesArray as $singleRange){

      foreach($singleRange as $arraysOfMonth){
        #iterate over every month data from database
        foreach($arraysOfMonth as $monthName_=>$oneMonth){

            #now in case the start day is not going from 01 its required to add start day to calculated days for that range so it can count up to full month days
              if($oneMonth[0]=='01' || $oneMonth[0]=='1'){
                #do nothing - it's fine
              }else{
                $oneMonth[2]+=$oneMonth[0];
              }

            #now loop over this one month days to check where this one single day fits in and if found - break and return price;
          for($z=$oneMonth[0];$z<=$oneMonth[2];$z++){
              $monthNum=str_replace('month-','',$monthName_);
		.
		.
		.
          }
          #startDay, startMonth, daysCountedForThatMonth
        }

      }

    }
  }

  private function get_price(){

  }

  public function sum_up(){
    /*################################################################
    $this->pricesArray
    rowNum[
      [
        [startDay, startMonth, daysCountedForThatMonth - in which range fits , price]
      ]
    ]

    $this->userPick
    [
    [
      [$startDay,$daysInMonth,$startMonth, $days in that months fitting user select range]
    ]
  ]

    ,$daysInMonth-$startDay+1]

    ###################################################################*/

    #helperVars
    $priceSumator=0;

    #run loop for each month in user pick array
    foreach($this->userPick as $oneMonth){
      foreach($oneMonth as $monthName=> $month){

        #now iterate over each day in user picked range
        for($x=$month[0];$x<=$month[1];$x++){
          $monthNum=str_replace('month-','',$monthName);
          #echo "<b>Month: </b> $monthNum | <b> Day : $x</b> <br/>";

          #now check where that day fits in range from database
          $price=$this->in_range($x,$monthNum);
          $priceSumator+=$price;

        }

      }

    }

    echo $priceSumator;

    /*0
              echo "<pre>";
                var_dump($oneMonth);
              echo "</pre>";
    */

  }


}

?>

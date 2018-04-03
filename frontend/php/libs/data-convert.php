<?php
include_once '../common/databaseConnection.php';

class date_conversion{

	.
	.
	.
  public function database_calculateDaysBetween($rangesInformations){ #[day start , month start, days in that month] || [day end, month end, days in that month], price,]
    $singleRangeData=array();
    $moreMonths=array();
    $rangesFullData=array();
      #[ startDay,startMonth, daysCounted ], [monthBetweenStartDay,monthBetweenEndDay, daysCounted], [endDay, endMonth, days Counted], price

        #calculate for each range row
        for($x=0;$x<=count($rangesInformations)-1;$x++){
          #help values for transaltion
          $dayStart=$rangesInformations[$x][0][0];
          $monthStart=$rangesInformations[$x][0][1];
          $dayEnd=$rangesInformations[$x][1][0];
          $monthEnd=$rangesInformations[$x][1][1];
          $price=$rangesInformations[$x][2];
          $num=$x+1;

          #calculate for each month in that given range{
          for($y=$monthStart;$y<=$monthEnd;$y++){

              #that's only one month
              if($monthEnd-$monthStart==0){

                $singleRangeData=$this->oneMonthHelper($dayStart,$dayEnd,$monthStart,$x,$price);
                $moreMonths["month-$y"]=$singleRangeData;
              }#if there are more than one month
              else{


                #how many days got this one month
                $daysInMonth=cal_days_in_month(CAL_GREGORIAN,$y,date('Y'));

                #if thats the first month then just rewrite it
                if($y==$monthStart){
                  $singleRangeData=$this->oneMonthHelper($dayStart,$daysInMonth,$monthStart,$x,$price);
		.
		.
		.
    }


  public function user_calculateDaysBetween($userInput){
        #help translations
        #    $arrayOfInput=array($startDay_c, $startMonth_c, $startYear_c, $endDay_c, $endMonth_c, $endYear_c);
        $startDay=$userInput[0];
        $startMonth=$userInput[1];
        $startYear=$userInput[2];
        $endDay=$userInput[3];
        $endMonth=$userInput[4];
        $endYear=$userInput[5];

        #vars definitions
        $oneMonth=array(); # [start day,end day, month number, counted days]
        $allMonths=array();

        #if there is difference in years - then break it into 2 separate ranges, like:
        # 2018-12-30 - > 2019-01-03 turns into: 2018-12-30 - > 2018-12-31 AND 2019-01-01-> 2019-01-03
        #vars definitions
        $arrayOfYear=array();#holds ranges like described above

        if($startYear!=$endYear){

          $arrayOfYear[0]=[$startDay,$startMonth,$startYear,'31','12',$endYear];
          $arrayOfYear[1]=['01','01',$endYear,$endDay,$endMonth,$endYear];
        }else{
          $arrayOfYear[0]=$userInput;
        }

        #since we have 2 ranges now we have to redifince start/end mnths vars
        #iterate over years
        $numYears=count($arrayOfYear)-1;
        for($z=0;$z<=$numYears;$z++){

          $startDay=$arrayOfYear[$z][0];
          $startMonth=$arrayOfYear[$z][1];
          $startYear=$arrayOfYear[$z][2];
          $endDay=$arrayOfYear[$z][3];
          $endMonth=$arrayOfYear[$z][4];
          $endYear=$arrayOfYear[$z][5];


        #Iterate over all months that user picked
        for($x=$startMonth;$x<=$endMonth;$x++){
          $num=$endMonth-$startMonth; #how many months are in range
          $daysInMonth=cal_days_in_month(CAL_GREGORIAN,$x,date('Y'));

          #if it's just one month
          if(0==$num){
            $oneMonth["month-$x"]=[$startDay,$endDay,$startMonth,$num];
	.
	.
	.

  }




?>

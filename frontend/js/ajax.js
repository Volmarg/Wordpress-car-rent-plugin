
function pickType(element){//for blocking selection in case user picks up wrong date

      var num=element.getAttribute('data-num');

      var targetHolder1=$('#normalPrice'+num);
      var targetHolder2=$('#normalPriceInput'+num);
      targetHolder1.addClass('alert alert-info');

      var activeTab=$('#types_ option:selected').html();
      var encodedTab=encodeURIComponent(activeTab);

      var od=$('#dateStart'+num).val();
      var doo=$('#dateEnd'+num).val();

      //set blocker on doo
      $('#dateEnd'+num).attr('min',od);
      $('#dateEnd'+num).attr('max',setMaxDate());

      //set value same as date "od" at first time
      if(doo=='' || doo==undefined){
          $('#dateEnd'+num).val(od);
      }//but now user can go back with date anyway, so this one is in case that user attempts to go way backward with dates
      else if ($('#dateStart'+num).val() > $('#dateEnd'+num).val()){
        $('#dateEnd'+num).val(od);
      }
      //Reset values in vars after date input has been chagend via above code
      od=$('#dateStart'+num).val();
      doo=$('#dateEnd'+num).val();

      var ajax=new XMLHttpRequest();
      var path='wp-content/plugins/register-car/frontend/getCallendarPrice.php';
      var type='?type='+encodedTab+'&od='+od+'&do='+doo;
      ajax.open('GET',path+type,false);
      ajax.send();

      var response=ajax.responseText;

      //in case user just picked one date atm
      if(od==undefined || doo==undefined || od=='' || doo==''){
        response=0;
      }

      targetHolder1.html(response);
      targetHolder2.val(response);

      //call the additional price recalculation in case user changes dates while checkbox is marked
      additionalSummary(element);

      //show the hidden part of form
      showingHidable(element);

}

//This function provides total amount of days that have been reserved
function getDaysOfReservations(num){
  var activeTab=$('#types_ option:selected').html();
  var encodedTab=encodeURIComponent(activeTab);

  var od=$('#dateStart'+num).val();
  var doo=$('#dateEnd'+num).val();
  var ajax=new XMLHttpRequest();
  var path='wp-content/plugins/register-car/frontend/getReservationsInfo.php';
  var type='?type='+encodedTab+'&od='+od+'&do='+doo;
  ajax.open('GET',path+type,false);
  ajax.send();

  return ajax.responseText;
}

function setMaxDate(){
  // GET CURRENT DATE
var date = new Date();

// GET YYYY, MM AND DD FROM THE DATE OBJECT
var yyyy = (date.getFullYear()+1).toString();
var mm = date.getMonth().toString();
var dd  = date.getDate().toString();

// CONVERT mm AND dd INTO chars
var mmChars = mm.split('');
var ddChars = dd.split('');

// CONCAT THE STRINGS IN YYYY-MM-DD FORMAT
var datestring = yyyy + '-' + (mmChars[1]?mm:"0"+mmChars[0]) + '-' + (ddChars[1]?dd:"0"+ddChars[0]);

return datestring;

}

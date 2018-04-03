function additionalSummary(element){ //for showing additional setup price
  var formNum=$(element).data('num');
  var summaryHolder=$('#additionalSummary'+formNum);
  var additionalSummaryInput=$('#additionalSummaryInput'+formNum);
  var optionsBlock=$('#optionsWrapper'+formNum);
  var setupOptionsPrice=0;

  //get amount of reserved days via ajax
  var days=getDaysOfReservations(formNum);

  optionsBlock.find('input').each(function(){
    if($(this)[0].checked){
      var priceForItemDaily=$(this).data('value');
      var fullPriceForItem=priceForItemDaily*days;
      setupOptionsPrice+=fullPriceForItem;
      summaryHolder.addClass('alert alert-info');
    }
  })

  summaryHolder.html(setupOptionsPrice);
  additionalSummaryInput.val(setupOptionsPrice);
  totalPriceSummary(element);

}

function showCarImage(element){ //for showing cars images

  var idOfTab=element.id;

  var selected=$(element).find('option:selected');
  var idOfCar=selected.data('value');
  var carName=selected.val();
  var modelsBlock=$('#modelsWrapper-'+idOfTab);
  var imageBlock_carName='image-'+carName;

    $('#modelsWrapper-'+idOfTab+'>section').css('display','none');
    $('#modelsWrapper-'+idOfTab+'>#image-'+idOfCar).css('display','flex');
}

function callendarBlock(element){ //This is for blocking if user selects startDate AFTER endDate

  var startDate=$('[name^="od"]');
  var endDate=$('[name^="do"]');
  var returnable=false;

  var start = new Date(startDate.val());
  var end = new Date(endDate.val());
  if(start>end){
    startDate.val('');
    endDate.val('');
    //alert('Data startu jest pozniejsza od daty wyjazdu! Wybierz inny zakres!')
    returnable=false;
  }else{
    returnable=true;
  }

  return returnable;
}

function totalPriceSummary(element){
  var formNum=$(element).data('num');
  var normal=$('#normalPrice'+formNum).html();
  var additional=$('#additionalSummary'+formNum).html();

  var targetSection=$('#totalSumUp_'+formNum);
  var targetHolder=$('#totalSumUp'+formNum);

  var sum=parseInt(normal)+parseInt(additional);
  targetSection.html(sum);
  targetHolder.val(sum);
}

function showingHidable(element){
  //get number of currently runngin tab
  var num=element.getAttribute('data-num');

  //get status of checkboxes - check if values are inserted

  var peopleVal=$('#people'+num).val();
  var dateOdVal=$('#dateStart'+num).val();
  var dateDoVal=$('#dateEnd'+num).val();

  if(peopleVal!='' && dateOdVal !='' && dateDoVal!=''){
    //If all are marked then show them
    $('#hidable'+num).slideDown('slow',function(){
      $('#hidable'+num).removeClass('hidable');
    })
  }
}

function switchingCarTypes(element){


  //get id of currently targeted type
  var targetTab=$(element).find('option:selected').data('tab');

  //hide all types of tabs
  $('#first-tab-group>div').css('display','none');

  //and reveal only the targeted one
  $(targetTab).attr('style','');
  $(targetTab+'>div').attr('style','');


}

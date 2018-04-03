function carRentPrices(id,ida,idb,idc,idd,ide,idf,idg,idh){
  var ajax=new XMLHttpRequest();
  var path='../../wp-content/plugins/register-car/backend/dataManageExecute.php';
  var action='?action=editPrices';
  var params='&id='+id+'&1='+ida+'&2='+idb+'&3='+idc+'&4='+idd+'&5='+ide+'&6='+idf+'&7='+idg+'&8='+idh;

  ajax.open('GET',path+action+params,false);
  ajax.send();

  location.reload();

}

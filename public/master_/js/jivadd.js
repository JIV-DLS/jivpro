var nb_client=false;
var client=new Array();
var clientChronom=new Array();
var Sessions=$('#Sessions');
var selection=false;



$('#ModiferModaler').click(function(){
if(selection)
  {
$('.clientomod').each(function(){$(this).val($('.select').attr('id')); });
  $('.client-to-modify').text(
$('.select').children('td').eq(0).text()
    );
  $('#inputNomM').val($('.select').children('td').eq(0).text());
$('#inputContactM').val($('.select').children('td').eq(1).text());
$('#ModiferModalerc').click();
}else
$('#errorModalerc').click();
}
);

$('#SupprimerModaler').click(function(){
if(selection)
  {
    $('.clientomod').each(function(){$(this).val($('.select').attr('id')); });

    $('.client-to-modify').text(
$('.select').children('td').eq(0).text()
    );
    var td=$('.select').children('td');
var name=td.eq(0),
  contact=td.eq(1),
  created=td.eq(2),
  date_buy=td.eq(3),
  buy=td.eq(4),
  rest=td.eq(5);
  $('#sup_name').text(name.text());
  $('#sup_contact').text(contact.text());
  $('#sup_inscript').text(created.text());
  $('#sup_achatet').text(date_buy.text());
  $('#sup_achatti').text(buy.text());

$('#SupprimerModalerc').click();
}else
$('#errorModalerc').click();
}
);

$('.achat-reset').click(function(){

  $('#inputPT').val('0');$('#inputNH').val('0:0:0');
})

;
$('.Modifier-window').click(function(){

  switch ($(this).text())
  {
    case 'Client':
    //$(this).css('color','skyblue');
    $('.Modifier-window:first-child').css('color','black');
    $('.Modifier-window:last-child').css('color','skyblue').css('border-bottom','skyblue');
    $('.Modifier-window:last-child').css('border-bottom','skyblue');
      $('#ClientPerso').css('display','inline-block');
      $('#ClientAchat').css('display','none');
      $('#modifier-client-Perso').css('display','inline-block');
      $('#modifier-client-Achat').css('display','none');
    break;
    case 'Achat':
    //$(this).css('color','skyblue');
    $('.Modifier-window:first-child').css('color','skyblue').css('border-bottom','skyblue');;
    $('.Modifier-window:first-child').css('border-bottom','skyblue 1px');;
    $('.Modifier-window:last-child').css('color','black');
    $('#ClientAchat').css('display','inline-block');
    $('#ClientPerso').css('display','none');
    $('#modifier-client-Achat').css('display','inline-block');
      $('#modifier-client-Perso').css('display','none');
    break;
  }
});

$('.client-time-add').click(
function(){
      $('#inputPT').val(parseInt($('#inputPT').val())+parseInt($(this).data('price')));

$('#inputNH').val(

  clientChrono.sectotime(
    
      (
        clientChrono.timetosec(
       $('#inputNH').val()
)
        +parseInt($(this).data('value')))*1000
    

  )
  );
  
}
  );
$('.client-time-add').dblclick(
function(){

  if((clientChrono.timetosec(

       $('#inputNH').val()
)
        -parseInt($(this).data('value')))>=0)
  {
    if(parseInt($('#inputPT').val())-parseInt($(this).data('price'))>=0)
    $('#inputPT').val(parseInt($('#inputPT').val())-parseInt($(this).data('price')));
$('#inputNH').val(

  clientChrono.sectotime(
    
      (
        clientChrono.timetosec(
       $('#inputNH').val()
)
        -parseInt($(this).data('value')))*1000
    

  )
  );}
  
}
  );


$('.session-opener').click(
function()
{
  $(this).find('.sessions-number').text('0');
  $('.select').each(function(){$(this).dblclick(); });
}
  );


$('.client').click(
function()
{
  if($(this).hasClass('select'))
    {$('.select').removeClass('select');
  if($(this).hasClass('sessioner'))
    {
      $(this).addClass('session');
      $(this).removeClass('sessioner');
    }
    $('.selectionned').text(0);
      selection=false;
    }
  else
  {
    if($(this).hasClass('session'))
    {
      $(this).removeClass('session');
      $(this).addClass('sessioner');
    }
    $('.selectionned').text(1);
    $('.select').removeClass('select');
    $(this).addClass('select');
    selection=true;
  }
  
/*
  //if(typeof )
  if(!$(this).hasClass('select'))
   { 
    
    if(!selection)
    {$('.selectionned').text(
Math.floor($('.selectionned').text())+1
        );
    if(!$(this).hasClass('session'))
      $('.session-opener').find('.sessions-number').text(
Math.floor($('.session-opener').find('.sessions-number').text())+1
        );

      selection=true;
    }
    }
  else
    {
      
if(selection)
{$('.selectionned').text(
Math.floor($('.selectionned').text())-1
        );
      if(!$(this).hasClass('session'))
$('.session-opener').find('.sessions-number').text(
Math.floor($('.session-opener').find('.sessions-number').text())-1
        );$(this).removeClass('select');
selection=false;}
       }*/
}
  );


$('.client').dblclick(
function ()
{
  id=$(this).attr('id');
  if(!client[id])
  {

    $(this).addClass('session');
    client[id]='true';
  
  var td=$(this).children('td');
  var name=td.eq(0),
  contact=td.eq(1),
  created=td.eq(2),
  date_buy=td.eq(3),
  buy=td.eq(4),
  rest=td.eq(5),
  cardController='<div class="card-controller" style="background:yellow;">'+
                      '<span  onclick="clientChronom['+id+'].clear();var parent=$(this).parent().parent().parent().parent();$(\'#chr_\'+parent.attr(\'id\').substr(8)).remove();$(\'#\'+parent.attr(\'id\').substr(8)).removeClass(\'session\');client.splice(parent.attr(\'id\'),1);parent.remove(); " class="closable client-closer">x</span>'+
                      '</div>';

  var User_Session='<div id="csession'+id+'" class="client-status">'+
  '<div class="row">'+
    '<div class="col-xl-6 col-sm-6 mb-3">'+
      '<center>'+
        '<div class="progress-bar" id="cp'+id+'" data-rest="'+rest.text()+'" data-percent="60" data-duration="0" data-color="#fff,skyblue"></div>'+
      '</center></div>'+
      '<div class="col-xl-6 col-sm-6 mb-3 client-status-info" id="csi'+id+'" style="">'+
  cardController+
  '<h1>'+name.text()+'</h1>'+
  '<div class="Info">'+
  '<p>Contact: '
  +contact.text()+
  '</p>'+
  '<p>Inscrit le: '+
  created.text()+'</p><p>Dernier achat: '+
  date_buy.text()+
  '  |  '+buy.text()+
  ' </p>'+
  '</div>'+
  '<div class="User_controller">'+
    '<button class="btn btn-primary  col-mb-3 chrono-start " onclick="clientChronom['+id+'].start();" id="chronos_'+id+'">Debuter</button>'+
    '<button class="btn btn-warning col-mb-3 chrono-pause " onclick="clientChronom['+id+'].pause();" id="chronop_'+id+'" disabled="disabled">Suspendre</button>'+
    
    '</div></div></div></div>';
    //'<button class="btn btn-danger   col-mb-3 chrono-restart " onclick="clientChronom['+id+'].restart();" id="chronor_'+id+'">Reinitialiser</button>'+
  if (nb_client) 
  Sessions.append('<hr id="chr_'+id+'">'+User_Session);
  else
  {
    nb_client=true;
    Sessions.append(User_Session);
  }

clientChronom[id]=new clientChrono('cp'+id);
clientChronom[id].init();

self.location.assign('#csession'+id);
}
  else
  {
    self.location.assign('#csession'+id);
  }
  
});
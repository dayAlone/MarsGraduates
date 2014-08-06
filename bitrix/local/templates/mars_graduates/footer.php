<div class="modal fade message done" tabindex="-1" role="dialog" aria-labelledby="subscribe-success" id="subscribe-success" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><?=svg('close')?></button>
      <h1 class="center">
      	<?=svg("done")?>
      	<span>Ура!</span>
      </h1>
      <p>Теперь вы будете получать самые свежие<br> новости о предстоящих мероприятиях <br>и открытых вакансиях</p>
    </div>
  </div>
</div>
<div class="modal fade message done" tabindex="-1" role="dialog" aria-labelledby="event-success" id="event-success" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><?=svg('close')?></button>
      <h1 class="center">
        <?=svg("done")?>
        <span>Поздравляем!</span>
      </h1>
      <p>Вы успешно зарегистрировались<br>на мероприятие</p>
    </div>
  </div>
</div>

<div class="modal fade message check" tabindex="-1" role="dialog" aria-labelledby="subscribe-check" id="subscribe-check" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><?=svg('close')?></button>
      <h1 class="center">
      	<?=svg("email")?>
      	<span>Получилось!</span>
      </h1>
      <p>На указанный адрес электронной почты <br>будет отправлено сообщение <br>для подтверждения регистрации</p>
    </div>
  </div>
</div>
</html>
<? 
global $USER;
if(!$USER->isAdmin())
	$APPLICATION->ShowHead();
if(isset($_REQUEST['ID']) && isset($_REQUEST['CONFIRM_CODE']))
{
  CModule::IncludeModule("subscribe");
  $subscr = new CSubscription;
  if(isset($_REQUEST["action"])){
    if($_REQUEST["action"]=="unsubscribe")
      $subscr->Update($ID, array("ACTIVE"=>"N"));
  }
  else
  {
      if($subscr->Update($ID, array("CONFIRM_CODE"=>$_REQUEST['CONFIRM_CODE']))):
      ?>
      <script type="text/javascript" charset="utf-8" async defer>
        $(function(){
          $("#subscribe-success").modal()
        })
      </script>
      <?
      endif;
  }
}
$APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
$APPLICATION->AddHeadScript('/layout/js/frontend.js');
?>

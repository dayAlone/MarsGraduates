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

<div class="modal fade message done" tabindex="-1" role="dialog" aria-labelledby="subscribe-error" id="subscribe-error" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><?=svg('close')?></button>
      <p class="center"><br>Этот адрес уже был зарегистрирован. <br>Спасибо!
      </p>
    </div>
  </div>
</div>

<div class="modal fade message done" tabindex="-1" role="dialog" aria-labelledby="promo-modal" id="promo-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal"><?=svg('close')?></button>
      <?
        $promo_filter = array(
          ">=DATE_ACTIVE_TO" => date('Y-m-d')." 00:00:00",
          "<=DATE_ACTIVE_FROM" => date('Y-m-d')." 23:59:59",
        );
        $APPLICATION->IncludeComponent("bitrix:news.list", "promo_modal", 
          array(
          "IBLOCK_ID"            => 9,
          "NEWS_COUNT"           => "0",
          "SORT_BY1"             => "ID",
          "SORT_ORDER1"          => "ASC",
          "FILTER_NAME"          => "",
          "PROPERTY_CODE"        => Array("LINK"),
          "DETAIL_URL"           => "",
          "CACHE_TYPE"           => "A",
          "DISPLAY_PANEL"        => "N",
          "DISPLAY_TOP_PAGER"    => "N",
          "DISPLAY_BOTTOM_PAGER" => "N",
          "SET_TITLE"            => "N"
             ),
             false
          );
        ?>
      </p>
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
      $subscr->Delete($ID);
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

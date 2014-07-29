<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Mars Graduates");
$APPLICATION->SetPageProperty('body_class', "index");
?>

<div id="main">
  <div class="container">
    <div class="col">
      <div class="title"><a href="/about/">О нас</a></div>
      <div class="content">
      	<a href="/about/#go-inside">Mars Inside<br><span class="flag">Видео Mars СНГ<?=svg('flag')?></span></a>
      	<a href="/about/#go-pr">Наши 5 Принципов</a>
      	<a href="/about/#go-history">История Mars</a>
      	<a href="/about/#go-brands">Бренды и сегменты Mars</a>
      	<a href="/about/#go-scheme">Подразделения</a></div>
    </div>
    <div class="frame">
      <div class="col big">
        <div class="title"><a href="/career/">Карьера</a></div>
        <div class="content">
			<?php
			    $APPLICATION->IncludeComponent("bitrix:news.list", "career_index", 
			    array(
					"IBLOCK_ID"            => 7,
					"NEWS_COUNT"           => "0",
					"SORT_BY1"             => "ID",
					"SORT_ORDER1"          => "ASC",
					"FILTER_NAME"          => "",
					"PROPERTY_CODE" 	   => Array("SVG", "OPEN"),
					"DETAIL_URL"           => "/career/#go-#ELEMENT_CODE#",
					"CACHE_TYPE"           => "A",
					"DISPLAY_PANEL"        => "N",
					"DISPLAY_TOP_PAGER"    => "N",
					"DISPLAY_BOTTOM_PAGER" => "N",
          "SET_TITLE"            => "N"
			       ),
			       false
			    );
			?>
        </div>
      </div>
      <div class="col big">
        <div class="title"><a href="/academy/">Mars academy</a></div>
        <div class="content">
	        <a href="/academy/#go-conference" class="big"><span>Конференции</span></a>
	        <a href="/academy/#go-lectures" class="big"><span>Лекции и мастер-классы</span></a>
	        <a href="/academy/#go-games" class="big"><span>Бизнес-игры <br>и кейс-чемпионаты</span></a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="title"><a href="/events/">Ближайшие события</a></div>
      <div class="content">
        <?
        	require($_SERVER['DOCUMENT_ROOT'].'/include/calendar.php');
        ?>
      </div>
    </div>
  </div>
</div>


<div id="brands">
  <div class="container"><img src="/layout/images/brands.png"></div>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
if(isset($_REQUEST['ID']) && isset($_REQUEST['CONFIRM_CODE']))
{
  CModule::IncludeModule("subscribe");
  $subscr = new CSubscription;
  if(isset($_REQUEST["action"]))
    if($_REQUEST["action"]=="unsubscribe")
      $subscr->Update($ID, array("ACTIVE"=>"N"));
  else
  {
      if($subscr->Update($ID, array("CONFIRM_CODE"=>$_REQUEST['CONFIRM_CODE']))):
      ?>
      <scripttype="text/javascript" charset="utf-8" async defer>
        $(function(){
          $("#subscribe-success").modal()
        })
      </script>
      <?
      endif;
  }
}
?>
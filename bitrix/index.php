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
      	<a href="/about/#go-inside">Mars Inside</a>
        <a href="/about/" class="no"><span class="flag">Видео Mars СНГ<?=svg('flag')?></span></a>
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
          <?php
              global $event_filter1;
              $event_filter1 = array('=PROPERTY_TYPE'=>6, ">=PROPERTY_DATE" => date('Y-m-d')." 00:00:00", "!PROPERTY_OPEN"=>"7");
              $APPLICATION->IncludeComponent("bitrix:news.list", "open_flag", 
              array(
              "IBLOCK_ID"            => 1,
              "NEWS_COUNT"           => "10",
              "FILTER_NAME"          => "event_filter1",
              "DETAIL_URL"           => "/events/#ELEMENT_CODE#/",
              "CACHE_TYPE"           => "A",
              "SET_TITLE"            => "N",
              "CACHE_FILTER"         => "Y"
               ),
               false
            );
          ?>
	        <a href="/academy/#go-lectures" class="big"><span>Лекции и мастер-классы</span>
          </a>
          <?php
              global $event_filter2;
              $event_filter2 = array('!PROPERTY_TYPE'=>6, ">=PROPERTY_DATE" => date('Y-m-d')." 00:00:00", "!PROPERTY_OPEN"=>"7");
              $APPLICATION->IncludeComponent("bitrix:news.list", "open_flag", 
              array(
              "IBLOCK_ID"            => 1,
              "NEWS_COUNT"           => "1",
              "FILTER_NAME"          => "event_filter2",
              "DETAIL_URL"           => "/events/",
              "CACHE_TYPE"           => "A",
              "CACHE_FILTER"         => "Y",
              "SET_TITLE"            => "N"
               ),
               false
            );
          ?>
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
?>
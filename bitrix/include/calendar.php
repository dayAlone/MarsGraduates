<?require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php");?>
<div id="cal-day">
  <?
    if($_REQUEST['date']):
      $date = strtotime($_REQUEST['date']);
    elseif($APPLICATION->GetPageProperty('day')):
      $date = strtotime($APPLICATION->GetPageProperty('day'));
    else:
      $date = strtotime(date('d.m.Y'));
      CModule::IncludeModule("iblock");
      $arSelect = Array("ID", "PROPERTY_DATE");
      $arFilter = Array("IBLOCK_ID"=>1, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", ">=PROPERTY_DATE" => date('Y-m-d')." 00:00:00");
      $res = CIBlockElement::GetList(Array("PROPERTY_DATE"=>"ASC"), $arFilter, $arSelect);
      $arFields = $res->Fetch();
      $date = strtotime($arFields['PROPERTY_DATE_VALUE']);
      
    endif;
  ?>

  <div class="day" data-date="<?= date('d.m.Y', $date) ?>">
  	<a href="#" class="arrow left" data-date="<?=date('d.m.Y', strtotime('-1 day', $date))?>">
  		<?=svg('arrow-left')?>
  	</a>
  	<a href="#" class="arrow right" data-date="<?=date('d.m.Y', strtotime('+1 day', $date))?>">
  		<?=svg('arrow-right')?>
  	</a>
  	<span class="text"><?= date('j', $date) ?></span>
  	<span class="week"><? russian_week(date('N', $date)) ?></span>
  	<span class="month"><? russian_month(date('n', $date)) ?></span>
  </div>
  <a class="cal" href="/events/">Календарь событий<?=svg('arrow-3')?></a>

    <?
      global $day_filter;
      $day_filter = array(
        ">=PROPERTY_DATE" => date('Y-m-d', $date)." 00:00:00",
        "<=PROPERTY_DATE" => date('Y-m-d', $date)." 23:59:59",
      );
      $APPLICATION->IncludeComponent("bitrix:news.list", "events_day", 
        array(
        "IBLOCK_ID"            => 1,
        "NEWS_COUNT"           => "4",
        "SORT_BY1"             => "DATE",
        "SORT_ORDER1"          => "ASC",
        "FILTER_NAME"          => "day_filter",
        "CACHE_FILTER"         => "Y",
        "PROPERTY_CODE"        => Array("CITY", "DATE", "TYPE", "DIRECTION", "OPEN"),
        "DETAIL_URL"           => "/events/#ELEMENT_CODE#/",
        "CACHE_TYPE"           => "A",
        "DISPLAY_PANEL"        => "N",
        "DISPLAY_TOP_PAGER"    => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "SET_TITLE"            => "N"
           ),
        false
      );
    ?>
    <?php
      $APPLICATION->IncludeComponent("bitrix:news.list", "career_side", 
      array(
      "IBLOCK_ID"            => 7,
      "NEWS_COUNT"           => "0",
      "SORT_BY1"             => "ID",
      "SORT_ORDER1"          => "ASC",
      "PROPERTY_CODE"        => Array("OPEN", "SIDE"),
      "DETAIL_URL"           => "/career/",
      "CACHE_TYPE"           => "A",
      "CACHE_FILTER"         => "Y",
      "DISPLAY_PANEL"        => "N",
      "DISPLAY_TOP_PAGER"    => "N",
      "DISPLAY_BOTTOM_PAGER" => "N",
      "SET_TITLE"            => "N"
         ),
         false
      );
    ?>
    <?
    $promo_filter = array(
      ">=DATE_ACTIVE_TO" => date('Y-m-d')." 00:00:00",
      "<=DATE_ACTIVE_FROM" => date('Y-m-d')." 23:59:59",
    );
    $APPLICATION->IncludeComponent("bitrix:news.list", "promo", 
      array(
          "IBLOCK_ID"            => 9,
          "NEWS_COUNT"           => "0",
          "SORT_BY1"             => "ID",
          "SORT_ORDER1"          => "ASC",
          "FILTER_NAME"          => array('NAME', 'DETAIL_TEXT', 'PREVIEW_TEXT'),
          "PROPERTY_CODE"        => Array("LINK"),
          "DETAIL_URL"           => "",
          "CACHE_TYPE"           => "A",
          "CACHE_FILTER"         => "Y",
          "DISPLAY_PANEL"        => "N",
          "DISPLAY_TOP_PAGER"    => "N",
          "DISPLAY_BOTTOM_PAGER" => "N",
          "SET_TITLE"            => "N"
         ),
         false
      );
    /*
  	<a class="star">
  		<?=svg('star')?>
    	<div class="text">ВИКТОРИНА <br>С СУПЕР-ПРИЗОМ!</div>
    </a>
    */?>
    <? if(intval($APPLICATION->GetPageProperty('count'))>0):
      $count = str_split($APPLICATION->GetPageProperty('count'));
    ?>
      <div class="counter center">
        <?foreach ($count as $n) {
          echo svg($n);
        }?><br>
        зарегистрировались
      </div>
    <?endif;?>


</div>
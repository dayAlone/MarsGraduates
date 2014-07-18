<?require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php");?>
<div id="cal-day">
  <?
    if($_REQUEST['date']):
      $date = strtotime($_REQUEST['date']);
    else:
      $date = strtotime(date('d.m.Y'));
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
        "PROPERTY_CODE"        => Array("CITY", "DATE", "TYPE", "DIRECTION"),
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
      "FILTER_NAME"          => "",
      "PROPERTY_CODE"        => Array("OPEN"),
      "DETAIL_URL"           => "/career/",
      "CACHE_TYPE"           => "A",
      "DISPLAY_PANEL"        => "N",
      "DISPLAY_TOP_PAGER"    => "N",
      "DISPLAY_BOTTOM_PAGER" => "N",
      "SET_TITLE"            => "N"
         ),
         false
      );
    ?>
    <?/*
  	<a class="star">
  		<?=svg('star')?>
    	<div class="text">ВИКТОРИНА <br>С СУПЕР-ПРИЗОМ!</div>
    </a>
    */?>
</div>
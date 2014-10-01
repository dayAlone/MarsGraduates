<? 
	require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php"); 
	$date = strtotime($_REQUEST['date']);
	if(!$date)
		$date = time();


?>
<div id="day">
	<button type="button" class="close" data-dismiss="modal"><?=svg('close')?></button>
	<div class="title">
		<div class="row">
			<div class="col-md-6 col-xs-6">
				<span class="day"><?=date('j', $date)?></span>
				<span class="month"><?russian_month(date('n', $date))?></span>
			</div>
			<div class="col-md-6 col-xs-6">
				<span class="week"><?russian_week(date('N', $date), true)?></span>
			</div>
		</div>
	</div>
	<?
		global $day_filter;
		$day_filter = array(
			">=PROPERTY_DATE" => date('Y-m-d', $date)." 00:00:00",
			"<=PROPERTY_DATE" => date('Y-m-d', $date)." 23:59:59",
		);
		$APPLICATION->IncludeComponent("bitrix:news.list", "events_popup", 
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
        "CACHE_FILTER"         => "Y",
        "SET_TITLE"            => "N"
           ),
        false
      );
    ?>
</div>
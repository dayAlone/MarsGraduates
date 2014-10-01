<?
	require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php");

	if(!$_SESSION['current_date']) 
		$_SESSION['current_date'] = time();

	if($_REQUEST['a']):
		if($_REQUEST['a']=='left')
			$new_time = strtotime("-1 Month", $_SESSION['current_date']);
		else
			$new_time = strtotime("+1 Month", $_SESSION['current_date']);
		$_SESSION['current_date'] = $new_time;
	endif;

	$current_date = $_SESSION['current_date'];

	$year     = date('Y', $current_date);
	$month    = date('m', $current_date);
	$last_day = date('t', $current_date);
	if (date('N', strtotime("1.$month.$year"))!=1)		
		$start = strtotime("last Monday", strtotime("1.$month.$year"));
	else
		$start = strtotime("1.$month.$year");

	if (date('N', strtotime("$last_day.$month.$year"))!=7)
		$end = strtotime("next Sunday", strtotime("$last_day.$month.$year"));
	else
		$end = strtotime("$last_day.$month.$year");

	$events_filter = array(
		">=PROPERTY_DATE" => date('Y-m-d', $start)." 00:00:00",
		"<=PROPERTY_DATE" => date('Y-m-d', $end)." 23:59:59",
	);

	if($_COOKIE['city'])
		$events_filter["PROPERTY_CITY.ID"] = $_COOKIE['city'];

	$APPLICATION->IncludeComponent("bitrix:news.list", "events_cal", 
	  array(
	  "IBLOCK_ID"            => 1,
	  "NEWS_COUNT"           => "0",
	  "SORT_BY1"             => "DATE",
	  "SORT_ORDER1"          => "ASC",
	  "FILTER_NAME"          => "events_filter",
	  "PROPERTY_CODE"        => Array("CITY", "DATE", "TYPE", "DIRECTION"),
	  "DETAIL_URL"           => "/events/#ELEMENT_CODE#/",
	  "CACHE_TYPE"           => "A",
	  "DISPLAY_PANEL"        => "N",
	  "DISPLAY_TOP_PAGER"    => "N",
	  "CACHE_FILTER"         => "Y",
	  "DISPLAY_BOTTOM_PAGER" => "N",
	  "SET_TITLE"            => "N"
	     ),
	  false
	);
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Mars Graduates");
$APPLICATION->SetPageProperty('body_class', "event");
$APPLICATION->IncludeComponent("bitrix:news.detail","event",Array(
    "IBLOCK_ID"     => "1",
    "IBLOCK_TYPE"    => "events",
    "ELEMENT_CODE"  => $_REQUEST["ELEMENT_CODE"],
    "CHECK_DATES"   => "N",
    "CACHE_TYPE"    => "A",
    "FIELD_CODE"    => Array("ID", "PREVIEW_PICTURE", "DETAIL_PICTURE"),
    "SET_TITLE"     => "N",
    "PROPERTY_CODE" => Array("CITY", "LAST_YEAR", "DATE", "DIRECTION","DIRECTION.NAME", "SPEAKERS", "TYPE", "GROUP", "ADDRESS", "SHEDULE", "IMAGE", "OPEN"),
)
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
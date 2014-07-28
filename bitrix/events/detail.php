<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Mars Graduates");
$APPLICATION->SetPageProperty('body_class', "event");
$APPLICATION->IncludeComponent("bitrix:news.detail","event",Array(
    "IBLOCK_ID"     => "1",
    "IBLOCK_TYPE"    => "events",
    "ELEMENT_CODE"  => $_REQUEST["ELEMENT_CODE"],
    "CHECK_DATES"   => "N",
    "FIELD_CODE"    => Array("ID"),
    "PROPERTY_CODE" => Array("CITY", "DATE", "DIRECTION", "SPEAKERS", "TYPE", "GROUP", "ADDRESS", "SHEDULE"),
)
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
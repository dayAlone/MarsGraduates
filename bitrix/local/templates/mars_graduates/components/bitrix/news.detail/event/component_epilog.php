<?
	if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	$prop = &$arResult["PROPS"];
	global $APPLICATION;
	$APPLICATION->SetTitle($prop['TYPE'].": «".$arResult["NAME"]."»");
	$APPLICATION->SetPageProperty('day', $prop['DATE']);
	$APPLICATION->SetPageProperty('og:image', $prop['DIRECTION']['TITLE_IMAGE']);
	$APPLICATION->SetPageProperty('description', $arResult["DETAIL_TEXT"]);
	$this->SetViewTarget('day');
	      require_once($_SERVER['DOCUMENT_ROOT'].'/include/calendar.php');
	$this->EndViewTarget();
	$this->SetViewTarget('header');
			
	      ?><link rel="image_src" href="http://<?=$_SERVER['SERVER_NAME'].$prop['DIRECTION']['TITLE_IMAGE']?>" /><?
	$this->EndViewTarget();
?>
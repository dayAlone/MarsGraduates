<?
	CModule::IncludeModule("iblock");
	$res = CIBlockElement::GetByID($arResult["PROPERTIES"]["TYPE"]["VALUE"]);
	if($ar_res = $res->GetNext())
		$APPLICATION->SetTitle($ar_res['NAME'].": «".$arResult["NAME"]."»");
?>
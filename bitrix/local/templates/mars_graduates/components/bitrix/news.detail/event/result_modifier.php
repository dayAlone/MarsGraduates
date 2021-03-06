
<?
	$arResult["PROPS"] = array();
	$prop = &$arResult["PROPS"];
	foreach ($arResult["PROPERTIES"] as $key => $item) {
		switch ($item['CODE']) {
			case 'DATE':
			case 'GROUP':
			case 'ADDRESS':
			case 'SHEDULE':
				$prop[$item["CODE"]] = $item["VALUE"];
				break;
			case 'LAST_YEAR':
				$prop[$item["CODE"]] = html_entity_decode($item["VALUE"]["TEXT"]);
				break;
			case 'OPEN':
				$prop[$item["CODE"]] = $item["VALUE_XML_ID"];
				break;
			case 'TYPE':
			case 'CITY':
				$res = CIBlockElement::GetByID($item["VALUE"]);
				if($ar_res = $res->GetNext())
				  $prop[$item["CODE"]] = array('name'=>$ar_res['NAME'], 'code'=>$ar_res['CODE']);
				break;
			case 'IMAGE':
				$prop["IMAGE"] = CFile::GetPath($$item);
			case 'DIRECTION':
				$res = CIBlockElement::GetByID($item["VALUE"]);
				if($ar_res = $res->GetNext()) {
				  $res2 = CIBlockElement::GetProperty($ar_res['IBLOCK_ID'], $ar_res['ID'], "sort", "asc", array("CODE" => "IMAGE"));
    			  $image = $res2->Fetch();
    			  $res3 = CIBlockElement::GetProperty($ar_res['IBLOCK_ID'], $ar_res['ID'], "sort", "asc", array("CODE" => "COLOR"));
    			  $color = $res3->Fetch();
				  $prop[$item["CODE"]] = array(
						"NAME"        => $ar_res['NAME'],
						"CODE"        => $ar_res['CODE'],
						"IMAGE"       => CFile::GetPath($ar_res['DETAIL_PICTURE']),
						"TITLE_IMAGE" => CFile::GetPath($image["VALUE"]),
						"COLOR"       => $color['VALUE_XML_ID']
				  	);
				}
				break;
			case 'SPEAKERS':
				$prop[$item["CODE"]] = array();
				foreach ($item["VALUE"] as $value) {
					$res = CIBlockElement::GetByID($value);
					if($ar_res = $res->GetNext())
						$prop[$item["CODE"]][] = array(
							"NAME"  => $ar_res["NAME"],
							"IMAGE" => CFile::GetPath($ar_res["PREVIEW_PICTURE"]),
							"TEXT"  => $ar_res["PREVIEW_TEXT"]
						);
				}
				 
				break;
		}
	}
	global $APPLICATION;

	$arUsers = CGroup::GetGroupUser($prop['GROUP']);

	$APPLICATION->SetPageProperty('day', $prop['DATE']);
	$APPLICATION->SetPageProperty('count', count($arUsers));
	if(isset($prop['DIRECTION'])){
		$APPLICATION->SetPageProperty('og:image', $prop['DIRECTION']['TITLE_IMAGE']);
	}
	else{
		$APPLICATION->SetPageProperty('og:image', $arResult['PREVIEW_PICTURE']['SRC']);
	}
	$APPLICATION->SetPageProperty('description', strip_tags($arResult["DETAIL_TEXT"]));
	$this->SetViewTarget('day');
	      require_once($_SERVER['DOCUMENT_ROOT'].'/include/calendar.php');
	$this->EndViewTarget();
	$this->SetViewTarget('header');
			
	      ?><link rel="image_src" href="http://<?=$_SERVER['SERVER_NAME'].(isset($prop['DIRECTION'])?$prop['DIRECTION']['TITLE_IMAGE']:$arResult['PREVIEW_PICTURE']['SRC'])?>" /><?
	$this->EndViewTarget();
	
?>
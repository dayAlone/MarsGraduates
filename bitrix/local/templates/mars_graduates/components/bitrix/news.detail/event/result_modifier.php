
<?
	$arResult["PROPS"] = array();
	$prop = &$arResult["PROPS"];
	foreach ($arResult["PROPERTIES"] as $key => $item) {
		switch ($item['CODE']) {
			case 'TYPE':
			case 'CITY':
				$res = CIBlockElement::GetByID($item["VALUE"]);
				if($ar_res = $res->GetNext()) {
				  $prop[$item["CODE"]] = $ar_res['NAME'];
				}
				break;
			case 'DIRECTION':
				$res = CIBlockElement::GetByID($item["VALUE"]);
				if($ar_res = $res->GetNext()) {
				  $prop[$item["CODE"]] = array(
				  	"NAME"  => $ar_res['NAME'],
				  	"IMAGE" => CFile::GetPath($ar_res['DETAIL_PICTURE'])
				  	);
				}
				break;
			case 'SHEDULE':
				$prop[$item["CODE"]] = $item["VALUE"];
				break;
			case 'SPEAKERS':
				$prop[$item["CODE"]] = array();
				foreach ($item["VALUE"] as $value) {
					$res = CIBlockElement::GetByID($value);
					if($ar_res = $res->GetNext()) {
						$prop[$item["CODE"]][] = array(
							"NAME"  => $ar_res["NAME"],
							"IMAGE" => CFile::GetPath($ar_res["PREVIEW_PICTURE"]),
							"TEXT"  => $ar_res["PREVIEW_TEXT"]
						);
					}
				}
				 
				break;
			case 'DATE':
			case 'GROUP':
			case 'ADDRESS':
				$prop[$item["CODE"]] = $item["VALUE"];
				break;
		}
	}
?>

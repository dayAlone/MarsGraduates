<?
	AddEventHandler("iblock", "OnAfterIBlockElementAdd", "OnAfterIBlockElementHandler");
	AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "OnAfterIBlockElementHandler");

	function OnAfterIBlockElementHandler(&$arFields)
	{
		if($arFields["IBLOCK_ID"]==1) {

			$prop = array();

			$raw = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("IBLOCK_ID"=>1, "CODE"=>"GROUP"));
			while($data = $raw->Fetch())
				$prop[$data['CODE']] = array_values($arFields["PROPERTY_VALUES"][$data['ID']])[0]["VALUE"];

			$raw = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("IBLOCK_ID"=>1, "CODE"=>"DATE"));
			while($data = $raw->Fetch())
				$prop[$data['CODE']] = array_values($arFields["PROPERTY_VALUES"][$data['ID']])[0]["VALUE"];
			
			$date = date('d.m.Y', strtotime($prop["DATE"]));
			$name = "[".$date."] ".$arFields['NAME'];

			if(!$prop["GROUP"]) {
				$group = new CGroup;
				
				$fields = Array(
					"ACTIVE" => "Y",
					"C_SORT" => 100,
					"NAME"   => $name,
					"STRING_ID" => $arFields['CODE']
				  );
				$NEW_GROUP_ID = $group->Add($fields);
				if($NEW_GROUP_ID>0)
					CIBlockElement::SetPropertyValuesEx($arFields['ID'], $arFields['IBLOCK_ID'], array("GROUP"=>$NEW_GROUP_ID));
			}
			else {
				$raw = CGroup::GetByID($prop["GROUP"]);
				$group = $raw->Fetch();
				if($group['NAME']!=$name) {
					$group = new CGroup;
					$arFields = Array(
					  "NAME" => $name,
					 );
					$group->Update($prop["GROUP"], $arFields);
				}
			}
			
		}
	}

	function svg($value='')
	{
		$path = $_SERVER["DOCUMENT_ROOT"]."/layout/images/svg/".$value.".svg";
		return file_get_contents($path);
	}

	function body_class() {
		global $APPLICATION;
		if($APPLICATION->GetPageProperty('body_class')) {
			return $APPLICATION->GetPageProperty('body_class');
		}
	}

	function russian_month($date, $normal=false) {
		if(!$date)
			$date = date("n");
		
		if($normal) {
			switch ($date){
				case 1: $m  ='январь';   break;
				case 2: $m  ='февраль';  break;
				case 3: $m  ='март';    break;
				case 4: $m  ='апрель';   break;
				case 5: $m  ='май';      break;
				case 6: $m  ='июнь';     break;
				case 7: $m  ='июль';     break;
				case 8: $m  ='август';  break;
				case 9: $m  ='сентябрь'; break;
				case 10: $m ='октябрь';  break;
				case 11: $m ='ноябрь';   break;
				case 12: $m ='декабрь';  break;
			}
		}
		else {
			switch ($date){
				case 1: $m  ='января';   break;
				case 2: $m  ='февраля';  break;
				case 3: $m  ='марта';    break;
				case 4: $m  ='апреля';   break;
				case 5: $m  ='мая';      break;
				case 6: $m  ='июня';     break;
				case 7: $m  ='июля';     break;
				case 8: $m  ='августа';  break;
				case 9: $m  ='сентября'; break;
				case 10: $m ='октября';  break;
				case 11: $m ='ноября';   break;
				case 12: $m ='декабря';  break;
			}
		}
		echo $m;
	}

	function russian_week($date, $normal=false) {
		if(!$date)
			$date = date("N");
		if($normal) {
			switch ($date){
				case 1: $m  ='пн'; break;
				case 2: $m  ='вт'; break;
				case 3: $m  ='ср'; break;
				case 4: $m  ='чт'; break;
				case 5: $m  ='пт'; break;
				case 6: $m  ='сб'; break;
				case 7: $m  ='вс'; break;
			}
		}
		else {
			switch ($date){
				case 1: $m  ='в понедельник'; break;
				case 2: $m  ='во вторник';    break;
				case 3: $m  ='в среду';       break;
				case 4: $m  ='в четверг';     break;
				case 5: $m  ='в пятницу';     break;
				case 6: $m  ='в субботу';     break;
				case 7: $m  ='в воскресенье'; break;
			}
		}
		echo $m;
	}
?>
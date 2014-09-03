<?
	$items = array();

	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['DATE'] = date('j.m', strtotime($item['PROPERTIES']['DATE']['VALUE']));

		# Город мероприятия
		$raw = CIBlockElement::GetProperty($item['PROPERTIES']['CITY']['LINK_IBLOCK_ID'], $item['PROPERTIES']['CITY']['VALUE'], array("sort" => "asc"), Array("CODE"=>"SHORT"));
		$raw_data = $raw->Fetch();
		$item['CITY'] = $raw_data['VALUE'];

		# Направление мероприятия
		$raw = CIBlockElement::GetProperty($item['PROPERTIES']['DIRECTION']['LINK_IBLOCK_ID'], $item['PROPERTIES']['DIRECTION']['VALUE'], array("sort" => "asc"), Array("CODE"=>"COLOR"));
		$raw_data = $raw->Fetch();
		$item['DIRECTION'] = $raw_data['VALUE_XML_ID'];
		

		# Тип мероприятия
		$raw = CIBlockElement::GetByID($item['PROPERTIES']['TYPE']['VALUE']);
		$raw_data = $raw->Fetch();
		$item['TYPE'] = $raw_data['NAME'];

		if(!$items[$item['DATE']])
			$items[$item['DATE']] = array();
		
		$items[$item['DATE']][] = $item;
		
	endforeach;

	$arResult['ITEMS'] = $items;
?>
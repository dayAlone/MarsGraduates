<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['SVG'] = $_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['SVG']['VALUE']);
		$item['TITLE'] = $item['PROPERTIES']['TITLE']['VALUE'];
		$item['COLOR'] = $item['PROPERTIES']['COLOR']['VALUE_XML_ID'];
	endforeach;
?>
<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['SVG'] = $_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['SVG']['VALUE']);
		$item['OPEN'] = $item['PROPERTIES']['OPEN']['VALUE'];
	endforeach;
?>
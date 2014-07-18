<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['SECTION'] = $item['PROPERTIES']['SECTION']['VALUE'];
		$item['LINK'] = $item['PROPERTIES']['LINK']['VALUE'];
	endforeach;
?>
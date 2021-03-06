<?
	foreach ($arResult['ITEMS'] as $key => &$item):
		$item['OPEN'] = $item['PROPERTIES']['OPEN']['VALUE'];
		$item['SIDE'] = $item['PROPERTIES']['SIDE']['VALUE'];
		if(!$item['OPEN']):
			unset($arResult['ITEMS'][$key]);
		else:
			if(isset($item['SIDE'])):
				$item['NAME'] = $item['SIDE'];
			else:
				$expr = '/(?<=\s|^)[a-z]/i';
				preg_match_all($expr, $item['NAME'], $matches);
				$result = implode('', $matches[0]);
				$item['NAME'] = strtoupper($result);
			endif;
		endif;

	endforeach;
?>
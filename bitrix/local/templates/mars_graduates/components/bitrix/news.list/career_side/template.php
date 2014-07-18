<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$open = array();
foreach ($arResult['ITEMS'] as $key => &$item):
	$open[] = $item['NAME'];
endforeach;?>
<a href="/career/" class="flag">Внимание, открыт <br>набор на <?=implode(" и ", $open)?>!<?=svg('flag')?></a>
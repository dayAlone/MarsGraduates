<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div id="cities_list">
	<a href="#" data-id="">Вся Россия</a>
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
    <a href="#" data-id="<?=$item['ID']?>"><?=$item['NAME']?></a>
<?endforeach;?>
</div>

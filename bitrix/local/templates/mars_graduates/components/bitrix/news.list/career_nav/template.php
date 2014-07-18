<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<ul class="nav">
    <li><a href="#top"><?=svg("simple-key")?></a></li>
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	<li><a href="#<?=$item["CODE"]?>" class="small"></a></li>
<?endforeach;?>
</ul>
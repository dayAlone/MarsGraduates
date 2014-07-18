<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?foreach ($arResult['ITEMS'] as $key => &$item):?>
    <div class="item">
		<h3><?=$item['NAME']?></h3>
		<p><?=$item['SECTION']?></p>
		<a href="<?=$item['LINK']?>" target="_blank">Подать заявку</a>
	</div>
<?endforeach;?>


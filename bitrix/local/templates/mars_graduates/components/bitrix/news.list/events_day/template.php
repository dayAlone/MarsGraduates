<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?foreach ($arResult['ITEMS'] as $key => &$item):
	?>
	<a class="event <?=$item['DIRECTION']?>" href="<?=$item['DETAIL_PAGE_URL']?>">
		<span class="city"><?=$item['CITY']?></span>
		<span class="type"><?=$item['TYPE']?></span>
		<br>
		<span class="name"><?=$item['NAME']?></span>
		<?if($item['OPEN']!="N"):?>
		<span class="reg">Регистрация</span>
		<?endif;?>
	</a>
<? endforeach; ?>
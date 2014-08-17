<?if(count($arResult['ITEMS'])>0):
	$item = $arResult['ITEMS'][0];
	$link = $item['PROPERTIES']['LINK']['VALUE'];
	if(strlen($link)==0){
		$link = '#promo-modal';
		$additional = 'data-toggle="modal" data-target="#promo-modal"';
	}
	else
		$additional = 'target="_blank"';

?>
<a class="star" href="<?=$link?>" <?=$additional?>>
	<?=svg('star')?>
	<div class="text">ВИКТОРИНА <br>С СУПЕР-ПРИЗОМ!</div>
</a>
<?endif;?>
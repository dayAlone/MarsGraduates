<?if(count($arResult['ITEMS'])>0):
	$item = $arResult['ITEMS'][0];
?>
<h1><?=$item['NAME']?></h1>
<div class="text">
	<?=$item['~PREVIEW_TEXT']?>
</div>
<?endif;?>
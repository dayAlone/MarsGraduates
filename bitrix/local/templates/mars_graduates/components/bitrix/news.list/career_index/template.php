<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	<a href="<?=$item['DETAIL_PAGE_URL']?>" class="<?=$item['CODE']?> big <?=($item['OPEN']?"open":"")?>">
		<?=file_get_contents($item['SVG'])?>
		<span><?=$item['NAME']?></span>
		<? if($item['OPEN']):?>
			<span class="flag">
				<span>Внимание, <br>открыт набор!</span>
				<?=svg('flag')?>
			</span>
		<? endif;?>
	</a>	
<?endforeach;?>


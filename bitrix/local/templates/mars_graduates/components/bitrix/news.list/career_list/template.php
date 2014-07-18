<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="sections">
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	<a href="#<?=$item['CODE']?>">
		<?=file_get_contents($item['SVG'])?>
		<span class="text"><?=preg_replace('/ /', '</span><span class="text">', $item['NAME'], 1)?></span>
	</a>
<?endforeach;?>
</div>

<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	<div class="row elm item <?=$item['CODE']?>">
      	<a name="<?=$item['CODE']?>" id="<?=$item['CODE']?>" class="anchor"></a>
        <div class="col-md-5 col-xs-5"><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></div>
        <div class="col-md-7 col-xs-7">
          <h3><span><?=preg_replace('/ /', '</span><span>', $item['NAME'], 1)?></span></h3>
          <p><?=$item['~PREVIEW_TEXT']?></p>
		  <? if($item['OPEN']):?>
			<span class="flag">
				<span>Внимание, <br>открыт набор!</span>
				<?=svg('flag')?>
			</span>
		  <? endif;?>
          <a href="#modal<?=ucfirst($item['CODE'])?>" data-toggle="modal" data-target="#modal<?=ucfirst($item['CODE'])?>" class="more">Подробнее</a>
        </div>
      </div>
<?endforeach;?>


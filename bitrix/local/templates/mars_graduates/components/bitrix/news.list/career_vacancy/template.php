<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['ITEMS'])>0):
?>
<div class="col-md-4 col-xs-5">
    <div class="scroll">
    	<div class="frame">
	        <h2>Вакансии</h2>
	        <?foreach ($arResult['ITEMS'] as $key => &$item):?>
			    <div class="item">
					<h3><?=$item['NAME']?></h3>
					<p><?=$item['SECTION']?></p>
					<a href="<?=$item['LINK']?>" target="_blank">Подать заявку</a>
				</div>
			<?endforeach;?>
		</div>
	</div>
</div>
<?endif;?>
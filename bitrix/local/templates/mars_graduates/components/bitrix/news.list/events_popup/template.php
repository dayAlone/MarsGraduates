<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
	$this->setFrameMode(true);
	foreach ($arResult['ITEMS'] as $key => &$item):
	?>
	<div class="item <?=$item['DIRECTION']?>">
		<div class="row">
			<div class="col-md-8 col-xs-8">
				<a href="<?=$item['DETAIL_PAGE_URL']?>">
					<div class="city"><?=$item['CITY']?></div>
					<div class="type"><?=$item['TYPE']?></div>
					<div class="name">«<?=$item['NAME']?>»</div>
				</a>
			</div>

			<a href="<?=$item['DETAIL_PAGE_URL']?>" class="reg">
				Регистрация
			</a>
		</div>
	</div>
<? endforeach; ?>
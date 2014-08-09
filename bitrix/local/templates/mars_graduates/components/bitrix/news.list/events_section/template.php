<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?
	if(count($arResult['ITEMS'])>0):
	?>
	<h6>Ближайшие события по направлению:</h6>
	<?
	endif;
	foreach ($arResult['ITEMS'] as $key => &$item):
	?>
	<a href="<?=$item['DETAIL_PAGE_URL']?>" class="event">
      <div class="type"><?=$item['TYPE']?></div>
      <div class="city"><?=$item['CITY']?></div>
      <div class="title"><?=$item['NAME']?></div>
      <div class="reg">Регистрация</div>
    </a>
<? endforeach; ?>
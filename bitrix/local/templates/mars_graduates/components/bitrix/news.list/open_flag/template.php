<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
<a href="<?=$item['DETAIL_PAGE_URL']?>" class="big no">
	<span class="flag">
	  <span>Внимание, открыта<br> регистрация!</span>
	  <?=svg('flag')?>
	</span>
</a>
<? endforeach; ?>
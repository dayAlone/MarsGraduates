<?
$this->setFrameMode(true);
?>
<ul>
	<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	if (!empty($arResult)):
		foreach($arResult as $arItem):
			?>
			<li>
				<a href="<?=$arItem['LINK']?>" class="<?=($arItem['SELECTED']?'active':'')?> <?=($arItem['LINK']=='/'?"main":"")?>">
					<?=($arItem['LINK']=='/'?svg('home'):$arItem['TEXT'])?>
				</a>
				<?
					if($arItem['LINK']=='/events/' && $APPLICATION->GetCurPage() != '/')
						require_once($_SERVER['DOCUMENT_ROOT'].'/include/calendar.php');
				?>
			</li>
	        <?
		endforeach;
	endif?>
</ul>
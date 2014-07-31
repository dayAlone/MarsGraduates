<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<div class="parts">
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
		<a href="#<?=$item['CODE']?>">
            <div class="text">
            	<span class="text"><?=preg_replace('/ /', '</span><span class="text">', $item['NAME'], 1)?></span>
            </div>
            <?=file_get_contents($item['SVG'])?>
        </a>
<?endforeach;?>
</div>
<?foreach ($arResult['ITEMS'] as $key => &$item):?>
	      <div class="item <?=$item['COLOR']?>">
          <a name="<?=$item['CODE']?>" id="<?=$item['CODE']?>" class="anchor"></a>
          <div class="row">
            <div class="col-md-5 col-xs-5"><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>"></div>
            <div class="col-md-7 col-xs-7">
              <h3><?=$item['NAME']?></h3>
              <h5><?=$item['TITLE']?></h5>
              <p><?=$item['PREVIEW_TEXT']?></p>
              <div class="events">
                <?
                  global $academy_filter;
                  $academy_filter = array(
                    ">=PROPERTY_DATE" => date('Y-m-d')." 00:00:00",
                    "PROPERTY_DIRECTION.ID" => $item['ID']
                  );
                  $APPLICATION->IncludeComponent("bitrix:news.list", "events_section", 
                    array(
                    "IBLOCK_ID"            => 1,
                    "NEWS_COUNT"           => "4",
                    "SORT_BY1"             => "DATE",
                    "SORT_ORDER1"          => "ASC",
                    "FILTER_NAME"          => "academy_filter",
                    "PROPERTY_CODE"        => Array("CITY", "DATE", "TYPE", "DIRECTION"),
                    "DETAIL_URL"           => "/events/#ELEMENT_CODE#/",
                    "CACHE_TYPE"           => "A",
                    "DISPLAY_PANEL"        => "N",
                    "DISPLAY_TOP_PAGER"    => "N",
                    "DISPLAY_BOTTOM_PAGER" => "N",
                    "SET_TITLE"            => "N"
                       ),
                    false
                  );
                ?>
              </div>
            </div>
          </div>
        </div>
<?endforeach;?>

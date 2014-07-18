<?
	$this->setFrameMode(true);
	global $events_filter;

	$current_date = $_SESSION['current_date'];
	
	$start = strtotime($events_filter[">=PROPERTY_DATE"]);
	$end   = strtotime($events_filter["<=PROPERTY_DATE"]);

	$year     = date('Y', $current_date);
	$month    = date('m', $current_date);
	$weeks = 0;
?>
<div class="frame" data-date="<?=$current_date?>">
	<div class="title">
		<div class="row">
			<div class="col-md-3 col-xs-3">
				<a class="select">
				<?
					if($_COOKIE['city']):
						CModule::IncludeModule("iblock");
						$raw = CIBlockElement::GetByID($_COOKIE['city']);
						$raw_data = $raw->Fetch();?>
						<span><?=$raw_data['NAME']?></span>
					<?else:?>
						<span>выбрать город</span>
				<?endif;?>
					
					<?=svg('arrow-right')?>
				</a>
			<?
			$APPLICATION->IncludeComponent("bitrix:news.list", "cities", 
			  array(
			  "IBLOCK_ID"            => 3,
			  "NEWS_COUNT"           => "0",
			  "SORT_BY1"             => "DATE",
			  "SORT_ORDER1"          => "ASC",
			  "PROPERTY_CODE"        => Array(),
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
			<div class="col-md-6 center col-xs-6">
				<a href="#" class="arrow left" data-direction="left">
					<?=svg('arrow-left')?>
				</a>
				<span class="month">
					<span class="name"><?russian_month(date("m", $current_date),true)?></span><span class="year"><?=date("Y", $current_date)?></span>
				</span>
				<a href="#" class="arrow right" data-direction="right">
					<?=svg('arrow-right')?>
				</a>
			</div>
		</div>
	</div>
	<div class="table th">
		<div class="cell">Пн</div>
		<div class="cell">Вт</div>
		<div class="cell">Ср</div>
		<div class="cell">Чт</div>
		<div class="cell">Пт</div>
		<div class="cell">Сб</div>
		<div class="cell">Вс</div>
	</div>
	<?
	while($start<=$end):
		if (date('N', $start)==1):
			if($weeks!=0):?></div><?endif;?>
			<div class="table">
		<?
		$weeks++;
		endif;?>
			<div class="cell <?=(date('m', $start)!=$month?"inactive":"")?> <?=(in_array((int)date('N', $start), array(6,7))?"end":"")?> <?=(count($arResult['ITEMS'][date('j', $start)])>0?"event":"")?>">
				<?if (date('m', $start)==$month):?>
					<div class="num"><?=date('j',$start)?></div>
				<?endif;?>
				<?if(count($arResult['ITEMS'][date('j', $start)])>0):
					
					foreach ($arResult['ITEMS'][date('j', $start)] as $key => $event):
						?>
						<div class="event <?=$event['DIRECTION']?> <?=($key>0?"hidden":"")?>">
							<a href="<?=$event['DETAIL_PAGE_URL']?>">
					            <div class="city"><?=$event['CITY']?></div>
					            <div class="type"><?=$event['TYPE']?></div>
					            <div class="name">«<?=$event['NAME']?>»</div>
				            </a>
				            <?if(count($arResult['ITEMS'][date('j', $start)])>1 && $key==0):?>
								<a href="#" data-date="<?=date('d.m.Y', $start)?>" class="more">еще одно событие</a>
							<?endif;?>
				        </div>
				<?
					endforeach;
				endif;?>

			</div>
		<?
		$start = strtotime("+1 day", $start);
	endwhile;
?>
	</div>
</div>
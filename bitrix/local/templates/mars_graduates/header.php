<!DOCTYPE html>
<html lang='ru'>
<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <?$APPLICATION->ShowMeta("og:image")?>
  <title><?php $APPLICATION->ShowTitle();?></title>
  <?
  $APPLICATION->ShowViewContent('header');
  global $USER;
  if($USER->isAdmin())
	$APPLICATION->ShowHead();
  ?>
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?>" data-offset="170" data-spy="scroll" style="display:none">
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<div id="question" href="#">
  		<div class="text">Задать<br>вопрос</div>
		<a class="vk" href="http://vk.com/board25625432" target="_blank">
			<?=svg('vk')?>
		</a>
		<a class="mail" href="mailto:mars-graduates@effem.com" target="_blank">
			<?=svg('mail')?>
		</a>
		<div class="sign">?</div>
	</div>
	<div id="maillist">
	  <div class="text">Подписаться</div>
	  <form>
	    <input type="email" placeholder="Эл. почта">
	    <input type="submit" value="">
	  </form>
	  <a href="#"><?=svg('mail')?></a>
	</div>
	<div id="nav">
		<a href="#" class="trigger">
			<?=svg('trigger')?>
		</a>
		<?php
		    $APPLICATION->IncludeComponent("bitrix:menu", "nav", 
		    array(
		        "ALLOW_MULTI_SELECT" => "Y",
		        "MENU_CACHE_TYPE"    => "A",
		        "ROOT_MENU_TYPE"     => "top",
		        "MAX_LEVEL"          => "1",
		        "USE_EXT"            => "Y",
		        ),
		    false);
		?>
		<div class="footer">
    		<div class="social">
    			<?php
				    $APPLICATION->IncludeComponent("bitrix:menu", "social", 
				    array(
				        "ALLOW_MULTI_SELECT" => "Y",
				        "MENU_CACHE_TYPE"    => "A",
				        "ROOT_MENU_TYPE"     => "social",
				        "MAX_LEVEL"          => "1",
				        "USE_EXT"            => "Y",
				        ),
				    false);
				?>
    		</div>
    		<a href="#" class="question">Задать вопрос</a>
    		<a href="#" class="maillist">Подписаться</a>
    	</div>
	</div>
	<div id="toolbar">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-2 col-xs-3">
	      	<a href="/" class="home"><?=svg('home')?></a>
	        <div class="select">
	        	<a href="#" class="trigger">Россия <?=svg('arrow-bottom')?></a>
	        	<ul class="city-list">
					<?php
					    $APPLICATION->IncludeComponent("bitrix:menu", "countries", 
					    array(
					        "ALLOW_MULTI_SELECT" => "Y",
					        "MENU_CACHE_TYPE"    => "A",
					        "ROOT_MENU_TYPE"     => "countries",
					        "MAX_LEVEL"          => "1",
					        "USE_EXT"            => "Y",
					        ),
					    false);
					?>
				</ul>
	        </div>
	      </div>
	      <div class="col-md-8 col-xs-6 logo-frame">
	      	<a href="/" class="logo"><?=svg('logo')?></a>
	      </div>
	      <div class="col-md-2 col-xs-3">
	      	<a href="#" class="nav-trigger"><svg width="38" height="23" viewBox="0 0 38 23" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>trigger</title><path d="M0 0v2h38v-2h-38zm0 7v2h38v-2h-38zm0 7v2h38v-2h-38zm0 7v2h38v-2h-38z" sketch:type="MSShapeGroup" fill="#1A213E" fill-rule="evenodd"/></svg></a>
	        <div class="social">
	        	<?php
				    $APPLICATION->IncludeComponent("bitrix:menu", "social", 
				    array(
				        "ALLOW_MULTI_SELECT" => "Y",
				        "MENU_CACHE_TYPE"    => "A",
				        "ROOT_MENU_TYPE"     => "social",
				        "MAX_LEVEL"          => "1",
				        "USE_EXT"            => "Y",
				        ),
				    false);
				?>
	        </div>
	      </div>
	    </div>
	    
	    <?php
		    $APPLICATION->IncludeComponent("bitrix:menu", "toolbar", 
		    array(
		        "ALLOW_MULTI_SELECT" => "Y",
		        "MENU_CACHE_TYPE"    => "A",
		        "ROOT_MENU_TYPE"     => "top",
		        "MAX_LEVEL"          => "1",
		        "USE_EXT"            => "Y",
		        ),
		    false);
		?>
	
	  </div>
	</div>

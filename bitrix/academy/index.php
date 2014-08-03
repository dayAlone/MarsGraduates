<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Mars Academy | Mars Graduates");
$APPLICATION->SetPageProperty('body_class', "color academy");
?>
<div id="page" class="academy">
  <div class="container">
    <div class="content">
      <?/*
      <div class="scrollspy">
        <ul class="nav">
          <li><a href="#top"><?=svg("simple-shield")?></a></li>
          <li><a href="#conference">1</a></li>
          <li><a href="#lectures">2</a></li>
          <?php
	          $APPLICATION->IncludeComponent("bitrix:news.list", "academy_nav", 
	          array(
	          "IBLOCK_ID"            => 5,
	          "NEWS_COUNT"           => "0",
	          "SORT_BY1"             => "ID",
	          "SORT_ORDER1"          => "ASC",
	          "FILTER_NAME"          => "",
	          "PROPERTY_CODE"        => Array(),
	          "DETAIL_URL"           => "/academy/#",
	          "CACHE_TYPE"           => "A",
	          "DISPLAY_PANEL"        => "N",
	          "DISPLAY_TOP_PAGER"    => "N",
	          "DISPLAY_BOTTOM_PAGER" => "N",
	          "SET_TITLE"            => "N"
	             ),
	             false
	          );
	      ?>
          <li><a href="#games">3</a></li>
        </ul>
      </div>
      */?>
      <a name="top" id="top" class="anchor"></a>
      <h1>
      	MARS ACADEMY
		<?=svg("shield")?>
      </h1>
      <p class="center description">Mars Academy создана с целью передачи студентам практических знаний и навыков работы в сфере FMCG (Fast Moving Consumer Goods, или отрасль потребительских товаров). Образовательные мероприятия проходят во многих городах России как в формате крупных конференций, так и в формате отдельных мастер-классов. </p>
      <div class="sections">
      <a href="#conference"><?/*<span class="num">1</span><br>*/?><span class="text">Конференции</span></a>
      <a href="#lectures"><?/*<span class="num">2</span><br>*/?><span class="text">Лекции<br>и мастер-классы</span></a>
      <a href="#games"><?/*<span class="num">3</span><br>*/?><span class="text">Бизнес-игры<br>и кейс-чемпионаты</span></a></div>
      <div class="elm"><a name="conference" id="conference" class="anchor"></a>
        <h2 class="count">КОНФЕРЕНЦИИ<?/*<span class="num">1</span>*/?></h2>
        <p class="offset">Конференции - самые крупные и значимые события Mars Academy. Это самые интересные темы, самые опытные спикеры, самая большая аудитория и самая суть работы крупного международного FMCG-бизнеса. Мероприятия проводятся всего несколько раз в год в разных городах страны при участии старших менеджеров и директоров компании. Помимо увлекательной содержательной части, конференции включают в себя интерактивные блоки, а также возможность лично пообщаться с представителями отдела персонала компании и задать им животрепещущие вопросы о трудоустройстве и развитии карьеры.</p><a name="lectures" id="lectures" class="anchor"></a>
      </div>
      <div class="elm">
        <h2 class="count big">ЛЕКЦИИ <br>И МАСТЕР-КЛАССЫ<?/*<span class="num">2</span>*/?></h2>
        <p class="offset">Лекции и мастер-классы Mars Academy – это серия познавательных и увлекательных мероприятий, в ходе которых ведущие менеджеры компании поделятся своим профессиональным опытом и на примерах из бизнеса расскажут о том, как теория становится практикой. В рамках Mars Academy проводятся мероприятия по четырем направлениям: «Маркетинг и Продажи», «Финансы и Закупки», «Технологии и Производство», «Развитие Лидерства». Мастер-классы проводятся в разных городах России на базе ведущих вузов страны.</p>
        <?php
          $APPLICATION->IncludeComponent("bitrix:news.list", "academy_list", 
          array(
          "IBLOCK_ID"            => 5,
          "NEWS_COUNT"           => "0",
          "SORT_BY1"             => "ID",
          "SORT_ORDER1"          => "ASC",
          "FILTER_NAME"          => "",
          "PROPERTY_CODE"        => Array('SVG', 'COLOR', 'TITLE'),
          "DETAIL_URL"           => "/academy/#",
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
      <div class="elm"><a name="games" id="games" class="anchor"></a>
        <h2 class="count big">Бизнес-игры <br>и кейс-чемпионаты<?/*<span class="num">3</span>*/?></h2>
        <p class="offset">В компании Mars мы, как никто другой, знаем, что теория теорией, а без практики в жизни никуда. Именно поэтому мы активно поддерживаем направление бизнес-игр в России. Благодаря участию в бизнес-играх и кейс-чемпионатах, у тебя есть возможность не только применить на практике полученные знания, но и проявить свои лидерские качества. Работа в команде, нестандартное мышление, управление рисками, умение правильно преподнести свое решение, ведение переговоров – эти и многие другие навыки являются ключевыми для построения успешной карьеры, и бизнес-игры в полной мере способствуют их развитию.</p>
      </div>
      <a href="#" class="top"><?=svg('totop')?></a>
    </div>
  </div>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
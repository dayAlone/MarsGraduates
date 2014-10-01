<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Карьера | Mars Graduates");
$APPLICATION->SetPageProperty('body_class', "color career");
?>
<div id="page" class="career">
  <div class="container">
    <div class="content">
      <?/*
      <div class="scrollspy">
        <?php
          $APPLICATION->IncludeComponent("bitrix:news.list", "career_nav", 
          array(
          "IBLOCK_ID"            => 7,
          "NEWS_COUNT"           => "99999",
          "SORT_BY1"             => "ID",
          "SORT_ORDER1"          => "ASC",
          "FILTER_NAME"          => "",
          "PROPERTY_CODE"      => Array("SVG", "OPEN"),
          "DETAIL_URL"           => "/career/##ELEMENT_CODE#",
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
      */?>
      <a name="top" id="top" class="anchor"></a>
      <h1>
      	КАРЬЕРА
      	<?=svg("key")?>
      </h1>
      <h4 class="center toggle">5 причин работать в Mars</h4>
      <div class="reasons">
        <div class="item">
          <div class="title">Развитие</div>
          <div class="text">С первого дня работы тебя ждут разнообразные тренинги, обратная связь от коллег и коучинг!</div>
        </div>
        <div class="item">
          <div class="title">Забота</div>
          <div class="text">Мы чувствуем себя частью семейного бизнеса и подходим к работе со всей ответственностью</div>
        </div>
        <div class="item">
          <div class="title">Открытость</div>
          <div class="text">Здесь каждый может связаться с каждым на любом уровне и в любое время.</div>
        </div>
        <div class="item">
          <div class="title">Культура</div>
          <div class="text">Мы крупнейший в мире семейный бизнес, это дает нам свободу и независимость.</div>
        </div>
        <div data-merge="2" class="item">
          <div class="title">Самореализация</div>
          <div class="text">Если тебе не терпится достичь профессиональных высот, проявить себя и показать, на что ты способен, тогда мы ждем тебя в Mars.</div>
        </div>
        <div class="item"></div>
      </div>
      <p class="center description">В компании Mars важную роль играет подготовка собственных кадров. Мы помогаем молодым<br> специалистам делать первые шаги по карьерному пути. Для студентов действует <br>оплачиваемая стажировка Mars Internship Program, а для выпускников – Leadership<br> Development Program, программа развития менеджеров компании.</p>
      
	  <?php
		    $APPLICATION->IncludeComponent("bitrix:news.list", "career_list", 
		    array(
				"IBLOCK_ID"            => 7,
				"NEWS_COUNT"           => "99999",
				"SORT_BY1"             => "ID",
				"SORT_ORDER1"          => "ASC",
				"FILTER_NAME"          => "",
				"PROPERTY_CODE" 	   => Array("SVG", "OPEN"),
				"DETAIL_URL"           => "/career/##ELEMENT_CODE#",
				"CACHE_TYPE"           => "A",
				"DISPLAY_PANEL"        => "N",
				"DISPLAY_TOP_PAGER"    => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
        "SET_TITLE"            => "N"
		       ),
		       false
		    );
		?>
     
      <a href="#" class="top"><?=svg('totop')?></a>
    </div>
  </div>
</div>
<div id="modalInternship" role="dialog" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>close</title><desc>Created with Sketch.</desc><path d="M7.914 6.5l4.793 4.793-1.414 1.414-4.793-4.793-4.793 4.793-1.414-1.414 4.793-4.793-4.793-4.793 1.414-1.414 4.793 4.793 4.793-4.793 1.414 1.414-4.793 4.793z" sketch:type="MSShapeGroup" fill="#fff" fill-rule="evenodd"/></svg>
      </button>
      <h1>Mars Internship Program</h1>
      <div class="row">
        <?
          CModule::IncludeModule("iblock");
          $arSelect = Array("ID", "NAME");
          $arFilter = Array("IBLOCK_ID"=>8);
          $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        ?>
        <div class="<?=($res->NavRecordCount>0?'col-md-8 col-xs-7':'col-xs-12')?>">
          <div class="scroll violet">
            <div class="frame">

            <div class="block d-2">
              <h3>Направления</h3>
              <ul>
                <li>Отдел Информационных технологий</li>
                <li>Производство и Логистика</li>
                <li>Финансовый отдел</li>
                <li>Отдел персонала</li>
                <li>Маркетинг</li>
                <li>Отдел Исследований и Разработок</li>
              </ul>
            </div>
            <div class="block d-1">
              <h3>Условия</h3>
              <ul>
                <li>Оплачиваемая стажировка длительностью 6 месяцев</li>
                <li>Полная или частичная занятость: 3-5 дней в неделю</li>
                <li>Ученический договор</li>
                <li>Корпоративное обучение</li>
                <li>Интересные и ответственные проекты</li>
                <li>Выделенный наставник, отвечающий за ваше развитие на Программе</li>
                <li>Возможность после стажировки попасть в штат компании на программу развития или позицию начального уровня</li>
              </ul>
            </div>
            <div class="block d-3">
              <h3>Требования к кандидатам</h3>
              <ul>
                <li>Ждем студентов последнего курса (бакалавриат, специалитет, магистратура)
                <li>Intermediate English</li>
                <li>Высокий уровень обучаемости</li>
                <li>Способность планировать свое время</li>
                <li>Нацеленность на результат</li>
                <li>Желание строить карьеру в компании Mars</li>
              </ul>
            </div>
              <h3 class="blue">Отзывы участников Mars Internship Program:</h3>
              <div class="row">
                <div class="col-md-4 right"><a href="https://vk.com/doc-25625432_228687350" target="_blank"><img src="/layout/images/r-1.png"></a></div>
                <div class="col-md-4 center"><a href="https://vk.com/doc-25625432_232932515" target="_blank"><img src="/layout/images/r-2.png"></a></div>
                <div class="col-md-4"><a href="https://vk.com/doc-25625432_217623575" target="_blank"><img src="/layout/images/r-3.png" style="max-width:95%"></a></div>
              </div>
            </div>
          </div>
        </div>
        
        <?php
  			    $APPLICATION->IncludeComponent("bitrix:news.list", "career_vacancy", 
  			    array(
  					"IBLOCK_ID"            => 8,
  					"NEWS_COUNT"           => "0",
  					"SORT_BY1"             => "ID",
  					"SORT_ORDER1"          => "ASC",
  					"FILTER_NAME"          => "",
  					"PROPERTY_CODE" 	   => Array("SECTION", "LINK"),
  					"DETAIL_URL"           => "",
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
<div id="modalLeadership" role="dialog" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <button type="button" data-dismiss="modal" aria-hidden="true" class="close"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>close</title><desc>Created with Sketch.</desc><path d="M7.914 6.5l4.793 4.793-1.414 1.414-4.793-4.793-4.793 4.793-1.414-1.414 4.793-4.793-4.793-4.793 1.414-1.414 4.793 4.793 4.793-4.793 1.414 1.414-4.793 4.793z" sketch:type="MSShapeGroup" fill="#fff" fill-rule="evenodd"/></svg>
      </button>
      <h1>Leadership Development Program</h1>
      <div class="row">
        <div class="col-md-8 col-xs-7">
          <div class="scroll">
            <div class="frame">
              <div class="block b-1">
                <h3>Направления</h3>
                <ul>
                  <li>Chocolate</li>
                  <li>Petcare</li>
                  <li>Wrigley</li>
                </ul>
              </div>
              <div class="block b-2">
                <h3>Требования к кандидатам</h3>
                <ul>
                  <li>Выпускник 2011 – 2014 года</li>
                  <li>Знание английского языка</li>
                  <li>Готовность к переезду и командировкам</li>
                </ul>
              </div>
              <div class="block b-3">
                <h3>Компетенции</h3>
                <ul>
                  <li>Лидерство</li>
                  <li>Честность</li>
                  <li>Стремление достичь результата в работе</li>
                  <li>Способность быстро обучаться</li>
                  <li>Умение строить отношения сотрудничества</li>
                  <li>Умение планировать, расставлять приоритеты</li>
                </ul>
              </div>
              <div class="block b-4">
                <h3>Условия</h3>
                <ul>
                  <li>Постоянный трудовой договор</li>
                  <li>Полная занятость</li>
                  <li>Высокий уровень заработной оплаты</li>
                  <li>Медицинская страховка</li>
                  <li>Корпоративное обучение</li>
                  <li>Оплата питания</li>
                </ul>
              </div>
              <h3>Зачем мне это?</h3>
              <p>Цель Leadership Development Program (LDP) — подготовить <strong>будущих лидеров</strong> бизнеса Mars уже сегодня. Это идеальный способ заложить <strong>фундамент твоей карьеры</strong> в сфере бизнес-лидерства. Всего за <strong>2-4 года</strong> ты сможешь пройти путь от выпускника до менеджера и поработать в различных отделах компании: маркетинг, финансы, продажи, исследования и разработки, производство, HR, информационные технологии, закупки и др. Кроме того, у тебя будет возможность получить опыт в разных бизнес-сегментах Mars (Сhocolate, Petcare, Wrigley) или стать частью центральной команды и отвечать за все сегменты одновременно.</p>
              <h3>Что меня ждёт?</h3>
              <p>У тебя будет <strong>индивидуальный план развития</strong>. Он составляется с учётом потребностей бизнеса и твоих пожеланий. Каждый год ты будешь получать назначение и работать в новом отделе, благодаря чему сможешь приобрести <strong>разносторонний практический опыт</strong> и понять, как выстроен бизнес Mars. </p>
              <p>С первого дня ты начнёшь работать над ключевыми проектами компании как на локальном, так и на международном уровне, руководить командами, принимать ответственные решения и влиять на результаты бизнеса. <strong>Интересные и трудные задачи</strong> позволят тебе брать новые <strong>высоты профессионализма и личного развития</strong>.  Кроме того, LDP предполагает различные формы обучения: внешние и  внутренние тренинги совместно с менеджерами компании, встречи со старшими лидерами, воркшопы и международные проекты.</p>
              <h3>Чего ждут от меня?</h3>
              <p>На этой программе мы растим <strong>будущих CEO</strong>, поэтому стать участником Leadership Development Program — это большая ответственность. Мы ждём от тебя непрерывного развития и обучения, усердия, стремления к достижению результата, профессиональному и личностному росту. Индивидуальный план развития поможет тебе справиться с поставленными задачами.</p>
              <h3>На какую поддержку я могу рассчитывать?</h3>
              <p>Тебе будут помогать Куратор (старший менеджер) и товарищ, недавний выпускник LDP. По итогам твоей работы будут составляться <strong>отзывы</strong>: в середине и в конце срока каждого назначения на должность. Благодаря им мы сможем оценить <strong>твой прогресс</strong>, а также, ориентируясь на потребности бизнеса, обсудить с тобой <strong>направление развития твоей карьеры</strong> и спланировать следующее и наиболее подходящее для тебя назначение. </p>
              <p>Ключевое слово в названии программы — «развитие»: LDP — это начало долгосрочного развития твоей карьеры в компании Mars.</p>
              <p><strong>Спеши подать заявку, места ограничены!</strong></p>
              <h3>Ключевые факты о Leadership Development Program:</h3>
              <div class="row list">
                <div class="col-md-2 col-xs-3">
                  <div class="money"><svg width="45" height="23" viewBox="0 0 45 23" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>money</title><desc>Created with Sketch.</desc><g sketch:type="MSLayerGroup" fill="#42A84D" fill-rule="evenodd"><path d="M25.198 11.855c-.333-.306-.878-.641-1.631-1.004-1.43-.687-2.148-1.352-2.151-1.996-.003-.378.123-.692.374-.941s.606-.375 1.066-.378c.586-.004 1.151.136 1.695.416l.178.093c.19.125.413.038.494-.196.081-.231.214-.62.298-.86.082-.24.004-.536-.173-.658 0 0 0 0-.2-.089-.317-.142-.697-.246-1.141-.313l-.14-.022c-.166-.016-.3-.163-.301-.325.001-.161 0-.455-.001-.656.001-.198-.19-.359-.424-.358-.234.002-.629.004-.878.006s-.451.156-.45.343c.001.188.002.501.004.694.001.194-.177.404-.394.468 0 0 0 0-.181.078-.47.203-.861.496-1.175.882-.433.534-.648 1.148-.644 1.844.004.471.086.895.25 1.279.163.382.396.71.699.983.304.275.875.618 1.713 1.033.836.414 1.408.796 1.708 1.149.301.354.454.733.455 1.137.005.807-.577 1.214-1.747 1.221-.559.004-1.128-.142-1.703-.436l-.207-.106c-.229-.15-.5-.068-.6.18-.101.25-.264.653-.363.896-.097.243.027.563.282.71 0 0 0 0 .242.104.389.169.798.288 1.226.355l.168.027c.19.016.345.141.346.275.001.136.002.378.003.539.001.162.003.417.004.567.001.15.184.273.405.271.222-.002.617-.003.878-.005.26-.002.474-.117.473-.255-.001-.138-.003-.422-.004-.63-.001-.207-.003-.49-.004-.629 0-.138.157-.297.351-.351 0 0 0 0 .164-.061.574-.217 1.037-.534 1.393-.952.455-.536.682-1.163.678-1.879-.002-.505-.093-.963-.269-1.374-.176-.409-.432-.769-.766-1.076" sketch:type="MSShapeGroup"/><path d="M42.309.71l-39.096.243c-.604.004-1.174.245-1.602.678-.429.435-.663 1.006-.659 1.613l.108 17.416c.007 1.256 1.035 2.27 2.291 2.263l30.835-.192c1.267-.007 2.699-.654 3.684-1.606l5.76-5.831c.553-.635 1.035-1.68 1.028-2.693l-.059-9.628c-.008-1.255-1.036-2.27-2.29-2.263zm-37.203 20.163c-1.083.007-1.971-.818-1.978-1.84l-.087-14.187c-.003-.493.199-.958.568-1.312.372-.354.864-.551 1.386-.553l13.329-.083c-2.492 1.848-4.156 5.178-4.132 8.972.023 3.795 1.728 7.103 4.243 8.921l-13.329.082zm17.776-.627c-3.645.023-6.632-3.74-6.661-8.389-.029-4.648 2.912-8.448 6.556-8.47 3.645-.023 6.633 3.741 6.662 8.388.028 4.648-2.912 8.449-6.557 8.471zm19.697-7.89c.004.749-.6 1.36-1.349 1.365l-3.657.022c-1.054.007-1.91.875-1.903 1.926l.022 3.659c.005.748-.598 1.36-1.347 1.364l-7.011.044c2.493-1.849 4.156-5.178 4.132-8.973-.023-3.795-1.727-7.103-4.243-8.92l13.329-.083c1.084-.006 1.972.819 1.978 1.842l.049 7.754z" sketch:type="MSShapeGroup"/></g></svg>
                  </div>
                  <div class="chart"><svg width="40" height="36" viewBox="0 0 40 36" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>chart</title><desc>Created with Sketch.</desc><g sketch:type="MSLayerGroup" fill="#42A84D" fill-rule="evenodd"><path d="M30.53.909l-3.666-.387c-.512-.054-.975.321-1.029.833-.054.511.321.974.832 1.028l1.421.15s-3.996 4.657-11.461 10.664c-8.342 6.712-14.765 10.436-14.765 10.436-.4.324-.462.916-.138 1.315.323.401.916.463 1.316.14 0 0 5.163-2.712 14.489-10.216 9.031-7.265 11.736-10.885 11.736-10.885l-.15 1.42c-.054.512.32.976.832 1.03.512.054.974-.321 1.028-.833l.387-3.666c.001-.008.002-.015.003-.024.009-.109-.003-.218-.031-.322-.019-.069-.047-.137-.082-.2-.058-.103-.134-.198-.226-.272-.053-.046-.113-.084-.175-.117-.101-.05-.21-.082-.321-.094" sketch:type="MSShapeGroup"/><path d="M24.931 13.197h4.935v18.093h-4.935v-18.093z" sketch:type="MSShapeGroup"/><path d="M32.333 4.973h4.934v26.317h-4.934v-26.317z" sketch:type="MSShapeGroup"/><path d="M10.127 24.711h4.935v6.579h-4.935v-6.579z" sketch:type="MSShapeGroup"/><path d="M17.529 19.776h4.935v11.514h-4.935v-11.514z" sketch:type="MSShapeGroup"/><path d="M.259 32.935h39.476v2.467h-39.476v-2.467z" sketch:type="MSShapeGroup"/><path d="M2.726 28.001h4.935v3.289h-4.935v-3.289z" sketch:type="MSShapeGroup"/></g></svg>
                  </div>
                </div>
                <div class="col-md-6 first col-xs-9">
                  <h4>Преимущества</h4>
                  <ul>
                    <li>конкурентная заработная плата;</li>
                    <li>расширенный социальный пакет; </li>
                    <li>гибкий график работы;<br><br></li>
                    <li>быстрый карьерный рост;</li>
                    <li>индивидуальная программа развития;</li>
                    <li>профессиональный опыт от старших лидеров; </li>
                    <li>работа в различных отделах и бизнес-сегментах компании в течение 2-4х лет;</li>
                    <li>участие в зарубежных проектах; </li>
                    <li>специализированное обучение и тренинги.</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <h4>Требования:</h4>
                  <ul class="big">
                    <li>выпускник 2011-2014 года;</li>
                    <li>хорошее знание английского языка; </li>
                    <li>готовность к переезду и командировкам;</li>
                    <li>полный рабочий день.</li>
                  </ul>
                  <h4>Длительность: </h4>
                  <p>2-4 года</p>
                  <h4>Где: </h4>
                  <p>Россия</p>
                </div>
              </div>
              <h3>Истории успеха участников Leadership Development Program:</h3>
              <div class="row">
                <div class="col-md-4 right"><a href="https://vk.com/doc-25625432_209635496" target="_blank"><img src="/layout/images/leader-1.png"></a></div>
                <div class="col-md-4 center"><a href="https://vk.com/doc-25625432_269909622" target="_blank"><img src="/layout/images/leader-2.png"></a></div>
                <div class="col-md-4"><a href="https://vk.com/doc-25625432_212658406" target="_blank"><img src="/layout/images/leader-3.png"></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-xs-5">
        	<?=svg("leader-programm")?>
        </div>
      </div>
    </div>
  </div>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
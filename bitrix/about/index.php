<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас | Mars Graduates");
?>
<div id="page" class="about">
  <div class="container">
    <div class="content">
      <?/*
      <div class="scrollspy">
        <ul class="nav">
          <li><a href="#top" class="text">О нас</a></li>
          <li><a href="#inside">1</a></li>
          <li><a href="#pr">2</a></li>
          <li><a href="#history">3</a></li>
          <li><a href="#brands">4</a></li>
          <li><a href="#scheme">5</a></li>
        </ul>
      </div>
      */?>
      <div class="elm"><a name="top" id="top" class="anchor"></a>
        <h1>О нас</h1>
        <p class="center"><a href="#" class="video"><img src="/layout/images/video.jpg" width="560"></a></p>
        <div class="sections"><a href="#inside"><span>1</span><br>Mars Inside</a><a href="#pr"><span>2</span><br>Наши 5 Принципов</a><a href="#history"><span>3</span><br>История Mars</a><a href="#brands"><span>4</span><br>Бренды и сегменты <br>Mars</a><a href="#scheme"><span>5</span><br>Подразделения  </a></div><a name="inside" id="inside" class="anchor"></a>
      </div>
      <div class="elm">
        <h2 class="count">Mars Inside<span class="num">1</span>
          <div class="social">
            <div class="title">Больше фотографий <br>о нашей жизни:</div>
            <a target="_blank" href="http://instagram.com/mars_russia"><?=svg('insta')?></a>
            <a target="_blank" href="https://vk.com/albums-25625432"><?=svg('vk')?></a>
          </div>
        </h2>
        <div class="carousel"><img src="/layout/images/tmp/a-1.jpg"><img src="/layout/images/tmp/a-2.jpg"><img src="/layout/images/tmp/a-3.jpg">
          <div class="arrow left">
            <?=svg('arrow-left2')?>
          </div>
          <div class="arrow right">
            <?=svg('arrow-right2')?>
          </div>
        </div>
      </div>
      <div class="elm">
        <a name="pr" id="pr" class="anchor"></a>
        <h2 class="count">Наши 5 принципов<span class="num">2</span></h2>
        <div class="principles">
          <div class="item">
            <?=svg('best')?>
            <h3 class="green">1 Качество</h3>
            <p>«Потребитель — это наш босс, качество — это суть нашей работы, а хороший товар по доступной цене — это наша цель».</p>
          </div>
          <div class="item">
            <?=svg('see')?>
            <h3 class="violet">2 ОТВЕТСТВЕННОСТЬ</h3>
            <p>«Как личности мы требуем от себя полной ответственности. Как сотрудники мы несём ответственность и за то, что делают другие».</p>
          </div>
          <div class="item">
            <?=svg('support')?>
            <h3 class="orange">3 ВЗАИМОВЫГОДНОСТЬ</h3>
            <p>«Взаимная выгода — это общая выгода, а общая выгода поможет выдержать испытание временем».</p>
          </div>
          <div class="item">
            <?=svg('effective')?>
            <h3 class="green">4 эффективность</h3>
            <p>«Нам нужна свобода, чтобы строить своё будущее, нам нужна прибыль, чтобы оставаться свободными».</p>
          </div>
          <div class="item">
            <?=svg('freedom')?>
            <h3 class="blue">5 СВОБОДА</h3>
            <p>«Взаимная выгода — это общая выгода, а общая выгода поможет выдержать испытание временем».</p>
          </div>
        </div><a name="history" id="history" class="anchor"></a>
      </div>
      <div class="elm">
        <h2 class="count">История mars<span class="num">3</span></h2>
        <div class="history">
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_1911.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3><span>1911</span></h3>
                <p>Фрэнк С. Марс начинает производство и продажу шоколадных батончиков со сливочным кремом у себя на кухне в г. Такома (штат Вашингтон, США).</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_1923.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3>Январь <span>1923</span></h3>
                <p>После трех лет научных исследований на рынке появляется уникальный шоколадный батончик MILKY WAY®, который сразу завоевывает огромный успех у потребителей.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_1935_b.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3>Ноябрь <span>1935</span></h3>
                <p>Компания Mars входит в бизнес Petcare в результате приобретения британской компании Chappel Brothers, Ltd., производящей баночный корм для собак под маркой CHAPPIE®</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_1941.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3>Ноябрь <span>1941</span></h3>
                <p>Появление на рынке бренда M&M’S®, стоимость которого сейчас превышает миллиард долларов</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_1982_c.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3>Июнь <span>1982</span></h3>
                <p>M&M'S - первая конфета в космосе. Американские астронавты обратились с просьбой включить  M&M's в программу их питания на орбите.</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_1995_b.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3>Июнь <span>1991</span></h3>
                <p>Mars приходит в Россию и начинает реализацию продуктов питания, кондитерских изделий и кормов для домашних животных .</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_1911.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3>Декабрь <span>1995</span></h3>
                <p>Вводится в эксплуатацию первая в России шоколадная фабрика по выпуску батончиков MARS® в г. Ступино Московской области</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_2008.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3>Декабрь <span>2008</span></h3>
                <p>В состав компании Mars, Incorporated в качестве бизнес сегмента, производящего жевательную резинку и кондитерские изделия, входит компания Wrigley. Приобретенная Wrigley в 2007 году российская шоколадная компания "Одинцовская кондитерская фабрика", которой принадлежит шоколадный бренд A.Korkunov®, вливается в сегмент Mars Chocolate</p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-md-4 col-xs-4"><img src="/layout/images/mars_timeline_2013.jpg"></div>
              <div class="col-md-8 col-xs-8">
                <h3>Декабрь <span>2013</span></h3>
                <p>Сегодня в Mars в России и СНГ работает более 7 000 сотрудников, а по всему миру это число превышает отметку в 72 000.  Век спустя мы все также частный семейный бизнес, но масштабы у нас вполне галактические!</p>
              </div>
            </div>
          </div>
        </div>
        <div class="history-page">
          <a href="#" data-id="0" class="active">1911</a>
          <a href="#" data-id="1">1923</a>
          <a href="#" data-id="2">1935</a>
          <a href="#" data-id="3">1941</a>
          <a href="#" data-id="4">1982</a>
          <a href="#" data-id="5">1991</a>
          <a href="#" data-id="6">1995</a>
          <a href="#" data-id="7">2008</a>
          <a href="#" data-id="8">2013</a>
        </div>
      </div>
      <div class="elm"><a name="brands" id="brands" class="anchor"></a>
        <h2 class="count">Бренды и сегменты mars<span class="num">4</span></h2>
        <div class="brands">
          <div class="item">
            <div class="title brown">Шоколад (Chocolate)
              <div class="icon">
                <?=svg('arrow-right2')?>
              </div>
            </div>
            <p>На российском рынке шоколада Mars входит в тройку лидеров с долей рынка в 17%. </p>
            <p class="slide"><img src="/layout/images/brands-chock.jpg"></p>
          </div>
          <div class="item">
            <div class="title green">Продукты питания для домашних животных (Petcare)
              <div class="icon">
                <?=svg('arrow-right2')?>
              </div>
            </div>
            <p>Mars является одним из крупнейших мировых производителей кормов для животных. <br>При этом в России Mars - безоговорочный лидер – на долю компании приходится 60% продаж. </p>
            <p class="slide"><img src="/layout/images/brands-pet.jpg"></p>
          </div>
          <div class="item">
            <div class="title blue">Жевательная резинка (Wrigley)
              <div class="icon">
                <?=svg('arrow-right2')?>
              </div>
            </div>
            <p>Wrigley со штаб-квартирой в Чикаго (штат Иллинойс, США) является одним из крупнейших в мире производителей жевательной резинки и сладостей, доставляя потребителям простые удовольствия. <br>В Wrigley работает более 17 000 сотрудников в 48 странах. </p>
            <p class="slide"><img src="/layout/images/brands-gym.jpg"></p>
          </div>
          <div class="item">#972f84
            <div class="title orange">Продукты питания (Food)
              <div class="icon">
                <?=svg('arrow-right2')?>
              </div>
            </div>
            <p>Mars Food (штаб-квартира в Брюсселе, Бельгия) производит продукты питания, созданные в соответствии с местными традициями по всему миру. <br>В Mars Food работает более 1 700 сотрудников в 10 странах. </p>
            <p class="slide"><img src="/layout/images/brands-food.jpg"></p>
          </div>
        </div>
      </div>
      <div class="elm"><a name="scheme" id="scheme" class="anchor"></a>
        <h2 class="count">Подразделения<span class="num">5</span></h2>
        <div class="scheme-description">
          <span data-id="scheme-1">Маркетинг<br>(Marketing) </span>
          <span data-id="scheme-2">Научно-исследовательская<br> работа (R&D)      </span>
          <span data-id="scheme-3">Финансы <br>(S&F)</span>
          <span data-id="scheme-4">Управление персоналом <br>(P&O)</span>
          <span data-id="scheme-5">Отдел поставок <br>(Supply)</span></div>
        <p class="center scheme">
          <?=svg('scheme')?>
          <span class="frame"></span>
          <span class="description">
            <span class="item" data-id="scheme-1">
              <span class="title" style="color: #972f84;">
                Marketing
              </span>
              <span class="text">
                Отдел маркетинга создает всемирно известные бренды. Здесь у вас есть свобода думать креативно и масштабно, развивать идеи и находить новые способы взаимодействия с потребителем.
              </span>
            </span>
            <span class="item" data-id="scheme-2">
              <span class="title" style="color: #e86035;">
                Research&Development
              </span>
              <span class="text">
                Отдел Исследований и Разработок стоит у истоков наших бизнес-процессов. Именно здесь рождаются новые рецепты и совершенствуются уже полюбившиеся. Отдел ведет инновационную деятельность: от оценки клиентов и определения их потребностей до разработки неизменно достойной восхищения продукции.
              </span>
            </span>
            <span class="item" data-id="scheme-3">
              <span class="title" style="color: #46a83e;">
                Service&Finance
              </span>
              <span class="text">
                Команда специалистов из отдела Финансов работает на передовой нашего бизнеса. Управление рисками, бухгалтерский учет, управление инвестициями, налоговый контроль - это лишь некоторые из функций, которые находятся в компетенции наших сотрудников из отдела Финансов.
              </span>
            </span>
            <span class="item" data-id="scheme-4">
              <span class="title" style="color: #e86035;">
                People&Organisation
              </span>
              <span class="text">
                В Mars отдел управления персоналом называется People & Organization. Именно благодаря команде P&O таланты приходят и остаются в Mars надолго. Наши профессионалы создают условия для роста, обучения и развития наших сотрудников. Они - их поддержка и дружеское плечо в процессе продвижения по карьерной лестнице.
              </span>
            </span>
            <span class="item" data-id="scheme-5">
              <span class="title" style="color: #2895d2;">
                Supply
              </span>
              <span class="text">
                Работа отдела поставок начинается с клиента и идет в обратном направлении. Его цель – постоянно производить и надежно поставлять продукцию, которая отвечает требованиям клиентов и превосходит их ожидания.
              </span>
            </span>
            <span class="item" data-id="scheme-6">
              <span class="title" style="color: #46a83e;">
                Sales
              </span>
              <span class="text">
                Команда Sales работает над стратегией продвижения продукта на рынок, взаимодействует с клиентами, другими словами, развивает бизнес Mars. Именно они обеспечивают доступность нашей продукции для потребителя. Их задача - сделать так, чтобы покупатель сделал правильный выбор.
              </span>
            </span>
            <span class="item" data-id="scheme-7">
              <span class="title" style="color: #2895d2;">
                Mars Information Service
              </span>
              <span class="text">
                Mars Information Services (Mars IS) – это огромное ИТ-подразделение компании Mars Inc., поддерживающие бизнес всей корпорации. Сотрудники Mars IS предоставляют полный спектр ИТ-услуг, начиная с обслуживания сетей и заканчивая сложными системами планирования бизнес-ресурсов.
              </span>
            </span>
            <span class="item" data-id="scheme-8">
              <span class="title" style="color: #e86035;">
                Commercial
              </span>
              <span class="text">
                Команда Commercial поддерживая взаимоотношения с поставщиками, отраслевыми и нормативными органами. Сотрудники коммерческого отдела занимаются не только закупкой сырья, услуг и материалов, но и многим другим, например, разработкой упаковки.
              </span>
            </span>
            <span class="item" data-id="scheme-9">
              <span class="title" style="color: #972f84;">
                Corporate Affairs
              </span>
              <span class="text">
                Роль отдела корпоративных отношений - поддерживать репутацию и способствовать росту Mars как семейной компании, основывающей свою работу на Пяти Принципах. В сферу ответственности отдела входя различные виды коммуникаций: как внутренние, с сотрудниками компании, так и внешние.
              </span>
            </span>
            <span class="item" data-id="scheme-10">
              <span class="title" style="color: #46a83e;">
                Logistics
              </span>
              <span class="text">
                Логистика – это часть нашей функции поставок. Это неотъемлемое звено цепи, в которую также входит проектирование и производство. Эта отрасль стремительно развивается и ставит сложнейшие задачи по управлению ростом.
              </span>
            </span>
          </span>
        </p>
        <div class="scheme-description">
        <span data-id="scheme-6">Продажи <br>(Sales)</span>
        <span data-id="scheme-7">Информационные технологии (IS)</span>
        <span data-id="scheme-8">Закупки <br>(Commercial)</span>
        <span data-id="scheme-9">Корпоративные отношения (Corporate Affairs)</span>
        <span data-id="scheme-10">Логистика <br>(Logistics)</span></div>
      </div>
      <a href="#" class="top"><?=svg('totop')?></a>
    </div>
  </div>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
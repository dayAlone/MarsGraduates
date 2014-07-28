<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$prop = &$arResult["PROPS"];
?>
<div id="event" style="background-image: url(/layout/images/event.jpg)">

  <img src="<?=$prop['DIRECTION']['IMAGE']?>" alt="" class="image">
  <div class="container">
    <div class="content">
      <div class="section orange"><?=$prop['DIRECTION']['NAME']?></div>
      <div class="type"><?=$prop['TYPE']?></div>
      <div class="name">«<?=$arResult['NAME']?>»</div>
      <div class="description">
        Время: <?=date('H:m', strtotime($prop['DATE']))?><br>
        Место: <?=$prop['ADDRESS']." / "?><strong><?=$prop['CITY']?></strong>
      </div>
      <div class="tools">
        <div class="row">
          <div class="col-xs-6">
            <a href="#reg" class="reg">Регистрация</a>    
          </div>
          <div class="col-xs-6">
            <div class="social">
              <a href="http://vkontakte.ru/share.php?url=" target="_blank">
                <?=svg('vk')?>
              </a>
              <a href="http://www.facebook.com/sharer/sharer.php?u=" target="_blank">
                <?=svg('fb')?>
              </a><br>
              <span>поделиться</span></div>
          </div>
        </div>  
      </div>
      
      
      
    </div>
  </div>
</div>
<div id="page" class="event">
  <div class="container">
    <div class="content">
      <div class="description">
        <p><?=$arResult['DETAIL_TEXT']?></p>
      </div>
      <? if(count($prop["SPEAKERS"])>0):?>
      <h2>Спикеры</h2>
      <div class="speakers">
      	<?foreach ($prop["SPEAKERS"] as $item):?>
      	<div class="item">
          <div style="background-image: url(<?=$item['IMAGE']?>)" class="image"></div>
          <div class="block">
            <div class="name"><?=$item['NAME']?></div>
            <div class="info"><?=$item['TEXT']?></div>
          </div>
        </div>
        <?endforeach;?>
      </div>
      <?endif;?>
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-xs-6 col-md-12">
            <?if(count($prop["SHEDULE"])>0):?>
              <h2>Расписание</h2>
              <div class="schedule">
              	<?foreach ($prop["SHEDULE"] as $item):?>
              		<div class="time"><?=$item["time"]?></div>
	                <p><?=$item["event"]?></p>
                <?endforeach;?>
              </div>
            <?endif;?>
            </div>
            <?/*
            <div class="col-xs-6 col-md-12">
              <h2>Партнёры</h2>
              <ul class="partners">
                <li><a href="#" class="trigger">Генеральные карьерные партнёры<svg width="8" height="20" viewBox="0 0 8 20" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>arrow-right</title><path d="M1.5 18.5l4.428-8.418-4.428-8.418" sketch:type="MSShapeGroup" stroke="#fff" stroke-width="2" fill="none" fill-rule="evenodd"/></svg></a></li>
                <li><a href="#" class="trigger">Кейс-клубы<svg width="8" height="20" viewBox="0 0 8 20" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>arrow-right</title><path d="M1.5 18.5l4.428-8.418-4.428-8.418" sketch:type="MSShapeGroup" stroke="#fff" stroke-width="2" fill="none" fill-rule="evenodd"/></svg></a></li>
                <li><a href="#" class="trigger">Генеральные информационные партнёры<svg width="8" height="20" viewBox="0 0 8 20" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>arrow-right</title><path d="M1.5 18.5l4.428-8.418-4.428-8.418" sketch:type="MSShapeGroup" stroke="#fff" stroke-width="2" fill="none" fill-rule="evenodd"/></svg></a></li>
                <li><a href="#" class="trigger">Информационные партнёры<svg width="8" height="20" viewBox="0 0 8 20" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"><title>arrow-right</title><path d="M1.5 18.5l4.428-8.418-4.428-8.418" sketch:type="MSShapeGroup" stroke="#fff" stroke-width="2" fill="none" fill-rule="evenodd"/></svg></a></li>
              </ul>
            </div>
            */?>
          </div>
        </div>
        <div class="col-md-6 registration"><a name="reg" class="anchor"></a>
          <h2>Регистрация</h2>
          <p>Чтобы зарегистрироваться на это событие, заполните анкету. Информация о Вас будет доступна только организаторам этого события, и больше никому. <br> <span style="color: red">Все поля обязательны для заполнения. Регистрация бесплатна.</span></p>
          <form>
            <div class="row">
              <div class="col-md-12 col-xs-6">
                <div class="row">
                  <div class="col-md-3">
                    <label for="#email">E-mail</label>
                  </div>
                  <div class="col-md-9">
                    <input type="email" id="email" name="email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for="#last_name">Фамилия</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" id="last_name" name="last_name">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <label for="#first_name">Имя</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" id="first_name" name="first_name">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <label for="#second_name">Отчество</label>
                  </div>
                  <div class="col-md-8">
                    <input type="text" id="second_name" name="second_name">
                  </div>
                </div>
                <label for="#phone">Мобильный телефон</label>
                <input type="text" id="phone" name="phone">
                <label for="#work_place">Организация/вуз/место работы</label>
                <input type="text" id="work_place" name="work_place">
              </div>
              <div class="col-md-12 col-xs-6">
                <div class="row">
                  <div class="col-md-6">
                    <label for="#teach">Образование</label>
                  </div>
                  <div class="col-md-6">
                    <select type="text" id="teach" name="teach">
                      <option>Выбрать</option>
                    </select><a class="trigger"></a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <label for="#facult">Факультет</label>
                  </div>
                  <div class="col-md-7">
                    <input type="text" id="facult" name="facult">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <label for="#course">Курс</label>
                  </div>
                  <div class="col-md-9">
                    <select type="text" id="course" name="course">
                      <option>Выбрать</option>
                    </select><a class="trigger"></a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8">
                    <label for="#year">Год окончания вуза</label>
                  </div>
                  <div class="col-md-4">
                    <input type="text" id="year" name="year">
                  </div>
                </div>
                <label for="#info">Откуда вы узнали <br>про мероприятие?</label>
                <input type="text" id="info" name="info">
              </div>
            </div>
            <div class="row">
              <div class="col-md-1 col-xs-1">
                <input type="checkbox" name="maillist" checked>
              </div>
              <div class="col-md-11 col-xs-9">
                <label for="#maillist">Я хочу получать анонсы событий <br>и программ Mars</label>
              </div>
            </div>
            <input type="submit" value="Зарегистрироваться">
            <p>Регистрируясь на это событие, вы принимаете <a href="#">Пользовательское соглашение</a> и подтверждаете ваше согласие на <a href="#">обработку персональных данных</a>.</p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
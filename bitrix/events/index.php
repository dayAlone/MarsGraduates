<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Mars Graduates");
global $events_filter, $current_date;
?>
<div id="page" class="month">
  <div class="container">
    <div class="content">
      <? require_once($_SERVER["DOCUMENT_ROOT"]."/include/month.php") ?>
      
  	</div>
  </div>
</div>
<div class="modal fade" id="day_events" tabindex="-1" role="dialog" aria-labelledby="day_events" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div id="day">
	      
		  </div>
    </div>
  </div>
</div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>
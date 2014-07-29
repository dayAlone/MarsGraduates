</html>
<? 
global $USER;
if(!$USER->isAdmin())
	$APPLICATION->ShowHead();
$APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
$APPLICATION->AddHeadScript('/layout/js/frontend.js');
?>

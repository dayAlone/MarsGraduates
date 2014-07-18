<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/events/(.*)/(.*)#",
		"RULE" => "ELEMENT_CODE=\$1&\$2",
		"ID" => "",
		"PATH" => "/events/detail.php",
	),
);

?>
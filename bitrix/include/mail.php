<?require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php");

CModule::IncludeModule("subscribe");

$RUB_ID = 1;

if($strWarning == "")
{
    $arFields = Array(
		"USER_ID" => ($USER->IsAuthorized()? $USER->GetID():false),
		"FORMAT"  => "html",
		"EMAIL"   => $_REQUEST["EMAIL"],
		"ACTIVE"  => "Y",
		"RUB_ID"  => $RUB_ID
    );
    $subscr = new CSubscription;

    $ID = $subscr->Add($arFields);
    if($ID>0)
        CSubscription::Authorize($ID);
    else
        $strWarning .= $subscr->LAST_ERROR;
}

if(strlen($strWarning))
	echo strip_tags($strWarning);
else
	echo "true";

?>
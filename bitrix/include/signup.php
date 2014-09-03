<?
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php");

$data = array();

$requires = array('EMAIL', 'LAST_NAME', 'NAME', 'SECOND_NAME', 'PERSONAL_MOBILE', 'UF_EDUCATION', 'UF_HIGHSCHOOL', 'UF_FACULTY', 'UF_COURSE','UF_YEAR', 'UF_NATION', 'UF_INFO');

foreach (explode('&', $_REQUEST['data']) as $chunk) {
    $param = explode("=", $chunk);
    if ($param)
        if(strlen(urldecode($param[1]))>0){
            $id = array_search(urldecode($param[0]), $requires);
            unset($requires[$id]);
            $data[urldecode($param[0])] = urldecode($param[1]);
        }
}

if(count($requires)==0)
{
    setcookie("RegData", serialize($data), time()+3600, "/");
    $data["LOGIN"] = $data["EMAIL"];
    $data["PASSWORD"] = md5($data["EMAIL"]);
    $rsUser = CUser::GetByLogin($data["EMAIL"]);
    if($arUser = $rsUser->Fetch())
    {
        $arGroups = CUser::GetUserGroup($arUser["ID"]);
        if(!in_array($data["GROUP_ID"], $arGroups))
        {
            $arGroups[] = $data["GROUP_ID"];
            CUser::SetUserGroup($arUser["ID"], $arGroups);
        }
        $ID = $arUser["ID"];
    }
    else
    {
        $data["GROUP_ID"] = array($data["GROUP_ID"]);
        $user = new CUser;
        $ID = $user->Add($data);
    }
    if($ID>0)
    {
        echo "success";
        if($data["MAILLIST"]=="on")
        {
            CModule::IncludeModule("subscribe");
            $arFields = Array(
                "USER_ID"      => $ID,
                "FORMAT"       => "html",
                "EMAIL"        => $data["EMAIL"],
                "ACTIVE"       => "Y",
                "SEND_CONFIRM" => "N",
                "CONFIRMED"      => "Y",
                "RUB_ID"       => 1
            );
            $subscr = new CSubscription;
            $subscr->Add($arFields);
        }
    }
        
        
}
else
    echo "error";
?>
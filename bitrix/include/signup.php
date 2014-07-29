<?
require_once ($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include.php");

$data = array();

foreach (explode('&', $_REQUEST['data']) as $chunk) {
    $param = explode("=", $chunk);
    if ($param)
        if(strlen(urldecode($param[1]))>0)
            $data[urldecode($param[0])] = urldecode($param[1]);
}
if(count($data)==13)
{
    $data["LOGIN"] = $data["EMAIL"];
    $data["PASSWORD"] = md5($data["EMAIL"]);
    var_dump($data);
    $rsUser = CUser::GetByLogin($data["EMAIL"]);
    if($arUser = $rsUser->Fetch())
    {

    }
    else
    {
        
        $user = new CUser;
        $ID = $user->Add($data);
        var_dump($ID);
    }
}
else
    echo "error";
?>
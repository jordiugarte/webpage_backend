
<?php

require_once "class/response.php";
require_once "class/users.php";
require_once "class/optionUrl.php";

$_response = new response;
$_users = new Users;
$optionUrl = new optionUrl;

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if(isset($_GET["id"])){
        $idUser = $_GET['id'];
        $dataUsers = $_users->getUser($idUser);
        $optionUrl->resDataGet($dataUsers);
    }else {
        $dataUsers = $_users->listUsers();
        $optionUrl->resDataGet($dataUsers);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userBody=$optionUrl->getDataURL();
    $dataArray = $_users->store($userBody);
    $optionUrl->resDataPOST($dataArray);
} else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $userBody=$optionUrl->getDataURL();
    $dataArray=$_users->update($userBody);
    $optionUrl->resDataPOST($dataArray);
} else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $userBody=$optionUrl->getDataURL();
    $dataArray = $_users->delete($userBody);
    $optionUrl->resDataPOST($dataArray);
} else {
    $optionUrl->reqUnk();
}

?>
<?php

function getUsersList(){
    $users = json_decode(file_get_contents("users.json"), true, 512, JSON_UNESCAPED_UNICODE);
    return $users;
}

function getRandAction(){
    $act = json_decode(file_get_contents("actions.json"), true, 512, JSON_UNESCAPED_UNICODE);
    $rand_key = array_rand($act, 1);
    // $randAct = $act[$rand_key];
    // var_dump($randAct);
    return $rand_key;
}

function existsUser($login){
    $allUsers = getUsersList();
    foreach ($allUsers as $curUser) {
        if($curUser['login'] == $login){
            return true;
        }
    }
}

function checkPassword($login, $password){
    $allUsers = getUsersList();
    if (existsUser($login) == True){
        foreach ($allUsers as $curUser) {
            if($curUser['login'] == $login){
                if($curUser['pass'] == sha1($password)){
                    return true;
                }
            }
        }
        return false;
    }
}

function getUser($login){
    $allUsers = getUsersList();
    foreach ($allUsers as $curUser) {
        if($curUser['login'] == $login){
            return $curUser;
        }
    }
}

?>
<?php
date_default_timezone_set('PRC');
$dsn='mysql:host=localhost;dbname=user_db';
$dbname='user_db';
$usr='user';
$password= 'bigironuser';
$tel = $_POST['tel'] ?? '/';
$nick = $_POST['nick'] ?? '/';
try {
    $pdmy = new pdo($dsn, $usr, $password);
    $pdmy->exec('set names utf8');
    $pdmy->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdqu =  $pdmy->prepare('SELECT tel FROM accounts WHERE tel=:tel or nickname=:nick LIMIT 1');
    $pdqu->bindParam(':tel',$tel);
    $pdqu->bindParam(':nick',$nick);
    if($pdqu->execute()){
        if($pdqu->fetch()){
            echo '0';
        }
        else{
            echo '1';
        }
    }
    $pdmy=null;
} catch (PDOException $e) {
    echo '连接异常...错误代码：'.$e->getCode();
}

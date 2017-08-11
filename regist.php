<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/icon/site_logo_small.ico" rel="shortcut icon">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/Buttons/2.0.0/css/buttons.min.css" rel="stylesheet">
    <link href="css/login.css?v=13" rel="stylesheet">
    <title>首页-佬铁会</title>
</head>
<body>
<div class="container">
    <a class="form-signin-heading" href="index.html"><img id="return-index" src="images/icon/login_icon.png" alt="返回首页"></a>
    <br>
<?php
date_default_timezone_set('PRC');
$dsn='mysql:host=localhost;dbname=user_db';
$dbname='user_db';
$usr='root';
$password="Adsl980328~";
$today=date("Y-m-d H:i:s");
$mail=isset($_POST['mail']) ? $_POST['mail'] : '-';
$sex=isset($_POST['sex']) ? $_POST['sex'] : 2;
try {
    $pdmy = new pdo($dsn, $usr, $password);
    $pdmy->exec("set names utf8");
    $pdmy->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdqu =  $pdmy->prepare('INSERT INTO accounts (tel, pw, signup_time, nickname, sex, mail, wallet)
VALUES (:tel, PASSWORD(:pw), :now, :nick, :sex, :email, 0 )');
    $pdqu->bindParam(':tel',$_POST['tel']);
    $pdqu->bindParam(':pw',$_POST['password']);
    $pdqu->bindParam(':now',$today);
    $pdqu->bindParam(':nick', $_POST['nickname']);
    $pdqu->bindParam(':sex',$sex);
    $pdqu->bindParam(':email',$mail);
    if($pdqu->execute())
        echo <<<'HTML'
<p class="notify">Hey, 注册成功！</p>
<p><a class="button button-3d button-primary button-pill" href="login">欢迎入会，<span id="nickname">
HTML
.$_POST['nickname'].'</span></a></p>';
    echo '你的注册时间：'.date('Y-m-d H:i:s');
    $pdmy=null;
} catch (PDOException $e) {
    echo '<p>出了点小问题...';
    if($e->getCode()== 23000)
        print '用户名已被注册，试试别的~'.'</p>';
    else echo '错误代码：'.$e->getCode() .' 错误消息：' . $e->getMessage().'</p>';
    echo '<p><a class="button button-3d button-primary button-pill" href="login"> 再次注册</a></p>';
}
?>
</div>
<div class="carousel-inner success-pic">
        <div class="item active">
            <img src="images/logo/%E7%AD%BE%E5%90%8D.png" alt="First slide">
        </div>
    </div>
    <footer class="copyright-background">
        <p>©2017 Beijing Bigiron Technology Co., Ltd. All rights reserved<br/>
            Big Iron Product | 良乡东路<br/>
            联系我们
        </p>
    </footer>

</body>
</html>

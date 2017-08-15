<?php
date_default_timezone_set('PRC');
$dsn='mysql:host=localhost;dbname=user_db';
$dbname='user_db';
$usr='user';
$password= 'bigironuser';
$today=date('Y-m-d H:i:s');
$mail= $_POST['mail'] ?? '-';
$sex= $_POST['sex'] ?? 2;
$tel= $_POST['tel'] ?? '-';
$pw=$_POST['password'] ?? '-';
try {
    $pdmy = new pdo($dsn, $usr, $password);
    $pdmy->exec('set names utf8');
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
        <p><a class="button button-3d button-primary button-pill" href="login"><span id="nickname">
HTML
    .$_POST['nickname'].'</span>,&nbsp欢迎入会</a></p>';
    echo '<br><p>入会时间：'.date('Y-m-d H:i:s').'</p>';
    $pdmy=null;
    echo '<br><p><a href="login">返回登陆页</a></p>';
} catch (PDOException $e) {
    echo '<p>出了点小问题...';
    if('23000' === $e->getCode()) {
        print ' 用户名已被注册，试试别的~'.'</p>';
    }
    else {
        echo '错误代码：'.$e->getCode() .' 错误消息：' . $e->getMessage().'</p>';
    }
    echo '<p><a class="button button-3d button-primary button-pill" href="login"> 再次注册</a></p>';
}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/09743b710b.js" crossorigin="anonymous"></script>
<script src="./js/common.js"></script>

<?php include "./load.php" ?>

<?php
    session_start();

    if(isset($_SESSION["userid"])){
        $userid = $_SESSION["userid"];
    }else{
        $userid = "";
    }

    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    }else{
        $username = "";
    }

    if(isset($_SESSION["userlevel"])){
        $userlevel = $_SESSION["userlevel"];
    }else{
        $userlevel = "";
    }

    if(isset($_SESSION["userpoint"])){
        $userpoint = $_SESSION["userpoint"];
    }else{
        $userpoint = "";
    }
?>


<div id="top">
    <div class="frame">
        <div class="top_info">
            <p><i class="fas fa-phone-square"></i> Support: +82 322 4456</p>
        </div>
        <ul id="top_menu">

<?php
    if(!$userid){
?>
            <li><a href="./login_form.php">로그인</a></li>
<?php
    }else{
        $logged = $username."(".$userid.") 님[Lv : ".$userlevel."/ Pt : ".$userpoint."]";
?>
            <li><span><?=$logged?></span></li>
            <li><a href="./logout.php">로그아웃</a></li>
<?php
    }
?>
        </ul>
    </div>
</div>
<nav>
    <div class="frame">
        <div class="logo">
            <a href="./faq_list.php"><img src="./img/OClass_logo.svg" alt="로고"></a>
        </div>
        <div id="menu_bar">
            <ul>
                <li><a href="./faq_list.php">FAQ</a></li>
            </ul>
        </div>
    </div>
</nav>

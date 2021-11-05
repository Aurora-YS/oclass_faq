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
    
    $subject = str_replace("'", "&#39;", $_POST["subject"]);
    $content = nl2br(str_replace("'", "&#39;", $_POST["content"]));
    $regist_day = date("Y-m-d");

    include "./db_con.php";

    $sql = "insert into faq (id, name, subject, content, regist_day) values ('$userid', '$username', '$subject', '$content', '$regist_day')";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo ("
        <script>
            location.href = './faq_list.php';
        </script>
    ");
    
?>
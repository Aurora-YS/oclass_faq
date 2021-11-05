<?php

    $id = $_POST["id"];
    $pass = $_POST["pass"];

    include "./db_con.php";

    $sql = "select * from members where id='$id'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    session_start(); //세션 스토리지를 오픈해라
    //세션 스토리지에 배열 데이터로부터 받아온 결과값들을 각각의 key와 value 값으로 저장을 진행
    $_SESSION["userid"] = $row["id"];  
    $_SESSION["username"] = $row["name"];
    $_SESSION["userlevel"] = $row["level"];
    $_SESSION["userpoint"] = $row["point"];

    echo ("
        <script>
            location.href='./faq_list.php';
        </script>
    ");

    mysqli_close($con);

?>
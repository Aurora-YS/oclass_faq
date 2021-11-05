<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ 상세보기</title>
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/faq.css">
</head>
<body>

    <header>
		<?php include "./header.php"; ?>
	</header>
    <section>
        <div class="subpage">
            <div class="frame">
                <div class="banner_title">
                    <h3>100% <span>Online Course</span></h3>
                    <h1>Get Future's Skill Today!</h1>
                </div>
            </div>
        </div>

        <div id="faq_box">
            <h2>FAQ > 상세 보기</h2>
<?php

    $num = $_GET["num"];
    $page = $_GET["page"];

    include "./db_con.php";

    $sql = "select * from faq where num='$num'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $name = $row["name"];
    $subject = $row["subject"];
    $content = $row["content"];
    $regist_day = $row["regist_day"];

    mysqli_close($con);

?>
            <ul id="faq_detail">
                <li>
                    <span><b>제목 : </b><!--FAQ 타이틀--><?=$subject?></span>
                    <span><!--FAQ 작성자--><?=$name?> | <!--FAQ 작성일--><?=$regist_day?></span>
                </li>
                <li><p><!--FAQ 내용--><?=$content?></p></li>
            </ul>

            <ul class="buttons">
                <li><button type="button" onclick="location.href='./faq_list.php?page=<?=$page?>'">목록보기</button></li>
            </ul>
        </div>

    </section>
    <footer>
        <?php include "./footer.php" ?>
    </footer>

</body>
</html>
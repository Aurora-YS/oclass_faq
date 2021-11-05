<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ 리스트</title>
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
            <h2 id="faq_title">FAQ > 리스트</h2>
            <ul id="faq_list">
                <li>
                    <span class="field1">번호</span>
                    <span class="field2">제목</span>
                    <span class="field3">작성자</span>
                    <span class="field4">작성일</span>
                </li>

<?php
	//항목을 반복문으로 적용
    include "./db_con.php";
    if(isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page = 1;
    }

    $sql = "select * from faq order by num desc";
    $result = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($result);

    $scale = 10;

    if($row_num % $scale == 0){
        $total_page = $row_num / $scale; 
    }else{
        $total_page = ceil($row_num / $scale);
    }

    $first_page = ($page - 1) * $scale;
    
    $number = $row_num - $first_page;
    $total_record = $first_page + $scale;
    
    // $i < $total_record 한 페이지당 $scale에 정해놓은 개수만큼만 데이터를 불러오도록함
    // $i < $row_num 페이지를 넘겼을 때 다시 데이터를 불러오도록함
    for($i = $first_page; $i < $total_record && $i < $row_num; $i++){
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);

        $num = $row["num"];
        $name = $row["name"];
        $subject = $row["subject"];
        $regist_day = $row["regist_day"];
?>
                <li>
                    <span class="field1"><!--번호--><?=$number?></span>
                    <span class="field2"><a href="./faq_view.php?num=<?=$num?>&page=<?=$page?>"><!--FAQ 타이틀--><?=$subject?></a></span>
                    <span class="field3"><!--작성자--><?=$name?></span>
                    <span class="field4"><!--작성일--><?=$regist_day?></span>
                </li>
<?php
        $number--;
    }
    mysqli_close($con);
?>
            </ul>

            <ul id="page_num">
<?php
    if($total_page >= 2 && $page >= 2){
        $new_page = $page - 1;
        echo ("<li><a href='./faq_list.php?page=$new_page'>이전</a></li>");
    }
    for($i = 1; $i <= $total_page; $i++){
        if($page == $i){
            echo ("<li><span class='cur_page'>$i</span></li>");
        }else{
            echo ("<li><a href='./faq_list.php?page=$i'>$i</a></li>");
        }
    }
    if($total_page >= 2 && $page != $total_page){
        $new_page = $page + 1;
        echo "<li><a href='./faq_list.php?page=$new_page'>다음</a></li>";
    }
?>
            </ul>

<?php
	//관리자만 "작성하기" 버튼이 보이도록 구성
    if($userlevel == 1 && $userid == "admin"){
?>
            <ul class="buttons">
                <li><button type="button" onclick="location.href='./faq_form.php'">작성하기</button></li>
            </ul>
<?php
    }
?>
        </div>

    </section>
    <footer>
        <?php include "./footer.php" ?>
    </footer>

</body>
</html>
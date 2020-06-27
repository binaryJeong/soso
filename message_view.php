<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/message.css">
</head>
<body>
<?php include "login_status.php";?>
<section>
    <section class='main'>
        <div class='middle' style="background-color: white">
            <?php include "menu.php";?>
    <div id="message_box">
        <h3 class="title">
            <?php
            $mode = $_GET["mode"];
            $num  = $_GET["num"];

            include 'connect_board.php';
            $sql = "select * from message where num=$num";
            $result = mysqli_query($connect, $sql);

            $row = mysqli_fetch_array($result);
            $send_id    = $row["send_id"];
            $regist_day = $row["regist_day"];
            $subject    = $row["subject"];
            $content    = $row["content"];

            $content = str_replace(" ", "&nbsp;", $content);
            $content = str_replace("\n", "<br>", $content);

//            if ($mode=="send")
//                $result2 = mysqli_query($connect, "select name from members where id='$rv_id'");
//            else
//                $result2 = mysqli_query($connect, "select name from members where id='$send_id'");

//            $record = mysqli_fetch_array($result2);
//            $msg_name = $record["name"];
//
//            if ($mode=="send")
//                echo "송신 쪽지함 > 내용보기";
//            else
//                echo "수신 쪽지함 > 내용보기";
?>
        </h3>
        <ul id="view_content">
            <li>
                <span class="col1"><b>제목 :</b> <?=$subject?></span>
                <span class="col2"> | <?=$regist_day?></span>
            </li>
            <li>
                <?=$content?>
            </li>
        </ul>
        <ul class="buttons">
            <li><button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button></li>
            <li><button onclick="location.href='message_delete.php?num=<?=$num?>&mode=<?=$mode?>'">삭제</button></li>
        </ul>
    </div> <!-- message_box -->
</section>
</body>
</html>

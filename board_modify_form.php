<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/board.css">
    <style type="text/css">
        #boardBanner {
            position: fixed;
            color: black;
            left: 0;
            float: left;
            text-align: center;
        }
    </style>
    <script>
        function check_input() {
            if (!document.board_form.subject.value) {
                alert("제목을 입력해주세요.");
                document.board_form.subject.focus();
                return;
            }
            if (!document.board_form.content.value) {
                alert("내용을 입력해주세요.");
                document.board_form.content.focus();
                return;
            }
            document.board_form.submit();
        }
    </script>
</head>
<body>
<?php include "login_status.php";?>
<section>
    <section class='main'>
        <div class='middle' style="background-color: white">
            <?php include "menu.php";?>
            <div id="boardBox" style="color: black">
                <h3 id="board_title" style="color: black; margin-top: 87px">
                    일기장 > 일기 쓰기
                </h3>
                <?php
                $num = $_GET["num"];
                $page = $_GET["page"];

                include  'connect_board.php';
                $sql = "select * from board_info_test where num=$num";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($result);
                $subject = $row["subject"];
                $content = $row["content"];
                $file_name = $row["file_name"];
                ?>
<!--                // board_modify.php 로 수정 된 파일이 다시 저장 됨-->
<!--                // num(글의 번호), page(페이지수 : 글 수정후 돌아갈때, 동일한 페이지로 돌아가도록 함)-->
                <form name="board_form" method="post" action="board_modify.php?num=<?= $num ?>&page=<?= $page ?>"
                      enctype="multipart/form-data">
                    <ul id="board">
                        <li><span class="col1" >제목 : </span>
                            <span class="col2"><input name="subject" type="text" value="<?= $subject ?>"></span>
                        </li>
                        <li id="text_area">
                            <span class="col1" >내용 : </span>
                            <span class="col2">
	    				<textarea name="content"><?= $content ?></textarea>
	    			</span>
                        </li>
                        <li>
                            <span class="col1" > 첨부 파일</span>
                            <span class="col2">
                                <?= $file_name ?>
                                <input type="file" name="upfile"></span>
                        </li>
                    </ul>
                    <ul class="buttons">
                        <li>
                            <button type="button" onclick="check_input()" style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px">수정</button>
                        </li>
                        <li>
                            <button type="button" onclick="location.href='board_list.php'" style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px; margin-left: 10px">목록</button>
                        </li>
                    </ul>
                </form>
            </div> <!-- board_box 범위 -->
        </div>
    </section>
</body>
</html>

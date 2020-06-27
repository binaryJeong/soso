<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/board.css">
    <style type="text/css">
    </style>
    <script>
        // 내용입력 체크
        function check_input() {
            if (!document.board_form.subject.value) {
                alert("제목을 입력해주세요");
                document.board_form.subject.focus();
                return;
            }
            if (!document.board_form.content.value) {
                alert("내용을 입력해주세요");
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
                <h3 id="board_title" style=" margin-top: 87px">
                    일기장 > 일기 쓰기
                </h3>
                <form name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
                    <ul id="board">
                        <li><span class="col1" style="font-family: 'Arial Black',serif">제목 : </span>
                            <span class="col2"><input name="subject" type="text"></span>
                        </li>
                        <li id="text_area">
                            <span class="col1" style="font-family: 'Arial Black',serif">내용 : </span>
                            <span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
                        </li>
                        <li>
                            <span class="col1" style="font-family: 'Arial Black',serif"> 첨부 파일</span>
                            <span class="col2"><input type="file" name="upfile"></span>
                        </li>
                    </ul>
                    <ul class="buttons">
                        <li>
                            <button type="button" onclick="check_input()">완료</button>
                        </li>
                        <li>
                            <button type="button" onclick="location.href='board_list.php'">목록</button>
                        </li>
                    </ul>
                </form>
            </div> <!-- board_box 범위 -->
        </div>
    </section>
</body>
</html>

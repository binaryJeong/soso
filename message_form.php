<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/message.css">
    <script>
        function check_input() {
            if (!document.message_form.subject.value)
            {
                alert("제목을 입력하세요!");
                document.message_form.subject.focus();
                return;
            }
            if (!document.message_form.content.value)
            {
                alert("내용을 입력하세요!");
                document.message_form.content.focus();
                return;
            }
            document.message_form.submit();
        }
    </script>
</head>
<body>
<?php include "login_status.php";?>
<section>
    <section class='main'>
        <div class='middle' style="background-color: white">
            <?php include "menu.php";?>
<section>
    <div id="message_box" style="margin-left: 250px">
        <h3 id="write_title" style="color: black">
            관리자에게 문의하기
        </h3>
        <form  name="message_form" method="post" action="message_insert.php">
            <div id="write_msg">
                <ul>
                    <li>
                        <span class="col1">답변 받을 이메일 주소 : </span>
                        <span class="col2"><input name="rv_id" type="text"></span>
                    </li>
                    <li>
                        <span class="col1">제목 : </span>
                        <span class="col2"><input name="subject" type="text"></span>
                    </li>
                    <li id="text_area">
                        <span class="col1">내용 : </span>
                        <span class="col2">
	    				<textarea name="content" style="height: 130px"></textarea>
	    			</span>
                    </li>
                </ul>
                <button style="margin-left:700px;background: black; color: white; height: 40px; width: 70px; font-size: 12px; border-radius: 8px; font-weight: bold"
                        onclick="check_input()">전송</button>
            </div>
        </form>
    </div> <!-- message_box -->
</section>
</body>
</html>
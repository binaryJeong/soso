<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <!--    //rel: 연결하는 파일과 현재 문서와의 관계-->
    <!--    //href: 파일을 연결하는 속성-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <style type="text/css">

        #sideBanner {
            position: fixed;
            z-index: 3;
            right: 0;
            bottom: 1px;
            /*z-index: 3;*/
            /*width: 100px;*/
            /*border: 2px solid lightcoral;*/
        }

        #boardBanner {
            position: fixed;
            color: black;
            left: 0;
            float: left;
            text-align: center;
        }
    </style>
</head>
<script>
    function check_input() {
        if (!document.login_form.id.value) {
            alert("입력을 완료해주세요");
            document.login_form.id.focus();
            return;
        }

        if (!document.login_form.pass.value) {
            alert("입력을 완료해주세요");
            document.login_form.pass.focus();
            return;
        }
        document.login_form.submit();
    }
</script>
<body>
<?php include "login_status.php"; ?>
<section>
    <div class='middle' style="background-color: white">
        <?php include "menu.php"; ?>
        <div id="main_content" style="text-align: center; margin-left: 400px; margin-top: 70px">
            <div id="login_box" style=" text-align: center; font-size: 25px">
                <div id="login_title" style=" color: black; text-align: center;margin-left: 20px; font-size: 30px">
                    <span>관리자 로그인</span>
                </div>
                <div id="login_form">
                    <form name="login_form" method="post" action="login.php" style="text-align: center">
                        <ul>
                            <li><input type="text" name="id" placeholder="아이디"></li>
                            <li><input type="password" id="pass" name="pass" placeholder="비밀번호"></li>
                        </ul>
                        <div id="login_btn" style="text-align: center; margin-left: 20px">
                            <a href="#"><img src="../image/btn_login.png" onclick="check_input()"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
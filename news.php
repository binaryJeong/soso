<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <!--    //rel: 연결하는 파일과 현재 문서와의 관계-->
    <!--    //href: 파일을 연결하는 속성-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <style type="text/css">
        #fixedbtn {
            position: fixed;
            left: 20px;
            bottom: 10px;
            z-index: 1000
        }

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
    var count = 0;
    //스크롤 바닥 감지
    window.onscroll = function () {
        //추가되는 임시 콘텐츠
        //window height + window scrollY 값이 document height보다 클 경우,
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            //실행할 로직 (콘텐츠 추가)
            count++;
            var addContent = '<div class="block" style="background-color: black">' +
                '<p><img src = "../image/spring.jpg"></p>' +
                '<p><img src = "../image/square.jpg"></p>' +
                '<p><img src = "../image/fish.jpg"></p>' +
                '<p><img src = "../image/machine.jpg"></p>' +
                '</div>';
            //article에 추가되는 콘텐츠를 append
            $('article').append(addContent);
        }
    };
</script>
<body style="overflow-x:hidden; background-color: black; height: 130px">
<header style="height: 30px;font-size: 18px; color:black; border-bottom: black;margin-left: 1380px; font-family: 'Bell MT'">
    <?php include "login_status.php";?>
</header>
<header style="color: white; text-align:center; size:30px;height: 100px; ">
    <p>
        테스트
    </p>
</header>
<div id="sideBanner">
</div>

<section>
    <div class='middle' style="background-color: white">
        <div class='menu' style="color: black">
            <br/>메뉴
            <br/> <br/>
            <form method="get" action="main.php">
                <input type="submit" name="photoGallery" value="메인"
                       style="width: 100px; margin-left: 50px; margin-right: 50px" id="boardBanner">
            </form>
            <br/><br/>
            <form method="get" action="board_list.php">
                <input type="submit" name="diary" value="일기장"
                       style="width: 100px; margin-left: 50px; margin-right: 50px " id="boardBanner">
            </form>
            <br/><br/>
            <form method="get" action="main.php">
                <input type="submit" name="randomNovel" value="투자기록"
                       style="width: 100px; margin-left: 50px; margin-right: 50px" id="boardBanner">
            </form>
            <br/><br/>
            <form method="get" action="main.php">
                <input type="submit" name="randomNovel" value="종목보기"
                       style="width: 100px; margin-left: 50px; margin-right: 50px" id="boardBanner">
            </form>
            <br/><br/>
            <form method="get" action="news.php">
                <input type="submit" name="guestBook" value="뉴스"
                       style="width: 100px; margin-left: 50px; margin-right: 50px" id="boardBanner">
            </form>
            <br/><br/>
            <form method="get" action="main.php">
                <input type="submit" name="settingForAdmin" value="관리"
                       style="width: 100px; margin-left: 50px; margin-right: 50px" id="boardBanner">
            </form>
            <br/><br/>
        </div>
        <article>
            <div class="block" style="background-color: black">
                <p><img src="../image/square.jpg"></p>
            </div>
        </article>

        <div class='menuRightSide' style="font-size: 23px;">
            <div class="block">
                <br style="text-align: center "/>최신글<br/><br/>
<!--                --><?php
//                include  'connect_board.php';
//                //             작성글 최신순으로 5개 가져옴
//                $sql = "select * from board_info_test order by num desc limit 5";
//                $result = mysqli_query($connect, $sql);
//
//                if (!$result)
//                    echo " 아직 글이 없습니다! ";
//                else {
//                    while ($row = mysqli_fetch_array($result)) {
//                        $regist_day = substr($row["regist_day"], 0, 10);
//                        ?>
<!--                        <li>-->
<!--                            <span>작성일 : --><?//= $regist_day ?><!--</span>-->
<!--                            <br/>-->
<!--                            <span>제목 : --><?//= $row["subject"] ?><!--</span>-->
<!--                        </li>-->
<!--                        --><?php
//                    }
//                }
//                mysqli_close($connect);
//                ?>
            </div>
        </div>
    </div>
</section>
<div>
    <!--    // 스크롤 맨위 올리기-->
    <input type="image" src="../css/toTop.png" id="fixedbtn"
           style="height: 40px; width: 40px; margin-bottom: 10px; margin-left: 225px"
           onClick="javascript:window.scrollTo(0,0)"/>
</div>
</body>
</html>

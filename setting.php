<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <!--    //rel: 연결하는 파일과 현재 문서와의 관계-->
    <!--    //href: 파일을 연결하는 속성-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/board.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
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
    </style>
</head>
<body>
<?php include "login_status.php"; ?>
<section>
    <div class='middle' style="background-color: white;">
        <?php include "menu.php"; ?>
            <article>
                <div class="block"
                     style="background-color:gray; width: 900px; height: 400px;margin-left: 0px;margin-right: 10px">
                    <div id="message_box">
                        <h3>
                            <?php
                            if (isset($_GET["page"]))
                                $page = $_GET["page"];
                            else
                                $page = 1;

                            $mode = $_GET["mode"];

                            if ($mode == "send")
                                echo "송신 쪽지함 > 목록보기";
                            else
                                echo "수신 쪽지함 > 목록보기";
                            ?>
                        </h3>
                        <div>
                            <ul id="message">
                                <li>
                                    <span class="col1">번호</span>
                                    <span class="col2">제목</span>
<!--                                    <span class="col3">-->
<?php
//if ($mode == "send")
//    echo "받은이";
//else
//    echo "보낸이";
//?>
<!--					</span>-->
                                    <span class="col4">등록일</span>
                                </li>
                                <?php
                                $connect = mysqli_connect("localhost", "user1", "12345", "sample");
                                $result = mysqli_query($connect, $sql);
                                $total_record = mysqli_num_rows($result); // 전체 글 수

                                $scale = 5;

                                // 전체 페이지 수($total_page) 계산
                                if ($total_record % $scale == 0)
                                    $total_page = floor($total_record / $scale);
                                else
                                    $total_page = floor($total_record / $scale) + 1;

                                // 표시할 페이지($page)에 따라 $start 계산
                                $start = ($page - 1) * $scale;

                                $number = $total_record - $start;

                                for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                                    mysqli_data_seek($result, $i);
                                    // 가져올 레코드로 위치(포인터) 이동
                                    $row = mysqli_fetch_array($result);
                                    // 하나의 레코드 가져오기
                                    $num = $row["num"];
                                    $subject = $row["subject"];
                                    $regist_day = $row["regist_day"];

                                    if ($mode == "send")
                                        $msg_id = $row["rv_id"];
                                    else
                                        $msg_id = $row["send_id"];

                                    $result2 = mysqli_query($connect, "select name from members where id='$msg_id'");
                                    $record = mysqli_fetch_array($result2);
                                    $msg_name = $record["name"];
                                    ?>
                                    <li>
                                        <span class="col1"><?= $number ?></span>
                                        <span class="col2"><a
                                                    href="message_view.php?mode=<?= $mode ?>&num=<?= $num ?>"><?= $subject ?></a></span>
                                        <span class="col3"><?= $msg_name ?>(<?= $msg_id ?>)</span>
                                        <span class="col4"><?= $regist_day ?></span>
                                    </li>
                                    <?php
                                    $number--;
                                }
                                mysqli_close($con);
                                ?>
                            </ul>
                            <ul id="page_num">
                                <?php
                                if ($total_page >= 2 && $page >= 2) {
                                    $new_page = $page - 1;
                                    echo "<li><a href='message_box.php?mode=$mode&page=$new_page'>◀ 이전</a> </li>";
                                } else
                                    echo "<li>&nbsp;</li>";

                                // 게시판 목록 하단에 페이지 링크 번호 출력
                                for ($i = 1; $i <= $total_page; $i++) {
                                    if ($page == $i)     // 현재 페이지 번호 링크 안함
                                    {
                                        echo "<li><b> $i </b></li>";
                                    } else {
                                        echo "<li> <a href='message_box.php?mode=$mode&page=$i'> $i </a> <li>";
                                    }
                                }
                                if ($total_page >= 2 && $page != $total_page) {
                                    $new_page = $page + 1;
                                    echo "<li> <a href='message_box.php?mode=$mode&page=$new_page'>다음 ▶</a> </li>";
                                } else
                                    echo "<li>&nbsp;</li>";
                                ?>
                            </ul> <!-- page -->
                            <ul class="buttons">
                                <li>
                                    <button onclick="location.href='message_box.php?mode=rv'">수신 쪽지함</button>
                                </li>
                                <li>
                                    <button onclick="location.href='message_box.php?mode=send'">송신 쪽지함</button>
                                </li>
                                <li>
                                    <button onclick="location.href='message_form.php'">쪽지 보내기</button>
                                </li>
                            </ul>
                        </div> <!-- message_box -->
                    </div>
            </article>
        </div>
    </div>
</section>
</body>
</html>

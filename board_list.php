<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/board.css">
</head>
<body>
<?php include "login_status.php";?>
<section>
    <section class='main'>
        <div class='middle' style="background-color: white">
            <?php include "menu.php";?>
            <div id="boardBox" style="  color: black ">
                <h3>
                    <br/><br/>일기장 > 목록
                </h3>
                <ul id="board_list" style="color: black">
                    <li>
                        <span class="col1">번호</span>
                        <span class="col2">제목</span>
                        <span class="col4">첨부</span>
                        <span class="col5">날짜</span>
                        <span class="col6">조회</span>
                    </li>

                    <?php
                    if (isset($_GET["page"]))
                        $page = $_GET["page"];
                    else
                        $page = 1;
                    include  'connect_board.php';
                    //board_info_test 테이블의 데이터를 최신순으로 꺼내옴
                    $sql = "select * from board_info_test order by num desc";
                    // $con 의 데이터로 $sql 명령 실행
                    $result = mysqli_query($connect, $sql);
                    //result 에 담긴 총 행의 갯수 반환
                    $total_record = mysqli_num_rows($result);
                    //한 페이지당, 글의 수
                    $scale = 10;

                    if ($total_record % $scale == 0)
                        // 정수반환
                        $total_page = floor($total_record / $scale);
                    else
                        $total_page = floor($total_record / $scale) + 1;
                    // 한 페이지 당, 담기게 될 게시물의 시작점 (0~9, 10~19,..)
                    $start = ($page - 1) * $scale;
                    $number = $total_record - $start;

                    for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                        // $result 의 데이터 중 $i 에 해당하는 위치로 이동
                        mysqli_data_seek($result, $i);
                        $row = mysqli_fetch_array($result);
                        // 데이터 가져옴
                        $num = $row["num"];
                        $subject = $row["subject"];
                        $regist_day = $row["regist_day"];
                        $hit = $row["hit"];
                        if ($row["file_name"])
                            $file_image = "<img src='../image/heart.png'>";
                        else
                            $file_image = " ";
                        ?>
                        <li>
                            <span class="col1"><?= $number ?></span>
                            <span class="col2"><a
                                        href="board_view.php?num=<?= $num ?>&page=<?= $page ?>"><?= $subject ?></a></span>
                            <span class="col4"><?= $file_image ?></span>
                            <span class="col5"><?= $regist_day ?></span>
                            <span class="col6"><?= $hit ?></span>
                        </li>

                        <?php
                        $number--;
                    }
                    mysqli_close($connect);
                    ?>
                </ul>
                <ul id="page_num" style="color: black">
                    <?php
                    if ($total_page >= 2 && $page >= 2) {
                        $new_page = $page - 1;
                        echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
                    } else
                        // 공백
                        echo "<li>&nbsp;</li>";

                    // 게시판 목록 하단에 페이지 번호
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($page == $i)     // 현재 페이지 번호 링크 안함
                        {
                            echo "<li><b> $i </b></li>";
                        } else {
                            echo "<li><a href='board_list.php?page=$i'> $i </a><li>";
                        }
                    }
                    if ($total_page >= 2 && $page != $total_page) {
                        $new_page = $page + 1;
                        echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
                    } else
                        echo "<li>&nbsp;</li>";
                    ?>
                </ul> <!-- page -->
                <ul class="buttons">
                    <li>
                        <button style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px"
                                onclick="location.href='board_list.php'">목록</button>
                    </li>
                    <li>
                        <?php
                        if($userid) {
                            ?>
                            <button style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px; margin-left: 10px"
                                    onclick="location.href='board_form.php'">글쓰기</button>
                            <?php
                        } else {
                            ?>
                            <a href="javascript:alert('관리자 권한이 필요합니다!')"><button
                                        style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px;margin-left: 10px">글쓰기</button></a>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</body>
</html>

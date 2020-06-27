<!DOCTYPE html>
<html>
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
            <div id="boardBox">
                <h3 id="title" style="color: black; margin-top: 87px">
                    일기장 > 내용보기
                </h3>
                <?php
                $num = $_GET["num"];
                $page = $_GET["page"];

                include 'connect_board.php';
                $sql = "select * from board_info_test where num=$num";
                $result = mysqli_query($connect, $sql);

                $row = mysqli_fetch_array($result);
                $regist_day = $row["regist_day"];
                $subject = $row["subject"];
                $content = $row["content"];
                $file_name = $row["file_name"];
                $file_type = $row["file_type"];
                $file_copied = $row["file_copied"];
                $hit = $row["hit"];

                // php -> html 문으로 변경시, 공백과 줄바꿈 인식
                $content = str_replace(" ", "&nbsp", $content);
                $content = str_replace("\n", "<br>", $content);

                $new_hit = $hit + 1;
                $sql = "update board_info_test set hit=$new_hit where num=$num";
                mysqli_query($connect, $sql);
                ?>

                <ul id="view_content" style="color: black">
                    <li>
                        <span class="col1"><b>제목 :</b> <?= $subject ?></span>
                        <span class="col2"><?= $regist_day ?></span>
                    </li>
                    <li>
                        <?php
                        if ($file_name) {
                            $real_name = $file_copied;
                            $file_path = "/usr/local/src/apache/htdocs/data " . $real_name;
                            $file_size = filesize($file_path);

                            echo "▷ 첨부파일 : $file_name ($file_size Byte)&nbsp;&nbsp;&nbsp;&nbsp;                       
			       		<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                        }
                        ?>
                        <p style="text-align: center">
                            <img src="<?= "data " . "$file_copied" ?>">
                        </p>
                        <?= $content ?>
                    </li>
                </ul>
                <ul class="buttons">
                    <li>
                        <button  style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px"
                                 onclick="location.href='board_list.php?page=<?= $page ?>'">목록</button>
                    </li>
                    <!-- // '수정' / '삭제' 로 글번호와 페이지번호를 보낸다 -->
                    <li>
                        <?php
                        if ($userid) {
                            ?>
                            <button style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px; margin-left: 10px"
                                    onclick="location.href='board_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">
                                수정
                            </button>
                            <?php
                        } else {
                            ?>
                            <a href="javascript:alert('관리자 권한이 필요합니다!')" style="background: white; color:#fff; width: 100px;">
                                <button style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px; margin-left: 10px">수정</button>
                            </a>
                            <?php
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if ($userid) {
                            ?>
<!--                            <form action="board_delete.php?num!--&page-'" method="get">-->
<!--                                <input type="submit" value="삭제">-->
                            <button  style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px; margin-left: 10px"
                                    onclick="location.href='board_delete.php?num=<?= $num ?>//&page=<?= $page ?>//'">삭제
                            </button>
                            <?php
                        } else {
                            ?>
                            <a href="javascript:alert('관리자 권한이 필요합니다!')" style="background: white; color:#fff; width: 100px;">
                                <button style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px;margin-left: 10px">삭제</button>
                            </a>
                            <?php
                        }
                        ?>
                    </li>
                    <li>
                        <?php
                        if ($userid) {
                            ?>
                            <button  style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px; margin-left: 10px"
                                    onclick="location.href='board_form.php'">글쓰기</button>
                            <?php
                        } else {
                            ?>
                            <a href="javascript:alert('관리자 권한이 필요합니다!')" >
                                <button style="background: black; color: white; height: 40px; width: 70px; font-size: 15px; border-radius: 8px;margin-left: 10px">글쓰기</button>
                            </a>
                            <?php
                        }
                        ?>
                    </li>
                </ul>
            </div>   <!-- //boardBox 끝-->
        </div>
    </section>
</section>
</body>
</html>

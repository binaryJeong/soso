<!DOCTYPE html>
<html lang="ko">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/table.css">
<div class='menu' style="color: black; font-family: HY헤드라인M; border-right: hidden">
    <style type="text/css">
        #boardBanner {
            position: fixed;
            color: black;
            left: 0;
            float: left;
            text-align: center;
        }

        button {
            target-name: current;
            background: #000;
            color: black;
            border: none;
            position: relative;
            height: 60px;
            width: 150px;
            margin-left: 50px;
            font-size: 1.6em;
            padding: 0 2em;
            cursor: pointer;
            transition: 800ms ease all;
            outline: none;
        }

        button:hover {
            background: #fff;
            color: #000;
        }

        button:before, button:after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            height: 2px;
            width: 0;
            color: black;
            background: #000;
            transition: 400ms ease-in-out;
        }

        button:after {
            right: inherit;
            top: inherit;
            left: 0;
            bottom: 0;
            color: black;
        }
        button:hover:before, button:hover:after {
            width: 100%;
            transition: 800ms ease all;
        }
    </style>
    <br/> <br/> <br/>MENU
    <br/> <br/>
    <button onclick="location.href='main.php'" id="boardBanner"
            style="font-size: 15px;font-family: HY헤드라인M; color: gray">메인
    </button>
    <br/><br/>
    <button onclick="location.href='invest.php'" id="boardBanner" style="font-size:15px; color: gray">투자기록</button>
    <br/><br/>
    <button onclick="location.href='view_sector.php'" id="boardBanner" style="font-size: 15px;color: gray">종목보기</button>
    <br/><br/>
    <button onclick="location.href='news.php'" id="boardBanner" style="font-size: 15px; color: gray">뉴스</button>
    <br/><br/>
    <button onclick="location.href='board_list.php'" id="boardBanner" style="font-size: 15px; color: gray">일기</button>
    <br/><br/>
    <?php
    if ($userid) {
        ?>
        <button onclick="location.href='setting.php'" id="boardBanner" style="font-size: 15px; color: gray">관리</button>
        <?php
    } else {
        ?>
        <a href="javascript:alert('관리자 권한이 필요합니다!')">
            <button onclick=" history.go(0)" id="boardBanner" style="font-size: 15px; color: gray">관리</button>
        </a>
        <?php
    }
    ?>
    <br/><br/>
</div>
</html>



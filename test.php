<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <!--    //rel: 연결하는 파일과 현재 문서와의 관계-->
    <!--    //href: 파일을 연결하는 속성-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
</head>
<body>
<?php include "login_status.php"; ?>
<section>
    <div class='middle' style="background-color: white; height: auto">
        <?php include "menu.php"; ?>
        <article style="margin-bottom: 50px">
            <p style="color:#000; font-family: HY헤드라인M;font-weight: bold ">미국주식 종목검색</p>
            <div class="block" style="background-color:white ; width: 1000px; color: black; margin-left: 100px">
                <h1 style="background-color: black;color: white">NASDAQ 100 List</h1>
                <div class="main">
                    <input type="radio" id="technology" name="show" checked/>
                    <input type="radio" id="consumer_service" name="show"/>
                    <input type="radio" id="health" name="show"/>
                    <input type="radio" id="consumer_non_durables" name="show"/>
                    <input type="radio" id="durables" name="show"/>
                    <input type="radio" id="capital" name="show"/>
                    <input type="radio" id="transport" name="show"/>
                    <input type="radio" id="utility" name="show"/>
                    <input type="radio" id="finance" name="show"/>
                    <input type="radio" id="etc" name="show"/>
                    <div class="tab">
                        <label for="technology">기술</label>
                        <label for="consumer_service">소비자서비스</label>
                        <label for="health">헬스케어</label>
                        <label for="consumer_non_durables">비내구재</label>
                        <label for="durables">내구재</label>
                        <label for="capital">자본재</label>
                        <label for="transport">운송</label>
                        <label for="utility">유틸리티</label>
                        <label for="finance">금융</label>
                        <label for="etc">기타</label>
                    </div>
                    <!--                    // 10개의 콘텐츠가 섹터별로 들어가도록-->
                    <div class="content">
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='기술'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='소비자서비스'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='헬스케어'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='비내구재'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='내구재'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='자본재'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='운송'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='유틸리티'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='금융'";
                            include 'sector.php';
                            ?>
                        </div>
                        <div class="content-dis">
                            <?php
                            $sql = "select * from nas100_stock_1 where nas_stock_sector='기타'";
                            include 'sector.php';
                            ?>
                        </div>
                    </div>
                    <div class="content">
                        <div id="container">
                            <div id="input-form">
                                Search : <input type="text" id="keyword"/>
                            </div>
                            <?php
                            include 'search_data.php';
                            ?>
                        </div>
                    </div>
        </article>
    </div>
</section>
<div>
    <!--    // 스크롤 맨위 올리기-->
    <input type="image" src="toTop.png" id="fixedbtn"
           style="height: 40px; width: 40px; margin-bottom: 10px; margin-left: 225px"
           onClick="javascript:window.scrollTo(0,0)"/>
</div>
</body>
</html>


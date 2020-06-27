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

        .container {
            color: #E8E9EB;
            background: #ff00e1;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php include "pop_up.php"; ?>
<?php include "login_status.php"; ?>
<section >
    <div class='middle' style="background-color: white;">
        <?php include "menu.php"; ?>
        <article>
            <div class="block" style="background-color:white;margin-bottom: 1000px; color: black">
                <?php
                include 'connect_board.php';
                $sql = "select * from datasets2";
                $result = mysqli_query($connect, $sql);

                $data1 = '';
                $data2 = '';
                $data3 = '';

                while ($row = mysqli_fetch_array($result)) {

                    $data1 = $data1 . '"' . $row['data1'] . '",';
                    $data2 = $data2 . '"' . $row['data2'] . '",';
                    $data3 = $data3 . '"' . $row['data3'] . '",';
                }

                $data1 = trim($data1, ",");
                $data2 = trim($data2, ",");
                $data3 = trim($data3, ",");
                ?>
                <div class="container">
                    <h1>Monthly yield</h1>
                    <canvas id="chart"
                            style="width: 100%; height: 50vh; background: #fff; margin-top: 10px; color: black"></canvas>
                    <script>
                        var ctx = document.getElementById("chart").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [2019.06, 2019.07, 2019.08, 2019.09, 2019.10, 2019.11, 2019.12, 2020.01, 2020.02, 2020.03, 2020.04, 2020.05],
                                datasets:
                                    [{
                                        type: 'line',
                                        label: '수익률',
                                        data: [<?php echo $data3; ?>],
                                        backgroundColor: 'transparent',
                                        borderColor: '#000000',
                                        borderWidth: 1
                                    },

                                        {
                                            label: '매도',
                                            data: [<?php echo $data2; ?>],
                                            backgroundColor: 'rgba(0,255,255)',
                                            borderColor: 'rgba(0,255,255)',
                                            borderWidth: 2
                                        },

                                        {
                                            label: '매수',
                                            data: [<?php echo $data1; ?>],
                                            backgroundColor: 'rgba(255,99,132)',
                                            borderColor: 'rgba(255,99,132)',
                                            borderWidth: 2
                                        }],

                            },
                            options: {
                                scales: {
                                    scales:
                                        {
                                            yAxes: [{
                                                beginAtZero: false
                                            }
                                            ],
                                            xAxes: [{autoskip: true, maxTicketsLimit: 20}]
                                        }
                                },
                                tooltips: {mode: 'index'},
                                legend: {
                                    display: true,
                                    position: 'top',
                                    labels: {fontColor: 'rgb(255,255,255)', fontSize: 13}
                                }
                            }
                        });
                    </script>
                </div>
        </article>
        <div class='menuRightSide' style="font-size: 20px; background-color:transparent;border-left: hidden">
            <article>
            <div class="block" style="background-color:white; width: 300px; height: 10px;margin-left: 0px;margin-right: 10px">

                <iframe width="410" height="250" src="https://www.youtube.com/embed/bxCspjodb1I"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media;
                         gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="410" height="250" src="https://www.youtube.com/embed/dcPoYkZxDVA" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                <iframe width="410" height="250" src="https://www.youtube.com/embed/7akvVFYmCyg"
                        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope;
                        picture-in-picture" allowfullscreen></iframe>
                <iframe width="410" height="250" src="https://www.youtube.com/embed/HWoN5bcT4LQ" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
            </article>
        </div>
    </div>
</section>
<div>
    <!--    // 스크롤 맨위 올리기-->
    <input type="image" src="../image/toTop.png" id="fixedbtn"
           style="height: 40px; width: 40px; margin-bottom: 10px; margin-left: 225px"
           onClick="javascript:window.scrollTo(0,0)"/>
</div>
</body>
</html>

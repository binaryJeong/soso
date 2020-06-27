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
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>비밀일기</title>
    <!--    //rel: 연결하는 파일과 현재 문서와의 관계-->
    <!--    //href: 파일을 연결하는 속성-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

        #boardBanner {
            position: fixed;
            color: black;
            left: 0;
            float: left;
            text-align: center;
        }

        /*body {*/
        /*    font-family: Arial;*/
        /*    margin: 80px 100px 10px 100px;*/
        /*    padding: 0;*/
        /*    color: white;*/
        /*    text-align: center;*/
        /*    background: #555652;*/
        /*}*/

        .container {
            color: #E8E9EB;
            background: #222;
            border: #555652 1px solid;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php include "login_status.php"; ?>
<section>
    <div class='middle' style="background-color: white">
        <?php include "menu.php"; ?>
        <article>
            <div class="block" style="background-color:white ; width: 1000px">
                <div class="container">
                    <h1>수익률 그래프</h1>
                    <canvas id="chart"
                            style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

                    <script>
                        var ctx = document.getElementById("chart").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [2019.06, 2019.07, 2019.08, 2019.09, 2019.10, 2019.11, 2019.12, 2020.01, 2020.02, 2020.03, 2020.04, 2020.05],
                                datasets:
                                    [{
                                        label: '매수',
                                        data: [<?php echo $data1; ?>],
                                        backgroundColor: 'rgba(255,99,132)',
                                        borderColor: 'rgba(255,99,132)',
                                        borderWidth: 2
                                    },

                                        {
                                            label: '매도',
                                            data: [<?php echo $data2; ?>],
                                            backgroundColor: 'rgba(0,255,255)',
                                            borderColor: 'rgba(0,255,255)',
                                            borderWidth: 2
                                        },

                                        {
                                            type: 'line',
                                            label: '수익률',
                                            data: [<?php echo $data3; ?>],
                                            backgroundColor: 'transparent',
                                            borderColor: '#000000',
                                            borderWidth: 1
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
            </div>
            <div class="block" style="background-color: ; width: 1000px; margin-bottom: 100px">
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

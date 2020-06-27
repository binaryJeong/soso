<!DOCTYPE html>
<html lang="ko">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/table.css">
<table id="table" >
<thead>
<th><span class="col1">순위</span></th>
<th><span class="col2">종목 코드</span></th>
<th><span class="col3">종목 명</span></th>
</thead>
<?php
    include 'connect_board.php';
//    $sql = "select * from nas100_stock_1 where nas_stock_sector='기술'";
    $result = mysqli_query($connect, $sql);
    $total_record = mysqli_num_rows($result);
    $scale = 100;
    for ($i = 1;
         $i <= $total_record;
         $i++) {

        $row = mysqli_fetch_array($result);

        $num = $row["num"];
        $nas_stock_symbol = $row["nas_stock_symbol"];
        $nas_stock_name = $row["nas_stock_name"];
        $nas_stock_link = $row["nas_stock_link"];
        $rank = $row["rank"];
        ?>
        <tr>
            <td><span class="col1"> <?= $rank ?></span></td>
            <td><span class="col2"> <?= $nas_stock_name ?></span></td>
            <td><span class="col3"><a href="<?= $nas_stock_link ?>"
                                      target="_blank"><?= $nas_stock_symbol ?></a></span>
            </td>
        </tr>
        <?php
    }
    mysqli_close($connect);
    ?>
</table>
</html>


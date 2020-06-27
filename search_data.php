<!DOCTYPE html>
<html lang="ko">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="table.css">
    <table id="user-table">
    <thead>
    <th>Symbol</th>
    <th>Security Name</th>
    <th>Market Category</th>
    <th>Test Issue</th>
    <th>Financial Status</th>
    </thead>
    <?php
    include 'connect_board.php';
    $sql = "select * from nas_all";
    $result = mysqli_query($connect, $sql);
    $total_record = mysqli_num_rows($result);
    for ($i = 1;
         $i <= $total_record;
         $i++) {

        $row = mysqli_fetch_array($result);

        $num = $row["num"];
        $symbol = $row["symbol"];
        $security_name = $row["security_name"];
        $market_category = $row["market_category"];
        $test_issue = $row["test_issue"];
        $financial_status = $row["financial_status"];
        ?>
        <tbody>
        <tr>
            <td><?= $symbol ?></td>
            <td> <?= $security_name ?></td>
            <td><?= $market_category ?></td>
            <td> <?= $test_issue ?></td>
            <td> <?= $financial_status ?></td>
            </td>
        </tr>
        <?php
    }
    mysqli_close($connect);
    ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $("#keyword").keyup(function () {
            let k = $(this).val();
            $("#user-table > tbody > tr").hide();
            let temp = $("#user-table > tbody > tr > td:nth-child(5n+2):contains('" + k + "')");
            $(temp).parent().show();
        })
    })
</script>
</html>





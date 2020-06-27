<?php
$id = $_POST["id"];
$pass = $_POST["pass"];

include 'connect_board.php';
$sql = "select * from members where id='$id'";
$result = mysqli_query($connect, $sql);

$num_match = mysqli_num_rows($result);

if (!$num_match) {
    echo("
           <script>
             window.alert('관리자가 아닙니다!')
             history.go(-1)
           </script>
         ");
} else {
    $row = mysqli_fetch_array($result);
    $db_pass = $row["pass"];

    mysqli_close($connect);

    if ($pass != $db_pass) {

        echo("
              <script>
                window.alert('관리자가 아닙니다!')
                history.go(-1)
              </script>
           ");
        exit;
    } else {
        session_start();
        $_SESSION["userid"] = $row["id"];
        $_SESSION["userlevel"] = $row["level"];

        echo("
              <script>
                location.href = 'main.php';
              </script>
            ");
    }
}
?>

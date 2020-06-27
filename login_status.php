<!DOCTYPE html>
<html lang="ko">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="stylesheet" type="text/css" href="../css/table.css">
<header style="height:1px;color:black;border-bottom: black;">
<img src="../image/banner3.png" style="height: 100px; width: 2000px">
</header>
<!--<header style="color:white; text-align:center; size:15px;height:30px;border-bottom:black;border-top:black;font-family: HY헤드라인M;font-weight: bold"-->
<!--       >-->
<!--    <p>-->
<!--        $ 소소한 투자일기 $-->
<!--    </p>-->
<!--</header>-->
<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
?>

<?php
if (!$userid) {
    ?>
    <li><a href="login_form.php" style="color: white"><img src="../image/seta.png"
            style="margin-left:1000px; position: fixed; right: 10px; bottom: 10px; height: 50px;width: 50px;border-radius: 8px;" ></a>
    </li>
    <?php
} else if ($userid && $userlevel == 1) {
    ?>
    <li><a href="logout.php" style="color: white"><img src="../image/setb.png"
              style="margin-left:1000px; position: fixed; right: 10px; bottom: 10px; height: 50px;width: 50px;border-radius: 8px;"></a></li>
    <?php
}
?>

<li><a href="message_form.php" style="color: white"><img src="../image/qq.png"
    style="margin-left:1000px; position: fixed; right: 10px; bottom: 70px;
    height: 50px;width: 50px;border-radius: 8px;"></a></li>
</html>




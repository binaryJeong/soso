<?php

$subject = $_POST["subject"];
$content = $_POST["content"];

$subject = htmlspecialchars($subject, ENT_QUOTES);
$content = htmlspecialchars($content, ENT_QUOTES);

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장


include  'connect_board.php';
$sql = "insert into message (subject, content, regist_day) 
values('$subject', '$content', '$regist_day')";
mysqli_query($connect, $sql);
mysqli_close($connect);                // DB 연결 끊기



//$id   = $_POST["id"];
//$pass = $_POST["pass"];
//$email1  = $_POST["email1"];
//$email2  = $_POST["email2"];
//
//$email = $email1."@".$email2;
//$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
//
//
//$con = mysqli_connect("localhost", "user1", "12345", "sample");
//
//$sql = "insert into members(id, pass, name, email, regist_day, level, point) ";
//$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0)";

echo "
	      <script>
	          location.href = 'main.php';
	      </script>
	  ";
?>
<?php
//보드 뷰에서 전달받음 (get)
$real_name = $_GET["real_name"];
$file_name = $_GET["file_name"];
$file_type = $_GET["file_type"];
$file_path = '/usr/local/src/apache/htdocs/data '.$real_name;
// 브라우저 이름에 특정 문자열이 있는지 검사한다
$internetBrowCheck = preg_match('~MSIE|Internet Explorer~i', $_SERVER['HTTP_USER_AGENT']) ||
    (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0') !== false &&
        strpos($_SERVER['HTTP_USER_AGENT'], 'rv:11.0') !== false);

//IE인경우 한글파일명이 깨지는 경우를 방지
// utf-8 을 euc-kr 방식으로 변경
if( $internetBrowCheck ){
    $file_name = iconv('utf-8', 'euc-kr', $file_name);
}

if( file_exists($file_path) )
{
    // 읽기, 이진모드로 파일을 연다(경로) -> $filePointer 변수에 저장한다
    $filePointer = fopen($file_path,"rb");
    Header("Content-type: application/x-msdownload");
    Header("Content-Length: ".filesize($file_path));
    Header("Content-Disposition: attachment; filename=".$file_name);
    Header("Content-Transfer-Encoding: binary");
    Header("Content-Description: File Transfer");
    Header("Expires: 0");
}
// 사용자의 컴퓨터로 파일을 전송
if(!fpassthru($filePointer))
    fclose($filePointer);
?>

  
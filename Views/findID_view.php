<?php
session_start();

// MySQL 서버 연결 정보 설정
$servername = "127.0.0.1";
$username = "root";
$password = "qwe123";
$dbname = "COMON";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("데이터베이스 연결 실패: " . $conn->connect_error);
}
    $sql = "SELECT * FROM user_info WHERE user_id = '$username' and user_phone = '$userphone'";                     
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoMon 서버 - 아이디 찾기 페이지</title>
    <link rel="stylesheet" href="../CSS/findID.css">
</head>
<body>
  <p>아이디 찾기</p>
  <div class="find_select">
    <form action="findID.php">
      <input type="text" class="find_user_name" placeholder="이름">
      <input type="tel" class="find_user_tel" placeholder="전화번호">
      <input type="tel" class="find_user_authen" placeholder="인증번호">
      <button type="button" class="authen_Btn">인증번호 전송</button>
      <button type="button" class="confirm_Btn">확인</button>
      <input type="submit" id="submitID" value="아이디 찾기" onclick="window.open('/PHP/findID_result.php','_blank','width=450, height=500, top=170, left=170')">
    </form>
  </div>
</body>
</html>
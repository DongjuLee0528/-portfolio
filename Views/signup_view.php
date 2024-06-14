<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoMon 서버 - 회원가입 페이지</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://leeskyserver.com/assets/logo.png">
    <link rel="stylesheet" href="../CSS/signup.css">
</head>
<body>
  <div class="container">
    <div class="member-container">
      <div class="header">
        <div>회원 가입을 위해 정보를 입력해주세요.</div>
      </div>
      <form action="signup.php" method="post">
        <div class="user-info">
         <div class="user_id">
            <div>* 아이디</div>
            <input type="text" name="user_id">
         </div>
         <div class="user-info-pw">
           <div>* 비밀번호</div>
           <input type="password" name="user_pw">
         </div>
         <div class="user-info-pw-check">
           <div>* 비밀번호 확인</div>
           <input type="password" name="user_pw_r">
         </div>
           <div class="user_birth">
              <div>* 생년월일</div>
              <input type="text" name="user_brith" placeholder="6자리 입력하세요" maxlength="6">
           </div>
         <div class="user-info-name">
           <div>* 이름</div>
           <input type="text" name="user_name">
         </div>
          <div class="user-info-email">
            <div>* 이메일</div>
            <input type="email" name="user_email">
          </div>
          <div class="user_phone">
            <div>* 전화번호</div>
            <input type="tel" name="user_phone" placeholder="000-0000-0000 형식으로 입력하세요">
          </div>   
          <div class="gender">
            <input type="radio" name="user_gender" class="gender_btn" value="여">
            <label for="women">여성</label>
            <input type="radio" name="user_gender" class="gender_btn" value="남">
            <label for="men">남성</label>
          </div>
          <input type="submit" class="signupbutton" value="가입하기" style="color:white;"/>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
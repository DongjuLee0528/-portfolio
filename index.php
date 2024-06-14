<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoMon 서버 - 메인 페이지</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://leeskyserver.com/assets/logo.png">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
  <img src="https://leeskyserver.com/assets/logo.png" alt="" id="logo">
    <ul class="gnb">
      <li><a href="https://test.leeskyserver.com">웹페이지 실습</a></li>
      <li><a href="https://fix.leeskyserver.com/">Fix 페이지</a></li>
      <li><a href="https://obt.leeskyserver.com/">튜터링 페이지</a></li>
      <li><a href="https://mail.leeskyserver.com/">메일 서버 관리 페이지</a></li>
      <li><a href="Views/notice_view.php">게시판</a></li>

      <input type="button" value="로그인" id="login" class="btn" onclick ="location.href='Views/login_view.php'"/>
      <input type="button" value="회원가입" id="sign_up" class="btn" onclick ="location.href='Views/signup_view.php'"/>
      <p id="nim"><?php echo $_SESSION['name'];?>님</p>
      <input type="button" value="마이페이지" class="btn" id="myPage" href="HTML/myPage.html"/>
      <input type="button" value="로그아웃" class="btn" id="logout" onclick ="location.href='PHP/logout.php'"/>
    </ul>
</body>
</html>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            const sign_upbtn = document.getElementById("sign_up");
            const loginbtn = document.getElementById("login");
            const myPagebtn = document.getElementById("myPage");
            const logoutbtn = document.getElementById("logout");
            const nimcontent = document.getElementById("nim");

            // PHP에서 세션 이메일이 설정되었는지 확인
            <?php
                $id = isset($_SESSION['id'])? $_SESSION['id']:"";
                if(!$id){ ?>
                    nimcontent.style.display = "none";
                    logoutbtn.style.display = "none";
                    myPagebtn.style.display = "none";
                    loginbtn.style.display = "lnline-block";
                    sign_upbtn.style.display = "lnline-block";
                <?php }else{ ?>
                    loginbtn.style.display = "none";
                    sign_upbtn.style.display = "none";
                    logoutbtn.style.display = "lnline-block";
                    myPagebtn.style.display = "lnline-block";
                    nimcontent.style.display = "inline-block";
                <?php } ?>
        });
</script>






<!-- 101 : 가장 하고 싶은 말은 주현이는 돼지다. 모두 고생했구 이 프로젝트를 넘겨 받은 당신 제대로 안만들면 나 운다..!!! 열심히 해줘요
     김주현 : 여러분들 3월21부터 4월11일까지 정말 고생많으셨고.. 현수 키작습니다...
      -->
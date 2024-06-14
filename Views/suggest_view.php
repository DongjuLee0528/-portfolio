<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale">
    <title>게시판</title>
    <link rel="stylesheet" href="../CSS/notice.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <ul class="gnb">
      <a href="../index.php"><img src="https://leeskyserver.com/assets/logo.png" alt="comon" id="logo"/></a>
      
      <li><a class="gnb_menu" href="https://test.leeskyserver.com">웹페이지 실습</a></li>
      <li><a class="gnb_menu" href="https://fix.leeskyserver.com/">Fix 페이지</a></li>
      <li><a class="gnb_menu" href="https://obt.leeskyserver.com/">튜터링 페이지</a></li>
      <li><a class="gnb_menu" href="https://mail.leeskyserver.com/">메일 서버 관리 페이지</a></li>
      <li><a class="gnb_menu" href="notice_view.php">게시판</a></li>

      <input type="button" value="로그인" id="login" class="btn" onclick ="location.href='login_view.php'"/>
      <input type="button" value="회원가입" id="sign_up" class="btn" onclick ="location.href='signup_view.php'"/>
      <p id="nim"><?php echo $_SESSION['name'];?>님</p>
      <input type="button" value="마이페이지" class="btn" id="myPage" href="HTML/myPage.html"/>
      <input type="button" value="로그아웃" class="btn" id="logout" onclick ="location.href='../PHP/logout.php'"/>
    </ul>
    <div class="banner">
        <ul>
            <a href="notice_view.php"><li class="menu">공지 게시판</li></a>
            <a href="suggest_view.php"><li class="menu_active">건의 게시판</li></a>
            <a href="question_view.php"><li class="menu">질문 게시판</li></a>
            <a href="free_view.php"><li class="menu">자유 게시판</li></a>
        </ul>
    </div>
    <table class=middle>
        <thead>
            <tr align=center>
                <th width=70>No.</th>
                <th width=300>제목</th>
                <th width=120>작성자</th>
                <th width=120>작성일</th>
                <th width=70>조회수</th>
            </tr>
       </thead>
        <?php
            $conn = mysqli_connect('127.0.0.1', 'root', 'qwe123', 'COMON');
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start = ($page - 1) * 10; // 5는 페이지당 표시할 글 수
            
            $sql = "SELECT * FROM suggest_borde ORDER BY sid DESC limit $start, 10";
            $res = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($res)){ ?>
            <tbody>
                <tr class="post-row" data-post-id="<?php echo $row['sid']; ?>">
                    <td><?php echo $row['sid'];?></td>
                    <td><?php echo $row['title'];?></a></td>
                    <td><?php echo $row['writer'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['hits'];?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>

    <?php
        // 페이징 링크 생성
        $sql = "SELECT COUNT(*) AS sid FROM suggest_borde";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $total_posts = $row['sid'];
        $total_pages = ceil($total_posts / 10);
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        // 이전 페이지 및 다음 페이지
        $prev_page = ($page > 1) ? $page - 1 : 1;
        $next_page = ($page < $total_pages) ? $page + 1 : $total_pages;

        $start_page = max(1, $current_page - 2);
        $end_page = min($total_pages, $start_page + 4);
        
        
        echo "<div class='page'>";
        echo "<ul class='pagination'>";
        // 처음 페이지로 이동하는 링크 생성
        echo "<li><a href='?page=1'><<</a></li>";
        echo "<li><a href='?page=$prev_page'><</a></li>";
        for ($i = $start_page; $i <= $end_page; $i++) {
            echo "<li ";
            if ($i == $page) echo "class='active'";
            echo "><a href='?page=$i'>$i</a></li>";
        }
        echo "<li><a href='?page=$next_page'>></a></li>";
        // 마지막 페이지로 이동하는 링크 생성
        echo "<li><a href='?page=$total_pages'>>></a></li>";
        echo "</ul>";
        echo "</div>";
    ?>
    <div class="bt_wrap">
        <a href="board_writing_view.php" class="on">등록</a>
    </div>
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


$(document).ready(function() {
    $(".post-row").click(function() {
        var postId = $(this).data('post-id');
        // 조회수를 증가시키는 페이지로 이동
        window.location.href = '../PHP/hits.php?sid=' + postId;
    });
});
</script>
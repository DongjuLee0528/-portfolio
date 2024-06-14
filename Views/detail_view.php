<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel="stylesheet" href="../CSS/detail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-ZLdSZAPqLYZq6qDlYRtovXwDbjh5aQt4CaYor0x4Q17Fe0JB7h+qn/lW+XU+FZAD" crossorigin="anonymous">
</head>
<body>
    <ul class="gnb">
        <a href="../index.php"><img src="https://leeskyserver.com/assets/logo.png" alt="comon" id="logo"/></a>
        
        <li><a class="gnb_menu" href="https://test.leeskyserver.com">웹페이지 실습</a></li>
        <li><a class="gnb_menu" href="https://fix.leeskyserver.com/">Fix 페이지</a></li>
        <li><a class="gnb_menu" href="https://obt.leeskyserver.com/">튜터링 페이지</a></li>
        <li><a class="gnb_menu" href="https://mail.leeskyserver.com/">메일 서버 관리 페이지</a></li>
        <li><a class="gnb_menu" href="notice_view.php">게시판</a></li>
    </ul>

    <?php
        $conn = mysqli_connect('127.0.0.1', 'root', 'qwe123', 'COMON');
        
        if(isset($_GET['nid'])) {
            $board_id = $_GET['nid'];
            $sql = "SELECT * FROM nootice_borde WHERE nid='$board_id'";
            $board_title = "공지사항";
        } elseif(isset($_GET['sid'])) {
            $board_id = $_GET['sid'];
            $sql = "SELECT * FROM suggest_borde WHERE sid='$board_id'";
            $board_title = "건의게시판";
        }elseif(isset($_GET['qid'])) {
            $board_id = $_GET['qid'];
            $sql = "SELECT * FROM question_borde WHERE qid='$board_id'";
            $board_title = "질문게시판";
        }elseif(isset($_GET['fid'])) {
            $board_id = $_GET['fid'];
            $sql = "SELECT * FROM free_borde WHERE fid='$board_id'";
            $board_title = "자유게시판";
        }

        $res = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($res)
    ?>

    <h1 class="board_type"><?php echo $board_title?></h1>

    <div class="top_line"></div>

    <div class="title"><?php echo $row['title'];?></div>

    <div class="middle">
        <div class="writer"><?php echo $row['writer'];?></div>
        <div class="date"><?php echo $row['date'];?></div>
        <div class="count">조회수 <?php echo $row['hits'];?></div>
    </button>
    </div>
    <div class="content_wrap">
        <p><?php echo $row['writing'];?></p>
    </div>
    <div class="bt_wrap">
        <a href="notice_view.php" class="list_btn">목록</a>
    </div>
    </div>
    <div>
        <ul class="comment">
            <li class="comment-form">
                <form id="commentFrm">
                    <span class="ps_box">
                        <input type="text" placeholder="댓글 내용을 입력해주세요." class="int" name="content" />
                    </span>
                    <input type="submit" class="btn" value="등록" />
                </form>
            </li>
        </ul>
    </div>
</body>
</html>
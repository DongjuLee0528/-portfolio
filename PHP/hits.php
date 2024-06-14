<?php

// 데이터베이스 연결
$conn = mysqli_connect('127.0.0.1', 'root', 'qwe123', 'COMON');

// 클라이언트에서 전달된 게시물의 nid 값 확인
if(isset($_GET['nid'])) {
    $nid = mysqli_real_escape_string($conn, $_GET['nid']);

    // 조회수 증가 쿼리 실행
    $sql = "UPDATE nootice_borde SET hits = hits + 1 WHERE nid = $nid";


} elseif(isset($_GET['sid'])) {
    // 'sid' 값을 안전하게 처리
    $sid = mysqli_real_escape_string($conn, $_GET['sid']);

    $sql = "UPDATE suggest_borde SET hits = hits + 1 WHERE sid = $sid";

    header("Location: ../Views/detail_view.php?sid=$sid");
    exit();

} elseif(isset($_GET['qid'])) {
    // 'qid' 값을 안전하게 처리
    $qid = mysqli_real_escape_string($conn, $_GET['qid']);

    // qid 값에 따라 다른 동작 수행
    $sql = "UPDATE question_borde SET hits = hits + 1 WHERE qid = $qid";

    header("Location: ../Views/detail_view.php?qid=$qid");
    exit();

} elseif(isset($_GET['fid'])) {
    // 'fid' 값을 안전하게 처리
    $fid = mysqli_real_escape_string($conn, $_GET['fid']);

    // fid 값에 따라 다른 동작 수행
    $sql = "UPDATE free_borde SET hits = hits + 1 WHERE fid = $fid";

    header("Location: ../Views/detail_view.php?fid=$fid");
    exit();

} else {
    echo "요청된 값이 올바르지 않습니다.";
    exit(); // 또는 다른 처리 방법 선택
}

// SQL 쿼리 실행
if(mysqli_query($conn, $sql)) {
    if(isset($_GET['nid'])) {
        header("Location: ../Views/detail_view.php?nid=$nid");
        exit();
    }
} else {
    echo "오류 발생: " . mysqli_error($conn);
}
?>
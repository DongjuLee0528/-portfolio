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

if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $newnb_file = $_FILES["file"]["name"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newnb_title = $_POST["title"];
    $newnb_date = date("Y-m-d h:i:m");
    $newnb_writer = $_SESSION["id"];
    $newnb_writing = $_POST["contents"];
    $newselect_board = $_POST["select_board"];

    $newnb_file = NULL; // 파일을 업로드하지 않았을 경우에 대비하여 초기화
    switch ($newselect_board) {
        case "nootice_borde" :
            $table_name = "nootice_borde";
            break;
        case "suggest_borde" :
            $table_name = "suggest_borde";
            break;
        case "question_borde" :
            $table_name = "question_borde";
            break;
        case "free_borde" :
            $table_name = "free_borde";
            break;
    }

    $sql = "INSERT INTO $table_name (writer, title, date, writing, hits, file) 
            VALUES ('$newnb_writer', '$newnb_title', '$newnb_date', '$newnb_writing', 0, '$newnb_file')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('새로운 게시글이 성공적으로 등록되었습니다!');
              location.href='../Views/notice_view.php'; </script>";
    } else {
        echo "<script>alert('안됐지롱');</script>";
    }
}
if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "") {
    $file = $_FILES['upfile'];
    $upload_directory = 'data/';
    $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx";
    $allowed_extensions = explode(',', $ext_str);
    
    $max_file_size = 5242880;
    $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
    
    // 확장자 체크
    if(!in_array($ext, $allowed_extensions)) {
        echo "업로드할 수 없는 확장자 입니다.";
    }
    
    // 파일 크기 체크
    if($file['size'] >= $max_file_size) {
        echo "5MB 까지만 업로드 가능합니다.";
    }
    
    $path = md5(microtime()) . '.' . $ext;
    if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
        $query = "INSERT INTO upload_file (file_id, name_orig, name_save, reg_time) VALUES(?,?,?,now())";
        $file_id = md5(uniqid(rand(), true));
        $name_orig = $file['name'];
        $name_save = $path;
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $file_id, $name_orig, $name_save);
        $stmt->execute();
        
        $stmt->close();
        
        echo "<h3>파일 업로드 성공</h3>";
        echo '<a href="file_list.php">업로드 파일 목록</a>';
    } 
    else {
        echo "<h3>파일이 업로드 되지 않았습니다.</h3>";
        echo '<a href="javascript:history.go(-1);">이전 페이지</a>';
    }
    
    mysqli_close($db_conn);
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CoMon 서버 - 게시판 작성하기 페이지</title>
  <link rel="stylesheet" href="../CSS/board_writing.css">
</head>
<body>
  <div class="head">게시글 작성하기</div>
  <form action="../PHP/board_writing.php" method="post">
    <select name="select_board">
      <option hidden>게시판 선택</option>
      <option value="nootice_borde">공지 게시판</option>
      <option value="suggest_borde">건의 게시판</option>
      <option value="question_borde">질문 게시판</option>
      <option value="free_borde">자유 게시판</option>
    </select>
    <label for="title" class="title">제목</label>
    <input type="text" name="title" class="titleBox">
    <label for="contents" class="contents">내용</label>
    <textarea name="contents" placeholder="내용을 입력하세요"></textarea>
    <div class="filebox">
      <input class="upload-name" value="파일 선택하세요">
      <label for="file">파일찾기</label> 
      <input type="file" id="file" name="file">
    </div>
    <button type="submit" class="button button--ujarak button--border-thin button--text-thick submit">등록</button>
    <button type="button" class="button button--ujarak button--border-thin button--text-thick backP" 
    onclick="location.href='notice_view.php'">취소</button>
  </form>
</body>
</html>

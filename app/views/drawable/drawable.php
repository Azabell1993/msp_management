<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title class="page-title">클라우드 아키텍처 그림판</title>
    <link rel="stylesheet" href="./css/mspManagement.css">
    <link rel="stylesheet" href="./css/canvas.css"> 
</head>
<body>
    <?php include './mysql/mysql_sessions.php'; ?>
   
    <h1>클라우드 아키텍처 그림판</h1>

    <div class="toolbar">
        <button id="eraserBtn">지우개</button>
        <button id="penSize">사이즈 조절</button>
        <button id="eraserSize">지우개 사이즈 조절</button>
        <button id="drawRectBtn">네모 상자 그리기</button>
        <button id="uploadImageBtn">이미지 업로드</button>
        <button id="clearCanvasBtn">캔버스 초기화</button>
        <label>컬러 선택</label>
        <input type="color" id="colorPicker">
    </div>
    <canvas id="canvas" width="1000" height="600"></canvas>
    <input type="file" id="imageInput" class="hidden"/>
    <div class="toolbar">
        <button id="saveBtn" class="btn btn-gray">Save</button>
    </div>

    <?php include './modals/drawable/canvas.php'; ?>
</div>
</body>
</html>
<script src="./js/drawable/canvas.js"></script>
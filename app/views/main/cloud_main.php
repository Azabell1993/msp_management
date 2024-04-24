<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRJOECT MSP</title>
    <link rel="stylesheet" href="./css/dashboard.css"> <!-- 메인 페이지 스타일시트 -->
</head>
<body>
    <div class="container">
        <img src="./image/sample_logo.png" alt="MTData Logo" class="logo">
        <hr><br>
        <h2>안녕하세요, 관리자 <?php echo htmlspecialchars($user_id); ?>님</h2>
        <a href="<?php echo $baseURL; ?>/cloud" class="btn btn-gray">로그아웃</a>
        <hr><br>
        <div class="image-slider-wrapper">
            <p style="height:500px;" class="menu-item" style="display: none;">
            <div class="image-slider">
                <div class="menu-item">
                    <!-- 이미지 별 원하는 페이지로 이동 -->
                    <a href="<?php echo $baseURL; ?>/msp_management" class="menu-slide">
                        <img src="./image/SaaS.jpeg" alt="slide_menu1"> MSP 운영관리
                    </a>
                </div>
                <div class="menu-item">
                    <a href="<?php echo $baseURL; ?>/cloud_drawable" class="menu-slide">
                        <img src="./image/sample1.png" alt="slide_menu2"> CLOUD 아키텍처 그림판
                    </a>
                </div>
                <div class="menu-item">
                    <a href="<?php echo $baseURL; ?>/cloud_scrum" class="menu-slide">
                        <img src="./image/sample2.png" alt="slide_menu3"> 스크럼
                    </a>
                </div>
                <div class="menu-item">
                    <a href="<?php echo $baseURL; ?>/" class="menu-slide">
                        <img src="./image/sample1.png" alt="slide_menu4"> 메뉴3
                    </a>
                </div>
                <div class="menu-item">
                    <a href="<?php echo $baseURL; ?>/" class="menu-slide">
                        <img src="./image/sample2.png" alt="slide_menu5"> 메뉴4
                    </a>
                </div>
            </div>
            <button class="slide-btn prev">＜</button>
            <button class="slide-btn next">＞</button>
        </div>
    </div>

</body>
</html>
<script src="./js/slides.js"></script>
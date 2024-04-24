<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title class="page-title">MSP 운영 관리</title>
    <link rel="stylesheet" href="./css/mspManagement.css">
    <link rel="stylesheet" href="./css/loginSeccsions.css">
    <link rel="stylesheet" href="./css/modals.css">
</head>
<body>
    <!-- 모달 불러오기 -->
    <?php include './modals/modals.php'; ?>
    <?php include './modals/customAlert.php'; ?>
    <?php include './mysql/mysql_sessions.php'; ?>
    <!-- 조회 영역 -->
    <!-- include space -->
    <?php include 'header_login.php'; ?>
    <?php include 'Infra_button.php'; ?>
    <?php include 'table_search.php'; ?>
    <?php include 'table_body.php'; ?>
</body>
</html>
<script src="./js/mobile.js"></script>
<script src="./js/modals.js"></script>
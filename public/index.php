<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 동적으로 기본 URL을 조정
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
define('BASE_URL', $protocol . "://" . $_SERVER['HTTP_HOST']); // BASE_URL

// 요청 URI를 정리하고 마지막 슬래시가 있으면 제거합니다.
$request = rtrim($_SERVER['REQUEST_URI'], '/'); // 뒤쪽 슬래시 제거
$request = ltrim($request, '/'); // 앞쪽 슬래시 제거하여 일관성 유지

switch ($request) {
    case 'cloud': // 'cloud' 또는 'cloud/' 경로에 대한 요청 처리
        require __DIR__ . '/../app/controllers/Login/LoginController.php'; // LoginController 로드
        $controller = new LoginController();
        $controller->index(); // 로그인 페이지를 처리합니다.
        break;
    case 'cloud_main': // 'cloud_main' 경로에 대한 요청 처리
        require __DIR__ . '/../app/controllers/CloudMain/CloudMainController.php'; // CloudMainController 로드
        $controller = new CloudMainController();
        $controller->index(); // 대시보드 페이지를 처리합니다.
        break;
    case 'logout': // 'logout' 경로에 대한 요청 처리
        // 로그아웃 요청을 처리하는 PHP 코드
        session_start(); // 세션 시작
        session_unset(); // 모든 세션 변수 제거
        session_destroy(); // 세션 파괴
        header("Location: /cloud"); // 로그인 페이지로 리다이렉션
        exit();
    case 'msp_management':
        require __DIR__ . '/../app/controllers/MspManagement/MspManagementController.php'; // MspManagementController 로드
        $controller = new MspManagementController();
        $controller->index(); // MSP 운영 관리 페이지를 처리합니다.
        break;
    case 'cloud_drawable':
        require __DIR__ . '/../app/controllers/CloudDrwable/CloudDrawableController.php'; // CloudDrawableController 로드
        $controller = new CloudDrawableController();
        $controller->index(); // 클라우드 아키텍처 그림판 페이지를 처리합니다.
        break;
    case 'cloud_scrum':
        require __DIR__ . '/../app/controllers/CloudScrum/CloudScrumController.php'; // CloudScrumController 로드
        $controller = new CloudScrumController();
        $controller->index(); // 클라우드 팀 스크럼
        break;
    case 'socket':
        require __DIR__ . '/../app/controllers/Socket/SocketController.php'; // SocketController 로드
        $controller = new SocketController();
        $controller->index(); // 소켓 통신
        break;
    default: // 정의되지 않은 경로에 대한 요청 처리
        header("HTTP/1.0 404 Not Found"); // 404 Not Found 응답 보내기
        // 404 페이지 처리
        break;
}

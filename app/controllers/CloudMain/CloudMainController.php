<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class CloudMainController { // CloudMainController 클래스를 정의합니다.
    public function index() { // index 메소드를 정의합니다.
        // 사용자가 로그인하지 않은 경우 로그인 페이지로 리디렉션합니다.
        if (!isset($_SESSION['user_id'])) {
            session_unset(); // 모든 세션 변수를 제거합니다.
            session_destroy(); // 세션을 파괴합니다.
            header("Location:" . BASE_URL . "/cloud"); // 사용자를 로그인 페이지로 리디렉션합니다.
            exit(); // 스크립트 실행을 종료합니다.
        }

        // 사용자가 로그인한 상태인지 확인 후 로그인 시간을 체크합니다.
        if (isset($_SESSION['login_time'])) {
            $currentTime = time(); // 현재 시간을 가져옵니다.
            $loginTime = $_SESSION['login_time']; // 로그인 시간을 세션에서 가져옵니다.
            $elapsedTime = ($currentTime - $loginTime) / 60; // 현재 시간과 로그인 시간의 차이를 분 단위로 계산합니다.

            // 로그인 후 경과 시간이 1분을 초과한 경우 세션을 종료하고 로그아웃 처리합니다.
            if ($elapsedTime > 1) {
                session_unset(); // 세션 변수를 해제합니다.
                session_destroy(); // 세션을 파괴합니다.
                header("Location: " . BASE_URL . "/cloud"); // 로그아웃 후 로그인 페이지로 리디렉션합니다.
                exit(); // 스크립트 실행을 종료합니다.
            }
        }

        // 세션 만료 시 JSON 응답을 반환합니다.
        if (isset($_GET['sessionExpired']) && $_GET['sessionExpired'] == 1) {
            header('Content-Type: application/json'); // 응답 헤더에 Content-Type을 application/json으로 설정합니다.
            echo json_encode(['loggedIn' => isset($_SESSION['user_id'])]); // 로그인 상태를 JSON 형식으로 응답합니다.
            exit(); // 스크립트 실행을 종료합니다.
        }

        $user_id = $_SESSION['user_id']; // 세션에서 user_id를 가져와 변수에 할당합니다.

        // 로그인 후 보여지는 화면 전환
        require_once '../app/views/main/cloud_main.php';
    }
}

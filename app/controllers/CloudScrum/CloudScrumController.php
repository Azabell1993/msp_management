<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class CloudScrumController {

    /*
    --- BASE_URL이 전역 변수가 아닐 때의 사용 방법 ---
    *********************************************************
    protected $baseURL;

    public function __construct($baseURL) { // 생성자 추가
        $this->baseURL = $baseURL;
    }
    *********************************************************
    */

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            session_unset();
            session_destroy();

            // 만약 protected로 $baseURL을 사용할 것이라면 아래의 로직을 사용한다.
            // header("Location: " . $this->baseURL . "/cloud");

            header("Location: " . BASE_URL . "/cloud");
            exit();
        }

        $user_id = $_SESSION['user_id'];

        // 채팅 뷰 파일을 포함합니다.
        require_once '../app/views/cloudScrum/cloudScrum.php';
    }
}

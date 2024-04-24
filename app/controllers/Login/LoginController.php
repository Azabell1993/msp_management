<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class LoginController { // LoginController 클래스 정의
    public function index() { // index 메서드 정의
        $loginError = false; // 로그인 에러 플래그 초기화

        if (isset($_GET['logout'])) { // 로그아웃 요청이 있는 경우
            session_unset(); // 모든 세션 변수 제거
            session_destroy(); // 세션 파괴
            header("Location: " . BASE_URL . "/cloud"); // 로그아웃 후 리디렉션
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") { // 폼이 제출되었는지 확인
            $username = $_POST['username']; // 사용자 이름 받아오기
            $safe_username = escapeshellarg($username); // 쉘 명령어 주입 방지를 위해 사용자 이름 이스케이프 처리
            $hashedPassword = $_POST['hashedPassword']; // 해시된 비밀번호 받아오기

            chdir('/var/www/msp_html/app/loginParserC'); // 로그인 검증 스크립트가 있는 디렉토리로 이동
            $command = "./loginSecurityLib {$safe_username} {$hashedPassword} 2>&1"; // 로그인 검증 명령어 구성 (C언어 실행 파일)
            exec($command, $output, $return_var); // 명령어 실행

            $loginSuccess = false; // 로그인 성공 플래그 초기화

            // 로그인 성공 여부 체크
            foreach ($output as $line) { // 명령어 실행 결과를 순회
                if (strpos($line, "Login Successful!!!") !== false) { // 로그인 성공 메시지가 있는 경우
                    $loginSuccess = true; // 성공 플래그 설정
                    break;
                } else if(strpos($line, "Login Failed!!") !== false ) { // 로그인 실패 메시지가 있는 경우
                    $loginError = true; // 에러 플래그 설정
                    break;
                }
            }

            if ($loginSuccess) { // 로그인 성공한 경우
                $_SESSION['user_id'] = $username; // 세션에 사용    자 ID 저장
                $_SESSION['login_time'] = time(); // 세션에 로그인 시간 저장
                header("Location: " . BASE_URL . "/cloud_main"); // 대시보드 페이지로 리디렉션
                exit();
            } else if($loginError) { // 로그인 에러가 발생한 경우
                $_SESSION['login_error'] = true; // 세션에 로그인 에러 상태 저장
                header("Location: " . BASE_URL . "/cloud"); // 로그인 페이지로 리디렉션
                exit();
            }
        }

        require_once '../app/views/login.php'; // 로그인 뷰 파일 포함
    }
}

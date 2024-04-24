
<!DOCTYPE html>
<html>
<head>
    <title>PRJOECT MSP</title> <!-- 문서의 제목을 설정합니다. -->
    <link rel="stylesheet" href="./css/login.css"> <!-- 로그인 페이지의 스타일시트를 링크합니다. -->
</head>
<body>
<div class="login-container">
    <img src="./image/sample_logo.png" alt="MTData Logo" class="logo"> <!-- 로고 이미지를 표시합니다. -->
    <p>CLOUD MANAGEMENT</p>
    <?php if (isset($_SESSION['user_id'])): ?> <!-- 사용자가 이미 로그인한 상태인지 확인합니다. -->
        <div class="already-logged-in">
            <form action="/logout" method="post"> <!-- 로그아웃 처리를 위한 폼입니다. -->
                <?php
                    session_unset(); // 모든 세션 변수 제거
                    session_destroy(); // 세션 파괴
                    header("Location: " . BASE_URL . "/cloud"); // 로그아웃 후 리디렉션
                ?>
                You are already logged in as <?= htmlspecialchars($_SESSION['user_id']); ?>.
                <input type="submit" value="Logout" class="logout-button"> <!-- 로그아웃 버튼입니다. -->
            </form>
        </div>
    <?php else: ?>
        <form method="post" id="loginForm">
            <input type="text" name="username" placeholder="user ID"><br> <!-- 사용자 이름 입력 필드입니다. -->
            <input type="password" id="password" placeholder="user PW"><br> <!-- 비밀번호 입력 필드입니다. -->
        <input type="hidden" name="hashedPassword" id="hashedPassword"> <!-- 해시된 비밀번호를 저장할 숨겨진 필드입니다. -->
        <input type="submit" value="Login"> <!-- 로그인 버튼입니다. -->
        <?php if (isset($_SESSION['login_error'])): ?> <!-- 로그인 에러가 있는 경우 에러 메시지를 표시합니다. -->
            <div id="loginError" style="color: red; margin-top: 10px;">Login Failed!</div>
            <div>올바른 아이디 혹은 패스워드를 입력해주세요.</div>
            <?php unset($_SESSION['login_error']); // 로그인 에러 메시지 표시 후 세션에서 에러 변수를 제거합니다. ?>
            <?php endif; ?>
        </form>
        <p class="small-text">※ C++ 코리아 전용 페이지 입니다.</p>
    </div>
    <?php endif; ?>
</div>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script> <!-- CryptoJS 라이브러리를 포함합니다. --></body>
<script src="./js/hashfunction/hashPassword.js"></script>
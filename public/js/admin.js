// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ admin 계정 세션 처리 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
class SessionManager {
    
    // PHP에서 세션 로그인 시간을 가져오는 방법
    // const loginTime = <?php echo isset($_SESSION['login_time']) ? $_SESSION['login_time'] : "null"; ?>;

    constructor(loginTime) {
        this.loginTime = loginTime; // 로그인 시간 초기화
        this.updateCurrentTime();   // 현재 시간과 세션 시간 업데이트를 위한 메소드를 주기적으로 실행

        setInterval(() => this.updateCurrentTime(), 1000);  // 현재 시간
        setInterval(() => this.updateSessionTime(), 1000);  // 세션 시간
    }

    /**
     * 현재 시간을 업데이트하는 메소드
     */
    updateCurrentTime() {
        const now = new Date();
        const currentTime = now.toLocaleTimeString();
        document.getElementById('currentTime').textContent = currentTime;
    }

    /**
     * 세션 시간을 업데이트하는 메소드
     * 로그인 시간으로부터 경과한 시간을 계산하고, 자동 로그아웃까지 남은 시간을 'sessionTime' 요소에 표시
     * 남은 시간이 없을 경우, 로그아웃 페이지로 리다이렉트
     */
    updateSessionTime() {
        if (this.loginTime) {
            const currentTime = Math.floor(Date.now() / 1000);
            const elapsedTime = currentTime - this.loginTime; // 경과 시간을 계산
            const remainingTime = 3600 - elapsedTime; // 자동 로그아웃 전 남은 시간을 계산 (여기다가 시간 설정하기)
            if (remainingTime <= 0) {
                window.location.href = "/logout"; // 세션 시간이 만료되면 로그아웃 처리
            } else {
                document.getElementById('sessionTime').textContent = `경과 시간: ${elapsedTime}초. 자동 로그아웃까지 남은 시간: ${remainingTime}초.`;
            }
        }
    }
}

// SessionManager 클래스의 인스턴스를 생성
const sessionManager = new SessionManager(loginTime);

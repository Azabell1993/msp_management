// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ password hash 처리 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
class PasswordHasher {
    constructor() {
        this.bindEvents();
    }

    bindEvents() {
        document.getElementById('loginForm').addEventListener('submit', (e) => {
            e.preventDefault(); // 폼의 기본 제출 동작을 방지
            this.hashPassword();
        });
    }

    hashPassword() {
        var password = document.getElementById('password').value;
        var hashedPassword = CryptoJS.SHA256(password).toString();
        document.getElementById('hashedPassword').value = hashedPassword;
        document.getElementById('password').value = '';
        document.getElementById('loginForm').submit(); // 수정된 비밀번호로 폼 제출
    }
}

// 문서가 완전히 로드된 후 PasswordHasher 클래스의 인스턴스를 생성
document.addEventListener('DOMContentLoaded', () => {
    new PasswordHasher();
});
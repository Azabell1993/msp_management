// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ 모바일 모드 처리 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
// 사용법 : <p class="mobile-message" style="display: none;">모바일 모드에서는 조회할 수 없습니다.</p>
class WindowSizeChecker {
    constructor() {
        this.list = document.querySelector('.list');
        this.message = document.querySelector('.mobile-message');
        this.initEvents();
    }

    initEvents() {
        // 페이지 로딩과 창 크기 변경시 checkWindowSize 메소드를 호출
        document.addEventListener('DOMContentLoaded', () => this.checkWindowSize());
        window.addEventListener('resize', () => this.checkWindowSize());
    }

    checkWindowSize() {
        // 창 너비에 따라 .list와 .mobile-message 요소의 표시를 전환
        if (window.innerWidth <= 900) {
            this.list.style.display = 'none';
            this.message.style.display = 'block';
        } else {
            this.list.style.display = 'table';
            this.message.style.display = 'none';
        }
    }
}

// WindowSizeChecker 인스턴스를 생성하여 기능을 활성화
new WindowSizeChecker();
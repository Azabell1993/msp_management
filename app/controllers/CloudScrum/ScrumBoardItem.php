<?php
// 모델 예시: ScrumBoardItem.php
class ScrumBoardItem {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getItems() {
        // 데이터베이스에서 Scrum 아이템을 가져오는 로직
    }

    public function addItem($title, $description, $status) {
        // 데이터베이스에 아이템을 추가하는 로직
    }

    public function moveItem($itemId, $newStatus) {
        // 아이템의 상태를 변경하는 로직
    }

    public function deleteItem($itemId) {
        // 아이템을 삭제하는 로직
    }
}

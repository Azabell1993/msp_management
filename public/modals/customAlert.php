<!-- 공통 alert Custom -->
<!-- customAlert("message 기입"); -->
<div id="customAlertModal" class="custom-modal" style="display:none;">
  <div class="custom-modal-content">
    <span class="custom-close" onclick="closeCustomAlert()">&times;</span>
    <p>메시지가 여기에 표시됩니다.</p>
    <div class="custom-modal-footer">
      <button class="confirm btn btn-gray" style="color: white;">확 인</button>
      <button class="cancel btn btn-red" style="color: white;">닫 기</button>
    </div>
  </div>
</div>
<!-- 공통 모달 끝 -->

<script>
  // ////////////////////////////////////////////////////////////
  // //////////////////// 공통 Alert Custom /////////////////////
  function showCustomAlert() {
    document.getElementById('customAlertModal').style.display = 'block';
  }

  function closeCustomAlert() {
    document.getElementById('customAlertModal').style.display = 'none';
  }

  // Custom alert modal promise 생성
  function customAlert(message) {
    return new Promise((resolve) => {
      const modal = document.getElementById('customAlertModal');
      const confirmBtn = modal.querySelector('.confirm');   // 확인 버튼
      const cancelBtn = modal.querySelector('.cancel');     // 취소 버튼

      // 모달에 메시지 설정
      modal.querySelector('p').textContent = message;

      // 모달 표시
      modal.style.display = 'block';

      // 이벤트 리스너: 확인
      confirmBtn.onclick = () => {
        resolve(true);
        modal.style.display = 'none';
      };

      // 이벤트 리스너: 취소
      cancelBtn.onclick = () => {
        resolve(false);
        modal.style.display = 'none';
      };
    });
  }
  // ////////////////////////////////////////////////////////////
  // ////////////////////////////////////////////////////////////
</script>
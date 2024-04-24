<!-- 통합 모달 시작 -->
<div id="registrationModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="close_modal()">&times;</span>
    <div id="step1" class="step">
      <h2>CSP 등록</h2>
      <p class="small-text">※ 한 번 등록하면 수정이 불가능합니다. 신중하게 입력해주세요.</p>
      <div class="search-section">
        <input type="text" id="cspName" placeholder="CSP 사 이름">
        <button class="btn btn-gray" onclick="resetCSPName()">초기화</button>
      </div>
    </div>
    <div id="step2" class="step">
      <h1>CSP 상세 정보 등록
        <hr />
      </h1>
      <h2>CSP별 리전 등록</h2>
      <input type="text" id="azName" placeholder="AZ 명칭을 입력하세요">
      <button class="btn btn-add" onclick="addAZ()">+</button>
      <button class="btn btn-reset" onclick="resetAZList()">초기화</button>
      <div class="az-list" id="azList"></div>
      <h2>CSP별 HW 등록</h2>
      <input type="text" id="hwType" placeholder="HW 명칭을 입력하세요">
      <button class="btn btn-add" onclick="addHW()">+</button>
      <button class="btn btn-reset" onclick="resetHWList()">초기화</button>
      <div class="hw-list" id="hwList"></div>
    </div>
    <div class="modal-footer">
      <button id="previousStep" class="btn btn-gray" onclick="previousStep()">이전</button>
      <button id="nextStep" class="btn btn-darkgray" onclick="nextStep()">다음 / 저장</button>
    </div>
  </div>
</div>
<!-- 통합 모달 종료 -->

<!-- 최종 저장 -->
<div id="finalSubmissionModal" class="modal">
  <div class="modal-save-content"> <!-- list-scroll 클래스 제거 -->
    <span class="close" onclick="close_modal()">&times;</span>
    <h2>신규 CSP 등록 정보</h2>
    <div id="finalSubmissionModalContent">
      <!-- Dynamic content will be injected here. AZ 및 HW 목록은 여기에 생성 -->
      <!-- 예시: -->
      <!-- <p><strong>CSP 이름:</strong> Kakao Cloud</p> -->
      <!-- AZ 목록이 길어질 경우 자동으로 스크롤이 적용됨 -->
      <!-- <div class="list-scroll-item"> -->
      <!--   <p>AZ1</p> -->
      <!--   <p>AZ2</p> -->
      <!--   ... -->
      <!-- </div> -->
      <!-- HW 목록도 마찬가지로 길어질 경우 스크롤이 적용됨 -->
      <!-- <div class="list-scroll-item"> -->
      <!--   <p>HW1</p> -->
      <!--   <p>HW2</p> -->
      <!--   ... -->
      <!-- </div> -->
    </div>
    <div class="modal-footer">
      <button class="btn btn-red" onclick="close_modal()">좀 더 작성하기</button>
      <button class="btn btn-darkgray" onclick="passFinalSubmissionModal()">최종 등록하기</button>
    </div>
  </div>
</div>

<!-- 공통 모달 시작 -->
<div id="shareModal" class="custom-modal">
  <div class="custom-modal-content">
    <span class="custom-close" onclick="close_modal()">&times;</span>
    <h2 id="head_message"></h2>
    <p class="small-text" id="body_message">저장 로직을 구현하세요.</p>
    <div class="custom-modal-footer">
      <button class="btn btn-gray" onclick="close_modal()">닫기</button>
    </div>
  </div>
</div>
<!-- 공통 모달 끝 -->

<!-- CSP 정보 확인 모달 시작 -->
<div id="cspInfoModal" class="custom-modal" style="display:none;">
  <div class="custom-modal-content">
    <span class="close" onclick="close_modal()">&times;</span>
    <h2>CSP 정보</h2>
    <p>등록 되어 있는 CSP 리스트 업</p>
    <div class="custom-modal-footer">
      <button onclick="closeCspInfoModal()" class="btn btn-gray">닫기</button>
    </div>
  </div>
</div>

<div id="customInputModal" class="custom-modal" style="display:none;">
  <div class="custom-modal-content">
    <span class="close" onclick="close_modal()">&times;</span>
    <p>수정할 명칭을 입력해주세요:</p>
    <input type="text" class="custom-input" />
    <button class="confirm btn btn-gray">확인</button>
    <button class="cancel btn btn-red">취소</button>
  </div>
</div>
<!-- CSP 정보 확인 모달 끝 -->


<!-- 수정 및 삭제 확인 모달 시작 -->
<div id="confirmModal" class="custom-modal">
  <div class="custom-modal-content">
    <span class="custom-close" onclick="close_modal()">&times;</span>
    <h2>항목 수정/삭제</h2>
    <p class="small-text">이 항목을 수정하시겠습니까, 아니면 삭제하시겠습니까?</p>
    <div class="custom-modal-footer">
      <button class="btn btn-edit">수정</button>
      <button class="btn btn-delete">삭제</button>
    </div>
  </div>
</div>
<!-- 수정 및 삭제 확인 모달 끝 -->

<!-- Project 등록 Modal 시작 -->
<div id="projectModal" class="modal">

  <div class="project-modal__content">
    <div class="project-modal__header">
      <h2 class="project-modal__title">Project 등록</h2>
      <span class="project-modal__close-btn">&times;</span>
    </div>

  </div>
</div>
<!-- -Project Modal 종료 -->

<!-- VM 관리 등록 Modal 시작 -->
<div id="vmModal" class="modal">

  <div class="vm-modal__content">
    <div class="vm-modal__header">
      <h2 class="vm-modal__title">VM 관리 등록</h2>
      <span class="vm-modal__close-btn">&times;</span>
    </div>

  </div>
</div>
<!-- -VM 관리 등록 Modal 종료 -->
// 각 등록 버튼에 모달 열기 이벤트 리스너를 연결
document.getElementById("cspRegisterButton").addEventListener("click",      function() { toggleModal("cspModal", 'open'); });
document.getElementById("azRegisterButton").addEventListener("click",       function() { toggleModal("azModal", 'open'); });
document.getElementById("cspHwRegisterButton").addEventListener("click",    function() { toggleModal("hwModal", 'open'); });
document.getElementById("pjtRegisterButton").addEventListener("click",      function() { toggleModal("projectModal", 'open'); });
document.getElementById("vmRegisterButton").addEventListener("click",       function() { toggleModal("vmModal", 'open'); });

// DOM이 로드되면 모달 스텝 초기화 함수를 실행
document.addEventListener("DOMContentLoaded",                               function() { initModalSteps(); });

// 전역 변수 선언
let currentItem = null;                                 // 현재 선택된 항목
let currentStep = 1;                                    // 현재 단계
let cspName = document.getElementById("cspName").value; // CSP 이름
let isFinalSubProcsed = false;                 // 최종 제출 처리 여부
let azItemsList = [];                                   // AZ(Availability Zone) 항목들을 저장할 배열
let hwItemsList = [];                                   // HW(하드웨어) 항목들을 저장할 배열




// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ 공통 모달 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function passFinalSubmissionModal() {
    // 헤더와 바디 메시지 요소를 가져옵니다.
    var headerMessageElement = document.getElementById('head_message');
    var bodyMessageElement = document.getElementById('body_message');

    // 메시지 요소의 텍스트를 업데이트합니다.
    headerMessageElement.textContent = '기능 구현 필요';
    bodyMessageElement.textContent = '저장 로직 구현해야 함.';

    // 모달을 표시합니다.
    var confirmModal = document.getElementById('confirmModal');
    confirmModal.style.display = 'block';
}
// ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑



/**
 * 공통 customAlert 사용 예
 * Alert Custom (input 값이 있을 때)
 */
// CSP 이름 초기화 함수 
async function resetCSPName() {
    const cspResetResponse = await customAlert("CSP 이름을 초기화하시겠습니까?");
    if (cspResetResponse) {
        document.getElementById("cspName").value = "";
    }
}

/**
 * 공통 customAlert 사용 예
 * Alert Custom (input 값이 없을 때)
*/
function signUp() {
    customAlert("회원 가입 로직 필요");
}

// ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑    





// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ CSP 신규등록 모달 Alert 별도 Custom ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function passFinalSubmissionModal() {
    // 헤더와 바디 메시지 요소를 가져옵니다.
    var headerMessageElement = document.getElementById('head_message');
    var bodyMessageElement = document.getElementById('body_message');

    // 메시지 요소의 텍스트를 업데이트합니다.
    headerMessageElement.textContent = '기능 구현 필요';
    bodyMessageElement.textContent = '저장 로직 구현해야 함.';

    // 모달을 표시합니다.
    var shareModal = document.getElementById('shareModal');
    shareModal.style.display = 'block';
}

// 모달을 닫는 함수
function close_modal() {
    var shareModal = document.getElementById('shareModal');
    shareModal.style.display = 'none';
    document.getElementById("finalSubmissionModal").style.display = "none";
}

// 사용자 정의(커스텀) 모달을 여는 함수
function showConfirm(item) {
    currentItem = item; // 현재 선택한 항목을 저장
    document.getElementById("confirmModal").style.display = "block";
}

function closeConfirmModal() { // 사용자 정의 모달을 닫는 함수
    document.getElementById("confirmModal").style.display = "none";
}
// ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑



// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓  모달 Alert 별도 Custom ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function customInputAlert(message, defaultValue) {
    return new Promise((resolve) => {
        const modal = document.getElementById('customInputModal');
        const inputField = modal.querySelector('input'); // 입력 필드
        const confirmBtn = modal.querySelector('.confirm'); // 확인 버튼
        const cancelBtn = modal.querySelector('.cancel'); // 취소 버튼

        // 모달에 메시지 설정
        modal.querySelector('p').textContent = message;
        // 기본값 설정
        inputField.value = defaultValue || '';

        // 모달 표시
        modal.style.display = 'block';

        // 이벤트 리스너: 확인
        confirmBtn.onclick = () => {
            resolve(inputField.value.trim()); // 공백 제거한 값 반환
            modal.style.display = 'none';
        };

        // 이벤트 리스너: 취소
        cancelBtn.onclick = () => {
            resolve(null); // 취소 시 null 반환
            modal.style.display = 'none';
        };
    });
}

// 항목 수정 함수
async function modifyItem() {
    const newName = await customInputAlert("수정할 명칭 입력", currentItem.textContent);
    if (newName !== null) {
        currentItem.textContent = newName;
    }
    close();
}

// 모달 스텝 초기화 함수
function initModalSteps() {
    document.getElementById("registrationModalButton").addEventListener("click", openModal);
    updateStepDisplay();
    document.querySelectorAll(".close, .custom-close").forEach(btn => {
        if(btn.classList.contains('custom-close')) {
            btn.addEventListener("click", closeConfirmModal); // 수정 및 삭제 모달만 닫기
        } else {
            btn.addEventListener("click", closeModal); // 전체 모달 닫기
        }
    });
    document.getElementById("nextStep").addEventListener("click", nextStep);
    document.getElementById("previousStep").addEventListener("click", previousStep);

    // Confirm modal actions
    document.querySelector(".btn-edit").addEventListener("click", () => {
        modifyItem();
        closeConfirmModal(); // 수정 후 confirm 모달 닫기
    });
    document.querySelector(".btn-delete").addEventListener("click", () => {
        deleteItem();
        closeConfirmModal(); // 삭제 후 confirm 모달 닫기
    });

    // 단계별로 모달 내용을 업데이트
    document.querySelectorAll(".step").forEach(step => {
        step.style.display = "none";
    });
    document.getElementById("step" + currentStep).style.display = "block";

    // [다음 단계]/[신규 CSP 등록] 버튼 텍스트 업데이트
    const nextStepButton = document.getElementById("nextStep");
    if (currentStep === 1) {
        nextStepButton.innerText = "다음 단계";
        document.getElementById("previousStep").style.display = "none"; // 첫 번째 단계에서는 [이전] 버튼을 숨김
    } else {
        nextStepButton.innerText = "신규 CSP 등록";
        document.getElementById("previousStep").style.display = "block"; // 두 번째 단계에서는 [이전] 버튼을 보임
    }
}

// 모달 열기 함수
function openModal() {
    document.getElementById("registrationModal").style.display = "block";
    currentStep = 1;
    updateStepDisplay();
}

// 모달 닫기 함수
function closeModal() {
    document.getElementById("registrationModal").style.display = "none";
    currentStep = 1;
    updateStepDisplay();
}

// 확인 모달 닫기 함수
function closeConfirmModal() {
    document.getElementById("confirmModal").style.display = "none";
}

// 다음 단계로 이동하는 함수
function nextStep() {
    const cspName = document.getElementById("cspName").value;

    if(cspName === "") { // CSP 이름이 비어 있을 경우 체크
        customAlert("CSP 이름을 입력해주세요.");
        return; // 함수 실행 중단
    }

    if (currentStep === 1) {
        customAlert("CSP사 중간 저장 완료");
        currentStep++;
        updateStepDisplay();
    } else if (currentStep === 2 && !isFinalSubProcsed) {
        isFinalSubProcsed = true;

        const azItems = [...document.querySelectorAll("#azList .list-item")].map(item => item.textContent);
        const hwItems = [...document.querySelectorAll("#hwList .list-item")].map(item => item.textContent);
        
        showFinalSubAlert(cspName, azItems, hwItems);
        setTimeout(() => { isFinalSubProcsed = false; }, 500);
        
        closeModal();
    }

    updateStepDisplay();
}

// 최종 제출 확인을 위한 알림 함수
function showFinalSubAlert(cspName) {
    // 목록 문자열 생성 로직을 개별 <p> 태그 생성 로직으로 변경
    // if (azItemsList.length === 0) azListContent = "등록된 AZ 항목이 없습니다.";
    // if (hwItemsList.length === 0) hwListContent = "등록된 HW 항목이 없습니다.";

    if (azItemsList.length === 0 && hwItemsList.length === 0) {
        return; // 아무것도 표시하지 않고 함수 종료
    }

    let azListContent = `<div class="list-scroll">`;
    azItemsList.forEach(item => {
        azListContent += `<p>${item}</p>`;
    });
    azListContent += `</div>`;

    let hwListContent = `<div class="list-scroll">`;
    hwItemsList.forEach(item => {
        hwListContent += `<p>${item}</p>`;
    });
    hwListContent += `</div>`;

    const finalContent = `
      <p><strong>CSP 이름:</strong> ${cspName}</p>
      <p><strong>AZ 목록:</strong> ${azListContent}</p>
      <p><strong>HW 목록:</strong> ${hwListContent}</p>
    `;

    document.getElementById("finalSubmissionModalContent").innerHTML = finalContent;
    document.getElementById("finalSubmissionModal").style.display = "block";
}

// 이전 단계로 돌아가는 함수
function previousStep() {
    if (currentStep > 1) {
        currentStep--;
        updateStepDisplay();
    }
}

// 최종 저장 함수
function finalSave(cspName) {
    let finalContent = `<p><strong>CSP 이름:</strong> ${cspName}</p>`;

    // AZ 목록 생성
    if (azItemsList.length > 0) {
        finalContent += `<div class="list-scroll"><strong>AZ 목록:</strong>`;
        azItemsList.forEach(item => {
            finalContent += `<p>${item}</p>`;
        });
        finalContent += `</div>`;
    } else {
        finalContent += `<p><strong>AZ 목록:</strong> 등록된 AZ 항목이 없습니다.</p>`;
    }

    // HW 목록 생성
    if (hwItemsList.length > 0) {
        finalContent += `<div class="list-scroll"><strong>HW 목록:</strong>`;
        hwItemsList.forEach(item => {
            finalContent += `<p>${item}</p>`;
        });
        finalContent += `</div>`;
    } else {
        finalContent += `<p><strong>HW 목록:</strong> 등록된 HW 항목이 없습니다.</p>`;
    }

    document.getElementById("finalSubmissionModalContent").innerHTML = finalContent;

    // [신규 CSP등록] 버튼을 누를 때만 최종 저장 버튼을 표시
    if (currentStep === 2) {
        document.querySelector(".modal-footer").innerHTML = saveButton;
    }

    document.getElementById("finalSubmissionModal").style.display = "block";
}



// 수정 버튼 로직
function modify_block() { 
    var newItem = prompt("새 명칭을 입력해주세요", currentItem.textContent);
    if (newItem !== null && newItem !== "") {
        currentItem.textContent = newItem;
    }
    closeConfirmModal();
    exit();
}

// 현재 단계에 따라 모달 내용을 업데이트하는 함수
function updateStepDisplay() {
    const existingCspNameDisplay = document.querySelector("#step2 .csp-name-display");
    
    if (existingCspNameDisplay) existingCspNameDisplay.remove();

    document.querySelectorAll(".step").forEach(step => step.style.display = "none");
    document.getElementById("step" + currentStep).style.display = "block";

    const nextStepButton = document.getElementById("nextStep");
    const previousStepButton = document.getElementById("previousStep");
    if (currentStep === 1) {
        nextStepButton.innerText = "다음 단계";
        previousStepButton.style.display = "none";
    } else {
        nextStepButton.innerText = "신규 CSP 등록";
        previousStepButton.style.display = "block";

        // "CSP 상세 정보 등록" 제목 아래에 CSP 이름을 표시
        const detailHeader = document.getElementById("step2").querySelector("h1");
        const cspNameDisplay = document.createElement("p");
        cspNameDisplay.classList.add("csp-name-display");
        cspNameDisplay.innerHTML = `<strong>CSP 이름</strong><br><span class="csp-name-value">${document.getElementById("cspName").value}</span>`;

        // "CSP별 리전 등록" 제목 바로 위에 CSP 이름을 추가
        detailHeader.insertAdjacentElement("afterend", cspNameDisplay);
    }
}

// 목록 문자열 생성 로직을 개별 <p> 태그 생성 로직으로 변경
function showFinalSubAlert(cspName) {
    
    if (azItemsList.length === 0 && hwItemsList.length === 0) {
        return;
    }

    let azListContent = `<div class="list-scroll">`;
    azItemsList.forEach(item => {
        azListContent += `<p>${item}</p>`;
    });
    azListContent += `</div>`;

    let hwListContent = `<div class="list-scroll">`;
    hwItemsList.forEach(item => {
        hwListContent += `<p>${item}</p>`;
    });
    hwListContent += `</div>`;

    const finalContent = `
      <p><strong>CSP 이름 </strong><br/><br/><span class="csp-name-value"> ${cspName}</p></span>
      <p><strong>AZ 목록 </strong> ${azListContent}</p>
      <p><strong>HW 목록 </strong> ${hwListContent}</p>
    `;

    document.getElementById("finalSubmissionModalContent").innerHTML = finalContent;
    document.getElementById("finalSubmissionModal").style.display = "block";
}

function createListItem(listId, text) {
    var list = document.getElementById(listId);
    var entry = document.createElement("div");
    entry.classList.add("list-item");
    entry.textContent = text;
    entry.addEventListener("click", function() {
        showConfirmModal(this);
    });
    list.appendChild(entry);
}

function showConfirmModal(item) {``
    currentItem = item; // Set the current item
    document.getElementById("confirmModal").style.display = "block";
}

function deleteItem() {
    customAlert("삭제 완료");
    currentItem.remove();
    close();
}

function closeModal() {
    modal.style.display = "none";
}

// Table에서 CSP명 우측에 (!) 모양 클릭시 alert (임시)
function showPopup() { 
    showCspInfoModal();
}

// CSP 정보 모달을 열기
function showCspInfoModal() {
    document.getElementById('cspInfoModal').style.display = 'block';
}

// CSP 정보 모달을 닫기
function closeCspInfoModal() {
    document.getElementById('cspInfoModal').style.display = 'none';
}

function toggleModal(modalId, action) {
    var modal = document.getElementById(modalId);
    if (action === 'open') {
        modal.style.display = 'block';
    } else if (action === 'close') {
        modal.style.display = 'none';
    }
}

var closeButtons = document.querySelectorAll(".close, .custom-close, .project-modal__close-btn, .vm-modal__close-btn");
closeButtons.forEach(function(btn) {    // [X] 버튼 누르면 닫히게
    btn.addEventListener("click", function() {
        var modal = this.closest('.modal, .custom-modal');
        if (modal) {
            toggleModal(modal.id, 'close');
        }
    });
});

window.onclick = function(event) { // 모달 바깥쪽을 클릭하면 모달 닫기
    var modals = document.getElementsByClassName("modal");
    for (var i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
};

// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ Table 관리 버튼 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function toggleModal(modalId, action) {
    var modal = document.getElementById(modalId);
    if (action === 'open') {
        modal.style.display = 'block';
    } else if (action === 'close') {
        modal.style.display = 'none';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    // 테이블 헤더의 마지막 컬럼에 '관리'라는 텍스트를 넣는 코드
    var thead = document.querySelector("table.list thead tr");
    var headerCell = document.createElement("th");
    headerCell.textContent = "관리";
    thead.appendChild(headerCell);

    // 테이블의 모든 행을 가져와서 관리 버튼을 추가하는 코드
    var rows = document.querySelectorAll("table.list tbody tr");
    rows.forEach(function(row) {
        // 각 행에 대하여 새로운 셀을 생성하고 관리 버튼을 추가
        var cell = row.insertCell(-1); // -1은 행의 마지막에 셀을 추가한다는 의미
        var button = document.createElement("button");
        button.className = "btn btn-darkgray manage-button";
        button.textContent = "관리";
        // 관리 버튼에 모달을 토글하는 이벤트 리스너를 추가
        button.addEventListener("click", function() {
            toggleModal('vmModal', 'open');
        });
        cell.appendChild(button);
    });
});

// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ AZ 등록 구간 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function addAZ() {
    var azName = document.getElementById("azName").value;
    if (azName === "") {
        alert("AZ 명칭을 입력해주세요.");
        return;
    }
    var list = document.getElementById("azList");
    var entry = document.createElement("div");
    entry.classList.add("az-item");
    entry.textContent = azName;
    entry.onclick = function() {
        showConfirm(this, 'AZ');
    };
    list.appendChild(entry);
    document.getElementById("azName").value = ""; // 추가 후 입력란을 비운다.

    // AZ 목록 배열에 추가
    azItemsList.push(azName);
}

async function resetAZList() {
    const azResetResponse = await customAlert("AZ 리스트를 초기화하시겠습니까?");
    if (azResetResponse) {
        document.getElementById("azList").innerHTML = "";
        document.getElementById("azName").value = "";
    }
}


// ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓ HW 등록 구간 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
function addHW() {
    var hwType = document.getElementById("hwType").value;
    if (hwType === "") {
        alert("HW 명칭을 입력해주세요.");
        return;
    }
    var list = document.getElementById("hwList");
    var entry = document.createElement("div");
    entry.classList.add("hw-item");
    entry.textContent = hwType;
    entry.onclick = function() {
        showConfirm(this, 'HW');
    };
    list.appendChild(entry);
    document.getElementById("hwType").value = ""; // 추가 후 입력란을 비운다.

    // HW 목록 배열에 추가
    hwItemsList.push(hwType);
}

async function resetHWList() {
    const hwResetResponse = await customAlert("HW 리스트를 초기화하시겠습니까?");
    if (hwResetResponse) {
        document.getElementById("hwList").innerHTML = "";
        document.getElementById("hwType").value = "";
    }
}
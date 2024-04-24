let currentPostItId = null;
let currentSlideIndex = 0;
let isViewingAllTeams = true; // 전체 팀 보기 모드

const slides = document.getElementsByClassName('department');
const totalSlides = slides.length;

function slideBoard(direction) {
    if (isViewingAllTeams) {
        // 전체 팀 보기 모드가 아니라면 개별 팀으로 슬라이드
        isViewingAllTeams = false;
        showDepartment(currentSlideIndex);
        return;
    }

    const departments = document.querySelectorAll('.department');
    if (direction === 'next' && currentSlideIndex < departments.length - 1) {
        currentSlideIndex++;
    } else if (direction === 'prev' && currentSlideIndex > 0) {
        currentSlideIndex--;
    }
    showDepartment(currentSlideIndex);
}

function showDepartment(index) {
    const departments = document.querySelectorAll('.department');
    departments.forEach((dept, i) => {
        dept.style.display = i === index ? 'block' : 'none';
    });
}

function toggleViewAllTeams() {
    // 전체 팀 보기 상태로 설정합니다.
    isViewingAllTeams = true;
    // 모든 부서의 스타일을 'block'으로 설정하여 전체를 보여줍니다.
    const departments = document.querySelectorAll('.department');
    departments.forEach(dept => {
        dept.style.display = 'block';
    });
    // 현재 슬라이드 인덱스를 0으로 리셋합니다.
    currentSlideIndex = 0;
}

// 슬라이더 초기화
function initSlider() {
    for (let i = 0; i < totalSlides; i++) {
        slides[i].style.display = 'none';
    }
    slides[currentSlideIndex].style.display = 'block';
}

// Window Onload 이벤트에 슬라이더 초기화 추가
window.onload = function() {
    toggleViewAllTeams();
    initSlider();
};


// ///////////////////////////////////////////////////////////////////////////////////////////////////
document.getElementById('slider-toggle').addEventListener('change', function() {
    if(this.checked) {
        showBoard();
    } else {
        showTodo();
    }
});

function showTodo() {
    document.getElementById("todoSection").style.display = "block";
    document.getElementById("boardSection").style.display = "none";
    document.getElementById("slider-toggle").checked = false;
}

function showBoard() {
    document.getElementById("todoSection").style.display = "none";
    document.getElementById("boardSection").style.display = "block";
    document.getElementById("slider-toggle").checked = true;
}
// ///////////////////////////////////////////////////////////////////////////////////////////////////


function addTodoItem() {
    const newTodoItem = document.createElement("input");
    newTodoItem.setAttribute("type", "text");
    newTodoItem.classList.add("todoItem");
    newTodoItem.setAttribute("placeholder", "해야 할 일");
    document.getElementById("todoListContainer").appendChild(newTodoItem);
    updateDelButtonVisibility();
}

// 포스트잇이 추가되거나 이동될 때마다 이 함수를 호출하여 진행 상황을 업데이트
function updateProgress() {
    const completedZone = document.getElementById('dropZone1');     // '완료' 영역    'dropZone1'
    const inProgressZone = document.getElementById('dropZone2');    // '진행 중' 영역 'dropZone2'
    
    const total = completedZone.children.length + inProgressZone.children.length;   // 전체 포스트잇 수
    const completed = completedZone.children.length;                                // 완료된 포스트잇 수

    const percentage = total > 0 ? Math.round((completed / total) * 100) : 0;       // 완료 비율 계산

    // 진행 상황 바의 너비와 텍스트 업데이트
    const progressBar = document.getElementById('progressBar');
    progressBar.style.width = percentage + '%';
    progressBar.textContent = percentage + '%';
}

// 포스트잇 추가 함수
function createPostIt() {
    // 각 입력 필드에서 값 수집
    const department = document.getElementById('postItDepartment').value;
    const name = document.getElementById('postItName').value;
    const date = document.getElementById('postItDate').value;
    const project = document.getElementById('postItProject').value;
    const todos = document.querySelectorAll('.todoItem');
    
    // 입력 검증
    if (!department || !name || !date || !project || todos.length === 0) {
        customAlert('모든 필드를 채워주세요.');
        return;
    }
    
    // 새 포스트잇 요소 생성
    const newPostIt = document.createElement('div');
    newPostIt.className = 'post-it';
    newPostIt.id = 'postIt' + Date.now(); // 유니크한 ID 생성
    
    // 포스트잇 내용 구성
    let postItContent = `소속: ${department}\n이름: ${name}\n날짜: ${date}\n프로젝트: ${project}\n해야 할 일:\n`;
    todos.forEach((todo, index) => {
        postItContent += `${index + 1}. ${todo.value}\n`; // 각 할 일 항목 추가
    });
    
    // 포스트잇에 내용 설정
    newPostIt.innerText = postItContent;
    
    // 드래그 가능하게 설정
    makePostItDraggable(newPostIt);
    
    // 포스트잇 컨테이너에 추가
    document.getElementById('postItsContainer').appendChild(newPostIt);
    
    // 입력창 초기화
    document.getElementById('postItDepartment').value = '';
    document.getElementById('postItName').value = '';
    document.getElementById('postItDate').value = '';
    document.getElementById('postItProject').value = '';
    const todoContainer = document.getElementById('todoListContainer');
    while (todoContainer.firstChild) {
        todoContainer.removeChild(todoContainer.firstChild); // 모든 해야 할 일 입력 필드 제거
    }
    addTodoItem(); // 새로운 해야 할 일 입력 필드 추가
}

// 포스트잇 삭제 함수
async function deletePostIt(id) {
    const confirmation = await customAlert('이 포스트잇을 삭제하시겠습니까?');
    if (confirmation) {
        const postIt = document.getElementById(id);
        postIt.remove();
        localStorage.removeItem(id);
    }
    closeContextMenu(); // 컨텍스트 메뉴를 닫습니다.
}

function updateDelButtonVisibility() {
    const todoListContainer = document.getElementById("todoListContainer");
    const delButton = document.querySelector(".btn-minred"); // 가정: 삭제 버튼에 'btn-minred' 클래스가 있음
    if (todoListContainer.children.length > 1) {
        delButton.style.display = ""; // 두 개 이상일 때 보이게
    } else {
        delButton.style.display = "none"; // 하나만 있을 때 숨기기
    }
}
function delTodoItem() {
    const todoListContainer = document.getElementById("todoListContainer");
    if (todoListContainer.children.length > 1) { // 최소 하나의 입력 필드는 유지
        todoListContainer.removeChild(todoListContainer.lastChild);
    }
    updateDelButtonVisibility();
}


// 모달을 닫는 함수
function close_modal() {
    var shareModal = document.getElementById('editModal');
    shareModal.style.display = 'none';
    document.getElementById("editModal").style.display = "none";
}

// 포스트잇 수정 함수
function editPostIt(id) {
    currentPostItId = id;
    const postIt = document.getElementById(id).innerText;
    // 내용을 줄 단위로 분리
    const lines = postIt.split('\n');

    // 부서, 이름, 프로젝트 값을 설정하고 할 일 목록 컨테이너를 초기화
    document.getElementById('editDepartment').value = lines[0].substring(lines[0].indexOf(':') + 2);
    document.getElementById('editName').value = lines[1].substring(lines[1].indexOf(':') + 2);
    // 날짜를 파싱하고 설정
    const dateString = lines[2].substring(lines[2].indexOf(':') + 2);
    document.getElementById('editDate').value = parseDateString(dateString);
    document.getElementById('editProject').value = lines[3].substring(lines[3].indexOf(':') + 2);

    // 기존 '해야 할 일' 항목들을 지움
    const editTodoListContainer = document.getElementById('editTodoListContainer');
    editTodoListContainer.innerHTML = '';

    // 기존 '해야 할 일' 항목들을 수정 모달에 추가
    lines.slice(5).forEach((line) => {
        if (line.trim() !== '') {
            const taskText = line.trim().substring(line.indexOf('.') + 1).trim();
            const todoItem = document.createElement('input');
            todoItem.type = 'text';
            todoItem.classList.add('todoItem');
            todoItem.value = taskText;
            editTodoListContainer.appendChild(todoItem);
        }
    });

    // 수정 모달 표시
    openModal('editModal');
}

function parseDateString(dateString) {
    const parts = dateString.match(/(\d+)/g);
    if (parts.length >= 3) {
        // Assuming the format is Year, Month, Day
        const year = parts[0];
        const month = parts[1].padStart(2, '0');
        const day = parts[2].padStart(2, '0');
        return `${year}-${month}-${day}`;
    } else {
        return ''; // Return an empty string if the date format is unexpected
    }
}

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'block';
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none';
}

// Close 모달 버튼에 이벤트 리스너 추가
document.querySelectorAll('.close-button').forEach(button => {
    button.addEventListener('click', function() {
        this.parentElement.parentElement.style.display = 'none';
    });
});

function editAddTodoItem() {
    const editTodoListContainer = document.getElementById('editTodoListContainer');
    const newTodoItem = document.createElement("input");
    newTodoItem.setAttribute("type", "text");
    newTodoItem.classList.add("todoItem");
    newTodoItem.setAttribute("placeholder", "해야 할 일");
    editTodoListContainer.appendChild(newTodoItem);
    editUpdateDelButtonVisibility(); // 가시성 업데이트 호출
}

function editDelTodoItem() {
    const editTodoListContainer = document.getElementById('editTodoListContainer');
    if (editTodoListContainer.children.length > 1) { // 최소 하나의 입력 필드는 유지
        editTodoListContainer.removeChild(editTodoListContainer.lastChild);
    }
    editUpdateDelButtonVisibility(); // 가시성 업데이트 호출
}

function editUpdateDelButtonVisibility() {
    const editTodoListContainer = document.getElementById("editTodoListContainer");
    const delButton = document.querySelector("#editModal .btn-minred"); // 수정 모달 내의 삭제 버튼 선택
    if (editTodoListContainer.children.length > 1) {
        delButton.style.display = "block"; // 두 개 이상일 때 보이게
    } else {
        delButton.style.display = "none"; // 하나만 있을 때 숨기기
    }
}

document.getElementById('editSaveButton').addEventListener('click', function() {
    if (currentPostItId) {
        const department = document.getElementById('editDepartment').value;
        const name = document.getElementById('editName').value;
        const date = document.getElementById('editDate').value;
        const project = document.getElementById('editProject').value;
        const todos = document.querySelectorAll('#editTodoListContainer .todoItem');

        let postItContent = `소속: ${department}\n이름: ${name}\n날짜: ${date}\n프로젝트: ${project}\n해야 할 일:\n`;
        todos.forEach((todo, index) => {
            postItContent += `${index + 1}. ${todo.value}\n`; // 각 할 일 항목 추가
        });

        const postIt = document.getElementById(currentPostItId);
        postIt.innerText = postItContent;
        
        closeModal('editModal');
    }
});

// 웹 페이지 전체를 클릭했을 때 컨텍스트 메뉴를 닫습니다.
document.addEventListener('click', function(event) {
    // 컨텍스트 메뉴 자체를 클릭했는지 확인
    if (event.target.closest('.context-menu')) {
        return; // 컨텍스트 메뉴를 클릭한 경우 함수 종료
    }
    closeContextMenu();
});

// 컨텍스트 메뉴를 닫는 함수
function closeContextMenu() {
    const contextMenu = document.getElementById('contextMenu');
    contextMenu.style.display = 'none';
}

// 포스트잇 이벤트 리스너를 추가하는 함수
function makePostItDraggable(postItElement) {
    postItElement.draggable = true;
    postItElement.addEventListener('dragstart', function(event) {
        event.dataTransfer.setData('text/plain', event.target.id);
    });
    // 우클릭으로 컨텍스트 메뉴 열기 (기본 이벤트 방지)
    postItElement.addEventListener('contextmenu', function(event) {
        event.preventDefault();
        currentPostItId = postItElement.id; // 현재 포스트잇 ID 설정
        const contextMenu = document.getElementById('contextMenu');
        contextMenu.style.display = 'block';
        contextMenu.style.left = `${event.pageX}px`;
        contextMenu.style.top = `${event.pageY}px`;
    });
}

// 우클릭 시 컨텍스트 메뉴를 표시하는 이벤트 리스너
document.addEventListener('contextmenu', function(event) {
    event.preventDefault();
    closeContextMenu(); // 우선, 열려있는 메뉴를 닫습니다.
    
    // 포스트잇이 아닌 다른 영역을 우클릭했는지 확인
    const postItElement = event.target.closest('.post-it');
    if (!postItElement) {
        return; // 포스트잇이 아니면 함수 종료
    }

    // 컨텍스트 메뉴 설정
    currentPostItId = postItElement.id;
    const contextMenu = document.getElementById('contextMenu');
    contextMenu.style.display = 'block';
    contextMenu.style.left = `${event.pageX}px`;
    contextMenu.style.top = `${event.pageY}px`;
});

// 드롭 영역으로 사용될 엘리먼트에 대한 설정
function setupDropZone(dropZoneElement) {
    dropZoneElement.addEventListener('dragover', function(event) {
        event.preventDefault();
        event.dataTransfer.dropEffect = 'move';
    });

    dropZoneElement.addEventListener('drop', function(event) {
        event.preventDefault();
        const id = event.dataTransfer.getData('text/plain');
        const draggableElement = document.getElementById(id);
        event.target.appendChild(draggableElement);

        updateProgress();
    });
}

// localStorage에 포스트잇 위치를 저장하는 함수
function savePostItPosition(postItId, dropZoneId) {
    localStorage.setItem(postItId, dropZoneId);
}

// 페이지 로드 시 localStorage에서 포스트잇 위치를 복원하고 드롭존 설정
window.onload = function() {
    const postIts = document.querySelectorAll('.post-it');
    postIts.forEach(makePostItDraggable);

    // 'drop-zone-done'과 'drop-zone-ing' 클래스를 가진 드롭존 설정
    const doneDropZone = document.querySelector('.drop-zone-done');
    const ingDropZone = document.querySelector('.drop-zone-ing');
    const dropZones = [doneDropZone, ingDropZone];
    dropZones.forEach(setupDropZone);

    postIts.forEach(postIt => {
        const dropZoneId = localStorage.getItem(postIt.id);
        if (dropZoneId) {
            const dropZone = document.getElementById(dropZoneId);
            if(dropZone) dropZone.appendChild(postIt);
            // 추가된 드롭존 식별자를 기반으로 포스트잇을 적절한 드롭존에 추가
            else {
                if(dropZoneId === 'dropZone1') doneDropZone.appendChild(postIt);
                else if(dropZoneId === 'dropZone2') ingDropZone.appendChild(postIt);
            }
        }
    });
};


// 컨텍스트 메뉴 이벤트 리스너를 추가하는 함수
document.addEventListener('contextmenu', function(event) {
    event.preventDefault();
    const postItElement = event.target.closest('.post-it');
    if (postItElement) {
        currentPostItId = postItElement.id;
        const contextMenu = document.getElementById('contextMenu');
        contextMenu.style.display = 'block';
        contextMenu.style.left = event.pageX + 'px';
        contextMenu.style.top = event.pageY + 'px';
    }
});

// 페이지 로드 시 및 할 일 추가/삭제 후에 호출
updateDelButtonVisibility();

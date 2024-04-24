<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>엠티데이타 스크럼</title>

    <img src="./image/sample_logo.png" alt="MTData Logo" class="logo">
    <h1 class="page-title">SCRUM</h1>

    <link rel="stylesheet" href="./css/cloudScrum.css">
    <link rel="stylesheet" href="./css/loginSeccsions.css">
    <link rel="stylesheet" href="./css/modals.css">
</head>
<body>    
    <!-- include space -->
    <?php include './modals/customAlert.php'; ?>

    <div class="sliding-button-container">
        <input type="checkbox" id="slider-toggle" class="slider-toggle" hidden />
        <label for="slider-toggle" class="sliding-button-label">
            <span class="slider-background"></span>
            <span class="slider-button"><strong>My Todo</strong></span>
            <span class="slider-button slider-button-right"><strong>Team Board</strong></span>
        </label>
    </div>

    <!-- Todo section -->
    <div id="todoSection" >

        <!-- 컨텍스트 메뉴 -->
        <div id="contextMenu" class="context-menu">
            <ul>
                <li onclick="editPostIt(currentPostItId)">수정</li>
                <li onclick="deletePostIt(currentPostItId)">삭제</li>
            </ul>
        </div>

        <div id="postItCreationForm" class="post-section">
            <input type="text" id="postItDepartment" placeholder="소속" />
            <input type="text" id="postItName" placeholder="이름" />
            <input type="date" id="postItDate" />
            <input type="text" id="postItProject" placeholder="주제(프로젝트명)" />
            <strong><p>해야할 일</p></strong>
            <div id="todoListContainer">
                <input type="text" class="todoItem" placeholder="해야 할 일" />
            </div>

            <button class="btn btn-save"   onclick="addTodoItem()"> + </button>
            <button class="btn btn-minred"   onclick="delTodoItem()"> - </button>
            
            <div class="modal-footer">
                <button class="btn btn-gray"  onclick="createPostIt()" style="color: white;">포스트잇 추가</button>
            </div>
        </div>

        <!-- 수정 모달 -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close-button">&times;</span>
                <h2>포스트잇 수정</h2>
                <input type="text" id="editDepartment" placeholder="소속" />
                <input type="text" id="editName" placeholder="이름" />
                <input type="date" id="editDate" />
                <input type="text" id="editProject" placeholder="주제(프로젝트명)" />
                <strong><p>해야할 일</p></strong>
                <div id="editTodoListContainer"></div>
                <button class="btn" onclick="editAddTodoItem()"> + </button>
                <button class="btn btn-minred" style="display: none;" onclick="editDelTodoItem()"> - </button>

                <div class="modal-footer">
                    <button class="btn btn-save" id="editSaveButton">저장</button>
                    <button onclick="close_modal()" class="btn">닫기</button>
                </div>

            </div>
        </div>
        <!-- 수정 모달 종료 -->

        <div id="progressDisplay" class="progress-display">
            <div id="progressBar" class="progress-bar" style="width: 0%">0%</div>
        </div>

        <!-- 드롭존 -->
        <div class="drop-zones-container">
            <div id="dropZone1" class="drop-zone drop-zone-done">완료</div>
            <div id="dropZone2" class="drop-zone drop-zone-ing">진행 중</div>
        </div>

        <!-- 포스트잇 -->
        <div id="postItsContainer"></div>
    </div>


        <div id="boardSection" style="display:none;">
            <div class="board-container">

                <div class="board-header">
                    <div class="board-navigation">
                        <!-- 좌우 화살표 -->
                        <button id="prevBoard" class="arrow-button" onclick="slideBoard('prev')">
                            &lt;
                        </button>
                        <!-- 전체 팀 보기 버튼 -->
                        <button onclick="toggleViewAllTeams()" class="view-all-teams-button btn btn-gray" style="font-size: 20px; color:gray;">
                            전체 팀 보기
                        </button>
                        <button id="nextBoard" class="arrow-button" onclick="slideBoard('next')">
                            &gt;
                        </button>
                    </div>
                </div>

                <div class="board-content">

                    <div class="row">
                        <!-- 부서 A -->
                        <div class="department">
                            <h3>부서 A</h3>
                            <div class="team-members">
                                <!-- 팀원 1의 포스트잇 -->
                                <div class="member">
                                    <h4>팀원 1</h4>
                                    <div class="post-its">
                                        <!-- 포스트잇 카드 1 -->
                                        <div class="post-it-card">
                                            <h5>새 기능 개발</h5>
                                            <p>UI 구성 및 기능 구현 필요</p>
                                            <span class="status">진행 중</span>

                                            <div class="assignees">
                                                <!-- 프로필 이미지는 실제 경로로 교체해야 합니다. -->
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>

                                        </div>
                                        <!-- 포스트잇 카드 2 -->
                                        <div class="post-it-card">
                                            <h5>버그 수정</h5>
                                            <p>로그인 오류 수정 작업</p>
                                            <span class="status">완료</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 3 -->
                                        <div class="post-it-card">
                                            <h5>문서 업데이트</h5>
                                            <p>기술 문서 업데이트 필요</p>
                                            <span class="status">대기 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 4 -->
                                        <div class="post-it-card">
                                            <h5>테스트 케이스 추가</h5>
                                            <p>신규 기능 테스트 케이스 작성</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 다른 팀원의 포스트잇들도 같은 방식으로 추가(팀원 2부터 팀원 5까지) -->
                            </div>
                        </div>

                        <div class="department">
                            <h3>부서 B</h3>
                            <div class="team-members">
                                <!-- 팀원 1의 포스트잇 -->
                                <div class="member">
                                    <h4>팀원 1</h4>
                                    <div class="post-its">
                                        <!-- 포스트잇 카드 1 -->
                                        <div class="post-it-card">
                                            <h5>시장 조사</h5>
                                            <p>새로운 기술 동향 파악</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 2 -->
                                        <div class="post-it-card">
                                            <h5>기능 설계</h5>
                                            <p>모듈 설계를 위한 미팅 준비</p>
                                            <span class="status">완료</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 3 -->
                                        <div class="post-it-card">
                                            <h5>고객 피드백 분석</h5>
                                            <p>제품 피드백 수집 및 분석</p>
                                            <span class="status">대기 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 4 -->
                                        <div class="post-it-card">
                                            <h5>코드 리뷰</h5>
                                            <p>팀원들의 코드 리뷰 진행</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 팀원 2부터 팀원 5까지의 포스트잇 카드들도 동일한 방식으로 추가합니다. -->
                                <!-- ...[팀원 2부터 팀원 5까지의 포스트잇 추가]... -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="department">
                            <h3>부서 C</h3>
                            <div class="team-members">
                                <!-- 팀원 1의 포스트잇 -->
                                <div class="member">
                                    <h4>팀원 1</h4>
                                    <div class="post-its">
                                        <!-- 포스트잇 카드 1 -->
                                        <div class="post-it-card">
                                            <h5>코드 조사</h5>
                                            <p>새로운 코드 기술 동향 파악</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 2 -->
                                        <div class="post-it-card">
                                            <h5>기능 설계</h5>
                                            <p>스크럼 보드 모듈 설계를 위한 미팅 준비</p>
                                            <span class="status">완료</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 3 -->
                                        <div class="post-it-card">
                                            <h5>엠티데이타 팀원 피드백 분석</h5>
                                            <p>스크럼 설계 피드백 수집 및 분석</p>
                                            <span class="status">대기 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 4 -->
                                        <div class="post-it-card">
                                            <h5>엠티데이타 코드 리뷰</h5>
                                            <p>엠티데이타 팀원들의 코드 리뷰 진행</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 팀원 2부터 팀원 5까지의 포스트잇 카드들도 동일한 방식으로 추가합니다. -->
                                <!-- ...[팀원 2부터 팀원 5까지의 포스트잇 추가]... -->
                            </div>
                        </div>

                        <div class="department">
                            <h3>부서 D</h3>
                            <div class="team-members">
                                <!-- 팀원 1의 포스트잇 -->
                                <div class="member">
                                    <h4>팀원 1</h4>
                                    <div class="post-its">
                                        <!-- 포스트잇 카드 1 -->
                                        <div class="post-it-card">
                                            <h5>코드 조사</h5>
                                            <p>새로운 코드 기술 동향 파악</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 2 -->
                                        <div class="post-it-card">
                                            <h5>기능 설계</h5>
                                            <p>스크럼 보드 모듈 설계를 위한 미팅 준비</p>
                                            <span class="status">완료</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 3 -->
                                        <div class="post-it-card">
                                            <h5>엠티데이타 팀원 피드백 분석</h5>
                                            <p>스크럼 설계 피드백 수집 및 분석</p>
                                            <span class="status">대기 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 4 -->
                                        <div class="post-it-card">
                                            <h5>엠티데이타 코드 리뷰</h5>
                                            <p>엠티데이타 팀원들의 코드 리뷰 진행</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 팀원 2부터 팀원 5까지의 포스트잇 카드들도 동일한 방식으로 추가합니다. -->
                                <!-- ...[팀원 2부터 팀원 5까지의 포스트잇 추가]... -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="department">
                            <h3>부서 E</h3>
                            <div class="team-members">
                                <!-- 팀원 1의 포스트잇 -->
                                <div class="member">
                                    <h4>팀원 1</h4>
                                    <div class="post-its">
                                        <!-- 포스트잇 카드 1 -->
                                        <div class="post-it-card">
                                            <h5>코드 조사</h5>
                                            <p>새로운 코드 기술 동향 파악</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 2 -->
                                        <div class="post-it-card">
                                            <h5>기능 설계</h5>
                                            <p>스크럼 보드 모듈 설계를 위한 미팅 준비</p>
                                            <span class="status">완료</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 3 -->
                                        <div class="post-it-card">
                                            <h5>엠티데이타 팀원 피드백 분석</h5>
                                            <p>스크럼 설계 피드백 수집 및 분석</p>
                                            <span class="status">대기 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 4 -->
                                        <div class="post-it-card">
                                            <h5>엠티데이타 코드 리뷰</h5>
                                            <p>엠티데이타 팀원들의 코드 리뷰 진행</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 팀원 2부터 팀원 5까지의 포스트잇 카드들도 동일한 방식으로 추가합니다. -->
                                <!-- ...[팀원 2부터 팀원 5까지의 포스트잇 추가]... -->
                            </div>
                        </div>

                        <div class="department">
                            <h3>부서 E</h3>
                            <div class="team-members">
                                <!-- 팀원 1의 포스트잇 -->
                                <div class="member">
                                    <h4>팀원 1</h4>
                                    <div class="post-its">
                                        <!-- 포스트잇 카드 1 -->
                                        <div class="post-it-card">
                                            <h5>코드 조사</h5>
                                            <p>새로운 코드 기술 동향 파악</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 2 -->
                                        <div class="post-it-card">
                                            <h5>기능 설계</h5>
                                            <p>스크럼 보드 모듈 설계를 위한 미팅 준비</p>
                                            <span class="status">완료</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 3 -->
                                        <div class="post-it-card">
                                            <h5>엠티데이타 팀원 피드백 분석</h5>
                                            <p>스크럼 설계 피드백 수집 및 분석</p>
                                            <span class="status">대기 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                        <!-- 포스트잇 카드 4 -->
                                        <div class="post-it-card">
                                            <h5>엠티데이타 코드 리뷰</h5>
                                            <p>엠티데이타 팀원들의 코드 리뷰 진행</p>
                                            <span class="status">진행 중</span>
                                            <div class="assignees">
                                                <img src="path_to_profile_image.jpg" alt="프로필 이미지" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 팀원 2부터 팀원 5까지의 포스트잇 카드들도 동일한 방식으로 추가합니다. -->
                                <!-- ...[팀원 2부터 팀원 5까지의 포스트잇 추가]... -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- 스크립트 -->
    <script src="./js/scrum/scrum_main.js"></script>
</body>
</html>

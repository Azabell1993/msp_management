<div class="container work-wrap"> <!-- 조회하기 위해서 입력하는 공간 시작 -->
    <div class="search-section"> <!-- 1번째 라인 -->
        <p><strong>프로젝트 </strong></p>
            <input type="text" placeholder="프로젝트 명">
        <p><strong>CSP</strong></p>
        <select>
            <option value="">전 체</option>
            <option value="kakao">KAKAO CLOUD</option>
            <option value="naver">NAVER CLOUD</option>
        </select>
        <p><strong>OS</strong></p>
        <select>
            <option value="">전 체</option>
            <option value="Ubuntu">Ubuntu</option>
            <option value="CentOS">CentOS</option>
            <option value="Windows">Windows</option>
        </select>
        <p><strong>HW</strong></p>
        <select>
            <option value="">전 체</option>
            <option value="m1i.large(2vCPU 8Gib)">m1i.large(2vCPU 8Gib)</option>
            <option value="m1i.large(2vCPU 8Gib)">m1i.large(2vCPU 8Gib)</option>
            <option value="m1i.large(2vCPU 8Gib)">m1i.large(2vCPU 8Gib)</option>
            <option value="m1i.large(2vCPU 8Gib)">m1i.large(2vCPU 8Gib)</option>
        </select>
    </div>

    <div class="search-section"> <!-- 2번째 라인 -->
        <p><strong>PUB/PRI</strong></p>
        <select>
            <option value="">전 체</option>
            <option value="public">PUBLIC</option>
            <option value="private">PRIVATE</option>
        </select>
        <p><strong>연결 서버 명(구분)</strong></p>
            <input type="text" placeholder="연결 서버 명(구분)">
        <p><strong>프로젝트 담당자</strong></p>
        <input type="text" placeholder="담당자">  
        <p><strong>서드파티</strong></p>
        <select>
            <option value="">전 체</option>
            <option value="b2en">b2en</option>
            <option value="b2en">b2en</option>
        </select>
        <p><strong>프로젝트 생성 날짜</strong></p>
            <input type="date" class="date-picker" name="creation-date">
    </div>

    <div class="search-section"> <!-- 3번째 라인 -->
        <p><strong>DB 종류</strong></p>
        <select>
            <option value="">전 체</option>
            <option value="MySQL">MySQL</option>
            <option value="PostgreSQL">PostgreSQL</option>
        </select>
        <p><strong>CSP 별 리전</strong></p>
        <select>
            <option value="">전 체</option>
            <option value="kr-central-1-a">kr-central-1-a</option>
            <option value="kr-central-1-b">kr-central-1-b</option>
            <option value="kr-central-2-a">kr-central-2-a</option>
            <option value="kr-central-2-b">kr-central-2-b</option>
        </select>
    </div>

    <p class="small-text">※ 키 페어와 접속 비밀번호는 체크 후 발급(인스턴스 하나씩만 발급이 가능합니다.)</p>
    <p class="small-text">※ DevOps 형상 관리는 `포털 시스템`만 가능합니다.</p>

    <div class="btn-right"> <!-- 조회 폼 입력 후 조회하기 -->
        <!-- 경고 메세지 카피 문구 -->
        <button class="btn btn-gray">DevOps 형상 관리</button>
        <button class="btn btn-green">키 페어 발급</button>
        <button class="btn btn-green">콘솔 접속 비밀번호 발급</button>
        <button class="btn btn-red">초기화</button>
        <button class="btn btn-darkgray" style="width: 80px;">조 회</button>
    </div> <!-- 조회하기 위해서 입력하는 공간 끝 -->
</div>
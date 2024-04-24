<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>클라우드 C Socket Test</title>
    <!-- 부트스트랩 링크 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-5">클라우드 C Socket Test</h1>
        <div id="socketData" class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">시간</th>
                        <th scope="col">데이터</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 이 부분은 JavaScript로 데이터가 들어갈 자리입니다. -->
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <button id="fetchButton" class="btn btn-primary">데이터 가져오기</button>
        </div>
    </div>

    <!-- 자바스크립트 링크 -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- 데이터를 가져오고 업데이트하기 위한 스크립트 -->
    <script>
        function fetchData() {
            fetch('./socket_data.php')
            .then(response => response.json()) // JSON 형식으로 데이터 받기
            .then(data => {
                const tableBody = document.querySelector('#socketData tbody');
                tableBody.innerHTML = ''; // 테이블 내용 초기화

                data.forEach(entry => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${entry.time}</td>
                        <td>${entry.data}</td>
                    `;
                    tableBody.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }

        // 페이지가 로드되면 주기적으로 데이터를 가져오도록 설정
        window.onload = function() {
            fetchData();
            // 3초마다 fetchData 함수 호출하여 데이터 가져오기
            setInterval(fetchData, 3000);

            // 버튼 클릭 이벤트 처리
            const fetchButton = document.getElementById('fetchButton');
            fetchButton.addEventListener('click', function() {
                fetch('./socket_data.php', {
                    method: 'POST'
                })
                .then(response => response.text())
                .then(data => {
                    console.log('C 코드 실행 결과:', data);
                    // 결과를 받아와서 처리하는 부분 추가할 수 있음
                })
                .catch(error => {
                    console.error('Error executing C code:', error);
                });
            });
        };
    </script>
</body>
</html>

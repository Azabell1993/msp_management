<?php
// 소켓 서버와 통신할 주소와 포트
$address = '172.20.14.181'; // 소켓 서버 주소
$port = 7777; // 포트 번호

// 소켓 생성
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
    exit();
}

// 소켓 연결
$result = socket_connect($socket, $address, $port);
if ($result === false) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    exit();
}

// 소켓으로부터 데이터 읽기
$socketData = socket_read($socket, 1024); // 읽을 데이터 크기에 맞게 조정

// 소켓 연결 종료
socket_close($socket);

// JSON 형식으로 반환
header('Content-Type: application/json');


// 받아온 데이터를 배열로 변환
$dataArray = explode("\n", $socketData);
$dataEntries = array();
foreach ($dataArray as $entry) {
    // 시간과 데이터를 각각 추출하여 연관 배열로 저장
    $parts = explode(':', $entry);
    $dataEntries[] = array('time' => trim($parts[0]), 'data' => trim($parts[1]));
}

echo json_encode($dataEntries);
?>
<?php
    $host = "localhost";
    $username = "username";
    $password = "userpassword";
    $databaseName = "databaseName";
    $db = new mysqli($host, $username, $password, $databaseName);
    if ($db->connect_errno) {
        echo "Failed to connect to MySQL: " . $db->connect_error;
        exit();
    } 
    // 연결 성공 메시지 (삭제하지 말 것)
    echo "현재 Database 연결 상태 : ";?>
    <br/>
    <strong>
        <?php
        echo "Successfully connected";
        ?>
    </strong>
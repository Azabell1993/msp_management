#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <string.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <arpa/inet.h>

#define PORT 7777

int main() {
    int sock = 0;
    struct sockaddr_in serv_addr;
    char buffer[1024] = {0};

    // 소켓 생성
    if ((sock = socket(AF_INET, SOCK_STREAM, 0)) < 0) {
        printf("\n Socket creation error \n");
        return -1;
    }

    serv_addr.sin_family = AF_INET;
    serv_addr.sin_port = htons(PORT);

    // 서버의 IP 주소 설정
    if(inet_pton(AF_INET, "172.20.14.181", &serv_addr.sin_addr) <= 0) {
        printf("\nInvalid address / Address not supported \n");
        return -1;
    }

    // 서버에 연결
    if (connect(sock, (struct sockaddr *)&serv_addr, sizeof(serv_addr)) < 0) {
        printf("\nConnection Failed \n");
        return -1;
    }

    // HTTP GET 요청 전송
    char *httpRequest = "GET / HTTP/1.1\r\nHost: localhost\r\n\r\n";
    send(sock, httpRequest, strlen(httpRequest), 0);
    printf("HTTP request sent\n");

    // 서버로부터의 응답 수신
    int bytes_read = read(sock, buffer, sizeof(buffer) - 1);
    buffer[bytes_read] = '\0';  // Null terminate the buffer
    printf("Received response:\n%s\n", buffer);

    // 소켓 종료
    close(sock);

    return 0;
}

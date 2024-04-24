<div class="container work-wrap">
    <p class="showCount"> CSP 총 5건 (VM 총 220건)</p>
    <div class="btn-right">
            <button class="btn btn-gray">엑셀 다운로드</button>
            <select>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="150">150</option>
            </select>
        </div>

        <input type="hidden" name="모바일 조회 카피 문구">
        <p class="mobile-message" style="display: none;">모바일 모드에서는 조회할 수 없습니다.</p>
        <div class="table-container">
            <table class="list">
                <thead>
                    <tr>
                        <th>CHK</th>
                        <th>NO</th>
                        <th>사용연도</th>
                        <th>Project</th>
                        <th>CSP 명 <span class="info-icon" onclick="showPopup()">!</span></th>
                        <th>ZONE</th>
                        <th>Subnet(VPC)</th>
                        <th>접속시스템명</th>
                        <th>운영 서버명(구분)</th>
                        <th>OS / HW</th>
                        <th>호스트 ID</th>
                        <th>Private IP</th>
                        <th>sudo 권한</th>
                        <th>Zabbix Hostname</th>
                        <th>담당자</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>1</td>
                        <td>2021</td>
                        <td>소방청 데이터센터 구축</td>
                        <td>KAKAO CLOUD</td>
                        <td>PUBLIC</td>
                        <td>main.pub_1 (172.25.17.0/24)</td>
                        <td>콘솔시스템명</td>
                        <td>Bastion-host</td>
                        <td>Ubuntu 20.04 m1.large(2vCPU 8GiB)</td>
                        <td>ubuntu</td>
                        <td>172.25.16.18</td>
                        <td>MT</td>
                        <td>Zabbix Server</td>
                        <td>홍*동</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>2</td>
                        <td>2022</td>
                        <td>교육부 클라우드 시스템 개선</td>
                        <td>NAVER CLOUD</td>
                        <td>PRIVATE</td>
                        <td>edu.priv_2 (192.168.1.0/24)</td>
                        <td>학습관리시스템</td>
                        <td>Learning-Management-System</td>
                        <td>Windows Server 2019 m2.xlarge(4vCPU 16GiB)</td>
                        <td>winserver</td>
                        <td>192.168.1.45</td>
                        <td>Admin</td>
                        <td>Education Monitoring</td>
                        <td>김*희</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>3</td>
                        <td>2023</td>
                        <td>도시 안전 모니터링 시스템</td>
                        <td>AMAZON AWS</td>
                        <td>PUBLIC</td>
                        <td>city.pub_3 (10.10.5.0/24)</td>
                        <td>안전관리시스템</td>
                        <td>Security-Host</td>
                        <td>Ubuntu 18.04 m3.medium(1vCPU 4GiB)</td>
                        <td>ubuntu-sec</td>
                        <td>10.10.5.22</td>
                        <td>Root</td>
                        <td>City Safety</td>
                        <td>이*원</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>4</td>
                        <td>2024</td>
                        <td>국방 모바일 통신망</td>
                        <td>KAKAO CLOUD</td>
                        <td>PRIVATE</td>
                        <td>defense.priv_4 (172.20.14.0/24)</td>
                        <td>통신시스템</td>
                        <td>Mobile-Comms</td>
                        <td>CentOS 7 m4.large(2vCPU 8GiB)</td>
                        <td>centos-comms</td>
                        <td>172.20.14.89</td>
                        <td>sudo</td>
                        <td>Defense Network</td>
                        <td>박*서</td>
                    </tr>
                    <tr>
                        <th><input type="checkbox"></th>
                        <td>5</td>
                        <td>2025</td>
                        <td>스마트 농업 솔루션</td>
                        <td>GOOGLE CLOUD</td>
                        <td>PUBLIC</td>
                        <td>agri.pub_5 (35.45.65.0/24)</td>
                        <td>농업관리시스템</td>
                        <td>Agriculture-Host</td>
                        <td>Ubuntu 20.04 m5.small(1vCPU 2GiB)</td>
                        <td>ubuntu-agri</td>
                        <td>35.45.65.58</td>
                        <td>User</td>
                        <td>Agriculture Monitor</td>
                        <td>최*아</td>
                    </tr>        
                    </tbody>
                </div>
            </table>
        </div>
    <div class="pagination">
        <button class="btn pagination-button"></button>
        <button class="btn pagination-button">1</button>
        <button class="btn pagination-button">2</button>
        <button class="btn pagination-button">3</button>
        <button class="btn pagination-button">4</button>
        <button class="btn pagination-button">5</button>
        <button class="btn pagination-button"></button>
    </div>
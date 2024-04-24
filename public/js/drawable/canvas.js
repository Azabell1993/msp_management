class CanvasManager {
    constructor(canvasId) {
        this.canvas = document.getElementById(canvasId);
        this.ctx = this.canvas.getContext("2d");
        this.drawMode = 'draw';
        this.isDrawing = false;
        this.startX = 0;
        this.startY = 0;
        this.images = [];
        this.selectedImageIndex = -1;
        this.dragging = false;
        this.dragStartX = 0;
        this.dragStartY = 0;

        this.initializeListeners();
    }

    // 이벤트 리스너 초기화
    initializeListeners() {
        this.canvas.addEventListener('mousedown', this.onMouseDown.bind(this));
        this.canvas.addEventListener('mousemove', this.onMouseMove.bind(this));
        this.canvas.addEventListener('mouseup', this.onMouseUp.bind(this));
        this.canvas.addEventListener('mouseout', () => this.isDrawing = false);

        document.getElementById("eraserBtn").addEventListener("click", () => this.toggleEraser());
        document.getElementById("clearCanvasBtn").addEventListener("click", () => this.clearCanvas());
        document.getElementById("uploadImageBtn").addEventListener("click", () => document.getElementById("imageInput").click());
        document.getElementById("imageInput").addEventListener("change", (event) => this.uploadImage(event));
        document.getElementById("saveBtn").addEventListener("click", () => this.saveCanvas());
        document.getElementById("drawRectBtn").addEventListener("click", () => this.drawRect());

        this.canvas.addEventListener("wheel", (e) => this.onWheel(e));
    }

    // 마우스를 누를 때 호출되는 함수
    onMouseDown(e) {
        const { offsetX: mouseX, offsetY: mouseY } = e;
        this.startX = mouseX;
        this.startY = mouseY;
        const penSize = document.getElementById('penSize').value;
        const eraserSize = document.getElementById('eraserSize').value;
        this.ctx.lineWidth = this.drawMode === 'erase' ? eraserSize : penSize;

        if (this.drawMode !== 'erase') {
            const penColor = document.getElementById('colorPicker').value;
            this.ctx.strokeStyle = penColor;
        }

        this.isDrawing = true;
        this.ctx.beginPath();
        this.ctx.moveTo(this.startX, this.startY);

        // 이미지 드래그 로직
        this.selectedImageIndex = this.images.findIndex(img => 
            mouseX >= img.x && mouseX <= img.x + img.width &&
            mouseY >= img.y && mouseY <= img.y + img.height);

        if (this.selectedImageIndex !== -1) {
            this.dragging = true;
            this.dragStartX = mouseX;
            this.dragStartY = mouseY;
        }
    }

    // 마우스를 움직일 때 호출되는 함수
    onMouseMove(e) {
        if (!this.isDrawing && !this.dragging) return;
        
        const { offsetX: mouseX, offsetY: mouseY } = e;

        if (this.dragging) {
            const img = this.images[this.selectedImageIndex];
            img.x += mouseX - this.dragStartX;
            img.y += mouseY - this.dragStartY;
            this.dragStartX = mouseX;
            this.dragStartY = mouseY;
            this.drawImage();
        } else if (this.drawMode === 'draw' || this.drawMode === 'erase') {
            this.ctx.lineTo(mouseX, mouseY);
            this.ctx.stroke();
        }
    }

    // 마우스 버튼을 놓을 때 호출되는 함수
    onMouseUp() {
        if (this.drawMode === 'rect') {
            this.ctx.rect(this.startX, this.startY, e.offsetX - this.startX, e.offsetY - this.startY);
            this.ctx.fill();
        }
        this.isDrawing = false;
        this.dragging = false;
    }

    // 지우개 모드와 그리기 모드 전환
    toggleEraser() {
        this.drawMode = this.drawMode !== 'erase' ? 'erase' : 'draw';
        this.ctx.globalCompositeOperation = this.drawMode === 'erase' ? 'destination-out' : 'source-over';
        document.getElementById("eraserBtn").textContent = this.drawMode === 'erase' ? '그리기' : '지우개';
    }

    // 캔버스 클리어
    clearCanvas() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.images.forEach(imgObj => {
            this.ctx.drawImage(imgObj.img, imgObj.x, imgObj.y, imgObj.width, imgObj.height);
        });
    }

    // 이미지 업로드
    uploadImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        
        const reader = new FileReader();
        reader.onload = (e) => {
            const imgSrc = e.target.result;
            const img = new Image();
            img.onload = () => {
                this.images.push({ img, x: 100, y: 100, width: img.width / 4, height: img.height / 4 });
                this.drawImage();
            };
            img.src = imgSrc;
        };
        reader.readAsDataURL(file);
    }

    // 저장
    saveCanvas() {
        const dataURL = this.canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.download = 'canvas_image.png';
        link.href = dataURL;
        link.click();
    }

    // 그리기
    drawRect() {
        this.drawMode = 'rect';
        const fillColor = document.getElementById('fillColor').value;
        const strokeColor = document.getElementById('strokeColor').value;
        this.ctx.fillStyle = fillColor;
        this.ctx.strokeStyle = strokeColor;
    }

    // 이미지 그리기
    drawImage() {
        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
        this.images.forEach(({ img, x, y, width, height }) => {
            this.ctx.drawImage(img, x, y, width, height);
        });
    }

    // 이미지 크기 조절
    onWheel(e) {
        if (this.selectedImageIndex === -1) return;
        e.preventDefault();

        const img = this.images[this.selectedImageIndex];
        const scale = e.deltaY * -0.01;
        img.width *= (1 + scale);
        img.height *= (1 + scale);
        this.drawImage();
    }
}

new CanvasManager("canvas");

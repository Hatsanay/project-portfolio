<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รูปภาพที่เกี่ยวข้อง</title>
    <style>
        body {
            margin: 10px;
            padding: 0;
            box-sizing: border-box;
        }

        #imageContainer {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        #imageContainer img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        #imageContainer img:hover {
            transform: scale(1.1);
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .modal-content img {
            max-width: 80%;
            max-height: 80%;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 30px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>รูปภาพที่เกี่ยวข้อง</h1>
    <div id="imageContainer"></div>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImg" src="" alt="full-size image">
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // รับค่า parameter per_id ที่ส่งมา
            const urlParams = new URLSearchParams(window.location.search);
            const perId = urlParams.get('per_id');
            // สร้าง URL สำหรับ API เพื่อดึงรูปภาพที่เกี่ยวข้อง
            const apiUrl = `http://localhost:3000/api/images/${perId}`;
            // ใช้ fetch API เพื่อดึงข้อมูลรูปภาพ
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    const imageContainer = document.getElementById('imageContainer');
                    // สร้าง element img และเพิ่มรูปภาพลงใน container
                    data.forEach(imageUrl => {
                        const img = document.createElement('img');
                        img.src = "../../../"+imageUrl;
                        img.alt = 'related image';
                        imageContainer.appendChild(img);
                        // เพิ่ม event listener สำหรับการคลิกที่รูปภาพเพื่อแสดงในโหมด fullscreen
                        img.addEventListener('click', () => {
                            const modal = document.getElementById('myModal');
                            const modalImg = document.getElementById('modalImg');
                            modal.style.display = 'block';
                            modalImg.src = img.src;
                        });
                    });
                })
                .catch(error => console.error('Error fetching images:', error));

            // เมื่อผู้ใช้คลิกที่ปุ่มปิดในโหมด fullscreen
            const closeBtn = document.querySelector('.close');
            closeBtn.addEventListener('click', () => {
                const modal = document.getElementById('myModal');
                modal.style.display = 'none';
            });

            // เมื่อผู้ใช้คลิกที่พื้นหลัง modal ให้ปิด modal
            const modal = document.getElementById('myModal');
            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>

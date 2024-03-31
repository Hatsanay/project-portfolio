<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../sidebar.css">
    <?php include("../../../bootstrap.php"); ?>

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">AdminPort</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                    <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="listper.php" class="sidebar-link active">
                    <i class="lni lni-add-files"></i>
                        <span>จัดการข้อมูลผลงาน</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                    <i class="lni lni-certificate"></i>
                        <span>จัดการข้อมูลเกียรติบัตร</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                    <i class="lni lni-users"></i>
                        <span>จัดการข้อมูลผู้ใช้งานระบบ</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>จัดการหน้า portfolio</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Portfolio</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">แก้ไข Portfolio</a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
                        <i class="lni lni-layout"></i>
                        <span>Multi Level</span>
                    </a>
                    <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                                data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                                Two Links
                            </a>
                            <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 1</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Link 2</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li> -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>ตั้งค่า</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
        <link rel="stylesheet" href="addper.css">
        <div class="container">
            <h1>เพิ่มผลงานใหม่</h1>
            <form id="addForm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="per_name">ชื่อผลงาน:</label>
                    <input type="text" id="per_name" name="per_name" required>
                </div>
                <div class="form-group">
                    <label for="per_des">รายละเอียดเพิ่มเติม:</label>
                    <input type="text" id="per_des" name="per_des" required>
                </div>
                <div class="form-group">
                    <label for="per_profile">เลือกรูปภาพหน้าปก:</label>
                    <input type="file" id="per_profile" name="per_profile" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="per_images_id"></label>
                    <input type="hidden" id="per_images_id" name="per_images_id" value="1" required >
                </div>
                <button type="submit">เพิ่ม</button>
            </form>
   </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="listper.js"></script>
    <script>
    document.getElementById('addForm').addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData();
    formData.append('per_name', document.getElementById('per_name').value);
    formData.append('per_des', document.getElementById('per_des').value);
    formData.append('per_images_id', document.getElementById('per_images_id').value);
    formData.append('per_profile', document.getElementById('per_profile').files[0]);

    fetch('http://localhost:3000/api/data', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to add data');
        }
        alert('Data added successfully!');
        event.target.reset();
    })
    .catch(error => {
        console.error('Error adding data:', error);
        alert('Failed to add data. Please try again.');
    });
});

   </script>
</body>

</html>




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>เพิ่มผลงานใหม่</title>
</head>
<body>
    <link rel="stylesheet" href="addperfomance.css">
   <div class="container">
    <h1>เพิ่มผลงานใหม่</h1>
    <form id="addForm" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="per_name">ชื่อผลงาน:</label>
            <input type="text" id="per_name" name="per_name" required>
        </div>
        <div class="form-group">
            <label for="per_des">รายละเอียดเพิ่มเติม:</label>
            <input type="text" id="per_des" name="per_des" required>
        </div>
        <div class="form-group">
            <label for="per_profile">เลือกรูปภาพหน้าปก:</label>
            <input type="file" id="per_profile" name="per_profile" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="per_images_id"></label>
            <input type="hidden" id="per_images_id" name="per_images_id" value="1" required >
        </div>
        <button type="submit">เพิ่ม</button>
    </form>
   </div>
   <script>
    document.getElementById('addForm').addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData();
    formData.append('per_name', document.getElementById('per_name').value);
    formData.append('per_des', document.getElementById('per_des').value);
    formData.append('per_images_id', document.getElementById('per_images_id').value);
    formData.append('per_profile', document.getElementById('per_profile').files[0]);

    fetch('http://localhost:3000/api/data', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to add data');
        }
        alert('Data added successfully!');
        event.target.reset();
    })
    .catch(error => {
        console.error('Error adding data:', error);
        alert('Failed to add data. Please try again.');
    });
});

   </script>
</body>
</html> -->

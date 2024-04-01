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
    <link rel="stylesheet" href="addimgper.css">


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
                    <a href="../dashboard/dashboard.php" class="sidebar-link">
                    <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="../perfomance/listper.php" class="sidebar-link active">
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
                <a href="../../../admin.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <div class="main p-3">
            
            <div class="container">
            <h2>เพิ่มรูปภาพผลงาน</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="img_per_id" value="<?php echo $_GET['per_id']; ?>">
                <div class="form-group">
                <label for="per_profile">อัพโหลดรูปภาพ:</label>
                <input type="file" name="per_img[]" accept="image/*" multiple required>
                </div>
                <button type="submit">Upload</button>
            </form>
            </div>

        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script src="../sidebar.js"></script>
</body>

</html>






<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>เพิ่มรูปภาพผลงาน</title>
<link rel="stylesheet" href="addimgper.css">
</head>
<body>
<div class="container">
  <h2>เพิ่มรูปภาพผลงาน</h2>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="img_per_id" value="<?php echo $_GET['per_id']; ?>">
    <div class="form-group">
      <label for="per_profile">อัพโหลดรูปภาพ:</label>
      <input type="file" name="per_img[]" accept="image/*" multiple required>
    </div>
    <button type="submit">Upload</button>
  </form>
</div>
</body>
</html> -->

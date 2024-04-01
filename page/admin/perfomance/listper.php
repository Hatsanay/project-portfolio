<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการข้อมูลผลงาน</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../sidebar.css">
    <link rel="stylesheet" href="listper.css">
    <?php include("../../../bootstrap.php"); ?>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Content -->
        <aside id="sidebar">
            <!-- Sidebar Header -->
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">AdminPort</a>
                </div>
            </div>
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <!-- Dashboard Link -->
                <li class="sidebar-item">
                    <a href="../dashboard/dashboard.php" class="sidebar-link">
                        <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- จัดการข้อมูลผลงาน Link (Active) -->
                <li class="sidebar-item">
                    <a href="listper.php" class="sidebar-link active">
                        <i class="lni lni-add-files"></i>
                        <span>จัดการข้อมูลผลงาน</span>
                    </a>
                </li>
                <!-- จัดการข้อมูลเกียรติบัตร Link -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-certificate"></i>
                        <span>จัดการข้อมูลเกียรติบัตร</span>
                    </a>
                </li>
                <!-- จัดการข้อมูลผู้ใช้งานระบบ Link -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-users"></i>
                        <span>จัดการข้อมูลผู้ใช้งานระบบ</span>
                    </a>
                </li>
                <!-- จัดการหน้า portfolio Link -->
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
                <!-- ตั้งค่า Link -->
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>ตั้งค่า</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Footer -->
            <div class="sidebar-footer">
                <a href="../../../admin.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="main p-3">
            <div>
                <h1>รายการข้อมูลผลงาน</h1>
            </div>
            <div align="right">
                <a href="addper.php"><button type="button" class="btnadd">เพิ่มผลงานใหม่</button></a>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>รูปโปรไฟล์</th>
                        <th>ชื่อผลงาน</th>
                        <th>รายละเอียด</th>
                        <th>เพิ่มรูปภาพ</th> <!-- เพิ่มคอลัมน์สำหรับปุ่มเพิ่มรูปภาพ -->
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- ข้อมูลจะถูกแทรกที่นี่ -->
                </tbody>
            </table>
        </div>
    </div>
    <!-- JavaScript Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../sidebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
    <!-- DataTable Initialization -->
    <script>
        $(document).ready(function() {
            // ดึงข้อมูล JSON จาก API
            $.getJSON('http://localhost:3000/api/data', function(data) {
                var tableBody = $('#tableBody');
                // วนลูปข้อมูลและแสดงในตาราง
                data.forEach(function(item) {
                    var perName = item.per_name.length > 30 ? item.per_name.substring(0, 30) + '...' : item.per_name;
                    var perDes = item.per_des.length > 30 ? item.per_des.substring(0, 30) + '...' : item.per_des;
                    var row = '<tr>' +
                        '<td><img src="../../../' + item.per_profile + '" alt="" style="width: 40px;"></td>'+
                        '<td>' + perName + '</td>' +
                        '<td>' + perDes + '</td>' +
                        '<td><a href="addimgper.php?per_id=' + item.per_id + '">เพิ่มรูปภาพ</a></td>' + // ลิงก์ไปยังหน้าเพิ่มรูปภาพพร้อมส่ง per_id
                        '</tr>';
                    console.log(item.per_profile);
                    tableBody.append(row);
                });

                // เรียกใช้ DataTables
                $('#example').DataTable();
            });
        });
    </script>
</body>

</html>

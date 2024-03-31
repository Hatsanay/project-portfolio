<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addperfomance.css">
    
    <title>เพิ่มผลงานใหม่</title>
</head>
<body>
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
</html>

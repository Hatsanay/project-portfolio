<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_portfolio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Receive data from the form
$img_per_id = $_POST['img_per_id'];

// Upload files
$targetDir = "../../../uploads2/";
$targetDirDB = "uploads2/";
$uploadedFiles = [];
$allowTypes = array('jpg','png','jpeg','gif');

if(!empty(array_filter($_FILES['per_img']['name']))){
    foreach($_FILES['per_img']['name'] as $key=>$val){
        // Generate random file name
        $fileName = uniqid('img_') . '.' . pathinfo($_FILES['per_img']['name'][$key], PATHINFO_EXTENSION);
        $targetFilePath = $targetDir . $fileName;
        $targetFilePathDB = $targetDirDB . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if(in_array($fileType, $allowTypes)){
            // Upload file
            if(move_uploaded_file($_FILES["per_img"]["tmp_name"][$key], $targetFilePath)){
                $uploadedFiles[] = $targetFilePathDB;
            }
        }
    }

    if(!empty($uploadedFiles)){
        // Insert data into the database
        $sql = "INSERT INTO tbl_imgper (imgper_name, img_per_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        foreach($uploadedFiles as $file){
            $stmt->bind_param("si", $file, $img_per_id);
            $stmt->execute();
        }

        // echo "Files uploaded successfully.";
        $message = "อัพโหลดไฟล์เสร็จสิ้น";
        echo "<script>alert('$message');</script>";
        echo "<script>window.location.href = 'listper.php';</script>";
    }else{
        echo "Error uploading files.";
    }
}else{
    echo "No files uploaded.";
}

// Close the database connection
$conn->close();
?>

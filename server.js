const express = require('express');
const cors = require('cors');
const mysql = require('mysql');
const multer = require('multer');
const path = require('path');
const fs = require('fs');
const app = express();
const port = 3000;

app.use(cors()); // เปิดใช้งาน CORS สำหรับทุกเส้นทางใน Express

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'project_portfolio',
});


db.connect((err) => {
  if (err) {
    console.error('Error connecting to database:', err);
    return;
  }
  console.log('MySQL Connected');
});

const storage = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, 'uploads/'); // กำหนดโฟลเดอร์ที่เก็บไฟล์
  },
  filename: function (req, file, cb) {
    cb(null, Date.now() + path.extname(file.originalname)); // กำหนดชื่อไฟล์ใหม่
  }
});

const storage2 = multer.diskStorage({
  destination: function (req, file, cb) {
    cb(null, 'uploads2/'); // กำหนดโฟลเดอร์ที่เก็บไฟล์
  },
  filename: function (req, file, cb) {
    cb(null, Date.now() + path.extname(file.originalname)); // กำหนดชื่อไฟล์ใหม่
  }
});

const upload = multer({ storage: storage }).single('per_profile');
const upload2 = multer({
  storage: storage2,
  limits: { files: 10 } // เพิ่มกำหนดการอัปโหลดไฟล์หลายรูป
}).array('per_img', 10);


// เส้นทางสำหรับเข้าถึงไฟล์รูปภาพที่อัปโหลด
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));
app.use('/uploads2', express.static(path.join(__dirname, 'uploads2')));

// API endpoint สำหรับรับข้อมูลและไฟล์รูปภาพ
app.post('/api/data', (req, res) => {
  upload(req, res, function (err) {
    if (err instanceof multer.MulterError) {
      console.error('Multer Error:', err);
      res.status(500).json({ error: 'Internal Server Error' });
      return;
    } else if (err) {
      console.error('Error uploading file:', err);
      res.status(500).json({ error: 'Internal Server Error' });
      return;
    }

    // อัปโหลดไฟล์สำเร็จ
    const { per_name, per_des, per_images_id } = req.body;
    const per_profile = req.file ? "uploads/"+req.file.filename : null; // ชื่อไฟล์ภาพที่อัปโหลด

    // เพิ่มข้อมูลลงในฐานข้อมูล
    const sql = 'INSERT INTO tbl_performance (per_name, per_des, per_profile, per_images_id) VALUES (?, ?, ?, ?)';
    db.query(sql, [per_name, per_des, per_profile, per_images_id], (err, result) => {
      if (err) {
        console.error('Error inserting data:', err);
        res.status(500).json({ error: 'Internal Server Error' });
        return;
      }
      res.status(200).json({ message: 'Data added successfully' }); // เพิ่มบรรทัดนี้
    });
  });
});




// สร้าง API endpoint สำหรับรับข้อมูล
app.get('/api/data', (req, res) => {
  const sql = 'SELECT * FROM tbl_performance';

  db.query(sql, (err, result) => {
    if (err) {
      console.error('Error querying database:', err);
      res.status(500).json({ error: 'Internal Server Error' });
      return;
    }
    res.json(result); // ส่งข้อมูลที่ได้จากฐานข้อมูลเป็น JSON กลับไปยังเว็บไซต์
  });
});


// API endpoint สำหรับดึงรูปภาพที่เกี่ยวข้องด้วย ID ของผลงาน
app.get('/api/images/:per_images_id', (req, res) => {
  const per_images_id = req.params.per_images_id;
  const sql = 'SELECT imgper_name FROM tbl_imgper WHERE img_per_id = ?';

  db.query(sql, [per_images_id], (err, result) => {
    if (err) {
      console.error('Error querying images:', err);
      res.status(500).json({ error: 'Internal Server Error' });
      return;
    }
    const imageNames = result.map(row => row.imgper_name);
    res.json(imageNames);
  });
});



// เริ่มต้น Express server ที่ port 3000
app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});

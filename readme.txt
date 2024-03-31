////////////RUN/////////////////
npm run dev





//////////////////////////////////////
const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3000;

const db = mysql.createConnection({
  host: 'localhost',
  user: 'root', 
  password: '', 
  database: 'project_portfolio' 
});

// เชื่อมต่อกับ MySQL
db.connect(err => {
  if (err) {
    throw err;
  }
  console.log('MySQL Connected');
});

// สร้าง API endpoint สำหรับรับข้อมูล
app.get('/api/data', (req, res) => {
  const sql = 'SELECT * FROM tbl_performance'; 

  db.query(sql, (err, result) => {
    if (err) throw err;
    res.json(result); // ส่งข้อมูลที่ได้จากฐานข้อมูลเป็น JSON กลับไปยังเว็บไซต์
  });
});

// เริ่มต้น Express server ที่ port 3000
app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});

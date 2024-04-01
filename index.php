<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="page/components/navbar.css">
    <link href="./output.css" rel="stylesheet">
    <title>Portfolio</title>
</head>
<body>
   <div class="container">
    <div class="slide" id="slide">
        <!-- ข้อมูลจะแสดงผลที่นี่ -->
    </div>
    <div class="button">
        <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
        <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
    </div>
   </div>

    <?php 
    // include("page/components/navbar.php") 
    ?>







   <script src="script.js"></script>
   <script>
        const $next = document.querySelector('.next');
        const $prev = document.querySelector('.prev');

        $next.addEventListener('click', () => {
            const items = document.querySelectorAll('.item');
            document.querySelector('.slide').appendChild(items[0]);
        });

        $prev.addEventListener('click', () => {
            const items = document.querySelectorAll('.item');
            document.querySelector('.slide').prepend(items[items.length - 1]);
        });


        // เพิ่ม setInterval เพื่อเรียกฟังก์ชัน slide เป็นระยะๆ
        setInterval(() => {
            const items = document.querySelectorAll('.item');
            document.querySelector('.slide').appendChild(items[0]);
        }, 6000);

   </script>
   
</body>
</html>

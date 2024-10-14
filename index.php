<?php
include"connect.php";
session_start();
if(!isset($_SESSION['user']) || $_SESSION['user'] == null){
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Trang chủ | Quản lý học sinh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="layout.css">
</head>

<body>
    <div class="container">
        <header class="row">
            <div id="brand" class="col-12 col-lg-7">
                <a href="#" class="navbar-brand">
                    <span id="brand_name">QUẢN LÝ HỌC SINH</span>
                </a>
            </div>
            <div id="horizontal_menu" class="col-12 col-lg-5 row">
                <a href="#" class="col-7">Tài khoản</a>
                <a href="logout.php" class="col-5">Đăng xuất</a>
            </div>
        </header>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <button class="btn btn-outline-primary m-auto navbar-toggler d-lg-none d-block" id="btn_menu"
                data-toggle="collapse" data-target="#nav_bar" aria-controls="nav_bar_box" aria-expanded="false"
                aria-label="Toggle navigation">
                Mục lục
            </button>
            <nav class="col-lg-2 navbar-collapse collapse expand-lg" id="nav_bar">
                <a href="#" class="nav_option current_item">Trang chủ</a>
                <div class="nav_group">
                    <p class="nav_group_name">Thêm</p>
                    <a href="createStudent.php" class="nav_option">Học sinh</a>
                    <a href="createClass.php" class="nav_option">Lớp học</a>
                    <a href="createSubject.php" class="nav_option">Môn học</a>
                </div>
                <div class="nav_group">
                    <p class="nav_group_name">Danh sách</p>
                    <a href="listStudents.php" class="nav_option">Học sinh</a>
                    <a href="listClasses.php" class="nav_option">Lớp học</a>
                    <a href="listSubjects.php" class="nav_option">Môn học</a>
                </div>
                <div class="nav_group">
                    <p class="nav_group_name">Bảng điểm</p>
                    <a href="createTranscript.php" class="nav_option">Cập nhật bảng điểm</a>
                    <a href="searchTranscript.php" class="nav_option">Tra cứu điểm</a>
                </div>
        
                
            </nav>
            <div class="col-lg-8 content">
                <!--    Content here -->
                <h2>Ứng dụng quản lý học sinh</h2>
                <!--    End of Content  -->
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <footer>
            <p>CNT62ĐH </p>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
</body>

</html>
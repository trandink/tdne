<?php
include "connect.php";
session_start();
$id_bangdiem = $_GET['id_bangdiem'];
//$id_lop = $_GET["id_lop"];
//$id_monhoc = $_GET['id_monhoc'];
//$hocky = $_GET['hocky'];
//$id_hocsinh = $_GET['id_hocsinh'];
$sql1 = "SELECT hocsinh.id_hocsinh, hocsinh.hoten, bangdiem.id_bangdiem FROM hocsinh INNER JOIN bangdiem ON hocsinh.id_lop = bangdiem.id_lop ";
$stmt1 = $conn->prepare($sql1);
$query1 = $stmt1->execute();

if(!empty($_POST["submit"])){
        if (isset($_POST["id_hocsinh"]) && isset($_POST["diem15phut"]) && isset($_POST["diem1tiet"]) && isset($_POST["diemcuoiky"]) && isset($_POST["id_bangdiem"])) {
            $id_hocsinh = $_POST["id_hocsinh"];
            $diem15phut = $_POST["diem15phut"];
            $diem1tiet = $_POST['diem1tiet'];
            $diemcuoiky = $_POST['diemcuoiky'];
            $id_bangdiem =$_POST['id_bangdiem'];
            $values = [];
        for ($i = 0; $i < count($id_hocsinh); $i++) {
            $values[] = "('" . $id_hocsinh[$i] . "', '" . $diem15phut[$i] . "', '" . $diem1tiet[$i] . "', '" . $diemcuoiky[$i] . "', '" . $id_bangdiem[$i] . "')";
        }
        $values = implode(", ", $values);

        $sql = "INSERT INTO chitietdiem(id_hocsinh, diem15phut, diem1tiet, diemcuoiky, id_bangdiem) VALUES $values";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();

        if ($query) {
            header("location:listTranscripts.php");
        } else {
            echo "Thêm lớp thất bại. Vui lòng thử lại!";
        }
        }
    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm bảng điểm | Quản lý học sinh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="layout.css">
</head>

<body>
    <div class="container">
        <header class="row">
            <div id="brand" class="col-12 col-lg-7">
                <a href="./index.php" class="navbar-brand">
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
                <a href="./index.php" class="nav_option">Trang chủ</a>
                <div class="nav_group">
                    <p class="nav_group_name">Thêm</p>
                    <a href="./createStudent.php" class="nav_option">Học sinh</a>
                    <a href="./createClass.php" class="nav_option">Lớp học</a>
                    <a href="./createSubject.php" class="nav_option">Môn học</a>
                    <a href="./createTranscript.php" class="nav_option">Bảng điểm</a>
                </div>
                <div class="nav_group">
                    <p class="nav_group_name">Danh sách</p>
                    <a href="./listStudents.php" class="nav_option">Học sinh</a>
                    <a href="./listClasses.php" class="nav_option">Lớp học</a>
                    <a href="./listSubjects.php" class="nav_option">Môn học</a>
                    <a href="./listTranscripts.php" class="nav_option">Bảng điểm</a>
                </div>
                <div class="nav_group">
                    <p class="nav_group_name">Khác</p>
                    <a href="./searchTranscript.php" class="nav_option">Tra cứu điểm</a>
                </div>
            </nav>
            <div class="col-lg-10 content">
                <!--    Content here -->
                <p class="page_title">Chi tiết bảng điểm</p>
                <!--<h5 class="d-flex justify-content-center">&nbsp;<span></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;<span></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    Học kỳ:&nbsp;<span></span>   -->
                </h5>
                <form action="" method="post">
                    <div class="table-responsive">
                        <table class="data_table table-striped table-bordered">
                            <thead>
                                <th>ID Học sinh</th>
                                <th>Họ tên</th>
                                <th>Điểm 15 phút</th>
                                <th>Điểm 1 tiết</th>
                                <th>Điểm cuối kỳ</th>
                                <th></th>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                if($query1){
                                    while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){     
                                    ?>
                                    <td><input name="id_hocsinh[]" class="form-control" readonly value="<?php echo $row["id_hocsinh"]?>"></td>
                                    <td><?php echo $row["hoten"]?></td>
                                    <td><input name="diem15phut[]" type="text" class="form-control" value=""></td>
                                    <td><input name="diem1tiet[]" type="text" class="form-control"value=""></td>
                                    <td><input name="diemcuoiky[]" type="text" class="form-control"value=""></td>
                                    <td><input name="id_bangdiem[]" type="hidden" class="form-control" readonly value="<?php echo $row["id_bangdiem"]?>"></td>
                                </tr>
                                <?php 
                                }
                            }
                        ?>
                                           
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <a class="btn btn-secondary" href="listTranscripts.php">Hủy</a>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <footer>
            <p>CNT62ĐH</p>
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
    <script src="custom.js"></script>
</body>

</html>
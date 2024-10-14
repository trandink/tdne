<?php
session_start();
include"connect.php";
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $sql = "SELECT username, password, type FROM account WHERE username = '$username'";
    $stmt = $conn->prepare($sql);
    $query = $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $userreal = $result['username'];
        $passreal = $result['password'];
        $type = $result['type'];
        if ($username == $userreal && $password == $passreal) {
            if($type == 1){
                $_SESSION['user'] = 'admin';
                header('Location: index.php');
                exit;
            }else{
                $_SESSION['user'] = 'user';
                header('Location: user.php');
                exit;
            }
        } else {
            $error = 'Tên đăng nhập hoặc mật khẩu không chính xác.';
        }
    }else{
        $error = 'Tên đăng nhập hoặc mật khẩu không chính xác.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .container{
            border: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .form_main{
            display: flex;
            flex-direction: column;
        }
        .button{
            border-radius: 5px;
            border: 1px solid grey;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form_main" action="login.php" method="post">
            <label for="user">Tên đăng nhập:</label><br>
            <input type="text" id="user" name="user" class="form-control"><br>
            <label for="password">Mật khẩu:</label><br>
            <input type="password" id="pass" name="pass" class="form-control"><br>
            <button class="btn btn-primary" type="submit">Đăng nhập</button>
        </form>
        <?php
        if ($error != '') {
            echo '<p style="color:red;">'.$error.'</p>';
        }
        ?>
    </div>

    
</body>
</html>

<?php
// Start the session
session_start();
    $conn = mysqli_connect('localhost', 'root','','toido');
    mysqli_set_charset($conn, 'UTF8');
    if(!$conn){
        die("Kết nối thất bại". mysqli_connect_error());
    }
    $sql2 = "select * from data";
    $s = mysqli_query($conn,$sql2);

    if(mysqli_num_rows($s)>0)
        {
            while($row = mysqli_fetch_assoc($s)){
                $depot[$row['userName']] = $row;
            }
        }
        if(isset($depot)){
        echo "<pre>";
        print_r($depot);
        echo "</pre>";}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src = "../../jquery-3.3.1.js">‪</script>
    <link rel="stylesheet" href = "‪../../../bootstrap/css/bootstrap.css"> 
    <link rel="stylesheet" href = "‪../../../bootstrap/css/bootstrap-theme.min.css"> 
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <title>Đăng ký</title>
    <link rel="stylesheet" href="login_css.css" /> 
<?php 
        if(isset($depot)){              // lấy key của phần tử cuối cùng
            end($depot);
            $last_Key = key($depot);
        }
        if(isset($_POST['dang-ky'])){
            if(isset($depot)){
                if(array_key_exists($_POST['userName'],$depot)==1){ // kiem tai khoan co ton tai 
                    $error4 = "Tài Khoản đã tồn tại";
                }
            }
            else {}
            if(!isset($error4)){
                $name = trim($_POST['name']);
                $userName = trim($_POST['userName']);
                $password = trim($_POST['password']);
                $sql = "insert into data(userName,password,name) values(n'$userName','$password',n'$name')";
                $sql2 = "create table $userName(
                        id int(10) NOT NULL primary key AUTO_INCREMENT,
                        task nvarchar(1000),
                        date date,
                        stt tinyint,
                        project nvarchar(255)
                    )";
                if(mysqli_query($conn, $sql)){}
                    else    
                    echo "insert fail"."<br>". mysqli_error($conn); 
                if(mysqli_query($conn, $sql2)){}
                    else    
                    echo "insert fail"."<br>". mysqli_error($conn);     
            }
            
        }
    ?>
</head>
<body>
    <div class = "container-fluid">
    <div id= "title-page" class = "row">
        <p>Đăng ký</p>
    </div>
    <div class = "row row2">
        <div class = "col-xs-4 col-md-4"></div>
        <div class = "col-xs-4 col-md-4 div-form">
           <div class="row form">
               <div class = "title-form col-md-12">
                   <p>Đăng ký</p>
               </div>
               <form method="POST">
               <input class = "form-control" type = "text" name = "name" placeholder="Full Name" required autofocus>
                <input class = "form-control" type = "text" name = "userName" placeholder="Username" required>
                <input class = "form-control" type = "password" name = "password" placeholder="Password" required >
                <?php 
                    if(isset($error4)){
                        echo "<p class= 'error'>".$error4."</p>";
                    }
                ?>
                <div id ="box-submit"><input type = "submit" name = "dang-ky" value = "Đăng ký"></div>
                </form>
                
           </div>
        </div>

        <div class = "col-xs-4 col-md-4"></div>
        
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src ="‪../../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
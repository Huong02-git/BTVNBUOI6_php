<?php
// Kết nối tới cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "LS_giaodich";

$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if (!$dbh)     
die("Unable to connect to MySQL: " . mysqli_error()); 
// Thông báo lỗi nếu kết nối thất bại 

if (!mysqli_select_db($dbh, 'deha'))     
die("Unable to select database: " . mysql_error()); 
// Thông báo lỗi nếu chọn CSDL thất bại

// Create table
$sql_stmt  = "CREATE TABLE IF NOT EXISTS `LSgiaodich` (
        `Id` int NOT NULL AUTO_INCREMENT,
      `Ngay_giao_dich` date NOT NULL,
      `Loai_giao_dich` varchar(20) NOT NULL,
      `So_tien` char(20) NOT NULL,
      `Mo_ta` varchar(100) NOT NULL,
      PRIMARY KEY (`Id`)
    )";
    
$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Table has been add in your data";
};

// Insert data
$sql_stmt = "INSERT INTO `lsgiaodich`(`Ngay_giao_dich`, `Loai_giao_dich`, `So_tien`, `Mo_ta`)"; 
$sql_stmt .= "VALUES('2023-07-05','Rut tien', '50','Rut tien ATM'),
                    ('2023-07-06','Rut tien', '20','Rut tien ATM'),
                    ('2023-08-07','Rut tien', '10','Rut tien ATM'),
                    ('2023-09-05','Rut tien', '40','Rut tien ATM'),
                    ('2023-09-09','Rut tien', '100','Rut tien ATM')"; 

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been add in your data";
};

//Update data
$sql_stmt = "UPDATE `lsgiaodich` SET `So_tien` = '1000'";
$sql_stmt .= "WHERE `Id` = '3'";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been update in your data";
};

//Delete data
$sql_stmt = "DELETE FROM `lsgiaodich` WHERE `Id` = '5'"; 
// Câu lệnh SQL Delete

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been delete in your data";
};
?>
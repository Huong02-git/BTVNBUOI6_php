<?php
$DB_TYPE = "mysql";
$DB_HOST = "localhost";
$DB_NAME = "LS_giaodich";
$USER_NAME = "root";
$USER_PASSWORD = "";

$conn = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER_NAME, $USER_PASSWORD);
// Connect to database


// Create table
$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `LSgiaodich` (
    `Id` int NOT NULL AUTO_INCREMENT,
  `Ngay_giao_dich` date NOT NULL,
  `Loai_giao_dich` varchar(20) NOT NULL,
  `So_tien` char(20) NOT NULL,
  `Mo_ta` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)

)');
$result=$stsm-> execute();
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Table has been add in your data";
};

// // Insert data
$stsm = $conn->prepare('INSERT INTO `lsgiaodich`(`Ngay_giao_dich`, `Loai_giao_dich`, `So_tien`, `Mo_ta`) 
VALUE (?, ?, ?, ?)');
$data = array('2023-07-05','Rut tien', '500','Rut tien ATM');

$result=$stsm-> execute($data);
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been add in your data";
}

//Update data
$stsm = $conn->prepare("UPDATE lsgiaodich SET So_tien = ?  WHERE Id=?");
$data = [1000,1];

$result=$stsm-> execute($data);
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been update in your data";
}

//Delete data
$stsm = $conn->prepare("DELETE FROM lsgiaodich WHERE Id=?");
$data = [5];

$result=$stsm-> execute($data);
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been delete in your data";
}
?>
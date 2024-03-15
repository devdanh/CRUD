<?php
// Thông tin kết nối MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Tạo kết nối
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Câu lệnh INSERT INTO
    $sql = "INSERT INTO users (id, email, password) VALUES (NULL, :email, :password)";
    
    // Chuẩn bị câu lệnh SQL
    $stmt = $conn->prepare($sql);
    
    // Gán giá trị cho các tham số
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    
    // Gán giá trị cho các biến
    $email = 'email';
    $password = 'password';
    
    // Thực thi câu lệnh SQL
    $stmt->execute();
    
    echo "Record created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;
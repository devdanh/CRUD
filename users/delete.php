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
    
    // Câu lệnh DELETE
    $sql = "DELETE FROM users WHERE id = :id";
    
    // Chuẩn bị câu lệnh SQL và ràng buộc giá trị
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':id', $id);
    
    // Đặt giá trị biến
    $id = 1;
    
    // Thực thi câu lệnh SQL
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Đóng kết nối
$conn = null;

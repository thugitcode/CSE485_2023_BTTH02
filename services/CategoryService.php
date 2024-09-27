<?php
include("configs\DBConnection.php");
include("models\CategoryModel.php");
class CategoryService{
    private static $conn = null;

    private static function getConnection() {
        if (self::$conn === null) {
            $dbConn = new DBConnection();
            self::$conn = $dbConn->getConnection();
        }
        return self::$conn;
    }
    public function getAllCategories(){
        // 4 bước thực hiện
        $conn = self::getConnection();

        // B2. Truy vấn
        $sql = "SELECT * FROM theloai order by ma_tloai desc";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $categories = [];
        while($row = $stmt->fetch()){
            $category = new Category($row['ma_tloai'], $row['ten_tloai']);
            $categories[] = $category;
        }
        // Mảng (danh sách) các đối tượng Category Model

        return $categories;
    }

    
    public function isCategoryExist($ten_tloai) {
        $conn = self::getConnection();

        $query = "SELECT COUNT(*) as count FROM theloai WHERE ten_tloai = :ten_tloai";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':ten_tloai', $ten_tloai);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'] > 0;
    }

    public function addCategory($ten_tloai) {
        $conn = self::getConnection();

        $sql = "INSERT INTO theloai(ten_tloai) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ten_tloai]);

        return $conn->lastInsertId();
    }
    
    //lấy tt thể loại theo mã
    public function getCategoryById($ma_tloai) {
        $conn = self::getConnection();
    
        $sql = "SELECT * FROM theloai WHERE ma_tloai = :ma_tloai";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_tloai', $ma_tloai);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return new Category($result['ma_tloai'], $result['ten_tloai']); // Trả về đối tượng Category
        }
        
        return null; // Trả về null nếu không tìm thấy
    }
    
    public function updateCategory($ma_tloai, $ten_tloai) {
        $conn = self::getConnection();

        $stmt = $conn->prepare("UPDATE theloai SET ten_tloai = ? WHERE ma_tloai = ?");
        $stmt->execute([$ten_tloai, $ma_tloai]);
    }

    public function deleteCategory($ma_tloai) {
        $conn = self::getConnection();

        $stmt = $conn->prepare("DELETE FROM theloai WHERE ma_tloai = ?");
        $stmt->execute([$ma_tloai]);
    }
}
<?php
include("configs/DBConnection.php");
include("models/ArticleModel.php");

class ArticleService {
    private $conn = null;

    // Get database connection
    private function getConnection() {
        if ($this->conn == null) {
            $dbConn = new DBConnection();
            $this->conn = $dbConn->getConnection();
        }
        return $this->conn;
    }

    // Get all articles
    public function getAllArticles() {
        $conn = $this->getConnection();
        
        $sql = "SELECT ma_bviet, tieude, ten_bhat, theloai.ten_tloai, tomtat, noidung, tacgia.ten_tgia, ngayviet
                FROM baiviet
                JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
                JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                ORDER BY ma_bviet DESC";
        
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article(
                $row['ma_bviet'],
                $row['tieude'],
                $row['ten_bhat'],
                $row['ten_tloai'],
                $row['tomtat'],
                $row['noidung'],
                $row['ten_tgia'],
                $row['ngayviet']
            );
            $articles[] = $article;
        }
        return $articles;
    }

    // Get an article by ID
    public function getArticleById($ma_bviet) {
        $conn = $this->getConnection();

        $sql = "SELECT * FROM baiviet WHERE ma_bviet = :ma_bviet";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_bviet', $ma_bviet);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result) {
            return new Article(
                $result['ma_bviet'], 
                $result['tieude'], 
                $result['ten_bhat'], 
                $result['ma_tloai'], 
                $result['tomtat'], 
                $result['noidung'], 
                $result['ma_tgia'], 
                $result['ngayviet']
            );
        }
        return null;
    }

    // Get all categories
    public function getAllCategories() {
        $conn = $this->getConnection();
        $sql = "SELECT ma_tloai, ten_tloai FROM theloai";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all authors
    public function getAllAuthors() {
        $conn = $this->getConnection();
        $sql = "SELECT ma_tgia, ten_tgia FROM tacgia";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update an article
    public function updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet) {
        $conn = $this->getConnection();
        
        $sql = "UPDATE baiviet 
                SET tieude = :tieude, ten_bhat = :ten_bhat, ma_tloai = :ma_tloai, tomtat = :tomtat, noidung = :noidung, ma_tgia = :ma_tgia, ngayviet = :ngayviet
                WHERE ma_bviet = :ma_bviet";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tieude', $tieude);
        $stmt->bindParam(':ten_bhat', $ten_bhat);
        $stmt->bindParam(':ma_tloai', $ma_tloai);
        $stmt->bindParam(':tomtat', $tomtat);
        $stmt->bindParam(':noidung', $noidung);
        $stmt->bindParam(':ma_tgia', $ma_tgia); // Đảm bảo ma_tgia được liên kết
        $stmt->bindParam(':ngayviet', $ngayviet);
        $stmt->bindParam(':ma_bviet', $ma_bviet);
        
        $stmt->execute();
    }

    // Create a new article
    public function createArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet) {
        $conn = $this->getConnection();
        
        $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet)
                VALUES (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :ma_tgia, :ngayviet)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':tieude', $tieude);
        $stmt->bindParam(':ten_bhat', $ten_bhat);
        $stmt->bindParam(':ma_tloai', $ma_tloai);
        $stmt->bindParam(':tomtat', $tomtat);
        $stmt->bindParam(':noidung', $noidung);
        $stmt->bindParam(':ma_tgia', $ma_tgia);
        $stmt->bindParam(':ngayviet', $ngayviet);
    
        $stmt->execute();
    }

    public function deleteArticle($ma_bviet) {
        $conn = $this->getConnection();
        
        $sql = "DELETE FROM baiviet WHERE ma_bviet = :ma_bviet";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ma_bviet', $ma_bviet);
        
        $stmt->execute();
    }
    
}
?>

<?php
include("services/ArticleService.php");

class ArticleController {
    private $articleService;

    public function __construct() {
        $this->articleService = new ArticleService();
    }

    // Display all articles
    public function index() {
        $articles = $this->articleService->getAllArticles();
        include 'views/article/index.php';
    }

    // Show a single article by ID
    public function show($ma_bviet) {
        $article = $this->articleService->getArticleById($ma_bviet);
        include 'views/article/show.php';
    }

    // Show form to create a new article
    public function create() {
        $categories = $this->articleService->getAllCategories();
        $authors = $this->articleService->getAllAuthors();
        include 'views/article/add_article.php';
    }

    // Store a new article
    public function store() {
        if (isset($_POST['tieude'], $_POST['ten_bhat'], $_POST['ma_tloai'], $_POST['tomtat'], $_POST['noidung'], $_POST['ma_tgia'], $_POST['ngayviet'])) {
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $ma_tloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $ma_tgia = $_POST['ma_tgia'];
            $ngayviet = $_POST['ngayviet'];
    
            // Gọi service để thêm bài viết mới
            $articleService = new ArticleService();
            $articleService->createArticle($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet);
    
            // Điều hướng về trang danh sách bài viết sau khi thêm
            header("Location: index.php?controller=Article&action=index");
        }
    }

    // Edit an article
    public function edit() {
        if (isset($_GET['ma_bviet'])) {
            $ma_bviet = $_GET['ma_bviet'];
            $article = $this->articleService->getArticleById($ma_bviet);
    
            if ($article) {
                $categories = $this->articleService->getAllCategories();
                $authors = $this->articleService->getAllAuthors(); // Fetch categories here
                include 'views/article/edit_article.php';
            } else {
                echo "Không tìm thấy bài viết!";
            }
        } else {
            echo "Mã bài viết không tồn tại!";
        }
    }
    
    // Update an article
    public function update() {
        if (isset($_POST['ma_bviet'])) {
            $ma_bviet = $_POST['ma_bviet'];
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $ma_tloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];
            $noidung = $_POST['noidung'];
            $ngayviet = $_POST['ngayviet'];
            $ma_tgia = $_POST['ma_tgia']; // Thêm biến ma_tgia
    
            // Gọi service để cập nhật bài viết
            $articleService = new ArticleService();
            $articleService->updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet);
    
            // Điều hướng về trang danh sách bài viết sau khi cập nhật
            header("Location: index.php?controller=Article&action=index");
        }
    }

    // Delete an article
    public function delete() {
        if (isset($_POST['ma_bviet'])) {
            $ma_bviet = $_POST['ma_bviet'];
            
            // Gọi service để xóa bài viết
            $this->articleService->deleteArticle($ma_bviet);
    
            // Điều hướng về trang danh sách bài viết sau khi xóa
            header("Location: index.php?controller=Article&action=index");
        } else {
            echo "Mã bài viết không tồn tại!";
        }
    }

}
?>

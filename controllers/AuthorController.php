<?php
include('services/AuthorService.php');

class AuthorController {
    
    public function index() {
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthors();        
        //render ra index của Author
        include 'views/author/index.php';
    }

    public function add(){
        $error = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $authorName = $_POST['ten_tgia']; 
            $authorService = new AuthorService();

            if ($authorService->isAuthorExist($authorName)) {
                $error = 'Thể loại đã tồn tại.';
            } else {
                $author = $authorService->addAuthor($authorName);

                header('Location: http://localhost:3000/index.php?controller=Author&action=index'); // Chuyển hướng về danh sách thể loại
                exit();
            }
        }

        include 'views/author/add_author.php'; // Hiển thị form thêm mới với thông báo lỗi
    }

    //gửi tt thể loại theo mã
    // Kiểm tra nếu mã thể loại đã được gửi qua URL
    public function edit() {
        if (isset($_GET['ma_tgia'])) {
            $ma_tgia = $_GET['ma_tgia'];

            $authorService = new AuthorService();
            // Lấy thông tin thể loại theo mã
            $author = $authorService->getAuthorById($ma_tgia);
            
            if ($author) {
            include 'views/author/edit_author.php'; // Bao gồm file form chỉnh sửa
            } else {
                echo "Không tìm thấy thể loại.";
            }
            } else {
                echo "Mã thể loại không hợp lệ.";
            }
        }
    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $authorService = new AuthorService();
            $authorService->updateAuthor($_POST['ma_tgia'], $_POST['ten_tgia']);

            header('Location: http://localhost:3000/index.php?controller=Author&action=index'); // Chuyển hướng về trang index sau khi cập nhật thành công
            exit();
        } else {
            include("views/author/update_author.php");
        }
    }

    public function delete(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $authorService = new AuthorService();
            $authorService->deleteAuthor($_POST['ma_tgia']);

            header('Location: http://localhost:3000/index.php?controller=Author&action=index'); // Chuyển hướng về trang index sau khi xóa thành công
            exit();
        } else {
            include("views/author/index.php");
        }
    }
    }
?>

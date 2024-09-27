<?php
include('services/CategoryService.php');

class CategoryController {
    
    public function index() {
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategories();        
        //render ra index của category
        include 'views/category/index.php';
    }

    public function add(){
        $error = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoryName = $_POST['ten_tloai']; 
            $categoryService = new CategoryService();

            if ($categoryService->isCategoryExist($categoryName)) {
                $error = 'Thể loại đã tồn tại.';
            } else {
                $category = $categoryService->addCategory($categoryName);

                header('Location: http://localhost:3000/index.php?controller=Category&action=index'); // Chuyển hướng về danh sách thể loại
                exit();
            }
        }

        include 'views/category/add_category.php'; // Hiển thị form thêm mới với thông báo lỗi (nếu có)
    }

    //gửi tt thể loại theo mã
    // Kiểm tra nếu mã thể loại đã được gửi qua URL
    public function edit() {
        if (isset($_GET['ma_tloai'])) {
            $ma_tloai = $_GET['ma_tloai'];

            $categoryService = new CategoryService();
            // Lấy thông tin thể loại theo mã
            $category = $categoryService->getCategoryById($ma_tloai);
            
            if ($category) {
            include 'views/category/edit_category.php'; // Bao gồm file form chỉnh sửa
            } else {
                echo "Không tìm thấy thể loại.";
            }
            } else {
                echo "Mã thể loại không hợp lệ.";
            }
        }
    public function update(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoryService = new CategoryService();
            $categoryService->updateCategory($_POST['ma_tloai'], $_POST['ten_tloai']);

            header('Location: http://localhost:3000/index.php?controller=Category&action=index'); // Chuyển hướng về trang index sau khi cập nhật thành công
            exit();
        } else {
            include("views/category/update_category.php");
        }
    }

    public function delete(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoryService = new CategoryService();
            $categoryService->deleteCategory($_POST['ma_tloai']);

            header('Location: http://localhost:3000/index.php?controller=Category&action=index'); // Chuyển hướng về trang index sau khi xóa thành công
            exit();
        } else {
            include("views/category/index.php");
        }
    }
    }
?>

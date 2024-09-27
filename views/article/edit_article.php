<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
</head>
<body>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Chỉnh sửa bài viết</h3>
                <form action="http://localhost:3000/index.php?controller=Article&action=update" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Mã bài viết</span>
                        <input type="text" class="form-control" name="ma_bviet" value="<?php echo htmlspecialchars($article->getMaBaiViet()); ?>" readonly>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" value="<?php echo htmlspecialchars($article->getTieuDe()); ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" value="<?php echo htmlspecialchars($article->getTenBaiHat()); ?>">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Thể loại</span>
                        <select class="form-select" name="ma_tloai" required>
                        <?php 
                            // Kiểm tra xem biến $categories có dữ liệu không
                            if (!empty($categories)) {
                                foreach ($categories as $row) {
                                    $selected = ($row['ma_tloai'] == $article->getMaTheLoai()) ? 'selected' : '';
                                    echo '<option value="' . htmlspecialchars($row['ma_tloai']) . '" ' . $selected . '>' . htmlspecialchars($row['ten_tloai']) . '</option>';
                                }
                            } else {
                                echo '<option value="">Không có thể loại nào</option>';
                            }
                        ?> 
                    </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tóm tắt</span>
                        <input type="text" class="form-control" name="tomtat" value="<?php echo htmlspecialchars($article->getTomTat()); ?>" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Nội dung</span>
                        <input type="text" class="form-control" name="noidung" value="<?php echo htmlspecialchars($article->getNoiDung()); ?>" required>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tác giả</span>
                        <select class="form-select" name="ma_tgia" required>
                        <?php 
                            // Kiểm tra xem biến $authors có dữ liệu không
                            if (!empty($authors)) {
                                foreach ($authors as $row) {
                                    $selected = ($row['ma_tgia'] == $article->getMaTacGia()) ? 'selected' : '';
                                    echo '<option value="' . htmlspecialchars($row['ma_tgia']) . '" ' . $selected . '>' . htmlspecialchars($row['ten_tgia']) . '</option>';
                                }
                            } else {
                                echo '<option value="">Không có tác giả nào</option>';
                            }
                        ?> 
                    </select>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Ngày viết</span>
                        <input type="date" class="form-control" name="ngayviet" value="<?php echo htmlspecialchars($article->getNgayViet()); ?>" required>
                    </div>
                    <div class="form-group float-end">
                        <button name="btnEdit" class="btn btn-primary"><i class="fas fa-save"></i> Lưu</button>
                        <a href="http://localhost:3000/index.php?controller=Article&action=index" class="btn btn-warning">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

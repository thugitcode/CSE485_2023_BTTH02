<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="../home.php">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="http://localhost:3000/index.php?controller=Admin&action=index">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:3000/index.php?controller=home&action=index">Trang ngoài</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:3000/index.php?controller=Category&action=index">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="http://localhost:3000/index.php?controller=Author&action=index">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost:3000/index.php?controller=Article&action=index">Bài viết</a>
                        </li>
                </ul>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="views\author\add_author.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã tác giả</th>
                            <th scope="col">Tên tác giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        <tbody>
                        <?php if (!empty($authors)): ?>
                            <?php foreach ($authors as $author): ?>
                                <tr>
                                    <th scope="row"><?= $author->get_matgia(); ?></th>
                                    <td><?= $author->get_ten_tgia(); ?></td>
                                    <td>
                                        <a href="http://localhost:3000/index.php?controller=Author&action=edit&ma_tgia=<?= $author->get_matgia(); ?>"><i class='fas fa-edit'></i></a>
                                    </td>

                                    <td>
                                    <form action="http://localhost:3000/index.php?controller=Author&action=delete" method="post" style="display:inline;">
                                        <input type="hidden" name="ma_tgia" value="<?= $author->get_matgia(); ?>">
                                        <button type="submit" class="btn btn-link" onclick="return confirm('Bạn có chắc chắn muốn xóa thể loại này không?');">
                                            <i class='fas fa-trash'></i>
                                        </button>
                                    </form>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
        <tr>
            <td colspan="4" class="text-center">Không có thể loại nào được tìm thấy.</td>
        </tr>
    <?php endif; ?>
</tbody>

            </table>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

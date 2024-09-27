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
                    <a class="navbar-brand">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" >Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" >Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active fw-bold" href="index.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="add_article.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Ngày viết</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td scope="row"><?php echo $article->getMaBaiViet(); ?></td>
                            <td><?php echo $article->getTieuDe(); ?></td>
                            <td><?php echo $article->getTenBaiHat(); ?></td>
                            <td><?php echo $article->getMaTheLoai(); ?></td>
                            <td><?php echo $article->getTomTat(); ?></td>
                            <td><?php echo $article->getMaTacGia(); ?></td>
                            <td><?php echo $article->getNgayViet(); ?></td>
                            <td><a href="http://localhost:3000/index.php?controller=Article&action=edit&ma_bviet=<?php echo $article->getMaBaiViet(); ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td>
                                <form action="http://localhost:3000/index.php?controller=Article&action=delete" method="post" style="display:inline;">
                                    <input type="hidden" name="ma_bviet" value="<?= $category->getMaBaiViet(); ?>">
                                    <button type="submit" class="btn btn-link" onclick="return confirm('Bạn có chắc chắn muốn xóa bai viet này không?');">
                                        <i class='fas fa-trash'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                        <tr>
                            <th scope="row">1</th>
                            <td>Cây và gió</td>
                            <td>Cây và gió</td>
                            <td>Nhạc trữ tình</td>
                            <td>Em và anh, hai đứa quen nhau thật tình cờ. Lời hát của anh từ bài hát “Cây và gió” đã làm tâm hồn em xao động. Nhưng sự thật phũ phàng rằng em chưa bao giờ nói cho anh biết những suy nghĩ tận sâu trong tim mình. Bởi vì em nhút nhát, em không dám đối mặt với thực tế khắc nghiệt, hay thực ra em không dám đối diện với chính mình.</td>
                            <td>Nguyễn Văn Giả</td>
                            <td>05/12/2013</td>
                            <td>
                                <a href="edit_article.php"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="delete_article.php"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
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

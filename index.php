<?php

// B1: Bắt giá trị controller và action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// B2: Chuẩn hóa tên trước khi gọi
$controller = ucfirst(strtolower($controller)); // Đảm bảo tên controller là chữ hoa chữ thường
$controllerClassName = $controller . 'Controller';
$controllerPath = 'controllers/' . $controllerClassName . '.php';

// B3: Kiểm tra và gọi Controller
if (file_exists($controllerPath)) {
    require_once($controllerPath);

    // Tạo đối tượng Controller tương ứng
    if (class_exists($controllerClassName)) {
        $controllerInstance = new $controllerClassName();

        // Kiểm tra action và gọi phương thức tương ứng
        if (method_exists($controllerInstance, $action)) {
            $controllerInstance->$action();
        } else {
            // Thông báo khi action không tồn tại
            header("HTTP/1.0 404 Not Found");
            echo "Action không tồn tại.";
        }
    } else {
        // Thông báo khi controller không tồn tại
        header("HTTP/1.0 404 Not Found");
        echo "Controller không tồn tại.";
    }
} else {
    // Thông báo khi file controller không tồn tại
    header("HTTP/1.0 404 Not Found");
    echo "Controller không tồn tại.";
}

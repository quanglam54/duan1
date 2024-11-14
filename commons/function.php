<?php
// Kết nối CSDL qua PDO
function connectDB()
{
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
// THêm file ảnh
function uploadFile($file, $folderUpload)
{
    $pathStorage = $folderUpload . time() . $file['name'];
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return time() . $file['name']; // chỉ lưu tên ảnh vào db
    }
    return null;
}

function uploadFileAlbum($file, $folderUpload, $key)
{
    $pathStorage = $folderUpload . time() . $file['name'][$key];

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $pathStorage;

    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }
    return null;
}

// Xóa session sau khi load trang
function deleteSession()
{
    if (isset($_SESSION['flash'])) {
        unset($_SESSION['errors']);
        unset($_SESSION['old_data']);
    }
}
function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unset($pathDelete);
    }
}

function checkLoginAdmin(){
    if(!isset($_SESSION['user_admin'])){
        require_once './views/auth/formLogin.php';
        exit();
    }
}

function formatDate($date){
    echo $newDate = date("d-m-Y",strtotime($date));
}
function formatPrice($price){
    return number_format($price, 0, ',', '.');
}
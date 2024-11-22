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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
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

function checkLoginAdmin()
{
    if (!isset($_SESSION['user_admin'])) {
        require_once './views/auth/formLogin.php';
        exit();
    }
}

function formatDate($date)
{
    echo $newDate = date("d-m-Y", strtotime($date));
}
function formatPrice($price)
{
    return number_format($price, 0, ',', '.');
}

function sendMailer($email, $subject, $content)
{

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Hoặc smtp.hostinger.com
        $mail->SMTPAuth = true;
        $mail->Username = 'quanglam5401@gmail.com'; // Tên đăng nhập
        $mail->Password = 'qelg vtbw imsw gbdg'; // Mật khẩu ứng dụng hoặc mật khẩu chính
        $mail->SMTPSecure = 'ssl';// Sử dụng STARTTLS
        $mail->Port = 465;  // Cổng SMTP cho Gmail hoặc 465 cho Hostinger

        $mail->setFrom('quanglam5401@gmail.com', 'quang lam');
        $mail->addAddress($email, 'lammm');
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $content;

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    ;
}
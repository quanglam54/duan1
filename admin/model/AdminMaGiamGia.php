<?php
class AdminMaGiamGia
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }  

    public function getAllMaGIamGia()
    {
        try {
            $sql = "SELECT * FROM ma_giam_gias";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function insertMaGiamGia( $ma_giam_gia, $muc_giam_gia, $bat_dau, $ket_thuc)
    {
        try {
            $sql = "INSERT INTO ma_giam_gias(ma_giam_gia, muc_giam_gia, bat_dau, ket_thuc) VALUES (:ma_giam_gia, :muc_giam_gia, :bat_dau, :ket_thuc)";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma_giam_gia' => $ma_giam_gia,
                ':muc_giam_gia' => $muc_giam_gia,
                ':bat_dau' => $bat_dau,
                ':ket_thuc' => $ket_thuc
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function destroyMaGIamGia($id)
    {
        try {
            $sql = "DELETE FROM ma_giam_gias WHERE id = :id ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getDetailMaGiamGia($id)
    {
        try {
            $sql = "SELECT* FROM ma_giam_gias WHERE id = :id ";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function editMaGiamGia($id, $ma_giam_gia, $muc_giam_gia, $bat_dau, $ket_thuc)
    {
        try {
            $sql = "UPDATE ma_giam_gias SET ma_giam_gia=:ma_giam_gia, muc_giam_gia = :muc_giam_gia, bat_dau = :bat_dau, ket_thuc = :ket_thuc WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma_giam_gia' => $ma_giam_gia,
                ':muc_giam_gia' => $muc_giam_gia,
                ':bat_dau' => $bat_dau,
                ':ket_thuc' => $ket_thuc,
                ':id' => $id

            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}

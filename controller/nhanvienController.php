<?php
require_once 'model/nhanvien.php';
class nhanvienController {

    public function index() {
       
        $nhanvien = new nhanvien();
        $nhanviens = $nhanvien->index();

        require_once 'view/nhanvien/index.php';
    }

    public function add() {
        $error = '';

        if (isset($_POST['submit'])) {
            $manv = $_POST['manv'];

            if (empty($cot1)) {
                $error = "Mã nhân viên không được để trống";
            }
            else {
  
                $nhanvien = new nhanvien();

                $nhanvienArr = [
                    'manv' => $manv,
                    'hovaten' => $hovaten,  
                    'chucvu' => $chucvu,
                    'phongban' => $phongban,
                    'luong' => $luong,
                    'ngayvaolam' => $ngayvaolam,
                ];
                $isInsert = $nhanvien->insert($nhanvienArr);
                if ($isInsert) {
                    $_SESSION['success'] = "Thêm mới thành công";
                }
                else {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
                header("Location: index.php?controller=nhanvien&action=index");
                exit();
            }
        }
      
        require_once 'view/nhanvien/add.php';
    }

    public function update() {
   
        if (!isset($_GET['manv'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=nhanvien&action=index");
            return;
        }
        
        $manv = $_GET['manv'];
        
        $nhanvien = new nhanvien();
        $nhanvien = $nhanvien->getBookById($manv);

        
        $error = '';
        if (isset($_POST['submit'])) {
            $manv = $_POST['manv'];

            if (empty($manv)) {
                $error = "Mã nhân viên không được để trống";
            }
            else {
              
                $nhanvien = new nhanvien();
                $nhanvienArr = [
                    'manv' => $manv,
                    'hovaten' => $hovaten,
                    'chucvu' => $chucvu,
                    'phongban' => $phongban,
                    'luong' => $luong,
                    'ngayvaolam' => $ngayvaolam,
                ];
                $isUpdate = $nhanvien->update($nhanvienArr);
                if ($isUpdate) {
                    $_SESSION['success'] = "Update bản ghi #$manv thành công";
                }
                else {
                    $_SESSION['error'] = "Update bản ghi #$manv thất bại";
                }
                header("Location: index.php?controller=nhanvien&action=index");
                exit();
            }
        }
        
        require_once 'view/nhanvien/update.php';
    }

    public function delete() {

        $manv = $_GET['manv'];
        
        $nhanvien = new nhanvien();
        $isDelete = $nhanvien->delete($manv);

        if ($isDelete) {    
            $_SESSION['success'] = "Xóa bản ghi #$manv thành công";
        }
        else {
            $_SESSION['error'] = "Xóa bản ghi #$manv thất bại";
        }

        exit();
    }
}
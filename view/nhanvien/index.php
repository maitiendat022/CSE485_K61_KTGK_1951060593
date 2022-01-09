<?php
    require_once 'view/commons/message.php';
?>

<button>
    <a href="index.php?controller=nhanvien&action=add">
        Thêm
    </a>
</button>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Mã Nv</th>
        <th>Họ và tên</th>
        <th>Chức vụ</th>
        <th>Phòng ban</th>
        <th>Lương</th>
        <th>Ngày vào làm</th>
    </tr>
    <?php if (!empty($nhanvien)): ?>
        <?php foreach ($nhanviens AS $nhanvien) : ?>
            <tr>
                <td><?php echo $nhanvien['manv'] ?></td>
                <td><?php echo $nhanvien['hovaten'] ?></td>
                <td><?php echo $nhanvien['chucvu'] ?></td>
                <td><?php echo $nhanvien['phongban'] ?></td>
                <td><?php echo $nhanvien['luong'] ?></td>
                <td><?php echo $nhanvien['ngayvaolam'] ?></td>
                <td>
                    <?php
                    
                    $urlUpdate =
                        "index.php?controller=nhanvienien&action=update&manv=" . $nhanvien['manv'];
                    $urlDelete =
                        "index.php?controller=nhanvien&action=delete&manv=" . $nhanvien['manv'];
                    ?>
                    
                    <a href="<?php echo $urlUpdate?>">Sửa</a> &nbsp;
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')"
                       href="<?php echo $urlDelete?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="2">KHông có dữ liệu</td>
        </tr>
    <?php endif; ?>
</table>
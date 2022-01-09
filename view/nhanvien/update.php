<div style="color: red">
    <?php echo $error; ?>
</div>
<form action="" method="post">
    Mã nhân viên
    <input type="text"
           name="manv"
           value="<?php
           echo isset($_POST['name']) ? $_POST['name'] : $book['name']?>"
    />
    <br />
    <input type="submit" name="submit" value="Update" />
</form>
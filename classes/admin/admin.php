<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
class admin
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function change_password($oldpass, $newpass)
    {
        $oldpass = $this->fm->validation($oldpass);
        $newpass = $this->fm->validation($newpass);
        $oldpass = mysqli_real_escape_string($this->db->link, $oldpass);
        $newpass = mysqli_real_escape_string($this->db->link, $newpass);
        $id = Session::get('adminID');
        // Khởi tạo biến query để kiểm tra mật khẩu.
        $query = "SELECT * FROM quanly WHERE adminID='$id'AND adminPass='$oldpass' LIMIT 1";
        $result = $this->db->select($query);
        if ($result) {
            // Mật khẩu cũ khớp with and is correct
            // Tạo câu lệnh SQL để cập nhật mật khẩu mới
            $query = "UPDATE quanly  SET adminPass = '$newpass' WHERE adminID='$id' LIMIT 1";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $alert = "<span class='success'>Password updated successfully!</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Password not updated!</span>";
                return  $alert;
            }
        } else {
            // Mật khẩu cũ không khớp or is incorrect.
            $alert = "<span class='error'>Old password is incorrect!</span>";
            return  $alert;
        }
    }
}
?>
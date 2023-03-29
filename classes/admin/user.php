<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
class user
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_user()
    {
        $query = "SELECT * FROM khachhang ORDER BY MaKH DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_user($status, $id)
    {
        $query = "UPDATE khachhang  SET TrangThai = '$status' WHERE MaKH='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> Thay đổi trạng thái khách hàng thành công </span>";
            return  $alert;
        } else {
            $alert = "<span class='error'>  Thay đổi trạng thái khách hàng thất bại </span>";
            return  $alert;
        }
        return $result;
    }
    public function getuserbyId($id)
    {
        $query = "SELECT * FROM khachhang WHERE MaKH='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
class bill
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function show_bill()
    {
        $query = "SELECT * FROM dondathang ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_bill($status, $id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE dondathang  SET TinhTrang = '$status' WHERE id='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> Thay đổi danh mục thành công </span>";
            return  $alert;
        } else {
            $alert = "<span class='error'>  Thay đổi tên danh mục thất bại </span>";
            return  $alert;
        }
        return $result;
    }
    public function getbillbyId($id)
    {
        $query = "SELECT * FROM dondathang WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_bill_oderby_user($id)
    {
        $query = "SELECT * FROM dondathang WHERE MaKH='$id' ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
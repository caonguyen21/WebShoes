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
    public function update_bill($brandName, $id)
    {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($brandName)) {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "UPDATE thuonghieu  SET TenThuongHieu = '$brandName' WHERE MaThuongHieu='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'> Thay đổi danh mục thành công </span>";
                return  $alert;
            } else {
                $alert = "<span class='error'>  Thay đổi tên danh mục thất bại </span>";
                return  $alert;
            }
        }
        $query = "SELECT * FROM thuonghieu WHERE MaThuongHieu='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
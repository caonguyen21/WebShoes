<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandName)
    {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        if (empty($brandName)) {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "INSERT INTO thuonghieu (TenThuongHieu) VALUES ('$brandName')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'> Thêm dữ liệu thành công </span>";
                return  $alert;
            } else {
                $alert = "<span class='error'> Thêm dữ liệu thất bại </span>";
                return  $alert;
            }
        }
    }

    public function show_brand()
    {
        $query = "SELECT * FROM thuonghieu ORDER BY MaThuongHieu DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getbrandbyId($id)
    {
        $query = "SELECT * FROM thuonghieu WHERE MaThuongHieu='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand($brandName, $id)
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
<?php
include '../lib/database.php';
include '../helpers/format.php';
?>
<?php
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if (empty($catName)) {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "INSERT INTO loaigiay (TenLoai) VALUES ('$catName')";
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

    public function show_category()
    {
        $query = "SELECT * FROM loaigiay ORDER BY MaLoai DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getcatbyId($id)
    {
        $query = "SELECT * FROM loaigiay WHERE MaLoai='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_category($catName, $status, $id)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($catName)) {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            $query = "UPDATE loaigiay  SET TenLoai = '$catName' , TrangThai='$status' WHERE MaLoai='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'> Thay đổi danh mục thành công </span>";
                return  $alert;
            } else {
                $alert = "<span class='error'>  Thay đổi tên danh mục thất bại </span>";
                return  $alert;
            }
        }
        $query = "SELECT * FROM loaigiay WHERE MaLoai='$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
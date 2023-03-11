<?php
include_once '../lib/database.php';
include_once '../helpers/format.php';
?>
<?php
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data,$files)
    {
        $TenGiay = mysqli_real_escape_string($this->db->link, $data['TenGiay']);
        $loaigiay = mysqli_real_escape_string($this->db->link, $data['loaigiay']);
        $thuonghieu = mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
        $GiaBan = mysqli_real_escape_string($this->db->link, $data['GiaBan']);
        //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['AnhBia']['name'];
        $file_size = $_FILES['AnhBia']['size'];
        $file_temp = $_FILES['AnhBia']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0.10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if ($TenGiay=="" ||$loaigiay=="" ||$thuonghieu=="" ||$GiaBan=="" || $file_name=="") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(TenGiay,MaLoai,MaThuongHieu,GiaBan,AnhBia) VALUES ('$TenGiay','$loaigiay','$thuonghieu','$GiaBan','$unique_image')";
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

    // public function show_category()
    // {
    //     $query = "SELECT * FROM loaigiay ORDER BY MaLoai DESC";
    //     $result = $this->db->select($query);
    //     return $result;
    // }
    // public function getcatbyId($id)
    // {
    //     $query = "SELECT * FROM loaigiay WHERE MaLoai='$id'";
    //     $result = $this->db->select($query);
    //     return $result;
    // }
    // public function update_category($catName, $status, $id)
    // {
    //     $catName = $this->fm->validation($catName);
    //     $catName = mysqli_real_escape_string($this->db->link, $catName);
    //     $id = mysqli_real_escape_string($this->db->link, $id);
    //     if (empty($catName)) {
    //         $alert = "<span class='error'> Không được bỏ trống </span>";
    //         return $alert;
    //     } else {
    //         $query = "UPDATE loaigiay  SET TenLoai = '$catName' , TrangThai='$status' WHERE MaLoai='$id'";
    //         $result = $this->db->update($query);
    //         if ($result) {
    //             $alert = "<span class='success'> Thay đổi danh mục thành công </span>";
    //             return  $alert;
    //         } else {
    //             $alert = "<span class='error'>  Thay đổi tên danh mục thất bại </span>";
    //             return  $alert;
    //         }
    //     }
    //     $query = "SELECT * FROM loaigiay WHERE MaLoai='$id'";
    //     $result = $this->db->select($query);
    //     return $result;
    // }
}
?>
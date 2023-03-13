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
    public function insert_product($data, $files)
    {
        $TenGiay = mysqli_real_escape_string($this->db->link, $data['TenGiay']);
        $loaigiay = mysqli_real_escape_string($this->db->link, $data['loaigiay']);
        $thuonghieu = mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
        $nhacungcap = mysqli_real_escape_string($this->db->link, $data['nhacungcap']);
        $GiaBan = mysqli_real_escape_string($this->db->link, $data['GiaBan']);
        $Size = mysqli_real_escape_string($this->db->link, $data['Size']);
        $BaoHanh = mysqli_real_escape_string($this->db->link, $data['BaoHanh']);
        $SL = mysqli_real_escape_string($this->db->link, $data['SL']);
        $date = date('Y-m-d');
        //Kiem tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['AnhBia']['name'];
        $file_size = $_FILES['AnhBia']['size'];
        $file_temp = $_FILES['AnhBia']['tmp_name'];
        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0.10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($TenGiay == "" || $loaigiay == "" || $thuonghieu == "" || $nhacungcap == "" || $GiaBan == "" || $Size == "" || $BaoHanh == "" || $GiaBan == "" || $SL == "" || $file_name == "" || $Size == "") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO sanpham(TenGiay,MaLoai,MaThuongHieu,MaNCC,GiaBan,AnhBia,Size,ThoiGianBaoHanh,NgayCapNhat,SoLuongTon) VALUES ('$TenGiay','$loaigiay','$thuonghieu','$nhacungcap','$GiaBan','$unique_image','$Size','$BaoHanh','$date','$SL')";
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

    public function show_product()
    {
        $query = "SELECT sanpham.* , loaigiay.TenLoai , thuonghieu.TenThuongHieu , nhacungcap.TenNCC
        FROM sanpham 
        INNER JOIN loaigiay ON sanpham.MaLoai = loaigiay.MaLoai 
        INNER JOIN thuonghieu ON sanpham.MaThuongHieu = thuonghieu.MaThuongHieu
        INNER JOIN nhacungcap ON sanpham.MaNCC = nhacungcap.MaNCC
        ORDER BY sanpham.MaGiay DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getproductbyId($id)
    {
        $query = "SELECT * FROM sanpham WHERE MaGiay='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_product($data, $status, $files, $id)
    {
        $TenGiay = mysqli_real_escape_string($this->db->link, $data['TenGiay']);
        $loaigiay = mysqli_real_escape_string($this->db->link, $data['loaigiay']);
        $thuonghieu = mysqli_real_escape_string($this->db->link, $data['thuonghieu']);
        $nhacungcap = mysqli_real_escape_string($this->db->link, $data['nhacungcap']);
        $GiaBan = mysqli_real_escape_string($this->db->link, $data['GiaBan']);
        $Size = mysqli_real_escape_string($this->db->link, $data['Size']);
        $BaoHanh = mysqli_real_escape_string($this->db->link, $data['BaoHanh']);
        $SL = mysqli_real_escape_string($this->db->link, $data['SL']);
        $date = date('Y-m-d');
        //Kiem tra hình ảnh và lấy hình ảnh cho vào folder uploads
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['AnhBia']['name'];
        $file_size = $_FILES['AnhBia']['size'];
        $file_temp = $_FILES['AnhBia']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0.10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($TenGiay == "" || $loaigiay == "" || $thuonghieu == "" || $nhacungcap == "" || $GiaBan == "" || $Size == "" || $BaoHanh == "" || $GiaBan == "" || $SL == ""  || $Size == "") {
            $alert = "<span class='error'> Không được bỏ trống </span>";
            return $alert;
        } else {
            if (!empty($file_name)) {
                if (in_array($file_ext, $permited) === false) {
                    $alert = " <span class='error'>Bạn chỉ có thể upload:-" . implode(',', $permited) . "</span>";
                    return $alert;
                } else {
                    if ($file_size > 307200) {
                        $alert = "<span class='error'>Hình ảnh chỉ nên dưới 3mb </span>";
                        return $alert;
                    } else {
                        //Hàm để xóa ảnh cũ
                        $delname = "SELECT AnhBia FROM sanpham WHERE MaGiay='$id'";
                        $delta = $this->db->select($delname);
                        $string = "";
                        while ($rowData = $delta->fetch_assoc()) {
                            $string .= $rowData['AnhBia'];
                        }
                        $delLink = "uploads/" . $string;
                        unlink($delLink);
                        // hàm sql update dữ liệu có img
                        $query = "UPDATE sanpham  SET 
                        TenGiay = '$TenGiay' , 
                        MaLoai = '$loaigiay' , 
                        MaThuongHieu = '$thuonghieu' , 
                        MaNCC = '$nhacungcap' , 
                        GiaBan = '$GiaBan' , 
                        AnhBia = '$unique_image' , 
                        Size = '$Size' , 
                        ThoiGianBaoHanh = '$BaoHanh' , 
                        NgayCapNhat = '$date' , 
                        SoLuongTon = '$SL' , 
                        TrangThai='$status' 
                        WHERE MaGiay='$id'";
                    }
                }
            } else {
                // hàm sql update dữ liệu không có img
                $query = "UPDATE sanpham  SET 
                TenGiay = '$TenGiay' , 
                MaLoai = '$loaigiay' , 
                MaThuongHieu = '$thuonghieu' , 
                MaNCC = '$nhacungcap' , 
                GiaBan = '$GiaBan' , 
                Size = '$Size' , 
                ThoiGianBaoHanh = '$BaoHanh' , 
                NgayCapNhat = '$date' , 
                SoLuongTon = '$SL' , 
                TrangThai='$status' 
                WHERE MaGiay='$id'";
            }
        }
        move_uploaded_file($file_temp, $uploaded_image);
        $result = $this->db->update($query);
        if ($result) {
            $alert = "<span class='success'> Cập nhật dữ liệu sản phẩm  thành công </span>";
            return  $alert;
        } else {
            $alert = "<span class='error'> Cập nhật dữ liệu sản phẩm thất bại </span>";
            return  $alert;
        }
    }
}
?>
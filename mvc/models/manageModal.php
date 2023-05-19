<?php
class manageModal extends db{
    private function _query($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    
    public function deleteProductManage($id){
        $typesql = "DELETE FROM mon WHERE id_mon=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }

    public function checkProductManage($id){
        $typesql = "UPDATE mon 
                    SET trangthai= CASE
                    WHEN trangthai = '1' THEN '0'
                    WHEN trangthai = '0' THEN '1'
                    END
                    WHERE id_mon = ".$id.";";
        $query1 = $this->_query($typesql);
        return $id;
    }
    public function editProductManage($id,$name,$type,$priceS,$priceM,$priceL,$priceN,$quantity,$detail,$rating){
        if($id != -1){
        $typesql1 = "UPDATE mon
                    SET ten_mon='".$name."', Loai='".$type."', Soluong=".$quantity.", Mota='".$detail."', hinhanh='".$rating."'
                    WHERE id_mon=".$id.";";
        $query1 = $this->_query($typesql1);

        $typesql2 = "UPDATE ct_mon_size 
                    SET gia = CASE id_size
                    WHEN 'S' THEN '".$priceS."'
                    WHEN 'M' THEN '".$priceM."'
                    WHEN 'L' THEN '".$priceL."'
                    WHEN 'N' THEN '".$priceN."'
                    END
                    WHERE id_mon = '".$id."' AND id_size IN ('S', 'M', 'L', 'N');";
        $query1 = $this->_query($typesql2);
        }else{
            $typesql1 = "insert into mon (ten_mon, Loai, trangthai, Soluong, Mota, hinhanh)
            values ('".$name."', '".$type."', ".$priceS.", ".$quantity.", '".$detail."', '".$rating."');";
            $query1 = $this->_query($typesql1);
        }
        return $id;
    }
    public function getProductManagePaging($page){
        $skip = (intval($page) - 1) * 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
        }
        
        $typesql = "SELECT * FROM mon join ct_mon_size as ct_m_s ON mon.id_mon = ct_m_s.id_mon 
        GROUP BY mon.id_mon LIMIT ".$skip.", 5;";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    } 
    public function getProductUserPaging($page){
        $skip = (intval($page) - 1) * 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
        }
        
        $typesql = "SELECT * FROM taikhoan LIMIT ".$skip.", 5;";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    }
    public function deleteUserManage($id1){
        $typesql = "DELETE FROM taikhoan WHERE id_taikhoan='".$id1."'";
        $query1 = $this->_query($typesql);
        return $query1;
    }
    public function editUserManage($id1,$Name,$Password,$Email,$Phone,$Address,$Avatar){
        if($id1 != -1){
            $typesql1 = "UPDATE taikhoan
                         SET ten='".$Name."', password='".$Password."', email='".$Email."', sdt='".$Phone."', diachi='".$Address."', chucvu='".$Avatar."'
                         WHERE id_taikhoan='".$id1."'";
            $query1 = $this->_query($typesql1);
        }else{
            $ida = "KH" . $_SESSION['id_num'];
            $_SESSION['id_num']++;
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            $typesql1 = "insert into taikhoan (id_taikhoan, ten, password, diachi, email, sdt, chucvu)
            values ('".$ida."','".$Name."', '".$Password."', '".$Address."', '".$Email."', '".$Phone."', '".$Avatar."');";
            $query1 = $this->_query($typesql1);
        }
        return $id1;
    }
    public function getOrderPaging($page){
        $skip = (intval($page) - 1) * 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
        }
        
        $typesql = "SELECT * FROM don_dat_hang Where trangthai = '0' LIMIT ".$skip.", 5;";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    }
    public function checkCartManage($id){
        $typesql = "UPDATE don_dat_hang 
                    SET  trangthai= '1'
                    WHERE id_don_dat = ".$id.";";
        $query1 = $this->_query($typesql);
        return $id;
    }
    
    public function deleteOrderManage($id){
        $typesql = "DELETE FROM don_dat_hang WHERE id_don_dat=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
}
?>
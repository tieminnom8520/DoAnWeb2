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
    public function editProductManage($id,$name,$type,$price,$quantity,$detail,$rating){
        if($id != -1){
            $typesql1 = "UPDATE mon
                        SET ten_mon='".$name."', Loai='".$type."',trangthai=".$price.", Soluong=".$quantity.", Mota='".$detail."', hinhanh='".$rating."'
                        WHERE id_mon=".$id.";";
            $query1 = $this->_query($typesql1);
        }else{
            $typesql1 = "insert into mon (ten_mon, Loai, trangthai, Soluong, Mota, hinhanh)
            values ('".$name."', '".$type."', ".$price.", ".$quantity.", '".$detail."', '".$rating."');";
            $query1 = $this->_query($typesql1);
        }
        return $id;
    }
    public function getProductManagePaging($page){
        $skip = (intval($page) - 1) * 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
        }
        
        $typesql = "SELECT * FROM mon LIMIT ".$skip.", 5;";
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
    public function deleteUserManage($id){
        $typesql = "DELETE FROM taikhoan WHERE id_taikhoan=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
    public function editUserManage($id,$Name,$Password,$Email,$Phone,$Avatar){
        if($id != -1){
            $typesql1 = "UPDATE taikhoan
                        SET ten='".$Name."', password='".$Password."', email='".$Email."', sdt=".$Phone.", chucvu='".$Avatar."'
                        WHERE id_taikhoan=".$id.";";
            $query1 = $this->_query($typesql1);
        }else{
            $Password = password_hash($Password, PASSWORD_DEFAULT);
            $typesql1 = "insert into taikhoan (ten, password, email, sdt, chucvu)
            values ('".$Name."', '".$Password."', '".$Email."', ".$Phone.", '".$Avatar."');";
            $query1 = $this->_query($typesql1);
        }
        return $id;
    }
    public function getOrderPaging($page){
        $skip = (intval($page) - 1) * 5;
        $skipnext = $skip + 5;
        if(intval($page) - 1 == 0){
            $skip = 0;
            $skipnext = 5;
        }
        
        $typesql = "SELECT * FROM order_product LIMIT ".$skip.", ".$skipnext.";";
        $query1 = $this->_query($typesql);
        if(!$query1) return [];
        $types = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            array_push($types, $row);
        }
        return $types;
    }
    public function deleteOrderManage($id){
        $typesql = "DELETE FROM order_product WHERE order_id=" . $id . ";";
        $query1 = $this->_query($typesql);
        return $query1;
    }
}
?>
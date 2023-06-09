<?php
    class ProductsModel extends db{
        public function getAllProducts(){
            $qr = "SELECT m.*, ct_m_s.gia 
            FROM MON as m 
            join ct_mon_size as ct_m_s ON m.id_mon = ct_m_s.id_mon
            where (ct_m_s.id_size = 'S' or ct_m_s.id_size='N')";
            return mysqli_query($this->connect, $qr);
        }

        public function getAllCategories(){
            $qr = "SELECT DISTINCT Loai FROM MON ORDER BY Loai";
            return mysqli_query($this->connect, $qr);
        }

        public function getAllProductsOfCategory($category){
            $qr = "SELECT m.*, ct_m_s.gia 
            FROM MON as m 
            join ct_mon_size as ct_m_s ON m.id_mon = ct_m_s.id_mon
            where (ct_m_s.id_size = 'S' or ct_m_s.id_size='N') and m.Loai = '$category'";
            return mysqli_query($this->connect, $qr);
        }

        public function getRelatedProducts($category){
            $qr = "SELECT m.*, ct_m_s.gia 
            FROM MON as m 
            join ct_mon_size as ct_m_s on m.id_mon = ct_m_s.id_mon WHERE m.Loai='".$category."' and (id_size = 'S' or id_size = 'N')";
            return mysqli_query($this->connect, $qr);
        }

        public function getProduct($id_mon){
            $currentUrl = $_SERVER['REQUEST_URI'];
            $urlParts = explode('/', $currentUrl);
            $lastPart = end($urlParts);
            $qr = "SELECT m.*,ct_m_s.gia
            FROM MON as m 
            join ct_mon_size as ct_m_s on m.id_mon = ct_m_s.id_mon 
            WHERE m.id_mon = '$id_mon' AND (ct_m_s.id_size = '$lastPart' OR ct_m_s.id_size = 'N' OR ct_m_s.id_size = 'S')";
            return mysqli_query($this->connect, $qr);
        }

        public function getAllProductsWithPrice($p1, $p2){
            $qr = "SELECT * FROM MON WHERE product_price >=".$p1." AND product_price <".$p2."";
            return mysqli_query($this->connect, $qr);
        }

        public function searchProduct($value){
            $qr = "SELECT m.*, ct_m_s.gia 
            FROM MON as m join ct_mon_size as ct_m_s on m.id_mon = ct_m_s.id_mon
            WHERE (ten_mon LIKE '%".$value."%' OR Loai LIKE '%".$value."%' OR Mota LIKE '%".$value."%')
            AND (ct_m_s.id_size = 'S' OR ct_m_s.id_size = 'N')";
            return mysqli_query($this->connect, $qr);
        }

        public function getSpecialProduct(){
            $qr = "SELECT m.*, ct_m_s.gia
            FROM MON as m join ct_mon_size as ct_m_s on m.id_mon = ct_m_s.id_mon
            WHERE (ct_m_s.id_size = 'L' OR ct_m_s.id_size = 'N') AND ct_m_s.gia 
            IN (
                SELECT  max(ct_m_s.gia)
                FROM MON as m join ct_mon_size as ct_m_s on m.id_mon = ct_m_s.id_mon
                WHERE (ct_m_s.id_size = 'L' OR ct_m_s.id_size = 'N')
                GROUP BY m.Loai
            )
            LIMIT 12;";
             return mysqli_query($this->connect, $qr);
        }
    }
?>
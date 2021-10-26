<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Functions {

    public function get_order_status($oderStatus) {
        switch ($oderStatus) {
            case '1':
                return 'Đã xác nhận';
            case '10':
                return 'Đã in file vận chuyển';
            case '11':
                return 'Đã giao vận chuyển';
            case '2':
                return 'Chờ xác nhận';
            case '3':
                return 'Hủy';
            case '30':
                return 'Yêu cầu hủy ';
            case '31':
                return 'Đã hủy ';
        }
        return 'unknown';
    }

    public function get_role_staff($role) {
        switch ($role) {
            case '1':
                return 'Admin';
            case '2':
                return 'Quản lý';
            case '3':
                return 'Cộng tác viên';
            case '4':
                return 'Nhân viên cửa hàng';
            case '5':
                return 'Khách hàng';
            case '6':
                return 'Dropship';
            case '0':
                return 'Limit';
        }
        return '0';
    }

    public function get_ecommerce_level($level) {
        switch ($level) {
            case '1':
                return 'Shopee';
            case '2':
                return 'Lazada';
            case '3':
                return 'Tiki';
            case '4':
                return 'Sendo';
            case '5':
                return 'Ngoài sàn';
            case '6':
                return 'GHTK';
            case '7':
                return 'GHN';
            case '8':
                return 'J&T';
            case '9':
                return 'Ninja Van';
            case '10':
                return 'Viettel Post';
            case '11':
                return 'VN Post';
                
            
        }
        return '0';
    }

    public function create_id_cart($idStaff,$idProduct) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date("Ymd");
        $today = date("His");
        $id=$idStaff.'p'.$idProduct.'d'.date("Ymd").'t'.date("His");
        
        return $id;
    }

}

?>

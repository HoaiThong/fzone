<?php

$s = '{
  "data": [
    {
      "id": "1",
      "name": "Tiger Nixon",
      "position": "System Architect",
      "salary": "$320,800",
      "start_date": "2011/04/25",
      "office": "Edinburgh",
      "data": [
    {
      "id1": "1",
      "name1": "Tiger Nixon",
      "position1": "System Architect",
      "salary1": "$320,800",
      "start_date1": "2011/04/25",
      "office1": "HaNoi",
      "extn1": "5421"
    },
{
      "id1": "1",
      "name1": "Tiger Nixon",
      "position1": "System Architect",
      "salary1": "$320,800",
      "start_date1": "2011/04/25",
      "office1": "VN",
      "extn1": "5421"
    }
]
    }
    
  ]
}';

//include '../admin/includes/session-check.php';
$str = '{
  "data": [
        {"idBill":"1001","idExpress":"455673sd23","idStore":"1000","idStaff":"1000","linkExpress":"https:\/\/www.facebook.com\/home.php","ecommerceLevel":null,"buyerName":"vo danh","buyerPhone":null,"buyerAddress":null,"buyerEmail":null,"note":"ko","orderStatus":"31","refunds":"0","createAt":"2021-09-04 09:23:39",
                "array_product":"[{\"idProduct\": 1000, \"quantity\": 2000, \"finalPrice\": 300000},{\"idProduct\": 1008, \"quantity\": 1778, \"finalPrice\": 300000}]"},
        {"idBill":"1011","idExpress":"6565AHN90008","idStore":"1000","idStaff":"1000","linkExpress":"","ecommerceLevel":"1","buyerName":"A. Thong","buyerPhone":"0944389106","buyerAddress":"BG","buyerEmail":"","note":"","orderStatus":"31","refunds":"0","createAt":"2021-09-20 09:08:18",
                "array_product":"[{\"idProduct\": 1008, \"quantity\": 10, \"finalPrice\": 420000}]"},
        {"idBill":"1012","idExpress":"345AWD435367","idStore":"1000","idStaff":"1000","linkExpress":"https:\/\/drive.google.com\/file\/d\/1zjAeQuTs3wdmXu5R0nkp4llDlR1Nxtrp\/view?usp=sharing","ecommerceLevel":"4","buyerName":"A.Hoai","buyerPhone":"0869273958","buyerAddress":"BG","buyerEmail":"","note":"BG","orderStatus":"31","refunds":"0","createAt":"2021-09-20 09:11:48",
                "array_product":"[{\"idProduct\": 1008, \"quantity\": 9, \"finalPrice\": 420000}]"},
        {"idBill":"1015","idExpress":"765767HJAH9898","idStore":"1000","idStaff":"1000","linkExpress":"","ecommerceLevel":"9","buyerName":"","buyerPhone":"","buyerAddress":"","buyerEmail":"","note":"","orderStatus":"31","refunds":"0","createAt":"2021-09-21 12:03:32",
                "array_product":"[{\"idProduct\": 1008, \"quantity\": 33, \"finalPrice\": 420000}]"},
        {"idBill":"1017","idExpress":"435345DSAW32434","idStore":"1000","idStaff":"1000","linkExpress":"","ecommerceLevel":"9","buyerName":"ADC","buyerPhone":"","buyerAddress":"","buyerEmail":"","note":"","orderStatus":"31","refunds":"0","createAt":"2021-09-21 13:16:57",
                "array_product":"[{\"idProduct\": 1008, \"quantity\": 51, \"finalPrice\": 420000}]"}
        ]
  }';
echo $str;
?>

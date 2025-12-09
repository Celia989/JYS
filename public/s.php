<?php
 

$fp = stream_socket_client("ssl://smtp.gmail.com:465", $errno, $errstr, 30);
if (!$fp) {
   echo "$errstr ($errno)<br />\n";
} else {
    fputs($fp, "GET / HTTP/1.0\r\nHost: smtp.gmail.com\r\nAccept: *\r\n\r\n");
   while (!feof($fp)) {
        echo fgets($fp, 1024);
   }
   fclose($fp);
}
/*
  "open",
      "close",
      "high",
      "low",
      "change",
      "changeRate",
      "tick_at"

*/

   $name='USDCNH';$peroid=0;$limit=100;
   $host = "http://finance.market.alicloudapi.com";
    $path = "/waihui/kline";
    $method = "GET";
    $appcode = "38e9f1ff393246c6b9f3569512e1e5c4";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
  //  $querys = "symbol=".$name;
    $querys = "symbol=".$name."&type=".$peroid."&limit=".$limit;
    $bodys = "";
    $url = $host . $path . "?" . $querys;

     $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $res = curl_exec($curl);

    $res = json_decode($res, true);
    $data_arr = [];
    if (!isset($res['data']['lines'])) {
             return [];
      }
      
    $base_currency= 'XAU';
    $quotecurrency = 'USDT' ; 
    $data = $res['data']['lines'];
    
         foreach ($data as $key => $item) {
              $data_arr[] = [
                            "id" => $item[6],
                            "period" => $peroid,
                            "base-currency" => strtolower($base_currency),
                            "quote-currency" =>$quotecurrency,
                            "open" => $item[0],
                            "close" => $item[1],
                            "high" => $item[2],
                            "low" => $item[3],
                            "vol" => 0,
                            "amount" => $item[0]
                        ];
                    
                    $res = array_reverse($data_arr);      
         }
    
    print_r($res);
/*

echo md5(md5('123456').'1uDhGR');


 $result = array('code'=>200,'msg'=>'','data'=>array('count'=>0,'switch'=>0));
echo json_encode($result);
 */       
 
?>


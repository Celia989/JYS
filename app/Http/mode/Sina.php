<?php
namespace App\Http\mode;
use Illuminate\Support\Facades\DB;

class Sina
{
   
   
      public function etfgp($name){
      
       $klinedemo='{
  "code": 1,
  "data": [
    {
      "volume": 322,
      "high": "153.5900",
      "amount": 49440.4,
      "low": "153.5200",
      "day": "2024-05-23 15:35:00",
      "close": "153.5200",
      "open": "153.5900"
    },
    {
      "volume": 557,
      "high": "153.5000",
      "amount": 85489,
      "low": "153.4650",
      "day": "2024-05-23 15:36:00",
      "close": "153.4650",
      "open": "153.5000"
    },
    {
      "volume": 402,
      "high": "153.5550",
      "amount": 61729.1,
      "low": "153.5550",
      "day": "2024-05-23 15:38:00",
      "close": "153.5550",
      "open": "153.5550"
    },
    {
      "volume": 718,
      "high": "153.6099",
      "amount": 110286,
      "low": "153.5805",
      "day": "2024-05-23 15:39:00",
      "close": "153.6099",
      "open": "153.6000"
    },
    {
      "volume": 300,
      "high": "153.6000",
      "amount": 46076.5,
      "low": "153.5800",
      "day": "2024-05-23 15:40:00",
      "close": "153.5800",
      "open": "153.6000"
    },
    {
      "volume": 241,
      "high": "153.6100",
      "amount": 37020,
      "low": "153.6100",
      "day": "2024-05-23 15:41:00",
      "close": "153.6100",
      "open": "153.6100"
    },
    {
      "volume": 417,
      "high": "153.6200",
      "amount": 64059.5,
      "low": "153.6200",
      "day": "2024-05-23 15:42:00",
      "close": "153.6200",
      "open": "153.6200"
    },
    {
      "volume": 462,
      "high": "153.5550",
      "amount": 70934.2,
      "low": "153.4900",
      "day": "2024-05-23 15:43:00",
      "close": "153.4900",
      "open": "153.5550"
    },
    {
      "volume": 196,
      "high": "153.4851",
      "amount": 30083.1,
      "low": "153.4851",
      "day": "2024-05-23 15:44:00",
      "close": "153.4851",
      "open": "153.4851"
    },
    {
      "volume": 135,
      "high": "153.5400",
      "amount": 20727.9,
      "low": "153.5400",
      "day": "2024-05-23 15:45:00",
      "close": "153.5400",
      "open": "153.5400"
    },
    {
      "volume": 850,
      "high": "153.4700",
      "amount": 130411,
      "low": "153.3700",
      "day": "2024-05-23 15:46:00",
      "close": "153.3700",
      "open": "153.4700"
    },
    {
      "volume": 525,
      "high": "153.3650",
      "amount": 80513.9,
      "low": "153.3404",
      "day": "2024-05-23 15:47:00",
      "close": "153.3404",
      "open": "153.3650"
    },
    {
      "volume": 1087,
      "high": "153.3850",
      "amount": 166703,
      "low": "153.3400",
      "day": "2024-05-23 15:48:00",
      "close": "153.3850",
      "open": "153.3600"
    },
    {
      "volume": 425,
      "high": "153.4500",
      "amount": 65215.2,
      "low": "153.4450",
      "day": "2024-05-23 15:50:00",
      "close": "153.4450",
      "open": "153.4500"
    },
    {
      "volume": 921,
      "high": "153.5200",
      "amount": 141360,
      "low": "153.4300",
      "day": "2024-05-23 15:51:00",
      "close": "153.4300",
      "open": "153.5200"
    },
    {
      "volume": 303,
      "high": "153.4950",
      "amount": 46506.5,
      "low": "153.4700",
      "day": "2024-05-23 15:52:00",
      "close": "153.4950",
      "open": "153.4700"
    },
    {
      "volume": 386,
      "high": "153.4700",
      "amount": 59236.3,
      "low": "153.4500",
      "day": "2024-05-23 15:53:00",
      "close": "153.4700",
      "open": "153.4600"
    },
    {
      "volume": 683,
      "high": "153.5150",
      "amount": 104849,
      "low": "153.4950",
      "day": "2024-05-23 15:54:00",
      "close": "153.5150",
      "open": "153.4950"
    },
    {
      "volume": 1022,
      "high": "153.5200",
      "amount": 156869,
      "low": "153.4700",
      "day": "2024-05-23 15:55:00",
      "close": "153.5100",
      "open": "153.5200"
    },
    {
      "volume": 4004,
      "high": "153.5000",
      "amount": 614144,
      "low": "153.2800",
      "day": "2024-05-23 15:56:00",
      "close": "153.3850",
      "open": "153.5000"
    },
    {
      "volume": 202,
      "high": "153.3900",
      "amount": 30984.8,
      "low": "153.3900",
      "day": "2024-05-23 15:57:00",
      "close": "153.3900",
      "open": "153.3900"
    },
    {
      "volume": 597,
      "high": "153.4550",
      "amount": 91582.4,
      "low": "153.3700",
      "day": "2024-05-23 15:58:00",
      "close": "153.4550",
      "open": "153.3700"
    },
    {
      "volume": 3067,
      "high": "153.4700",
      "amount": 470600,
      "low": "153.4100",
      "day": "2024-05-23 15:59:00",
      "close": "153.4200",
      "open": "153.4200"
    },
    {
      "volume": 2310,
      "high": "153.4600",
      "amount": 354412,
      "low": "153.3400",
      "day": "2024-05-23 16:00:00",
      "close": "153.4400",
      "open": "153.4600"
    }
  ],
  "message": "OK"
}';

    $host = "http://finance.market.alicloudapi.com";
    $path = "/us/kline";
    $method = "GET";
    $appcode = "38e9f1ff393246c6b9f3569512e1e5c4";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "symbol=$name&type=1&limit=100";
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
  
   $kline = curl_exec($curl);
 

       $data_array = json_decode($kline,true); 
       
      if($data_array['code']==0) $data_array = json_decode($klinedemo,true); 
 
     $str2 = $data_array['data'];
     foreach ($str2 as $k=>$v){
         
          
        $data_arr[] = [
                    "id" => strtotime($v['day']),
                    "period" => '1min',
                    "base-currency" => $name,
                    "quote-currency" => 'USDT',
                    "open" => $v['open'],//开
                    "close" => $v['close'],//关
                    "high" => $v['high'],//高
                    "low" =>$v['low'],//低
                    "vol" => $v['volume'],//交易量
                    "amount" =>$v['amount']//数量
                ];
        }//777
        
        
     return $data_arr;
     
        }
   
    
    
    
    public function real_gu($name){
      
        $hq = 
'{
  "msg": "ok",
  "code": 1,
  "data": {
    "VPU": {
      "after_price": "152.9300",
      "volume_avg10": "180154",
      "market_value": "6134400000",
      "trade_time": "2024-05-24 04:00:00",
      "change": "-2.7400",
      "eps": "0.00",
      "after_volume": "241",
      "volume": "171928",
      "shares": "40000000",
      "after_change": "-0.43",
      "high": "155.9400",
      "update_time": "2024-05-24 09:46:10",
      "low": "153.2800",
      "pe": "--",
      "price": "153.3600",
      "name": "公用事业股ETF",
      "dividend": "0.00",
      "52week_low": "116.4040",
      "after_changeRate": "-0.28",
      "changeRate": "-1.76",
      "preclose": "156.1000",
      "open": "155.9400",
      "52week_high": "158.0700",
      "after_time": "2024-05-24 07:25:00"
    }
  },
  "time": 1716519177
}';

        $host = "http://finance.market.alicloudapi.com";
    $path = "/us/real";
    $method = "GET";
    $appcode = "38e9f1ff393246c6b9f3569512e1e5c4";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "symbol=$name";
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

     $realhq = curl_exec($curl);
 
   
       $data_array = json_decode($realhq,true); 
    //   print_r($data_array);exit; 
      if($data_array['code']==1 && !empty($data_array['data'])){  
          $str = $data_array['data'][$name];  
       }
       
      
      if($data_array['code']==0 || $realhq=='' || empty($data_array['data'])){
          $data_array = json_decode($hq,true); 
           
           $str = $data_array['data']['VPU'];  
       } 
      
     //   print_r($data_array);exit; 
       
      $info = DB::table('currency')->where('vcode',$name)->first();
     
     $data = [];
     $data['now_price'] = $str['price'];//最新价格
     $data['add_time'] = time();
     $data['change'] = $str['changeRate'];
     $data['high'] = $str['high'];//最高 √
     $data['low'] = $str['low'];//最低 √
     $data['open'] = $str['open'];//开 √
     $data['close'] = $str['preclose'];//关
     $data['volume'] = $str['volume'];
    
      DB::table('currency_quotation')->where('currency_id',$info->id)->update($data);
     // echo $info->id;
   //  print_r($data);exit;
        }
    
    //k线类型， 1:1分钟，5：五分钟；15：15分钟；30:30分钟，60:60分钟，120:120分钟，240:日K，1200:周K，7200:月K，21600:季K，43200:半年K，86400:年K
      //ETFGP
     public function geteftgp($name, $peroid,  $limit)
    {
            
         $klinedemo='{
  "code": 1,
  "data": [
    {
      "volume": 322,
      "high": "153.5900",
      "amount": 49440.4,
      "low": "153.5200",
      "day": "2024-05-23 15:35:00",
      "close": "153.5200",
      "open": "153.5900"
    },
    {
      "volume": 557,
      "high": "153.5000",
      "amount": 85489,
      "low": "153.4650",
      "day": "2024-05-23 15:36:00",
      "close": "153.4650",
      "open": "153.5000"
    },
    {
      "volume": 402,
      "high": "153.5550",
      "amount": 61729.1,
      "low": "153.5550",
      "day": "2024-05-23 15:38:00",
      "close": "153.5550",
      "open": "153.5550"
    },
    {
      "volume": 718,
      "high": "153.6099",
      "amount": 110286,
      "low": "153.5805",
      "day": "2024-05-23 15:39:00",
      "close": "153.6099",
      "open": "153.6000"
    },
    {
      "volume": 300,
      "high": "153.6000",
      "amount": 46076.5,
      "low": "153.5800",
      "day": "2024-05-23 15:40:00",
      "close": "153.5800",
      "open": "153.6000"
    },
    {
      "volume": 241,
      "high": "153.6100",
      "amount": 37020,
      "low": "153.6100",
      "day": "2024-05-23 15:41:00",
      "close": "153.6100",
      "open": "153.6100"
    },
    {
      "volume": 417,
      "high": "153.6200",
      "amount": 64059.5,
      "low": "153.6200",
      "day": "2024-05-23 15:42:00",
      "close": "153.6200",
      "open": "153.6200"
    },
    {
      "volume": 462,
      "high": "153.5550",
      "amount": 70934.2,
      "low": "153.4900",
      "day": "2024-05-23 15:43:00",
      "close": "153.4900",
      "open": "153.5550"
    },
    {
      "volume": 196,
      "high": "153.4851",
      "amount": 30083.1,
      "low": "153.4851",
      "day": "2024-05-23 15:44:00",
      "close": "153.4851",
      "open": "153.4851"
    },
    {
      "volume": 135,
      "high": "153.5400",
      "amount": 20727.9,
      "low": "153.5400",
      "day": "2024-05-23 15:45:00",
      "close": "153.5400",
      "open": "153.5400"
    },
    {
      "volume": 850,
      "high": "153.4700",
      "amount": 130411,
      "low": "153.3700",
      "day": "2024-05-23 15:46:00",
      "close": "153.3700",
      "open": "153.4700"
    },
    {
      "volume": 525,
      "high": "153.3650",
      "amount": 80513.9,
      "low": "153.3404",
      "day": "2024-05-23 15:47:00",
      "close": "153.3404",
      "open": "153.3650"
    },
    {
      "volume": 1087,
      "high": "153.3850",
      "amount": 166703,
      "low": "153.3400",
      "day": "2024-05-23 15:48:00",
      "close": "153.3850",
      "open": "153.3600"
    },
    {
      "volume": 425,
      "high": "153.4500",
      "amount": 65215.2,
      "low": "153.4450",
      "day": "2024-05-23 15:50:00",
      "close": "153.4450",
      "open": "153.4500"
    },
    {
      "volume": 921,
      "high": "153.5200",
      "amount": 141360,
      "low": "153.4300",
      "day": "2024-05-23 15:51:00",
      "close": "153.4300",
      "open": "153.5200"
    },
    {
      "volume": 303,
      "high": "153.4950",
      "amount": 46506.5,
      "low": "153.4700",
      "day": "2024-05-23 15:52:00",
      "close": "153.4950",
      "open": "153.4700"
    },
    {
      "volume": 386,
      "high": "153.4700",
      "amount": 59236.3,
      "low": "153.4500",
      "day": "2024-05-23 15:53:00",
      "close": "153.4700",
      "open": "153.4600"
    },
    {
      "volume": 683,
      "high": "153.5150",
      "amount": 104849,
      "low": "153.4950",
      "day": "2024-05-23 15:54:00",
      "close": "153.5150",
      "open": "153.4950"
    },
    {
      "volume": 1022,
      "high": "153.5200",
      "amount": 156869,
      "low": "153.4700",
      "day": "2024-05-23 15:55:00",
      "close": "153.5100",
      "open": "153.5200"
    },
    {
      "volume": 4004,
      "high": "153.5000",
      "amount": 614144,
      "low": "153.2800",
      "day": "2024-05-23 15:56:00",
      "close": "153.3850",
      "open": "153.5000"
    },
    {
      "volume": 202,
      "high": "153.3900",
      "amount": 30984.8,
      "low": "153.3900",
      "day": "2024-05-23 15:57:00",
      "close": "153.3900",
      "open": "153.3900"
    },
    {
      "volume": 597,
      "high": "153.4550",
      "amount": 91582.4,
      "low": "153.3700",
      "day": "2024-05-23 15:58:00",
      "close": "153.4550",
      "open": "153.3700"
    },
    {
      "volume": 3067,
      "high": "153.4700",
      "amount": 470600,
      "low": "153.4100",
      "day": "2024-05-23 15:59:00",
      "close": "153.4200",
      "open": "153.4200"
    },
    {
      "volume": 2310,
      "high": "153.4600",
      "amount": 354412,
      "low": "153.3400",
      "day": "2024-05-23 16:00:00",
      "close": "153.4400",
      "open": "153.4600"
    }
  ],
  "message": "OK"
}';
     
            
            
            $types=240;
            if($peroid=="1D") $types=240;
            if($peroid=="1min") $types=1;
            if($peroid=="5min") $types=5;
            if($peroid=="15min") $types=15;
            if($peroid=="30min") $types=30;
            if($peroid=="60min") $types=60;
            if($peroid=="120min") $types=120;
            if($peroid=="1hour") $types=60;
            if($peroid=="1week") $types=1200;
            if($peroid=="1mon") $types=7200;
            if($peroid=="1year") $types=86400;
            if($peroid=="1M") $types=1200;
            if($peroid=="1W") $types=7200; 
    
    $host = "http://finance.market.alicloudapi.com";
    $path = "/us/kline";
    $method = "GET";
    $appcode = "38e9f1ff393246c6b9f3569512e1e5c4";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
     $querys = "symbol=".$name."&type=".$types."&limit=".$limit;
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
  
   $kline = curl_exec($curl);
 

       $data_array = json_decode($kline,true); 
       
       // file_put_contents('/www/wwwroot/crypto/public/w2.txt',json_encode($data_array).PHP_EOL,FILE_APPEND);
   
       
      if($data_array['code']==0  || empty($data_array['data'])) $data_array = json_decode($klinedemo,true); 
 
     $str2 = $data_array['data'];
     foreach ($str2 as $k=>$v){
         
          
        $data_arr[] = [
                    "id" => strtotime($v['day']),
                    "period" => $peroid,
                    "base-currency" => $name,
                    "quote-currency" => 'USDT',
                    "open" => $v['open'],//开
                    "close" => $v['close'],//关
                    "high" => $v['high'],//高
                    "low" =>$v['low'],//低
                    "vol" => $v['volume'],//交易量
                    "amount" =>$v['amount']//数量
                ];
        }//777
        
        
     return $data_arr;
     
    
    }
    
    
    //外汇
     public function getKline($name, $peroid,  $limit)
    {
            $types=240;
            if($peroid=="1D") $types=0;
            if($peroid=="1min") $types=1;
            if($peroid=="5min") $types=5;
            if($peroid=="15min") $types=15;
            if($peroid=="30min") $types=30;
            if($peroid=="60min") $types=60;
            if($peroid=="1hour") $types=60;
            if($peroid=="1week") $types=120;
            if($peroid=="1mon") $types=240;
            if($peroid=="1year") $types=240;
            if($peroid=="1M") $types=0;
            if($peroid=="1W") $types=0;
     $host = "http://finance.market.alicloudapi.com";
    $path = "/waihui/kline";
    $method = "GET";
    $appcode = "38e9f1ff393246c6b9f3569512e1e5c4";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
  //  $querys = "symbol=".$name;
    $querys = "symbol=".$name."&type=".$types."&limit=".$limit;
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
    $res=curl_exec($curl);
  $res = json_decode($res, true);
                    $data_arr = [];
                    if (!isset($res['data']['lines'])) {
                        return [];
                    }
                    
             foreach ($res['data']['lines'] as $key => $item) {
                        $data_arr[] = [
                            "id" => $item[6],
                            "period" => $peroid,
                            "base-currency" =>$name,
                            "quote-currency" =>'USDT',
                            "open" => $item[0],
                            "close" => $item[1],
                            "high" => $item[2],
                            "low" => $item[3],
                            "vol" => 0,
                            "amount" => $item[0]
                        ];
                    
                   // $res1 = array_reverse($data_arr);        
             }
             
              return $data_arr;
 
} 
        //贵金属
   public function getwaipanKline($name, $peroid,  $limit)
    {
    
             $types=240;
            if($peroid=="1D") $types=0;
            if($peroid=="1min") $types=1;
            if($peroid=="5min") $types=5;
            if($peroid=="15min") $types=15;
            if($peroid=="30min") $types=30;
            if($peroid=="60min") $types=60;
            if($peroid=="1hour") $types=60;
            if($peroid=="1week") $types=120;
            if($peroid=="1mon") $types=240;
            if($peroid=="1year") $types=240;
            if($peroid=="1M") $types=0;
            if($peroid=="1W") $types=0;
    
     $host = "http://finance.market.alicloudapi.com";
    $path = "/waipan/kline";
    $method = "GET";
    $appcode = "38e9f1ff393246c6b9f3569512e1e5c4";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
  //  $querys = "symbol=".$name;
    $querys = "symbol=".$name."&type=".$types."&limit=".$limit;
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
     $res =  curl_exec($curl);
     
      $res = json_decode($res, true);
                    $data_arr = [];
                    if (!isset($res['data']['lines'])) {
                        return [];
                    }
                    
             foreach ($res['data']['lines'] as $key => $item) {
                        $data_arr[] = [
                            "id" => $item[7],
                            "period" => $peroid,
                            "base-currency" =>$name,
                            "quote-currency" =>'USDT',
                            "open" => $item[0],
                            "close" => $item[1],
                            "high" => $item[2],
                            "low" => $item[3],
                            "vol" => $item[6],
                            "amount" => $item[0]
                        ];
                    
                   // $res1 = array_reverse($data_arr);        
             }
             
              return $data_arr;
 
}

        
        
        
     
        public function sina($name){
        $code = $name;
        $time = date('Y_m_d',time());
        //preg_match_all("/[a-zA-Z]{1}/",$code,$arrAl);
        //echo "字母个数:".count($arrAl[0])."<br/>";
$url = "https://stock2.finance.sina.com.cn/futures/api/openapi.php/GlobalFuturesService.getGlobalFuturesMinLine?symbol=$code&callback=var%20t1hf_W=";//分k
        //$url = "https://gu.sina.cn/ft/api/jsonp.php/var%20_W_5_1663703010461=/GlobalService.getMink?symbol=XAU&type=5";//5分
        header('Connection: Upgrade');
        header('Pragma: no-cache');
        header('Cache-Control: no-cache');
        header('Accept-Encoding: gzip, deflate, br');
        header('Accept-Language: zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7');
        header('User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Mobile Safari/537.36');
    $html = html_entity_decode(file_get_contents("$url"));
    $str2 = substr($html, 61);
     $str2 = substr_replace($str2,"",-2,2);
    $str2 = json_decode($str2,true);
    $str2 = $str2['result']['data']['minLine_1d'];
  //  echo json_encode($str2);exit;
    foreach ($str2 as $k=>$v){
        if($k>0){//777
        /*应甲方要求，个别前端有问题，进行数据修改，不要删改，不然前端有意想不到的惊喜*/
        if($name=="NG"||$name=="XPD"){
            $rand = '0.0'.rand(rand(1,3),rand(5,9));
            $rand1 = '0.0'.rand(rand(1,3),rand(5,9));
            $rand2 = '0.0'.rand(rand(1,3),rand(5,9));
            $rand3 = '0.0'.rand(rand(1,3),rand(5,9));
            
        }else{
            $rand = '0.00'.rand(rand(1,3),rand(5,9));
            $rand1 = '0.00'.rand(rand(1,3),rand(5,9));
            $rand2 = '0.00'.rand(rand(1,3),rand(5,9));
            $rand3 = '0.00'.rand(rand(1,3),rand(5,9));
            
        }
        
        if(rand(1,2)==1){
            $open = $v[1]/100*$rand3+$v[1];
            
        }else
        {
                $open = $v[1]-$v[1]/100*$rand3;
                
         }
            
        if(rand(1,2)==1)
        {
                $close = $v[1]-$v[1]/100*$rand2;
            
        }else{
            $close = $v[1]-$v[1]/100*$rand2;
                    
        }
        /**/
        if($k==count($str2)-1){
            $info = DB::table('currency')->where('name',$name)->first();
            $info = json_encode($info);
            $info = json_decode($info,true);
            $bi = DB::table('currency_quotation')->where('currency_id',$info['id'])->first();
            $bi = json_encode($bi);
            $bi = json_decode($bi,true);
            $close = $bi['now_price'];
        }
        $data_arr[] = [
                    "id" => strtotime($v[5]),
                    "period" => '1min',
                    "base-currency" => $name,
                    "quote-currency" => 'USDT',
                    "open" => $open,//开
                    "close" => $close,//关
                    "high" => $v[1]+$v[1]/100*$rand1,//高
                    "low" =>$v[1]-$v[1]/100*$rand,//低
                    "vol" => 0,//交易量
                    "amount" => 0//数量
                ];
        }//777
    }
    //return  array_reverse($data_arr);
    return $data_arr;
        }
        //外汇
        public function foreign($name){
            
            
         $result =DB::table('currency')->where('name',$name)->first();
        $code = $result->vcode; 
            
      
        $time = date('Y_m_d',time());
        $url = "https://vip.stock.finance.sina.com.cn/forex/api/jsonp.php/var%20_fx_susdcad_1_1708783212908=/NewForexService.getMinKline?symbol=$code&scale=1&datalen=1440" ;//分k
        header('Connection: Upgrade');
        header('Pragma: no-cache');
        header('Cache-Control: no-cache');
        header('Accept-Encoding: gzip, deflate, br');
        header('Accept-Language: zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7');
        header('User-Agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Mobile Safari/537.36');
    $html = html_entity_decode(file_get_contents("$url"));
    $str2 = substr($html, 82);
    $str2 = substr_replace($str2,"",-2,2);
    $str2 = json_decode($str2,true);
    foreach ($str2 as $k=>$v){
        if($k>0){//777
        /*应甲方要求，个别前端有问题，进行数据修改，不要删改，不然前端有意想不到的惊喜*/
        if($name=="GBP"||$name=="NZD"||$name=="EUR"){
            $rand = '0.00'.rand(rand(1,3),rand(5,9));
            $rand1 = '0.00'.rand(rand(1,3),rand(5,9));
            $rand2 = '0.00'.rand(rand(1,3),rand(5,9));
            $rand3 = '0.00'.rand(rand(1,3),rand(5,9));
            if(rand(1,2)==1){
              $open = $v['o']/100*$rand3+$v['o'];
            
            }else{
              $open = $v['o']-$v['o']/100*$rand3;
            
            }
        
            if(rand(1,2)==1){
                $close = $v['o']-$v['o']/100*$rand2;
            
             }else
			 {
              $close = $v['o']-$v['o']/100*$rand2;
            
             }
            
        }else{
            $open = $v['o'];
            $close = $v['c'];
                
            }
        /**/
        
        if($k==count($str2)-1){
            $info = DB::table('currency')->where('name',$name)->first();
            $info = json_encode($info);
            $info = json_decode($info,true);
            $bi = DB::table('currency_quotation')->where('currency_id',$info['id'])->first();
            $bi = json_encode($bi);
            $bi = json_decode($bi,true);
            $close = $bi['now_price'];
        }
        
        $data_arr[] = [
                    "id" => strtotime($v['d']),
                    "period" => '1min',
                    "base-currency" => $name,
                    "quote-currency" => 'USDT',
                    "open" => $open,//开
                    "close" => $close,//关
                    "high" => $v['h'],//高
                    "low" =>$v['l'],//低
                    "vol" => $v['o'],//交易量
                    "amount" => $v['o']//数量
                ];
        } 
    }
    //return  array_reverse($data_arr);
    return $data_arr;
        }
        
        
      //内部调用实时采集价格
 public function real_s($name){    
  $hq = '{
  "msg": "ok",
  "code": 1,
  "data": {
    "change": "0.3800",
    "ask_vol": "0",
    "bid_vol": "0",
    "hold": "0",
    "volume": 0,
    "high": "2339.64",
    "update_time": 1719582600,
    "low": "2318.94",
    "price": "2327.71",
    "name": "伦敦金（现货黄金）",
    "ask": "2328.06",
    "changeRate": "0.0163",
    "preclose": "2327.33",
    "bid": "2327.71",
    "open": "2327.53"
  },
  "time": 1719582646
}';
        
        
          $host = "http://finance.market.alicloudapi.com";
    $path = "/waipan/real";
    $method = "GET";
    $appcode = "38e9f1ff393246c6b9f3569512e1e5c4";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "symbol=$name";
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

     $realhq = curl_exec($curl);
 
   
       $data_array = json_decode($realhq,true); 
       
      if($data_array['code']==1 && !empty($data_array['data'])){  
          $str = $data_array['data'];  
       }
      if($data_array['code']==0 || $realhq=='' || empty($data_array['data'])){
          $data_array = json_decode($hq,true); 
           
           $str = $data_array['data'];  
       } 
      
      //  print_r($data_array);exit; 
       
      $info = DB::table('currency')->where('vcode',$name)->first();
     
     $data = [];
     $data['now_price'] = $str['price'];//最新价格
     $data['add_time'] = time();
     $data['change'] = $str['changeRate'];
     $data['high'] = $str['high'];//最高 √
     $data['low'] = $str['low'];//最低 √
     $data['open'] = $str['open'];//开 √
     $data['close'] = $str['preclose'];//关
     $data['volume'] = $str['volume'];
    
      DB::table('currency_quotation')->where('currency_id',$info->id)->update($data);
     // echo $info->id;
   //  print_r($data);exit;
        }
        
        
        
        
        
        
        
        
        
        
        //内部调用实时采集价格
        public function real_s_sina($name){
            $curl = curl_init();
    curl_setopt_array($curl, array(
   CURLOPT_URL => 'https://w.sinajs.cn/?_=0.6314213010647229&list=hf_'.$name,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => '',
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 0,
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => 'POST',
   CURLOPT_HTTPHEADER => array(
      'referer: https://finance.sina.com.cn/'
   ),
));
    $response = curl_exec($curl);
    curl_close($curl);
// file_put_contents('/www/wwwroot/crypto/public/w.txt',$name."--".$response);
    preg_match_all("/[a-zA-Z]{1}/",$name,$arrAl);
    $str2 = substr($response, 16+count($arrAl[0]));
    $str2 = substr_replace($str2,"",-3,2);
    //echo $str2;
    $str = explode(',',$str2);
    //$str[0];//最新价格 $str[4];最高价 $str[5];最低价
     $info = DB::table('currency')->where('name',$name)->first();
     $info = json_encode($info);
     $info = json_decode($info,true);
     if(round(100-round($str[0]/$info['price']*100,2),2)>0){
         $chanhe = '+'.round(100-round($str[0]/$info['price']*100,2),2);
     }else{
         $chanhe = round(100-round($str[0]/$info['price']*100,2),2);
     }
     $data['now_price'] = $str[0];//最新价格
     $data['add_time'] = time();
     $data['change'] = bcdiv($chanhe,100,2);
     $data['high'] = $str[4];//最高 √
     $data['low'] = $str[5];//最低 √
     $data['open'] = $str[8];//开 √
     $data['close'] = $str[0];//关
     $data['volume'] = $str[9];//交易量
     DB::table('currency_quotation')->where('currency_id',$info['id'])->update($data);
     //DB::table('currency')->where('id',$info['id'])->update(['price'=>$str[0]]);
        }
        //实时采集期货价格
        public function real(){
            //$this->real_s('XAU');exit;
            //$this->real_s($name);
            $list = DB::table('currency_matches')->where('market_from',3)->paginate(100);
            $list = json_encode($list);
            $list = json_decode($list,true);
            $l = array();
            foreach ($list['data'] as $k=>$v){
                $info = DB::table('currency')->where('id',$v['currency_id'])->first();
                $info = json_encode($info);
                $info = json_decode($info,true);
                $this->real_s($info['vcode']);
            }
          ///  echo 'success';
        }
        
        
        
         //实时采集股票价格
        public function gpreal(){
            //$this->real_s('XAU');exit;
            //$this->real_s($name);
            $list = DB::table('currency_matches')->where('market_from',6)->paginate(100);
          
            $list = json_encode($list);
            $list = json_decode($list,true);
            $l = array();
             
            foreach ($list['data'] as $k=>$v){
                $info = DB::table('currency')->where('id',$v['currency_id'])->first();
                
                $this->real_gu($info->vcode);
            }
          //  echo 'success';
        }
        
           //实时采集股票价格
        public function etfreal(){
            //$this->real_s('XAU');exit;
            //$this->real_s($name);
            $list = DB::table('currency_matches')->where('market_from',9)->paginate(100);
            $list = json_encode($list);
            $list = json_decode($list,true);
            $l = array();
            foreach ($list['data'] as $k=>$v){
                $info = DB::table('currency')->where('id',$v['currency_id'])->first();
              
                $this->real_gu($info->vcode);
            }
          //  echo 'success';
        }
        
        
        //实时采集外汇价格
        public function foreign_real(){
            $list = DB::table('currency_matches')->where('market_from',0)->paginate(100);
            $list = json_encode($list);
            $list = json_decode($list,true);
            $l = array();
            foreach ($list['data'] as $k=>$v){
                $info = DB::table('currency')->where('id',$v['currency_id'])->first();
                $info = json_encode($info);
                $info = json_decode($info,true);
                $this->foreign_s($info['real_name']);
            }
          //  echo 'success';
        }
        
           //外汇实时采集
    //内部调用实时采集价格
        public function foreign_s($name){
           // $name = strtolower($name);
           
           $hq ='{
  "msg": "ok",
  "code": 1,
  "data": {
    "EURUSD": {
      "change": "-0.000220",
      "update_time": 1719582553,
      "bofu": "0.00348",
      "high": "1.071990",
      "low": "1.068510",
      "price": "1.070210",
      "name": "欧元兑美元即期汇率",
      "ask": "1.070230",
      "bid": "1.070210",
      "preclose": "1.070430",
      "changeRate": "-0.020000",
      "open": "1.070470",
      "zhenfu": "0.3251"
    }
  },
  "time": 1719582560
}';

    
    $host = "http://finance.market.alicloudapi.com";
    $path = "/waihui/real";
    $method = "GET";
    $appcode = "38e9f1ff393246c6b9f3569512e1e5c4";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    $querys = "symbol=".$name;
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
      $realhq = curl_exec($curl);
 
  
       $data_array = json_decode($realhq,true); 
      //  file_put_contents('/www/wwwroot/crypto/public/w2.txt',json_encode($realhq)."--".json_encode($data_array).PHP_EOL,FILE_APPEND);
      if($data_array['code']==1 && !empty($data_array['data'])){  
          $str = $data_array['data'][$name];  
       }
      if($data_array['code']==0 || $realhq=='' || empty($data_array['data'])){
          $data_array = json_decode($hq,true); 
           
           $str = $data_array['data']['EURUSD'];  
       } 
       
      
      
      //  print_r($data_array);exit; 
       
      $info = DB::table('currency')->where('real_name',$name)->first();
     
     $data = [];
     $data['now_price'] = $str['price'];//最新价格
     $data['add_time'] = time();
     $data['change'] = $str['changeRate'];
     $data['high'] = $str['high'];//最高 √
     $data['low'] = $str['low'];//最低 √
     $data['open'] = $str['open'];//开 √
     $data['close'] = $str['preclose'];//关
     $data['volume'] = 0;
     
      
    
      DB::table('currency_quotation')->where('currency_id',$info->id)->update($data);       
            
        
        }
        
        
    //外汇实时采集
    //内部调用实时采集价格
        public function foreign_s_sina($name){
           // $name = strtolower($name);
            
             $result =DB::table('currency')->where('name',$name)->first();
        $code = $result->vcode; 
            $curl = curl_init();
    curl_setopt_array($curl, array(
   CURLOPT_URL => 'https://w.sinajs.cn/?_=0.27948490427865&list='.$code.',sys_time',
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => '',
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 0,
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => 'POST',
   CURLOPT_HTTPHEADER => array(
      'referer: https://finance.sina.com.cn/'
   ),
));
    $response = curl_exec($curl);
    curl_close($curl);
    preg_match_all("/[a-zA-Z]{1}/",$name,$arrAl);
    $str2 = substr($response, 20+count($arrAl[0]));
    $str2 = substr_replace($str2,"",-37,37);
    //echo $str2;exit;
    $str = explode(',',$str2);
     $name = ucfirst($name);
     $info = DB::table('currency')->where('name',$name)->first();
     $info = json_encode($info);
     $info = json_decode($info,true);
     
     if(round(100-round($str[1]/$info['price']*100,4),4)>0){
         $chanhe = '+'.round(100-round($str[1]/$info['price']*100,4),4);
     }else{
         $chanhe = round(100-round($str[1]/$info['price']*100,4),4);
     }
     $data['now_price'] = $str[1];//最新价格
     $data['add_time'] = time();
     $data['change'] = bcdiv($chanhe,100,2);
     $data['high'] = $str[3];//最高 √
     $data['low'] = $str[5];//最低 √
     $data['open'] = $str[6];//开 √
     $data['close'] = $str[1];//关
     $data['volume'] = $info['price']*rand(100,1000);
     DB::table('currency_quotation')->where('currency_id',$info['id'])->update($data);
     //DB::table('currency')->where('id',$info['id'])->update(['price'=>$str[1]]);
        }
        
}
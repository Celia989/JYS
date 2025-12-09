 <?
echo date('Y-m-d H:i:s',1798977225);
 echo "QQ327894719";
 
 /*
echo date("Y_m_d H:i:s",1717836279);
 $code = 'NG';
        $time = date('Y_m_d',time());
        //preg_match_all("/[a-zA-Z]{1}/",$code,$arrAl);
        //echo "字母个数:".count($arrAl[0])."<br/>";
        $url = "https://stock2.finance.sina.com.cn/futures/api/openapi.php/GlobalFuturesService.getGlobalFuturesMinLine?symbol=$code&callback=var%20t1hf_W=" ;//分k
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
   echo json_encode($str2);exit;
   */
   ?>
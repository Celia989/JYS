<?php

namespace App\Http\Controllers\Api;

use App\DAO\Moducloud\SmsSingleSender;
use App\DAO\SubmailMailSend;
use App\Setting;
use App\Users;
use App\Utils\RPC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;

class SmsController extends Controller
{
    private $_sms_ip_check_expire_time = 60;

    /**
     * 发送短信
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(Request $request)
    {
        $ALIYUN_SMS_AK = env("ALIYUN_SMS_AK");
        $ALIYUN_SMS_AS = env("ALIYUN_SMS_AS");
        $ALIYUN_SMS_SIGN_NAME = env("ALIYUN_SMS_SIGN_NAME");
        $ALIYUN_SMS_VARIABLE = env("ALIYUN_SMS_VARIABLE");  //内容变量
        $tplId = env('ALIYUN_SMS_CODE');                //模版ID 模版CODE 格式为 SMS_140736882

        if (empty($tplId) || empty($ALIYUN_SMS_AK) || empty($ALIYUN_SMS_AS) || empty($ALIYUN_SMS_SIGN_NAME) || empty($ALIYUN_SMS_VARIABLE))
            return $this->error('系统配置错误，请联系系统管理员');

        Config::set("aliyunsms.access_key", $ALIYUN_SMS_AK);
        Config::set("aliyunsms.access_secret", $ALIYUN_SMS_AS);
        Config::set("aliyunsms.sign_name", $ALIYUN_SMS_SIGN_NAME);
        $mobile = Input::get('mobile', '');
        if (empty($mobile))
            return $this->error('手机号不能为空');

        //检查1分钟内该ip是否发送过验证码
//        if ($this->checkSmsIp($request->ip().$mobile)) {
//            return $this->error('验证码发送过于频繁');
//        }

        $verification_code = $this->createSmsCode(6);
        $params = [
            $ALIYUN_SMS_VARIABLE => $verification_code
        ];

        try {
            $smsService = \App::make('Curder\LaravelAliyunSms\AliyunSms');
            $return = $smsService->send(strval($mobile), $tplId, $params);

            if ($return->Message == "OK") {
                //记入session
                session(['sms_captcha' => $verification_code]);
                session(['sms_mobile' => $mobile]);

                //设置缓存key
//                $this->setSmsIpKey($request->ip().$mobile, $mobile);
                return $this->success("发送成功");
            } else {
                return $this->error($return->Message);
            }
        } catch (\ErrorException $e) {
            return $this->error($e->getMessage());
        }
    }


    /**
     * 短信宝发送短信
     */
    public function smsBaoSend(Request $request)
    {
        $mobile = $request->get('user_string');
        if (empty($mobile)) return $this->error('电话不能为空');
        $type = $request->get('type');//
        if ($type == 'forget') {
            $user = Users::getByString($mobile);
            if (empty($user)) return $this->error('账号错误');
        } else {
            $user = Users::getByString($mobile);
            if (!empty($user)) return $this->error('账号已存在');
        }

        /* $user = Users::getByString($mobile);
        if(!empty($user)) return $this->error('账号已存在'); */
        $username = Setting::getValueByKey('smsBao_username', 'shiwenlong');
        $password = Setting::getValueByKey('password', 'swl910101');
        $sms_signature = Setting::getValueByKey('sms_signature', '【Fun token】');
        if (empty($mobile)) {
            return $this->error('请填写手机号');
        }

        $verification_code = $this->createSmsCode(6);


        $area_code = $request->get('area_code', 86);
        if ($area_code == 86) {
            $api = 'http://api.smsbao.com/sms';
            $sms_signature .= '若非您本人操作，请及时修改密码。';
            $content = $sms_signature . '您的验证码为 [' . $verification_code . ']，请勿泄漏。';
        } else {
            $api = 'http://api.smsbao.com/wsms';
            $str = '+' . $area_code . $mobile;
            $mobile = urlencode($str);
            $sms_signature .= 'If you do not operate it yourself, please change the password in time.';
            $content = $sms_signature . 'Your verification code is[' . $verification_code . '],Do not leak.';
        }

        $send_url = $api . "?u=" . $username . "&p=" . md5($password) . "&m=" . $mobile . "&c=" . urlencode($content);
        $return_message = RPC::apihttp($send_url);
        if ($return_message == 0) {
            session(['code' => $verification_code]);
            return $this->success('发送成功');
        } else {
            $statusStr = array(
                "-1" => "参数不全",
                "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
                "30" => "密码错误",
                "40" => "账号不存在",
                "41" => "余额不足",
                "42" => "帐户已过期",
                "43" => "IP地址限制",
                "44" => "账号被禁用",
                "50" => "内容含有敏感词",
            );
            return $this->error("短信接口出错:" . $statusStr[$return_message]);
        }
    }

    public function sendModu(Request $request)
    {
        $mobile = $request->get('user_string');
        if (empty($mobile)) return $this->error('电话不能为空');
        $type = $request->get('type');//
        if ($type == 'forget') {
            $user = Users::getByString($mobile);
            if (empty($user)) return $this->error('账号错误');
        } else {
            $user = Users::getByString($mobile);
            if (!empty($user)) return $this->error('账号已存在');
        }
        $area_code = $request->get('area_code', 86);
        $accesskey = "5f7d5b7246e0ac9bf491856a";
        $secretkey = "a8f0abbac37b41d898f18c088944d27f";
        $phoneNumber = "$mobile";

        $singleSender = new SmsSingleSender($accesskey, $secretkey);

        $sms_signature = 'GAME';//Setting::getValueByKey('sms_signature');
        if ($area_code == 86) {
            $sms_signature = '【' . $sms_signature . '】';
        } else {
            $sms_signature = '[' . $sms_signature . ']';
        }
        $verification_code = $this->createSmsCode(6);

        $content = $sms_signature . 'Your verification code is[' . $verification_code . ']';

        // 普通单发
        $result = $singleSender->send(0, "$area_code", $phoneNumber, "$content", "", "");
        $res = json_decode($result);
        if ($res->result == 0) {
            session(['code' => $verification_code]);
            return $this->success('发送成功');
        } else {
            var_dump($res);
            return $this->error("短信接口出错");
        }


    }

    /**
     * 赛邮发送短信
     */
    public function smsSubmailSend(Request $request)
    {
        $mobile = $request->get('user_string');
        if (empty($mobile)) return $this->error('电话不能为空');
        $type = $request->get('type');//
        if ($type == 'forget') {
            $user = Users::getByString($mobile);
            if (empty($user)) return $this->error('账号错误');
        } else {
            $user = Users::getByString($mobile);
            if (!empty($user)) return $this->error('账号已存在');
        }

        $verification_code = $this->createSmsCode(6);
        $area_code = $request->get('area_code', 86);
        if ($area_code == 86) {
            $submail_appid = Setting::getValueByKey('submail_appid', '');
            $submail_appkey = Setting::getValueByKey('submail_appkey', '');
            $project = Setting::getValueByKey('submail_template', '');
            $api = 'https://api.mysubmail.com/message/xsend';

        } else {
            $submail_appid = Setting::getValueByKey('submail_overseas_appid', '');
            $submail_appkey = Setting::getValueByKey('submail_overseas_appkey', '');
            $project = Setting::getValueByKey('submail_overseas_template', '');
            $api = 'https://api.mysubmail.com/internationalsms/xsend';
            $mobile = '+' . $area_code . $mobile;

        }

        $send_url = $api;
        $send_data = [
            'appid' => $submail_appid,
            'signature' => $submail_appkey,
            //'content' => $content,
            'to' => $mobile,
            'project' => $project,
            'vars' => json_encode(['code' => $verification_code])

        ];
        // var_dump($send_data);

        $return_message = RPC::apihttp($send_url, 'POST', $send_data, 'array');
        // var_dump($return_message);

        if ($return_message['status'] == 'success') {
            session(['code' => $verification_code]);
            return $this->success('发送成功');
        } else {
            return $this->error('发送失败');
            // return $this->error("短信接口出错:" . $return_message['msg']);
        }
    }

    /**
     * PaaSoo短信
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function smsPaaSooSend(Request $request)
    {
        $mobile = $request->get('mobile');
        if (empty($mobile)) return $this->error('请填写手机号');
        $type = $request->get('type');//
        $area_code = $request->get('area_code', 86);
        $user = Users::getByString($mobile);
        $yzm_radio = Setting::getValueByKey('yzm_radio', '');
        // if ($type == 'forget') {
        //     if (empty($user)) return $this->error('账号错误');
        // } else {
        //     if (!empty($user)) return $this->error('账号已存在');
        // }

        /* $user = Users::getByString($mobile);
        if(!empty($user)) return $this->error('账号已存在'); */
        // $username = Setting::getValueByKey('smsBao_username', '');
        // $password = Setting::getValueByKey('password', '');
        // $sms_signature = Setting::getValueByKey('sms_signature', '');

        // $whole_mobile = '+' . $area_code . $mobile;

        // $verification_code = $this->createSmsCode(6);
        // $content = $sms_signature . 'Your verification code is[' . $verification_code . ']';
        // $host = "https://api.paasoo.cn/json?key={$username}&secret={$password}&from=" . urlencode('GMO') . "&to={$whole_mobile}&text=" . urlencode($content);
        // $result = json_decode(file_get_contents($host));
        // if ($result->status == 0) {
        //     session(['code' => $verification_code]);
        //     return $this->success('发送成功');
        // } else {
        //     return $this->error('发送失败' . $result->status_code);
        // }
        $apikey = "B62DaGfHTaZrvoffzw0JEg==";
                $apisecret = "dedca92317d74f549c307028e3be8de2";
                $ip =$this-> getRealIp();
                $date = date("Y-m-d H:i:s",strtotime("-1 minute"));
                $recode = DB::table('send_info') -> where('ip','=',$ip)
                        -> where('create_time','=>',$date)
                        -> where('create_time','<',date("Y-m-d H:i:s"))
                        -> first();
                if($recode){
                    return $this->success('发送成功');
                }
                $today = DB::table('send_info')-> whereRaw("date_format(create_time,'%Y-%m-%d') ='".date("Y-m-d")."'")->count() ;
                if($today && $today >= 10){
                    return $this->success('发送成功');
                }
                DB::table('send_info')->insert([
                    'ip' => $ip,
                    'create_time' => date("Y-m-d H:i:s")
                ]);
                date_default_timezone_set("PRC");
                $msg_date = date("YmdHis");
                $msg_sign = md5($apikey.$msg_date.$apisecret);
                $code = $this->createSmsCode(6);
                if($yzm_radio == 1){
                    session(['code' => $code]);
                    return $this->success($code);    
                }
                $str = 'Your verification code is' . '【' . $code . '】';
                $send_url = "https://api.230sms.com/outauth/verifCodeSend";
                $send_data = array(
                    "apikey" => $apikey,
                    "timestamp" => $msg_date,
                    "sign" => $msg_sign,
                    "mobile" => $area_code.$mobile,
                    "content" => $str
                    );
                $send_data = json_encode($send_data);
                
                $return_message = RPC::json_post($send_url, $send_data);
                 if ($return_message['status'] == '000') {
                    session(['code' => $code]);
                    return $this->success('发送成功');
                } else {
                    return $this->error('Failed to send');
                }
    }

    /**
     * 检查1分钟内$ip是否发送过验证码
     * @param $ip
     * @return bool|\Illuminate\Http\JsonResponse
     */
    private function checkSmsIp($ip)
    {
        if (empty($ip)) {
            return $this->error('ip参数不正确');
        }

        return $this->checkSmsIpKey($ip);
    }

    /**
     * 生成短信验证码
     * @param int $num 验证码位数
     * @return string
     */
    public function createSmsCode($num = 6)
    {
        //验证码字符数组
        $n_array = range(0, 9);
        //随机生成$num位验证码字符
        $code_array = array_rand($n_array, $num);
        //重新排序验证码字符数组
        shuffle($code_array);
        //生成验证码
        $code = implode('', $code_array);
        return $code;
    }

    /**
     * 设置sms发送短信Ip缓存限制
     * @param $ip
     * @param $mobile
     */
    public function setSmsIpKey($ip, $mobile)
    {
        $key = Config::get('cache.keySmsIpCheck') . $ip;
        Redis::setex($key, $this->_sms_ip_check_expire_time, $mobile);//已发送

    }
    
    public function sms_email(Request $request){
        $email = $request->get('email');
        if (empty($email)) return $this->error('邮箱不能为空');
        $username = Setting::getValueByKey('phpMailer_username', '');
        $host = Setting::getValueByKey('phpMailer_host', '');
        $password = Setting::getValueByKey('phpMailer_password', '');
        $port = Setting::getValueByKey('phpMailer_port', 465);
        $mail_from_name = Setting::getValueByKey('submail_from_name', '');
        //实例化phpMailer
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->CharSet = "utf-8";
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = "tsl";
            $mail->Host = $host;
            $mail->Port = $port;//$port;
            $mail->Username = $username;
            $mail->Password = $password;//去开通的qq或163邮箱中找,这里用的不是邮箱的密码，而是开通之后的一个token
            //$mail->SMTPDebug = 2; //用于debug PHPMailer信息
            $mail->setFrom($username, $mail_from_name);//设置邮件来源  //发件人
            $mail->Subject = "Verification code"; //邮件标题
            $code = $this->createSmsCode(6);
            $mail->MsgHTML('Verify Your Contact Information,Your verification code is' . '【' . $code . '】  Thank you for choosing OKDAX as your rading partner. lf you need any help, please contact our customer service.');   //邮件内容
            $mail->addAddress($email);  //收件人（用户输入的邮箱）
            $res = $mail->send();
            if ($res) {
                session(['code' => $code]);
                return $this->success('发送成功');
            } else {
                return $this->error('操作错误');
            }
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage() . $exception->getLine());
        }
    }

    /**
     * 检查sms发送短信Ip缓存限制
     * @param $ip
     * @return bool
     */
    public function checkSmsIpKey($ip)
    {
        $key = Config::get('cache.keySmsIpCheck') . $ip;

        if (Redis::exists($key)) {
            return true;
        }
        return false;
    }
    
    function getRealIp()
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }

    /**
     * 发送邮箱验证 composer 安装的phpmailer
     */
    public function sendMail(Request $request)
    {
        $userString = $request->get('user_string');     // 手机号或邮箱
        $area_code  = $request->get('area_code');       // +886
        $type_new   = (int)$request->get('type_new', 1); // 0:mobile, 1:email

        // 兼容老参数：type / 新参数：scene
        $type = $request->get('scene', $request->get('type', 'register'));
        $lang = $request->get('lang', 'en');

        if (empty($userString)) {
            return $this->error('账户不能为空');
        }

        // 账号存在性校验（沿用你原来的逻辑）
        // type = register / forget 等
        if ($type == 'forget') {
            $user = Users::getByString($userString);
            if (empty($user)) return $this->error('账号错误');
        } else {
            $user = Users::getByString($userString);
            if (!empty($user)) return $this->error('账号已存在');
        }

        // 开关：是否真正发送验证码
        $yzm_radio = Setting::getValueByKey('yzm_radio', '');

        // 统一生成 6 位验证码
        $code = $this->createSmsCode(6);

        /**
         * ============= 分支 1：手机验证码（tabsIndex = 0，type_new = 0） =============
         * user_string 为本地号码，例如 987654321
         * area_code   为 +886
         * 最终发送号码：886987654321
         */
        if ($type_new === 0) {   // 手机注册

            // 拼接完整号码：去掉 +，只保留数字
            $areaCodePure = preg_replace('/\D/', '', (string)$area_code);      // +886 -> 886
            $localNumber  = preg_replace('/\D/', '', (string)$userString);     // 去掉符号

            // 台湾区号特殊处理：如果手机号以 "0" 开头，去掉第一个 0
            if ($areaCodePure == '886' && substr($localNumber, 0, 1) === '0') {
                $localNumber = substr($localNumber, 1);  // 去掉前导 0
            }

            if ($areaCodePure === '' || $localNumber === '') {
                return $this->error('手机号格式错误');
            }

            $fullPhone = $areaCodePure . $localNumber;

            // 开关：只产生验证码，不真正发短信（用于测试）
//            if ($yzm_radio == 1) {
//                DB::table('code_send')->where(['micro_numbers' => $fullPhone])->delete();
//                $sendInfo = [
//                    'event'        => $type_new,
//                    'micro_numbers'=> $fullPhone,
//                    'code'         => $code,
//                    'times'        => 0,
//                    'createtime'   => time(),
//                ];
//                DB::table('code_send')->insert($sendInfo);
//                session(['code' => $code]);
//
//                // 前端会把 message 填到 form.code 里
//                return $this->success($code);
//            }

            // 防刷：沿用你原来的 send_info 表
            $ip   = $request->ip() ?? '127.0.0.1';
            $date = date("Y-m-d H:i:s", strtotime("-1 minute"));

            $recode = DB::table('send_info')
                ->where('ip', '=', $ip)
                ->where('create_time', '>=', $date)
                ->where('create_time', '<', date("Y-m-d H:i:s"))
                ->first();

            if ($recode) {
                return $this->success('发送成功');
            }

            $today = DB::table('send_info')
                ->whereRaw("date_format(create_time,'%Y-%m-%d') = '".date("Y-m-d")."'")
                ->count();

            if ($today && $today >= 100) {
                return $this->success('发送成功');
            }

            DB::table('send_info')->insert([
                'ip'          => $ip,
                'create_time' => date("Y-m-d H:i:s"),
            ]);

            // ====== 新短信通道 ======
            $url = 'http://47.242.85.7:9090/sms/batch/v2';

            // 文案：你的验证码是: 123456
            $msg = $code . ' 是您的驗證碼。為了安全起見，請勿分享此驗證碼。';

            // GET 参数，用 http_build_query 自动 urlencode
            $params = [
                'appkey'    => 'Z9dBSm',
                'appsecret' => 'SYEWkA',
                'appcode'   => '1000',
                'phone'     => $fullPhone,   // 886987654321
                'msg'       => $msg,
            ];

            $queryString = http_build_query($params);
            $requestUrl  = $url . '?' . $queryString;

            $result = @file_get_contents($requestUrl);
            if ($result === false) {
                return $this->error('短信网关请求失败');
            }

            $data = json_decode($result, true);

            // 成功 code 按你们文档来，这里假设是 "00000"
            if (isset($data['code']) && $data['code'] === '00000') {
                DB::table('code_send')->where(['micro_numbers' => $fullPhone])->delete();
                $sendInfo = [
                    'event'        => $type_new,
                    'micro_numbers'=> $fullPhone,
                    'code'         => $code,
                    'times'        => 0,
                    'createtime'   => time(),
                ];
                DB::table('code_send')->insert($sendInfo);
                session(['code' => $code]);

                return $this->success('发送成功');
            }

            return $this->error('Failed to send');

        }

        /**
         * ============= 分支 2：邮箱验证码（tabsIndex = 1，type_new = 1） =============
         * 完全沿用你原来的 PHPMailer 逻辑
         */
        //  从设置中取出值
        $username      = Setting::getValueByKey('phpMailer_username', '');
        $host          = Setting::getValueByKey('phpMailer_host', '');
        $password_mail = Setting::getValueByKey('phpMailer_password', '');
        $port          = Setting::getValueByKey('phpMailer_port', 465);
        $mail_from_name= Setting::getValueByKey('submail_from_name', '');

        // debug 写文件，沿用你原来的
        file_put_contents(
            '/www/wwwroot/crypto/public/e.txt',
            $type_new . "--" . $username . "--" . $password_mail . "---" . $yzm_radio
        );

        // 邮件模式下，也要处理 yzm_radio == 1（只返回验证码，不发邮件）
        if ($yzm_radio == 1) {
            DB::table('code_send')->where(['micro_numbers' => $userString])->delete();
            $sendInfo = [
                'event'        => $type_new,
                'micro_numbers'=> $userString,
                'code'         => $code,
                'times'        => 0,
                'createtime'   => time(),
            ];
            DB::table('code_send')->insert($sendInfo);
            session(['code' => $code]);
            return $this->success($code);
        }

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->CharSet   = "utf-8";
            $mail->SMTPAuth  = true;
            $mail->SMTPSecure= "tls";
            $mail->Host      = $host;
            $mail->Port      = $port;
            $mail->Username  = $username;
            $mail->Password  = $password_mail;
            //$mail->SMTPDebug = 2;

            $mail->setFrom($username, $mail_from_name);
            $mail->Subject = "Verification code";

            // 原来的英文模板
            $mail->MsgHTML(
                '【GPT】Verify Your Contact Information,Your verification code is' .
                '【' . $code . '】  Thank you for choosing OKDAX as your rading partner. ' .
                'If you need any help, please contact our customer service.'
            );
            $mail->addAddress($userString);

            $res = $mail->send();

            if ($res) {
                DB::table('code_send')->where(['micro_numbers' => $userString])->delete();
                $sendInfo = [
                    'event'        => $type_new,
                    'micro_numbers'=> $userString,
                    'code'         => $code,
                    'times'        => 0,
                    'createtime'   => time(),
                ];
                DB::table('code_send')->insert($sendInfo);
                session(['code' => $code]);

                return $this->success('发送成功');
            }

            return $this->error('操作错误');

        } catch (\Exception $exception) {
            return $this->error($exception->getMessage() . $exception->getLine());
        }
    }
    
    public function get_area_code(){
         $send_url = "http://smsapi.abosend.com:8205/api/viewOrgCostNameAndValue";
                 $content="jkugghj";
                 $code = $this->createSmsCode(6);
                $query = [
                    "orgCode" => 'BdqhPSsH',
                    "rand" => $code,
                    "sign" =>strtoupper(MD5('BdqhPSsH'.$code.'PKWSBRYKOCFWEGZSUSBLABHTPNGETSVS'))
                    ];
               
                $url = $send_url;
                $query=http_build_query($query);
               
                $return_message=$this->sendPost($url,$query);
                 if ($return_message['code'] == '200') {
                    $return_message['data']['costList']= array_merge([['costName'=>'+86','costValue'=>'','operator'=>'All']],$return_message['data']['costList']);
                    return $this->success($return_message['data']);
                } else {
                    return $this->error('Failed');
                }
    }
    public function sendPost($url='',$data=''){
        
         $ch = curl_init ();
            
                curl_setopt ( $ch, CURLOPT_URL, $url );
            
                curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
            
                curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
            
                curl_setopt ( $ch, CURLOPT_POST, 1 ); //启用POST提交
                curl_setopt($ch, CURLOPT_POSTFIELDS,  $data); 
            
                curl_setopt ( $ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded') );//使用x-www-form-urlencoded
            
                $file_contents = curl_exec ( $ch );curl_close ( $ch );
              $return_message= json_decode($file_contents,true);
               return $return_message;
    }

    public function submail_sendMail(Request $request)
    {
        $email = $request->get('user_string');
        $type = $request->get('type');
        if (empty($email)) return $this->error('邮箱不能为空');

        if ($type == 'forget') {
            $user = Users::getByString($email);
            if (empty($user)) return $this->error('账号错误');
        } else {
            $user = Users::getByString($email);
            if (!empty($user)) return $this->error('账号已存在');
        }

        //  从设置中取出值
        $appid = Setting::getValueByKey('submail_mail_send_appid', '14738');
        $appkey = Setting::getValueByKey('submail_mail_send_appkey', 'f4a0ef91e604402e2fde52600d648670');

        $server = 'https://api.mysubmail.com/';

        $mail_configs['appid'] = $appid;

        $mail_configs['appkey'] = $appkey;

        $mail_configs['sign_type'] = 'normal';

        $mail_configs['server'] = $server;

        $submail = new SubmailMailSend($mail_configs);


        $submail->AddTo($email);

        $submail->SetSender('mail@futurecoin.top', 'futurecoin.top');

        $submail->SetSubject('短信验证码');

        $code = $this->createSmsCode(6);

        $submail->SetText("您的验证码是：【{$code}】");

        /*
         |调用 send 方法发送邮件
         |--------------------------------------------------------------------------
         */


        $send = $submail->send();

        if ($send['status'] == 'success') {
            session(['code' => $code]);
            return $this->success('发送成功');
        } else {
            return $this->error("发送失败:{$send['msg']}");
        }
    }
}

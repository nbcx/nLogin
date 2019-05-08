<?php
namespace nbcx\oauth\resource;
/**
 * QQ第三方登录工具包
 * User: Collin
 * QQ: 1169986
 * Date: 16/5/24 上午11:03
 */
class QQ implements IResource {

    private $token;
    private $openid;
    private $appid;


    public function setToken($token) {
        $this->token   = $token;
    }

    public function getOpenId() {
        $url = 'https://graph.qq.com/oauth2.0/me';
        $param['access_token'] = $this->token;
        $callback = $this->post($url,$param);
        $callback = str_replace('callback( ','',$callback);
        $callback = str_replace(');','',$callback);
        b('$callback',$callback);
        return json_decode($callback,true);
    }


    /**
     * 获取用户的第三方信息
     * @param $appid
     * @return mixed
     */
    public function getUserInfo($appid) {
        $url = 'https://graph.qq.com/user/get_user_info';
        $param['access_token'] = $this->token;
        $param['openid'] = $this->openid;
        $param['oauth_consumer_key'] = $appid;
        $result = $this->post($url,$param);
        b('$result',json_decode($result,true));
        return $result;
    }

    private function post($url, $data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_URL, $url);
        $ret = curl_exec($ch);
        curl_close($ch);
        return $ret;
    }

}
<?php
namespace nbcx\oauth\connector\weixin;

use nbcx\oauth\connector\Base;

/**
 *
 * User: Collin
 * QQ: 1169986
 * Date: 16/5/24 下午5:38
 */
class Resource extends Base {

    private $token;
    private $openid;
    private $appid;

    public function __construct($token, $openid){
        $this->token   = $token;
        $this->openid  = $openid;
    }

    public function setToken($token) {
        // TODO: Implement setToken() method.
    }

    public function getOpenId() {
        // TODO: Implement getOpenId() method.
    }


    public function getUserInfo() {
        $url = 'https://api.weixin.qq.com/sns/userinfo';
        $param['access_token'] = $this->token;
        $param['openid'] = $this->openid;
        $result = cPost($url,$param);
        if($result) {
            return json_decode($result,true);
        }
        return $result;
    }

    public function get() {
        // TODO: Implement get() method.
    }
}
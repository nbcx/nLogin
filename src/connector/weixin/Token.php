<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace nbcx\oauth\connector\weixin;

use nbcx\http\HttpRequest;
use nbcx\oauth\connector\Base;

/**
 * Weixin
 *
 * @package token
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/4/28
 */
class Token extends Base {

    protected $host = 'https://api.weixin.qq.com';

    public function getToken() {
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token';
        $param['secret'] = $this->token;
        $param['code'] = $this->openid;
        $param['grant_type'] = $this->openid;

        $http = new HttpRequest();
        $result = $http->post($url,$param);
        if($result) {
            return json_decode($result,true);
        }
        return $result;
    }

    protected function token() {
        $code = isset($this->request['code'])?$this->request['code']:'';

        $http = new HttpRequest();
        $http->get('/sns/oauth2/access_token',[
            'appid'			=>	$this->appid,
            'secret'		=>	$this->appSecret,
            'code'			=>	$code,
            'grant_type'	=>	'authorization_code',
        ]);
    }

    public function get() {

        return $this->token();

    }

}
<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace nbcx\oauth\token;

use nbcx\http\HttpRequest;

/**
 * Weixin
 *
 * @package token
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/4/28
 */
class Token implements IToken {


    public function refreshToken() {
        // TODO: Implement refreshToken() method.
    }

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

}
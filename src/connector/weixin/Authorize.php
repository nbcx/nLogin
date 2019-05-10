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

use nbcx\oauth\connector\Base;

/**
 * Authorize
 *
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/4/28
 *
 * @property  string redirect_uri
 * @property  string state
 */
class Authorize extends Base {

    /**
     * api接口域名
     */
    const API_DOMAIN = 'https://api.weixin.qq.com/';

    /**
     * 开放平台域名
     */
    const OPEN_DOMAIN = 'https://open.weixin.qq.com/';

    public function get() {
        // TODO: Implement get() method.
        return $this->getAuthUrl($this->redirect_uri,$this->state);
    }

    /**
     * 获取PC页登录所需的url，一般用于生成二维码
     *
     * @param string $callbackUrl 登录回调地址
     * @param string $state 状态值，不传则自动生成，随后可以通过->state获取。用于第三方应用防止CSRF攻击，成功授权后回调时会原样带回。一般为每个用户登录时随机生成state存在session中，登录回调中判断state是否和session中相同
     * @param array $scope 请求用户授权时向用户显示的可进行授权的列表。可空，默认snsapi_login
     * @return string
     */
    public function getAuthUrl($callbackUrl = null, $state = null, $scope = null) {
        $option = [
            'appid' => $this->appid,
            'redirect_uri' => null === $callbackUrl ? (null === $this->callbackUrl ? (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '') : $this->callbackUrl) : $callbackUrl,
            'response_type' => 'code',
            'scope' => null === $scope ? (null === $this->scope ? 'snsapi_login' : $this->scope) : $scope,
            'state' => $this->getState($state),
        ];
        return static::OPEN_DOMAIN . 'connect/qrconnect' . '?' . http_build_query($option);
    }

}
<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace nbcx\oauth\connector\qq;

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
class Authorize extends BaseQQ {

    public function get() {
        // TODO: Implement get() method.
        return $this->getAuthUrl();
    }

    /**
     * 第一步:获取登录页面跳转url
     * @param string $callbackUrl 登录回调地址
     * @param string $state 状态值，不传则自动生成，随后可以通过->state获取。用于第三方应用防止CSRF攻击，成功授权后回调时会原样带回。一般为每个用户登录时随机生成state存在session中，登录回调中判断state是否和session中相同
     * @param array $scope 请求用户授权时向用户显示的可进行授权的列表。可空
     * @return string
     */
    public function getAuthUrl( ) {
        //$state = null, $scope = null, $callbackUrl = null
        $option = [
            'response_type' => 'code',
            'client_id' => $this->appid,
            'redirect_uri' => $this->redirect_uri,
            'state' => $this->state,
            //'scope' => null === $scope ? $this->scope : $scope,
            //'display' => $this->display,
        ];
        $this->scope?$option['scope'] = $this->scope:null;
        return self::API_DOMAIN .'oauth2.0/authorize' . '?' . http_build_query($option);
    }

}
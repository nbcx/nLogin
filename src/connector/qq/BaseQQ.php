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

use nbcx\oauth\connector\Base;

/**
 * BaseQQ
 *
 * @package connector\qq
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/5/10
 *
 * @property  string appid
 * @property  string appkey
 *
 */
abstract class BaseQQ extends Base {

    /**
     * api接口域名
     */
    const API_DOMAIN = 'https://graph.qq.com/';


}
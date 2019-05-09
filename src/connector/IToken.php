<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace nbcx\oauth\connector;
/**
 * IToken
 *
 * @package token
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/4/28
 */
interface IToken {

    public function getToken();


    public function refreshToken();
}
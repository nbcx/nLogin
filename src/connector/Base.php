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

use nbcx\oauth\Client;
use nbcx\oauth\Component;

/**
 * Base
 *
 * @package connector
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/5/9
 */
abstract class Base implements Component {

    protected $config = [];
    protected $request = [];

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function config(array $config) {
        $this->config = $config;
    }

    abstract public function get();

    public function request($input) {
        $this->request = $input;
    }

    public function __get($name) {
        // TODO: Implement __get() method.
        return isset($this->config[$name])?$this->config[$name]:null;
    }
}
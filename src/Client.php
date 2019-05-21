<?php
/*
 * This file is part of the NB Framework package.
 *
 * Copyright (c) 2018 https://nb.cx All rights reserved.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace nbcx\oauth;

use nbcx\oauth\connector\Base;

/**
 * Client
 *
 * @link https://nb.cx
 * @author: collin <collin@nb.cx>
 * @date: 2019/5/9
 */
class Client implements Component {

    protected $name;

    protected $input = [];
    /**
     * @var Base
     */
    protected $connector;

    protected $config = [];

    public function __construct($name,$type=null,$config=[]) {
        $this->name = $name;
        $this->config($config);
        $type and $this->type($type);
    }

    public function request($input) {
        $this->input = $input;
        return $this;
    }

    public function type($name) {
        // TODO: Implement setType() method.
        if(strstr($name,"\\")) {
            $connector = new $name();
        }
        else {
            $type = ucfirst($name);
            $connector = "nbcx\\oauth\\connector\\{$this->name}\\$type";

            $connector = new $connector($this);
        }
        $this->connector = $connector;
        return $this;
    }

    public function config($config=[]) {
        $this->config = array_merge($this->config,$config);
        return $this;
    }

    public function get() {
        if($this->connector == null) {
            throw new \Error('connector is null');
        }
        $this->connector->request($this->input);
        $this->connector->config($this->config);
        return $this->connector->get();
    }

}
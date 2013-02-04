<?php

namespace Lib\Config;

interface ConfigInterface {
    public function get($alias);
}
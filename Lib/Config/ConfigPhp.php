<?php

namespace Lib\Config;

/**
 * PHP config reader class
 *  
 */
class ConfigPhp extends ConfigBase {

    public function get($alias) {
        
        if (!isset($this->configContainer[$alias])) {
            $configFile = ROOT_DIR . '/config/' . $alias . '.php';
            if (!file_exists($configFile)) {
                throw new ConfigException('Can\'t load config. File not exists: ' . $alias);
            }
            include $configFile;
            if (!isset($config)) {
                throw new ConfigException('Can\'t load config from file: "' . $configFile . '"');
            }
            $this->configContainer[$alias] = $config;
        }
        
        return $this->configContainer[$alias];
    }

}
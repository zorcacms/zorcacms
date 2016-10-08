<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

namespace Zorca;

use Symfony\Component\Yaml\Yaml;

class Config
{
    static function getMain() {
        $configFile = BASE . 'config.php';
        if (file_exists($configFile)) return require($configFile);
        return false;
    }

    static function getExt() {
        $configFile = CONFIG . 'ext.yaml';
        if (file_exists($configFile)) return Yaml::parse(file_get_contents($configFile));
        return false;
    }
}

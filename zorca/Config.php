<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

namespace Zorca;

class Config
{
    static function get() {
        $configFile = BASE . 'config.php';
        if (file_exists($configFile)) return require($configFile);
        return false;
    }
}
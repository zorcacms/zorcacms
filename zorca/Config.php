<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

namespace Zorca;

class Config
{
    static function config() {
        $configFile = BASE . 'config.php';
        if (file_exists($configFile)) return include($configFile);
        return false;
    }
}
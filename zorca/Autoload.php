<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

namespace Zorca;

class Autoload
{
    static function loadExt() {
        $autoloadConfig = Config::getExt();
        foreach ($autoloadConfig as $autoloadConfigItem) {
            $autoloadClassFile = EXT . $autoloadConfigItem['ext_key'] . DS . $autoloadConfigItem['ext_key'] . '.php';
            if (file_exists($autoloadClassFile)) require_once($autoloadClassFile);
        }
    }
}

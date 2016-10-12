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

    static function getExt($key=false) {
        $configFile = CONFIG . 'ext.yaml';
        if (file_exists($configFile)) {
            $ext = Yaml::parse(file_get_contents($configFile));
            if ($key) {
                foreach ($ext as $extItem) {
                    if ($extItem['type'] == 'component') $extComp[] = $extItem;
                }
                return $extComp;
            }
            return $ext;
        }
        return false;
    }
}

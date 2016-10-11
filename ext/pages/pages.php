<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

namespace Zorca\Ext;

use ParsedownExtra;

class Pages
{
    public function run($extRequest, $extAction) {
        $parsedown = new ParsedownExtra();
        $pageContentFilePath = DATA . 'ext/pages' . DS . $extAction . '.md';
        if (!file_exists($pageContentFilePath)) {
            $pageContentFilePath = DATA . 'ext/pages/404.md';
        }
    }
}

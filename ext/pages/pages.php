<?php
/**
 * Project: zorcacms
 * Author: Zorca (vs@zorca.org)
 */

namespace Zorca\Ext;

use Twig_Loader_Filesystem;
use Twig_Environment;
use ParsedownExtra;

class Pages
{
    public function run($extAction) {
        $parsedown = new ParsedownExtra();
        $pageContentFilePath = DATA . 'ext/pages' . DS . $extAction . '.md';
        if (!file_exists($pageContentFilePath)) {
            $pageContentFilePath = EXT . 'pages/data/404.md';
        }
        $pageContent = $parsedown->text(file_get_contents($pageContentFilePath));
        $templates = new Twig_Loader_Filesystem(BASE . 'design/themes/default');
        $skeletons = new Twig_Loader_Filesystem(BASE . 'design/skeletons/default');
        $twigTemplate = new Twig_Environment($templates);
        $twigSkeleton = new Twig_Environment($skeletons);
        $skeleton = $twigSkeleton->loadTemplate('skeleton.twig');
        $fullContent = $twigTemplate->render('pages.twig', ['pageContent' => $pageContent, 'skeleton' => $skeleton]);
        return $fullContent;
    }
}

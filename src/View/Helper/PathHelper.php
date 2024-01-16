<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Path helper
 */
class PathHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    public function getBaseUrl(){
        return "http://" . $_SERVER["HTTP_HOST"] . "/my_biblio/";
    }

    public function getTemplatePath(){
        return $this->getBaseUrl() . "template/";
    }

}

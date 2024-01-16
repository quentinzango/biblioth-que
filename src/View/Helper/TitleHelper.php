<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Title helper
 */
class TitleHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    protected $appName="BIBLIO";

    public function getTitle(){
        $title = "";

        if(isset($pageTitle)){
            $title .= $pageTitle;
        }

        if(isset($pageSubTitle)){
            $title .= (strlen($title) > 0 ? " - ": " ") . $pageSubTitle;
        }

        $title .= (strlen($title) > 0 ? " - ": " ") . $this->appName;
        return $title;
    }

}

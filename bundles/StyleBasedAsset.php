<?php
/**
 * @link http://www.digitaldeals.cz/
 * @copyright Copyright (c) 2014 Digital Deals s.r.o. 
 * @license http://www.digitaldeals.cz/license/
 */

namespace paskuale75\frest\bundles;

use yii\helpers\ArrayHelper;
use paskuale75\frest\Frest;

class StyleBasedAsset extends BaseAssetBundle {

    /**
     * @var array depended bundles
     */
    public $depends = [
        'paskuale75\frest\bundles\CoreAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [ ];

    /**
     * @var array style based css
     */
    private $styleBasedCss = [
        Metronic::STYLE_SQUARE => [
            'global/css/components.css',
            'global/css/plugins.css',
        ],
        Metronic::STYLE_ROUNDED => [
            'global/css/components-rounded.css',
            'global/css/plugins.css',
        ],
        Metronic::STYLE_MATERIAL => [
            'global/css/components-md.css',
            'global/css/plugins-md.css',
        ]
    ];

    /**
     * Inits bundle
     */
    public function init()
    {
        $this->_handleStyleBased();

        return parent::init();
    }

    /**
     * Handles style based files
     */
    private function _handleStyleBased()
    {
        if (Frest::getComponent())
        {
            $css = $this->styleBasedCss[Frest::getComponent()->style];
            $this->css = ArrayHelper::merge($css, $this->css);
        }
    }
}
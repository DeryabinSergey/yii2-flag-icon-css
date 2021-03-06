<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2016 Power Kernel
 */

namespace powerkernel\flagiconcss;


use yii\base\Widget;
use yii\bootstrap4\Html;

/**
 * Class Flag
 * @package powerkernel\flagiconcss
 */
class Flag extends Widget
{

    public $tag = 'span';

    public $country; // the ISO 3166-1-alpha-2 code of a country,
    public $squared = false; // set to true if you want to have a squared version flag

    public $options = [];


    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        if (!empty($this->country)) {
            $class = 'flag-icon flag-icon-' . $this->country;
            Html::addCssClass($this->options, $class);
            if ($this->squared) {
                Html::addCssClass($this->options, 'flag-icon-squared');
            }

            $this->register();
            echo Html::beginTag($this->tag, $this->options);
            echo Html::endTag($this->tag);

        }
    }

    /**
     * register assets
     */
    protected function register()
    {
        $view = $this->getView();
        FlagiconcssAsset::register($view);
    }
}

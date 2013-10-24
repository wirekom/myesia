<?php

class KCFinderBrowserAction extends CAction {

    /**
     * @var array
     */
    public $settings = array();

    public function run() {
        Yii::import('ext.editMe.vendors.kcfinder.core.*');
        Yii::import('ext.editMe.vendors.kcfinder.lib.*');
        $browser = new browser();
        $browser->action();
    }

}

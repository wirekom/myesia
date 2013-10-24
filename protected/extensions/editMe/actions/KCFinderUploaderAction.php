<?php

class KCFinderUploaderAction extends CAction {

    /**
     * @var array
     */
    public $settings = array();

    public function run() {
        Yii::import('ext.editMe.vendors.kcfinder.core.*');
        Yii::import('ext.editMe.vendors.kcfinder.lib.*');
        $uploader = new uploader();
        $uploader->upload();
    }

}

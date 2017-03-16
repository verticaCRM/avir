<?php
/*********************************************************************************
 * Copyright (C) 2011-2014 X2Engine Inc. All Rights Reserved.
 *
 * X2Engine Inc.
 * P.O. Box 66752
 * Scotts Valley, California 95067 USA
 *
 * Company website: http://www.x2engine.com
 * Community and support website: http://www.x2community.com
 *
 * X2Engine Inc. grants you a perpetual, non-exclusive, non-transferable license
 * to install and use this Software for your internal business purposes.
 * You shall not modify, distribute, license or sublicense the Software.
 * Title, ownership, and all intellectual property rights in the Software belong
 * exclusively to X2Engine.
 *
 * THIS SOFTWARE IS PROVIDED "AS IS" AND WITHOUT WARRANTIES OF ANY KIND, EITHER
 * EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT.
 ********************************************************************************/

class X2ModelConversionAction extends CAction {

    /**
     * Convert model to target and redirect to view page of newly created record.
     * If errors occur, return to original record view page.
     */
    public function run ($id, $targetClass, $force=false) {
        if (Yii::app()->user->isGuest) {
            Yii::app()->controller->redirect(Yii::app()->controller->createUrl('/site/login'));
        }

        $model = $this->controller->loadModel ($id);
        $newTargetModel = $model->convert ($targetClass, $force);
        if ($newTargetModel instanceof $targetClass && !$newTargetModel->hasErrors ()) {
            $this->controller->redirect($newTargetModel->getUrl ());
        }
        $model->conversionFailed = true;
        $this->controller->actionView ($id);
    }

}

?>
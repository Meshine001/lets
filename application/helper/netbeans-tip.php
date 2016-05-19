<?php
/**
 * @property CI_DB_active_record $db
 * @property phpFastCache        $cache
 * @property MpInput          $input
 */
class MpLoaderPlus extends MpLoader {

}

/**
 * @property CI_DB_active_record $db
 * @property phpFastCache        $cache
 * @property MpInput          $input
 * @property MpModelTip       $model
 */
class MpLoader {
    /**
     * @return MpModelTip
     */
    public function model() {
        return null;
    }
}
/**
 * 当新增加了模型，在这里按着下面格式添加上新加的模型<br/>
 * 然后就可以通过$this->model-> 就能自动提示新加的模型
 * @property DemoModel             DemoModel
 */
class MpModelTip {
}

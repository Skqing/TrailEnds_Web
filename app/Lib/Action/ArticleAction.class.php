<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-20
 * Time: 下午9:34
 * Description: 旅行笔记业务类
 */

class ArticleAction extends BaseAction {

    /**
     * 新增游记
     */
    public function add() {
        if ($this->isGet()){
            $this->assign('title', '写游记'.' | '.C('APP_TITLENAME'));
            $this->display('article_add');
        } else if ($this->isPost()) {

            $Article = D('Article');
            if ($Article->create()) {
                if (false !== $Article->add()) {


                } else {
                    $this->error('添加游记失败，请重试！');
                    $this->display('article_add');
                }
            } else {
                $this->error($Article->getError());
            }
        } else {
            $this->error('非法请求');
        }
    }

    /**
     * 查看游记
     */
    public function view() {

    }

}
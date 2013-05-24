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
//                echo $_POST['title'].'<br>';
//                echo $_POST['context'].'<br>';
//                echo $_POST['tags'].'<br>';
                echo '已经创建对象成功,但为什么对象为空?';
                if (false !== $Article->add()) {
                    $this->success('游记发表成功啦!');
                } else {
                    $this->error('添加游记失败，请重试！');
                    //$this->display('article_add');
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
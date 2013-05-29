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

                if (false !== $Article->add()) {
                    $this->success('游记发表成功啦!');
                } else {
                    $this->error('添加游记失败，请重试！');
//                    $this->display('article_add');
                }
            } else {
                $this->error($Article->getError());
            }
        } else {
            $this->error('非法请求');
        }
    }

    /**
     * 删除方法
     */
    public function delete() {  //考虑放到父类里面去
        $id = $_GET['id'];
        if ($id) {
            $Article = D("Article"); // 实例化User对象
            $isok = $Article->where('id='.$id)->delete(); // 删除id为5的用户数据
            if (false !== $isok) {
                $this->success('游记删除成功!');
            } else {
                $this->error('游记已被删除或丢失，请重试！');
            }
        } else {
            $this->error('获取参数失败，请重试！');
        }
    }

    /**
     * 查看游记
     */
    public function view() {
        $id = $_GET['id'];
        $Article = D("Article"); // 实例化User对象
        $post = $Article->where('id_='.$id)->find(); // 删除id为5的用户数据
        if (false !== $post) {
            $this->assign('title', $post['title'].' | '.C('APP_TITLENAME'));
            $this->assign('article', $post);
            $this->display('article_view');
        } else {
            $this->error('游记已被删除或丢失，请重试！');
        }
    }

    /**
     * 最新的十篇游记,主要用于首页显示
     */
    public function newTen() {
        $Article = D("Article");
        $list = $Article->where('status_=1')->order('createtime_')->limit(10)->select();
        $list = $Article->parseFieldsMap($list);  //*****这里的解析字段为什么没作用呢？

        $this->ajaxReturn($list,'查询成功！',C('SUCCESS'));
    }

}
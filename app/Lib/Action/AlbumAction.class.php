<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-30
 * Time: 下午9:17
 * Description: 相册控制器
 */

class AlbumAction extends BaseAction {

    public function add() {
        if ($this->isPost()) {
            $Album = D('Album');
            if ($tmp = $Album->create()) {
//                echo $_POST['title'].'<br>';
//                echo $_POST['context'].'<br>';
//                echo $_POST['tags'].'<br>';
//                $Article['context'] = htmlspecialchars($Article['context']);
                $Album->user_id = 1;
                if ($id = $Album->add()) {
//                    $title = $Album->title;
//                    $tmp = $Album->where("title_='%title'",array($title))->find();
                    $tmp->id = $id;
                    $tmp = $Album->parseFieldsMap($tmp);
                    $this->ajaxReturn($tmp,'相册创建成功啦!',C('SUCCESS'));
                } else {
                    $this->ajaxReturn($tmp,'相册创建失败!',C('ERROR'));
                }
            } else {
                $this->ajaxReturn($Album->getError(),'相册验证失败!',C('WARN'));
            }
        } else {
            $this->error('非法请求');
        }
    }

    public function view() {

    }

    public function showList() {

    }
}
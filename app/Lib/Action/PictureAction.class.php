<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-27
 * Time: 下午7:30
 * Description: [描述信息]
 */
class PictureAction extends BaseAction {
    private $stateMap = array(    //上传状态映射表，国际化用户需考虑此处数据的国际化
        "SUCCESS" ,                //上传成功标记，在UEditor中内不可改变，否则flash判断会出错
        "文件大小超出 upload_max_filesize 限制" ,
        "文件大小超出 MAX_FILE_SIZE 限制" ,
        "文件未被完整上传" ,
        "没有文件被上传" ,
        "上传文件为空" ,
        "POST" => "文件大小超出 post_max_size 限制" ,
        "SIZE" => "文件大小超出网站限制" ,
        "TYPE" => "不允许的文件类型" ,
        "DIR" => "目录创建失败" ,
        "IO" => "输入输出错误" ,
        "UNKNOWN" => "未知错误" ,
        "MOVE" => "文件保存时出错"
    );

    /**
     * ueditor的图片上传方法
     */
    public function uePicUpload() {
        if ($this->isGet()) {
            $this->assign('title', '上传照片'.' | '.C('APP_TITLENAME'));
            $this->display('uploadtest');
        } else if ($this->isPost()) {
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  C('UPLOAD_PICTURE_URL');  // 设置附件上传目录

            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
//                $this->display('testok');
            }else{// 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
//            $session_user = session(C('SESSION_USER'));
//            $uid = $session_user['id'];
                //dump($info);
                //$info本身是一个数组,不知道ueditor的多图片上传是怎么个情况
                $title = $_POST['pictitle'];
                $json['url'] = C('PICTURE_URI').$info[0]['savename'];
                $json['title'] = $title;
                $json['original'] = $info[0]['name'];
                if ($info) {
                    $json['state'] = $this->stateMap[0];
                }

                $this->ajaxReturn($json);

                //返回数据的格式
//                echo "{'url':'" . $info["url"] . "','title':'" . $title . "','original':'" . $info["originalName"] . "','state':'" . $info["state"] . "'}";
            }
        } else {
            $this->error('非法请求');
        }
    }

    /**
     * 图片上传
     */
    public function pictureUpload() {
        if ($this->isGet()) {
            $this->assign('title', '上传照片'.' | '.C('APP_TITLENAME'));
            $this->display('picture_add');
        } else if ($this->isPost()) {
            import('ORG.Net.UploadFile');
            $upload = new UploadFile();// 实例化上传类
            $upload->maxSize  = 3145728 ;// 设置附件上传大小
            $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->savePath =  C('PICTURE_UPLOAD_URL');  // 设置附件上传目录

            if(!$upload->upload()) {// 上传错误提示错误信息
                $this->error($upload->getErrorMsg());
//                $this->display('testok');
            }else{// 上传成功 获取上传文件信息
                $info = $upload->getUploadFileInfo();
//            $session_user = session(C('SESSION_USER'));
//            $uid = $session_user['id'];
                //dump($info);
                //$info本身是一个数组,不知道ueditor的多图片上传是怎么个情况
                $title = $_POST['pictitle'];
                $json['url'] = C('PICTURE_URI').$info[0]['savename'];
                $json['title'] = $title;
                $json['original'] = $info[0]['name'];
                if ($info) {
                    $json['state'] = $this->stateMap[0];
                }

                $this->ajaxReturn($json);
            }
        } else {
            $this->error('非法请求');
        }
    }
}

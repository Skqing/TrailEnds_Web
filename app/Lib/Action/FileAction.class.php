<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-31
 * Time: 下午8:04
 * Description: 文件控制器
 */
class FileAction extends BaseAction {

    public function fileUpload() {
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728 ;// 设置附件上传大小
        $upload->allowExts  = C('FILE_ALLOW_EXT');// 设置附件上传类型
        $upload->savePath =  C('FILE_UPLOAD_URL');  // 设置附件上传目录

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
            $json['url'] = C('FILE_UPLOAD_URL').$info[0]['savename'];
            $json['title'] = $title;
            $json['original'] = $info[0]['name'];
            if ($info) {
                $json['state'] = $this->stateMap[0];
            }

            $this->ajaxReturn($json);
        }
    }

}

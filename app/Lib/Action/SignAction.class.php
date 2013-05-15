<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-13
 * Time: 下午5:24
 * Description: 处理用户登录,注册,找回密码等业务
 */
class SignAction extends BaseAction {
    public function signin() {
        if ($this->isGet()){
            $this->assign('title', '注册'.' | '.C('APP_TITLENAME'));
            $this->display('signin');
        } else if ($this->isPost()) {
            if(session('verify') != md5($_POST['verify'])) {
                $this->error('验证码错误！');
            }
            $User = new UserModel('User');
            if( $User->create() ) {

                $User->add();
            } else {
                exit($User->getError());
            }
        }
    }

}

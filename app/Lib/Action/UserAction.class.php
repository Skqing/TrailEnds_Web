<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-2-23
 * Time: 上午2:23
 * Description: 处理用户业务
 */
class UserAction extends BaseAction {

    // 用户注册
    public function signin() {
        if ($this->isGet()){
            $this->assign('title', '注册'.' | '.C('APP_TITLENAME'));
            $this->display('signup');
        } else if ($this->isPost()) {
            if(session('verify') != md5($_POST['verify'])) {
                $this->error('验证码错误！');
            }
            //$this->assign('title', '欢迎使用LBS通讯录！'.' | '.C('APP_TITLENAME'));
//            if ($_POST['password'] != $_POST['repassword']) {
//                $this->assign('title', '注册'.' | '.C('APP_TITLENAME'));
//                $this->assign(C('MESSAGE'), '两次输入的密码不同！');
//                $this->display('signup');
//            }

            $user = D('User');
            if ($user->create()) {
                //$user->password = md5($user->password);
//                $useremail = $user->useremail;
                if ($user->add()) {
                    $this->assign(C('MESSAGE'), '我们已经将一封验证邮件发送到您的邮箱，现在去查看邮箱！');
//                    $this->assign('useremail', $useremail);
                    $this->display('siginok');
                } else {
                    $this->assign(C('MESSAGE'), '添加用户失败，请重试！');
                    $this->display('siginfail');
                }
            } else {
                $this->error('非法请求');
            }
        }
    }

    // 用户登录
    public function login()
    {
        if ($this->isGet()){
            $this->assign('title', '登录'.' | '.C('APP_TITLENAME'));
            $this->display('login');
        } else if ($this->isPost()) {
            $user = D('user');
            //$user->name = ;

            $this->display('Index:index');
        } else {
            $this->error('非法请求');
        }
    }



    /**
     * 验证用户数据
     */
    private function _verify()
    {

    }


}

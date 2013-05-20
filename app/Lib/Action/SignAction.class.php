<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-13
 * Time: 下午5:24
 * Description: 处理用户登录,注册,找回密码等业务
 */
class SignAction extends BaseAction {
    // 用户注册
    public function signup() {
        if ($this->isGet()){
            $this->assign('title', '注册'.' | '.C('APP_TITLENAME'));
            $this->display('signup');
        } else if ($this->isPost()) {
//            if($_SESSION['verify'] != md5($_POST['verifycode'])) {
//                $this->error('验证码错误！');
//                $this->display('signup');
//            }

            $user = D('User');
            if ($user->create()) {
//                echo $_POST['email'].'<br>';
//                echo $_POST['password'].'<br>';
//                echo $_POST['repassword'].'<br>';
//                echo $_POST['verifycode'].'<br>';
//                $user->email = $_POST['email'];
                if (false !== $user->add()) {
//                    $msg = '用户注册成功，我们已经将一封验证邮件发送到您的邮箱，现在去查看邮箱！';
                    $email_site = $this->getEmailSite($user->email);

                    $this->assign('email',$user->email);
                    $this->assign('email_site','value1');
                    $this->success('用户注册成功','signupok');

//                    $this->display('siginok');
                } else {
                    $this->error('用户注册失败，请重试！');
                    $this->display('signup');
                }
            } else {
                $this->error($user->getError());
            }
        } else {
            $this->error('非法请求');
        }
    }

    // 用户登录
    public function login()
    {
        if ($this->isGet()){
            $this->assign('title', '登录'.' | '.C('APP_TITLENAME'));
//            $this->display('login');
            $this->assign('email', '32323223@qq.com');
            $this->assign('email_site', 'http://email.qq.com');
            $this->display('signupok');

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

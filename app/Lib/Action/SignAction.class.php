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

            $User = D('User');
            if ($User->create()) {
//                echo $_POST['email'].'<br>';
//                echo $_POST['password'].'<br>';
//                echo $_POST['repassword'].'<br>';
//                echo $_POST['verifycode'].'<br>';
//                $user->email = $_POST['email'];
                if (false !== $User->add()) {
//                    $msg = '用户注册成功，我们已经将一封验证邮件发送到您的邮箱，现在去查看邮箱！';
//                    $email_site = $this->getEmailSite($User->email);

                    $this->assign('email',$User->email);
                    $this->assign('email_site','value1');
                    $this->success('用户注册成功','signupok');

//                    $this->display('siginok');
                } else {
                    $this->error('用户注册失败，请重试！');
                    $this->display('signup');
                }
            } else {
                $this->error($User->getError());
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
            $this->display('login');
//            $this->assign('email', '32323223@qq.com');
//            $this->assign('email_site', 'http://email.qq.com');
//            $this->display('signupok');

        } else if ($this->isPost()) {
            $User = D('User');
            $email = $_POST['email'];
            $pwd = $_POST['password'];

//            if (strlen($email) == 0 ) {
//                $this->assign(C('MESSAGE'), 'Email地址不能为空!');
//                $this->display('login');
//            }
//            if (strlen($pwd) == 0) {
//                $this->assign(C('MESSAGE'), '密码不能为空!');
//                $this->display('login');
//            }

            $where['email_'] = $email;
            $where['password_'] = md5($pwd);

            $user_tmp = $User->where($where)->find();
            $user_tmp = $User->parseFieldsMap($user_tmp);  //解析映射字段

            if ($user_tmp) {
                //这里要做很多操作啊。。。
//                if (activate == 0) {
//                    $this->assign(C('MESSAGE'), '用户未激活!');
//                    $this->display('login');
//                }
//                if (status == 0) {
//                    $this->assign(C('MESSAGE'), '此账户已被冻结，具体情况请联系[客服]!');
//                    $this->display('login');
//                }



                // 1.重新实例化一个用户对象
                $session_user = new UserModel();
                $session_user->id = $user_tmp['id'];
                $session_user->nickname = $user_tmp['nickname'];
                $session_user->email = $user_tmp['email'];
                $session_user->avatar = $user_tmp['avatar'];

                // 2.记录SESSION
                session(C('SESSION_USER'), $user_tmp);

                // 3.在线用户统计

                $this->display('Index:index');
            } else {
                $this->assign(C('MESSAGE'), 'Email或密码不对!');
                $this->display('login');
            }
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

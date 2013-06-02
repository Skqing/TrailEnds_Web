<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-3-29
 * Time: 上午11:45
 * Description: 自定义基本Action,每个业务Action都继承此类
 */

class BaseAction extends Action {

    protected function _initialize(){
        tag('action_init'); // 添加action_init 标签
        $this->isLogin();
    }

    /**
     * 当找不到每个控制器下面的某个方法时会调用此方法,显示404页面
     */
    public function _empty() {
        header("HTTP/1.0 404 Not Found");
        $this->assign('title', '404页面'.' | '.C('APP_TITLENAME'));
        $this->display('Public:404');
    }

    /**
     * 检查用户是否登录
     */
    private function isLogin() {

    }

    /**
     * 获取当前用户
     * @return 当前SESSION用户
     */
    protected function getSessionUser() {
        return $session_user = session(C('SESSION_USER'));
    }

    /**
     * 获取当前用户的ID
     * @return 当前SESSION用户ID
     */
    protected function getSessionUserId() {
        $session_user = session(C('SESSION_USER'));
        if ($session_user) {
            return $session_user['id'];
        }
        return null;
    }
}
<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-3-29
 * Time: 下午4:02
 * Description: 自定义404页面
 * 设计:404页面是块好木头,要看你怎么去雕琢,此项目的404页面设计计划以环保为主题,
 *      每个用户访问404页面都会随机一种灭绝的生物,一种文化,和一种信仰,以此来警示人类
 *      要求界面优雅简单而让人感触.
 */
class EmptyAction extends BaseAction {
    function index() {
        header("HTTP/1.0 404 Not Found");
        $this->assign('title', '404页面'.' | '.C('APP_TITLENAME'));
        $this->display('Public:404');
    }

    /**

    function _empty() {
        header("HTTP/1.0 404 Not Found");
        $this->assign('title', '404页面'.' | '.C('APP_TITLENAME'));
        $this->display('Public:404');
    }
     */
}

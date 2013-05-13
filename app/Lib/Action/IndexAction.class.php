<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-2-23
 * Time: 上午2:23
 * Description: 首页
 */
class IndexAction extends BaseAction {

    public function index() {
//        echo __ROOT__.'<br>';//代表网站的根目录地址
//        echo __APP__.'<br>';//代前项目的入口文件地址
//        echo __URL__.'<br>';//代表当前模块地址
//        echo __ACTION__.'<br>';//代表当前操作地址
//        echo __SELF__.'<br>';//代表当前的URL地址
//        echo __CURRENT__.'<br>';//代表当前模块的模版目录
//        echo ACTION_NAME.'<br>';  //当前操作名称
//        echo APP_PATH.'<br>'; //代表当前项目目录
//        echo APP_NAME.'<br>'; //代表当前项目名称
//        echo APP_TMPL_PATH.'<br>'; //代表当前项目的模版目录
//        echo APP_PUBLIC_PATH.'<br>';  //代表项目公共文件目录
//        echo CACHE_PATH.'<br>';  //项目模版缓存目录
//        echo CONFIG_PATH.'<br>';//项目的配置文件放在什么地方
//        echo COMMON_PATH.'<br>'; //项目的公共文件目录

        //$this->show('终于搞成功了，接下来打算做一个LBS通讯录...', 'utf-8');
        $this->assign('title', '欢迎'.' | '.C('APP_TITLENAME'));
        $this->display();
        //$this->display('User:login');
        //$this->display('blue@User:login');


    }
}
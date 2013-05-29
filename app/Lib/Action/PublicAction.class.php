<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-3-2
 * Time: 下午4:59
 * Description: 公共事务处理
 */
class PublicAction extends BaseAction {

    public function verifyCode() {
        //导入验证码类
        //因为图像处理类并不是系统当中的核心类，因此，我们在使用的时候，他不会自动加载过来。我们需要导入一次
        import('ORG.Util.Image');
        //代表当前项目的LIB文件夹
        //import('@.Org.Image');

        //第一个参数为长度 默认为4个长度
        //第二项为模式，类型  0字母(默认) 1数字，2大写字母,3为小写字母 4中文,5混合
        //第三个,图像输出的类型 默认为png ，有些同学的服务器上面没有开png的话，请将此处可以直接改
        //第四项，宽度  是根据长度自动计算
        //第五项，高度  22
        // 第六项，验证码保存在session当中的名称，不建议大家修改
        //Image::buildImageVerify(4,5,'png',90,30,'signin_verify_code');
        Image::buildImageVerify();
        //Image::GBVerify();


        //length
        //type
        //width
        //height
        //fontface
        //verifyName


        //buildImageVerify();
        // simhei.ttf
    }

    /**
     * 关于页面
     */
    public function about() {
        $this->assign('title', '关于'.' | '.C('APP_TITLENAME'));
        $this->display('about');
    }
}

<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-3-30
 * Time: 下午2:58
 * Description: 权限验证行为
 */

class AuthBehavior extends Behavior {
// 行为参数定义
    protected $options   =  array(
        'USER_AUTH_ON'        =>false,   //  是否开启用户认证
        'USER_AUTH_ID'        => 'user_id',   //  定义用户的id为权限认证字段
    );
    // 行为扩展的执行入口必须是run
    public function run(&$return){
        if(C('USER_AUTH_ON ')) {
            // 进行权限认证逻辑 如果认证通过 $return = true;
            // 否则用halt输出错误信息
        }
    }
}
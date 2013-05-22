<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-2-26
 * Time: 下午7:50
 * Description: 用户模型
 */
class UserModel extends BaseModel {
    protected $tableName = 'user';

    //创建数据的顺序
//1 获取数据源（默认是POST数组）
//2 验证数据源合法性（非数组或者对象会过滤） 失败则返回false
//3 检查字段映射
//4 判断提交状态（新增或者编辑  根据主键自动判断）
//5 数据自动验证 失败则返回false
//6 表单令牌验证 失败则返回false
//7 表单数据赋值（过滤非法字段和字符串处理）
//8 数据自动完成
//9 生成数据对象（保存在内存）


    protected $fields = array(  //加上了自定义字段后，数据就无法插进数据库了，神马情况？
//        'id'
//        ,'email'
//        ,'password'
//        ,'nickname'
//        ,'avatat'
//        ,'activate'
//        ,'status'

//        , 'createtime'
//        , 'createby'
//        , 'createip'
//        , 'updatetime'
//        , 'updateby'
//        , 'updateip'
//        , '_pk' => 'id', '_autoinc' => true
    );

    //字段映射
    protected $_map = array(
//        //'是要在表单当中的字段写在前面'=>'是写到后面,数据表当中的真实字段写到后面',
        'id'=>'id_'
        ,'email'=>'email_'
        ,'password'=>'password_'
        ,'nickname'=>'nickname_'
        ,'avatat'=>'avatat_'
        ,'activate'=>'activate_'
        ,'status'=>'status_'
//        ,'create_time'=>'create_time_'
//        ,'create_ip'=>'create_ip_'
//        , 'createtime'=>'createtime_'
//        , 'createby'=>'createby_'
//        , 'createip'=>'createip_'
//        , 'updatetime'=>'updatetime_'
//        , 'updateby'=>'updateby_'
//        , 'updateip'=>'updateip_'
    );

    //自动验证
    protected $_validate = array(  //这里的属性是指表单里面的属性，而不是数据库中的字段
        //下面还需要再写数组。一个数组就是一条验证规则
        //array('验证字段','验证规则','错误提示','验证条件','附加规则','验证时间'),
        //验证字段：需要验证的表单字段名称,也可以表单当中的一些辅助字段,例如验证码，附加码，重复密码等
        //验证规则，验证规则必须要结合附加规则一起使用
        //错误提示:如果出现错误，抛出一个什么样的错误提示告知用户
        //验证条件:0，1，2（）
        //附加规则：
        //       regex 使肜正则进行验证   可以自己在验证规则当中写一个正则表达示(第一上兄弟连论坛下载高老师的正则视频,
        //第二，thinkphp功能强劲他为我们封了一些正则,第三，网上已为了准备了一些常用正则)
        //       function 使用函数进行验证，前面验证规则这个地方必须要写函数名time
        //       callback  是一个回调 他会去找当前UserModel当中的一个成员方法
        //       confirm 验证表单当中的两个字段是否相等。
        //       equal 验主下是否等于某个值
        //		in   是否在某一个范围内 验证规则当中需要写上一个数组
        //       unique 验证是否唯一，系统会要据字段目前的值查询数据库来判断是否有相同的值
        //
        //      如果用系统内置的一些常用正则，只需要写到错误提示即可，
        //       require 字段必须验证    email验证邮箱   url是验证url地址的   currency货币  number数字
        //  验证时间：   是指数据库操作时间的验证时机
        //  1新增数据的时候进行验证    Model::MODEL_INSERT
        //  2 编辑的时候才进行验证   	Model::MODEL_UPDATE
        //  3 全部情况下验证			Model::MODEL_BOTH
        //

        //array('username','require','用户名必填'),
        //array('username','checklen','用户名长度过长或过短',0,'callback'),
        array('verify','require','验证码必须填写！'), //默认情况下用正则进行验证
        array('email','email','邮箱格式不正确！',self::MUST_VALIDATE,'function'),
        array('email','','此邮箱已被使用，请重新填写！',self::MUST_VALIDATE,'unique'), // 在新增的时候验证name字段是否唯一
        array('password','require','密码必填'),
        array('password','6,10','密码长度过长或过短',self::MUST_VALIDATE,'length'),
//        array('password','checkPwdFormat','密码格式不正确',0,'function'), // 自定义函数验证密码格式
        array('repassword','require','重复密码必填'),
        array('password','repassword','两次密码不一致',self::MUST_VALIDATE,'confirm'),
    );

    //你在create方法当来调用自动验证的话$_POST['username']
    // 如果来判断长度的话，我是不是必须要传入一个东西进来。来进行判断。
    //  那怎么知道对还是不对呢？  真或假

    //它也是thinkphp当中的一个成员方法在create的时候，自动执行
    //array('填充字段','填充内容','填充条件','附加规则');
    //填充字段: 这个字段可以是表单当中的字段，也可以是数据库当中的字段。也可以是一些辅助字段
    //填充内容,配合附加规则一同使用
    //填充条件, 1,2,3 就是Model::MODEL_INSERT   (默认参数为新增的时候进行填充)
    // 附加规则,  function  callback, field（用其它字段来填充），表示此处可以拿到其他字段的一个值
    // string , 字符串来填充。这一项，是thinkphp自动完成里面的默认选项

    protected $_auto = array( //注意：这里的字段名是基于数据库中的表字段的，而不是from中的属性
        array('password_','md5',self::MODEL_BOTH,'function')
        ,array('nickname_','getNickName',self::MODEL_INSERT,'callback')
        ,array('avatat_','getAvatarUrl',self::MODEL_INSERT,'callback')
        ,array('activate_','0',self::MODEL_INSERT)
        ,array('status_','1',self::MODEL_INSERT)
//        ,array('create_time','time',1,'function')
//        ,array('createip','getCreateIp',1,'callback')
//        array('createtime','time',1,'function'),
//        array('updatetime','time',1,'function'),
//        array('updateip','returnip',1,'function'),


    );

    //检查密码长度
    private function checkPwdLen($data){
        if(strlen($data) > 15 || strlen($data) < 5){
            return false;
        }else{
            return true;
        }
    }

    //检查密码格式
    private function checkPwdFormat() {

        return true;
    }

    //截取邮箱的前一部分作为用户名，如果名称已存在则随机部分
    private function getNickName() {

        return 'username';
    }

    //获取用户头像地址
    private function getAvatarUrl() {
//        $avatar_url = 'http://www.gravatar.com/avatar/' + md5($this->email.toLowerCase()) + '?size=48';
        return 'avatar_url';
    }

    //获取客户端IP地址--考虑封装到父类中去
    private function getCreateIp(){
        return $_SERVER['REMOTE_ADDR'];
    }



}

<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-27
 * Time: 下午8:47
 * Description: [描述信息]
 */
class PictureModel extends BaseModel {
    protected $tableName = 'picture';

    //字段映射
    protected $_map = array(
        'id'=>'id_'
        ,'userid'=>'user_id'
        ,'filename'=>'filename_'
        ,'title'=>'title_'
        ,'savepath'=>'savepath_'
        ,'savename'=>'savename_'
        ,'size'=>'size_'
        ,'type'=>'type_'
        ,'extension'=>'extension_'
        ,'status'=>'status_'
        ,'hash'=>'hash_'
        ,'description'=>'description_'
        ,'uploadtime'=>'uploadtime_'
        ,'client_'=>'client_'
        ,'address'=>'address_'
        ,'location'=>'location_'
        ,'createip'=>'createip_'

//        ,'createip'=>'createip_'
//        , 'updatetime'=>'updatetime_'
//        , 'updateby'=>'updateby_'
//        , 'updateip'=>'updateip_'
    );

    //自动验证
    protected $_validate = array(
        //array('title','6,10','游记标题为空或超过长度！',self::MUST_VALIDATE,'length'),  //检测报错,神马情况?
        //array('context','50,5000','游记内容长度过长或过短！',self::MUST_VALIDATE,'length'),
//        array('tags','require','标签必须选择哦！'),
//        array('title','','此标题已经存在，请重新填写！',self::MUST_VALIDATE,'unique',self::MODEL_BOTH)
    );

    //自动完成
    protected $_auto = array(
        array('status_','1',self::MODEL_INSERT)
//        ,array('md5_','getMd5',self::model_all,'function')
        ,array('uploadtime_','time',self::MODEL_INSERT,'function')
        ,array('user_id','getCurUserId',self::MODEL_INSERT,'callback')
        ,array('address_','getAddressByIP',self::MODEL_INSERT,'callback')
        ,array('createip_','getClientIP',self::MODEL_INSERT,'callback')
    );

    //获取上传文件的MD5
    protected function getMd5() {
        return md5("222");
    }

    //获取当前登录用户的ID
    protected function getCurUserId() {
        $session_user = session(C('SESSION_USER'));
        return $session_user['id'];
    }

    //得到用户客户端IP
    protected function getClientIP() {
        return $_SERVER['REMOTE_ADDR'];
    }

    //根据用户IP获取用户地址
    protected function getAddressByIP() {

        return "深圳福田区";
    }


}

<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-20
 * Time: 下午9:35
 * Description: 旅行笔记实体类
 */

class ArticleModel extends BaseModel {
    protected $tableName = 'article';

    //字段映射
    protected $_map = array(
        'id'=>'id_'
        ,'userid'=>'user_id'
        ,'title'=>'title_'
        ,'context'=>'context_'
        ,'keywords'=>'keywords_'
        ,'status'=>'status_'
        ,'createtime'=>'createtime_'
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
        array('title','6,10','游记标题为空或超过长度！',self::MUST_VALIDATE,'length'),
        array('context','100,5000','游记内容长度过长或过短！',self::MUST_VALIDATE,'length'),
        array('keywords','require','标签必须选择哦！',self::MUST_VALIDATE),
        array('title','','此标题已经存在，请重新填写！',self::MUST_VALIDATE,'unique',self::MODEL_BOTH)
    );

    //自动完成
    protected $_auto = array(
        array('status_','1',self::MODEL_INSERT)
        ,array('createtime_','time',self::MODEL_INSERT,'function')
        ,array('user_id','getCurUserId',self::MODEL_INSERT,'callback')
        ,array('address_','getAddressByIP',self::MODEL_INSERT,'callback')
        ,array('createip_','getClientIP',self::MODEL_INSERT,'callback')
    );

    //验证内容长度
    private function checkContextLen($data) {
        if(strlen($data) > 15 || strlen($data) < 5){
            return false;
        }else{
            return true;
        }
    }

    //获取当前登录用户的ID
    private function getCurUserId() {
        $session_user = session(C('SESSION_USER'));
        return $session_user->id;
    }

    //得到用户客户端IP
    private function getClientIP() {
        return $_SERVER['REMOTE_ADDR'];
    }

    //根据用户IP获取用户地址
    private function getAddressByIP() {

    }



}



<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-6-1
 * Time: 下午1:22
 * Description: 相册模型
 */

class AlbumModel extends BaseModel {
    protected $tableName = 'album';

    protected $_map = array(
        'id'=>'id_'
        ,'userid'=>'user_id'            //用户
        ,'title'=>'title_'              //标题
        ,'description'=>'description_'  //描述
        ,'coverid'=>'cover_id'          //外键：封面照片ID
        ,'createtime'=>'createtime_'    //创建时间
    );


    //自动验证
    protected $_validate = array(
        array('title','require','相册名称不能为空！'),
        //array('title','6,10','游记标题为空或超过长度！',self::MUST_VALIDATE,'length'),  //检测报错,神马情况?
//        array('title','','此标题已经存在，请重新填写！',self::MUST_VALIDATE,'unique',self::MODEL_BOTH)
    );
    //自动完成
    protected $_auto = array(
        array('createtime_','time',self::MODEL_INSERT,'function')
        ,array('user_id','getCurUserId',self::MODEL_INSERT,'callback')
    );

    //获取当前登录用户的ID
    protected function getCurUserId() {
        $session_user = session(C('SESSION_USER'));
        return $session_user['id'];
    }
}
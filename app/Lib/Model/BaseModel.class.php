<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-3-29
 * Time: 下午4:19
 * Description: 基本业务模型类,所有其他业务类都要继承此类
 */
class BaseModel extends Model {

    //获取当前登录用户的ID
    protected function getSessionUserId() {
        $session_user = session(C('SESSION_USER'));
        return $session_user['id'];
    }
}

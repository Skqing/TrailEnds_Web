<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-5-19
 * Time: 下午1:31
 * Description: 负责处理邮件的事务
 */

class EmailService {

    /**
     * 通过邮箱来得到相对应的登录地址
     * @param $email
     */
    public function getEmailSite($email) {
        $email_site = [];
        foreach($email_site as $e) {
            if ($e == $email) {
                return $email_site[$e];
            }
        }
    }
}
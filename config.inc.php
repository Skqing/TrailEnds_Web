<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-2-25
 * Time: 下午10:39
 * Description: 全局配置参数
 */
return array(
    //    'DB_DSN'          => 'mysql://root@localhost:3306/lbscontacts',  //数据库配置信息
    //'配置项'=>'配置值'
    //比较适合高并发，高负载......mysql可能以后在大家处理的时候是一个瓶颈
    //我们就可以通过主从数据库来解决。


    //'DB_DEPLOY_TYPE'=>1,  //数据库配置模式，0为单一，1为主从

    //必须要在数据库服务器当中进行相应的配
    //大家可以上网自己找资料
    //数据库抽象层到底选择哪一个,不论你是选哪一个数据库连接方式，他都是使用thinkphp为你封装好的方法来执行（增，删，改，查）
    'DB_TYPE'           => 'mysql',
    //连接到哪台数据库服务器
    //数据信息同步
    //以后可以出相关视频

    //utf8
    // DB_CHARSET
    //DB_FIELDS_CACHE=false,
    //DB_FIELDTYPE_CHECK=false,



    //他会在写入的过程当中，自动去找一台服务器，读取的时候，也会在这当中自动去找一台数据库服务器
//    'DB_HOST'=>'localhost,192.168.1.2,192.168.1.9',
//    'DB_NAME'=>'videodemo,videodemo1,videodemo2',  //如果数据库名都相同的话，你可以不用定义多个
//    'DB_USER'=>'root',
//    'DB_PWD'=>'liwenkaihaha',
//    'DB_PORT'=>'3306',
//    'DB_PREFIX'=>'think_',
//    'DB_RW_SEPARATE'=>true,

    'DB_HOST'           => 'localhost',
    'DB_NAME'           => 'lbscontacts',
    'DB_USER'           => 'root',
    'DB_PWD'            => 'longxin',
    'DB_PORT'           => '3306',
    'DB_PREFIX'         => 'app_',
    'DB_RW_SEPARATE'    =>true,
    //读写分离

    //  写的数据比较少（写的数据，也仅仅是管理员来进行操作），而读的数据 是海量的话。（读写分离）




    //暂时不说，用户登陆，用户注册，发表评论.......

    //后台应用？？？？
);
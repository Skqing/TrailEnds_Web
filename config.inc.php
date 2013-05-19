<?php
/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 13-2-25
 * Time: 下午10:39
 * Description: 全局配置参数
 */
return array(

    //'DEFAULT_TIMEZONE'       => 'Asia/Shanghai', // 设置默认时区为上海

    'APP_DEBUG'              => true,  //开启调试模式
    'SHOW_PAGE_TRACE'        => true, // 显示页面Trace信息
//    'SHOW_RUN_TIME'          => true, // 运行时间显示
//    'SHOW_ADV_TIME'          => true, // 显示详细的运行时间
//    'SHOW_DB_TIMES'          => true, // 显示数据库查询和写入次数
//    'SHOW_CACHE_TIMES'       => true, // 显示缓存操作次数
//    'SHOW_USE_MEM'           => true, // 显示内存开销
//    'SHOW_LOAD_FILE'         => true, // 显示加载文件数
//    'SHOW_FUN_TIMES'         => true, // 显示函数调用次数


    //    'DB_DSN'          => 'mysql://root@localhost:3306/lbscontacts',  //数据库配置信息
    //'配置项'=>'配置值'
    //比较适合高并发，高负载......mysql可能以后在大家处理的时候是一个瓶颈
    //我们就可以通过主从数据库来解决。


    //'DB_DEPLOY_TYPE'=>1,  //数据库配置模式，0为单一，1为主从


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
    'DB_TYPE'           => 'mysql',
    'DB_HOST'           => 'localhost',
    'DB_NAME'           => 'strider',
    'DB_USER'           => 'root',
    'DB_PWD'            => 'longxin',
    'DB_PORT'           => '3306',
    'DB_PREFIX'         => 'app_',
//    'DB_RW_SEPARATE'    =>true,

    //读写分离

    //  写的数据比较少（写的数据，也仅仅是管理员来进行操作），而读的数据 是海量的话。（读写分离）

    'DB_FIELDS_CACHE'        => false,  //禁止字段缓存

    //暂时不说，用户登陆，用户注册，发表评论.......

    //后台应用？？？？

    //开发模式禁止表单令牌
    'TOKEN_ON'               => false,  // 是否开启令牌验证
//    'TOKEN_NAME'             => '__hash__',    // 令牌验证的表单隐藏字段名称
//    'TOKEN_TYPE'             => 'md5',  //令牌哈希验证规则 默认为MD5
//    'TOKEN_RESET'            => true  //令牌验证出错后是否重置令牌 默认为true
);
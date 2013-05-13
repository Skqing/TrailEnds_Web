<?php
$personality_config = array(
	//'配置项'=>'配置值'
    //'URL_MODEL'=>1, //URL路径规则:0=PATHINFO模式（默认模式）
    //'URL_PATHINFO_MODEL'=>2, //
    //'URL_PATHINFO_DEPR'=>'-', // 更改PATHINFO参数分隔符

    //'URL_CASE_INSENSITIVE'   => true,  //不区分路径大小写
    'APP_DEBUG'              => true,  //开启调试模式
    'APP_STATUS'             => 'debug', //应用调试模式状态
    //'SHOW_PAGE_TRACE'        =>true, // 显示页面Trace信息

    'TMPL_EXCEPTION_FILE'    => './App/Tpl/Public/error.html', // 定义公共错误模板
    //'DEFAULT_TIMEZONE'       => 'Asia/Shanghai', // 设置默认时区为上海
    /*
    'SHOW_RUN_TIME'=>true,  //运行时间显示
    'SHOW_ADV_TIME'=>true,//显示详细的运行时间
    'SHOW_DB_TIMES'=>true,//显示数据库的操作次数
    'SHOW_CACHE_TIMES'=>true,//显示缓存操作次数
    'SHOW_USE_MEM'=>true,//显示内存开销
    */

    'DB_DSN' => 'mysql://username:password@localhost:3306/DbName',

    //'DB_FIELDS_CACHE'=>false,  //取消数据库字段缓存
    //'TMPL_VAR_IDENTIFY'      => 'array',  //{$user.name}和{$user['name']}等效

//    'LOG_RECORD'=>true,//开启了日志记录
//    'LOG_RECORD_LEVEL'=>array('EMERG','ALERT','ERR'),
//redirectURL
    'TOKEN_ON'               => true,  // 是否开启令牌验证
    //'TOKEN_NAME'             => '__hash__',    // 令牌验证的表单隐藏字段名称
    //'TOKEN_TYPE'             => 'md5',  //令牌哈希验证规则 默认为MD5
    //'TOKEN_RESET'            => true,  //令牌验证出错后是否重置令牌 默认为true
    'DB_FIELDTYPE_CHECK'     => true,  // 开启字段类型验证
);


$custom_config = array(
    'APP_NAME'               => 'Strider',    //项目名称
    'APP_TITLENAME'          => '行客',      //项目标题名称

    'MESSAGE'                => 'message',        //消息变量

    //模版变量
    'MESSAGE_M'              => 'message',               //全局消息模版
);
$global_config = include './config.inc.php';
return array_merge($global_config,$personality_config,$custom_config);
?>
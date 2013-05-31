<?php

//网站当前路径
define('SITE_PATH', getcwd());
//调试
array2file($_POST, SITE_PATH.'/post.txt');

//上传处理过程需要自己写，这里只是显示当程序上传处理完后的返回值

$in = array();
//上传成功返回提示：
//$in['url'] = "http://www.abc3210.com/a.jpg";//上传成功后的图片路径
//$in['title'] = "图片名称";
//$in['state'] = "SUCCESS";

//错误提示返回
$in['url'] = "";//上传成功后的图片路径
$in['title'] = "";
$in['state'] = "上传的图片大小有误";
echo json_encode($in);

/**
 * 调试，用于保存数组到txt文件 正式生产删除 array2file($info, SITE_PATH.'/post.txt');
 */
function array2file($array, $filename) {
    file_exists($filename) or touch($filename);
    file_put_contents($filename, var_export($array, TRUE));
}
?>
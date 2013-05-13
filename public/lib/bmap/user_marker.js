/**
 * Author: DolphinBoy
 * Email: longxinanlan@msn.cn
 * Date: 12-12-6
 * Time: 下午2:14
 * Description: 继承百度地图的Marker类，定制适合本网站的marker
 */

// 定义自定义覆盖物的构造函数
function UserMarker(id){
  this._id = id;
};

// 继承API的BMap.Marker
UserMarker.prototype = new BMap.Marker();


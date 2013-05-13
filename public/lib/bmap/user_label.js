/**
 * Author: DolphinBoy
 * Email: longxinanlan@msn.cn
 * Date: 12-12-6
 * Time: 上午10:08
 * Description: 自定义覆盖物
 */

// 定义自定义覆盖物的构造函数
function UserLabel(user, point){
  this._id = user.uid;
  this._image = user.avatar;
  this._title = user.nickname;

  this._point = point;

  this._size = 20;
  this._level = 5;
  this._createtime = new Date();
};
// 继承API的BMap.Overlay
UserLabel.prototype = new BMap.Overlay();

// 实现初始化方法
UserLabel.prototype.initialize = function(map){
// 保存map对象实例
  this._map = map;
  // 创建div元素，作为自定义覆盖物的容器
  var div = document.createElement("div");
  div.style.zIndex = BMap.Overlay.getZIndex(this._point.lat);
  div.style.position = "absolute";
  // 可以根据参数设置元素外观
  div.style.width = this._size + "px";
  div.style.height = this._size + "px";
  div.style.background = this._image;  //这里要得到的是绝对路径
  div.style.backgroundRepeat = "no-repeat";
//  div.style.backgroundColor = "#EE5D5B";
  div.style.border = "1px solid #b82e21";
  // 将div添加到覆盖物容器中
  map.getPanes().labelPane.appendChild(div);
  // 保存div实例
  this._div = div;
  // 需要将div元素作为方法的返回值，当调用该覆盖物的show、
  // hide方法，或者对覆盖物进行移除时，API都将操作此元素。
  return div;
};

// 实现绘制方法
UserLabel.prototype.draw = function(){
// 根据地理坐标转换为像素坐标，并设置给容器
  var position = this._map.pointToOverlayPixel(this._point);
  this._div.style.left = position.x - this._size / 2 + "px";
  this._div.style.top = position.y - this._size / 2 + "px";
};

// 实现显示方法
UserLabel.prototype.show = function(){
  if (this._div){
    this._div.style.display = "";
  }
};

// 实现隐藏方法
UserLabel.prototype.hide = function(){
  if (this._div){
    this._div.style.display = "none";
  }
};

// 给一个坐标数组和一个间隔事件，让标签自动移动
UserLabel.prototype.moves = function(points, time){

}
// 移动到下一个坐标点
UserLabel.prototype.move = function(point){
  var map = this._map;
  var nextpixel = map.pointToOverlayPixel(point);
  this._div.style.left = nextpixel.x - parseInt(this._div.style.left) + "px";
  this._div.style.top  = nextpixel.y - 30 + "px";
};

//拖动地图时可能需要重绘或者让标签跟随地图的移动而移动
UserLabel.prototype.redraw = function(){

}

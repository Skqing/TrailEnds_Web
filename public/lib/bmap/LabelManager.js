/**
 * Author: DolphinBoy
 * Email: dolphinboyo@gmail.com
 * Date: 12-12-10
 * Time: 下午4:09
 * Description: UserLabel管理器，主要负责对UserLabel的添加，移动，移除，状态控制，消息控制等
 */

/**
 * @namespace BMap的所有library类均放在BMapLib命名空间下
 */
var BMapLib = window.BMapLib = BMapLib || {};

(function() {
  /**
   * GPS坐标系类型
   */
  BMapLib.COORD_TYPE_GPS  = 0;

  /**
   * Google 坐标系类型
   */
  BMapLib.COORD_TYPE_GOOGLE = 2;

  /**
   * 每次最大可以添加的标签数量
   */
  var ADD_NUM_ONCE = 50;

  /**
   * 是否留下历史轨迹
   */
  var DRAWLINE_ORNOT = false;


  /**
   * @exports LabelManager as BMapLib.LabelManager
   */
  var LabelManager =

/**
 * LabelManager
 * 传递一个UserLabel的id和GPS Point对象，如果能根据这个ID找到对应的UserLabel，则把移动这个UserLabel到下一个坐标点，
 *    如果没有找到对应的UserLabel，则新增一个UserLabel到新的坐标点
 * 注意地图级别，Marker数量，移除静止Marker等……
 * @constructor
 * @param {Map} map BMap.Map的实例对象
 * @param {Number} coordType 需要转化的坐标类型，如：GPS坐标类型 | Google坐标类型
 *
 */
  BMapLib.LabelManager = function(map, coordType){
    this._map = map;
    this._coordType = coordType;

    //临时对象，转化前的mkr都挂载到此对象上，转化完毕后再删除掉
    this._hashObject = {};

    //缓存数组，用来累计每次50个坐标点，然后一同发送请求
    this._arrCache = [];
  }

//  BMapLib.LabelManager = function(id, msg, nextpoint, line, coordType){
//    this._id = id;
//    this._msg = msg;
//    this._nextpoint = nextpoint;
//
//  }

  /**
   * 将覆盖物添加到地图上。此函数首先将其他坐标转化为百度坐标，然后再将覆盖物添加到地图上。
   * @param {Overlay} overlay 覆盖物对象，目前只支持Marker类对象
   * @return 无返回值
   */
  LabelManager.prototype.add = function(labels){
    if(labels || lables.constructor != Array || labels.length == 0){
      return false;
    }
    var labarrtmp = [];  //临时存放合法的lables
    for(lab in labels) {
      //目前仅支持UserLabel类型
      if(labels && (labels instanceof UserLabel)){
        labarrtmp.push(lab);  //保存合法的数据
      }else{
        continue;
      }
    }


    var data = {
      'overlay'    : labels,
      'uiqueNum'   : this._uiqueNum //唯一标识该坐标点
    };

    this._arrCache.push(data);
    this._hashObject['guid' + this._uiqueNum] = labels; //记录在hash对象中，回调后使用

    this._uiqueNum++;

    var me = this;
    if(me._canSendRequest){
      me._canSendRequest = false;

      window.setTimeout(function(){
        me._canSendRequest = true;
        me._delayRequest();
      }, 50);
    }

//    return userlabel;
  }
  LabelManager.prototype.adds = function(user, point, orgin){

//    return userlabels;
  }

  LabelManager.prototype.move = function(user, point, orgin){

  }
  LabelManager.prototype.moves = function(user, point, orgin){

  }

  LabelManager.prototype.remove = function(id){

  }
})();//闭包结束
/**
 * Author: DolphinBoy
 * Email: longxinanlan@msn.cn
 * Date: 12-12-6
 * Time: 下午3:49
 * Description: 统一管理自定义Marker
 */

/**
 * @namespace BMap的所有library类均放在BMapLib命名空间下
 */
var BMapLib = window.BMapLib = BMapLib || {};

(function() {

  var MarkerManager =

  /**
   * MarkerManager
   * 传递一个Marker的id和GPS Point对象，如果能根据这个ID找到对应的Marker，则把移动这个Marker到下一个坐标点，
   *    如果没有找到对应的Marker，则新增一个Marker到新的坐标点
   * 注意地图级别，Marker数量，移除静止Marker等……
   * @constructor
   * @param {id} id Marker的id
   * @param {point} GPS Point对象
   * @param {line} Polyline对象
   */
    BMapLib.MarkerManager = function(id, nextpoint, line){
      this._id = id;
      this._nextpoint = nextpoint;

    }

})();//闭包结束
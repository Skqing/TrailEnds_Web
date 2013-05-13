/**
 * Author: DolphinBoy
 * Date: 12-12-9
 * Time: 下午3:58
 * Version: 0.1
 * Description: Overlay的管理类
 */


/**
 * @namespace BMap的所有library类均放在BMapLib命名空间下
 */
var BMapLib = window.BMapLib = BMapLib || {};

(function() {

    var OverlayManager =

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
        BMapLib.OverlayManager = function(id, points){
            this._id = id;
            this._points = points;

        }

})();//闭包结束
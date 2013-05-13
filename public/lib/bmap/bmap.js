/**
 * User: DolphinBoy
 * Email: longxinanlan@msn.cn
 * Date: 12-7-29 下午2:40
 * 处理百度地图
 */

//加载百度地图
var map = null;
function initmap() {
  //document.body.style.backgroundImage = '';
//  if(map == null || map == undefined || map == 'undefined'){
    map = new BMap.Map('mapdiv_id');
//  }
  var point = new BMap.Point(116.404, 39.915);
  //属性设置
  map.centerAndZoom(point, 12);
  map.enableScrollWheelZoom;  // 启用滚轮放大缩小
  map.enableKeyboard();  // 启用键盘操作

  //添加控件
  map.addControl(new BMap.NavigationControl());  //平移缩放控件
  map.addControl(new BMap.ScaleControl());  //一个比例尺控件
  map.addControl(new BMap.OverviewMapControl());  //缩略图控件
  map.addControl(new BMap.MapTypeControl());  //地图类型控件
  map.enableScrollWheelZoom();// 启用滚轮放大缩小
  map.enableKeyboard();   //启用键盘操作
  //map.setCurrentCity("北京");  // 仅当设置城市信息时，MapTypeControl的切换功能才能可用

  //根据IP地址定位
  function myFun(result){
      var cityName = result.name;
      map.setCenter(cityName);
      map.setCurrentCity(cityName);  // 仅当设置城市信息时，MapTypeControl的切换功能才能可用
//      alert(cityName);
  }
  var myCity = new BMap.LocalCity();
  myCity.get(myFun);


  // 编写自定义函数，创建标注
  function addMarker(point, index){
      // 创建图标对象
      var myIcon = new BMap.Icon('/favicon.ico', new BMap.Size(23, 25), {
          // 指定定位位置。
          // 当标注显示在地图上时，其所指向的地理位置距离图标左上角各偏移10像素和25像素，您可以看到在本例中该位置即是图标中央下端的尖角位置。
          offset: new BMap.Size(30, 50)
          // 设置图片偏移。
          // 当您需要从一幅较大的图片中截取某部分作为标注图标时，您需要指定大图的偏移位置，此做法与css sprites技术类似。
          //imageOffset: new BMap.Size(0, 0 - index * 25)   // 设置图片偏移
      });
      // 创建标注对象并添加到地图
      var marker = new BMap.Marker(point, {icon: myIcon});
      marker.addEventListener("click", function(){
          alert("您点击了标注");
      });
      map.addOverlay(marker);
  }
  addMarker(point, null);

  //自定义覆盖物
//  var mypoi = new CustomOverlay(map.getCenter(), 100, "red");
//  map.addOverlay(mypoi);

  //var marker1 = new BMap.Marker(point);        // 创建标注
  //map.addOverlay(marker1);                     // 将标注添加到地图中

  map.addEventListener("click", function(e){
      alert(e.point.lng + ", " + e.point.lat);
  });

  var opts = {
      width : 50,     // 信息窗口宽度
      height: 25,     // 信息窗口高度
      title : "Hello"  // 信息窗口标题
  }
  var infoWindow = new BMap.InfoWindow("我们在这儿！", opts);  // 创建信息窗口对象
  map.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口
};

var myIcon = new BMap.Icon("/public/images/user_icon#60.png", new BMap.Size(32, 70), {imageOffset: new BMap.Size(0, 0)});
//function loadScript() {
//    var script = document.createElement("script");
//    script.src = "http://api.map.baidu.com/api?v=1.3&callback=initialize";
//    document.body.appendChild(script);
//}

//window.onload = loadScript;
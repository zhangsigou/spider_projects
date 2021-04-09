var amapFile = require('../../libs/amap-wx.js');
var config = require('../../libs/config.js');

Page({
  data: {
    lat:0,
    lng:0,
    mubiaolat:0,
    mubiaolng:0,
    currentlng:'',
    markers: [{
      iconPath: "../../img/mapicon_navi_s.png",
      id: 0,
      latitude: 0,
      longitude: 0,
      width: 23,
      height: 33
    },{
      iconPath: "../../img/mapicon_navi_e.png",
      id: 0,
      latitude: 0,
      longitude: 0,
      width: 24,
      height: 34
    }],
    distance: '',
    cost: '',
    polyline: []
  },
  onLoad: function(options) {
    var that=this;
    var latitude=options.latitude;
    var longitude=options.longitude;
    this.setData({
      mubiaolat:options.latitude,
      mubiaolng:options.longitude
    });
    var markers=this.data.markers;
    var origins=longitude+','+latitude

    var currentlng='';
    markers[1].latitude=latitude;
    markers[1].longitude=longitude;
    wx:wx.getLocation({
      altitude: false,
      highAccuracyExpireTime: 0,
      isHighAccuracy: true,
      type: 'wgs84',
      success: (result) => {
        console.log(result)
        markers[0].latitude=result.latitude;
        markers[0].longitude=result.longitude;
        var currentlng=result.longitude+','+result.latitude;
        that.setData({
          markers:markers,
          lat:result.latitude,
          lng:result.longitude,
          currentlng:result.longitude+','+result.latitude
        })
        var key = config.Config.key;
        console.log(origins);
        console.log(currentlng);
    var myAmapFun = new amapFile.AMapWX({key: key});
    console.log('B');
    console.log(myAmapFun);
    myAmapFun.getWalkingRoute({
      origin: origins,
      destination: currentlng,
      success: function(data){
        console.log('A');
        var points = [];
        console.log('AAA:',data);
        if(data.paths && data.paths[0] && data.paths[0].steps){
          var steps = data.paths[0].steps;
          for(var i = 0; i < steps.length; i++){
            var poLen = steps[i].polyline.split(';');
            for(var j = 0;j < poLen.length; j++){
              points.push({
                longitude: parseFloat(poLen[j].split(',')[0]),
                latitude: parseFloat(poLen[j].split(',')[1])
              })
            } 
          }
        }
        console.log("路线：",points);
        that.setData({
          polyline: [{
            points: points,
            color: "#0091ff",
            width: 6
          }]
        });
        if(data.paths[0] && data.paths[0].distance){
          that.setData({
            distance: data.paths[0].distance + '米'
          });
        }
        if(data.paths[0] && data.paths[0].duration){
          that.setData({
            cost: parseInt(data.paths[0].duration/60) + '分钟'
          });
        }
          
      }
    })
      },
    })
  },
  goDetail: function(){
    wx.navigateTo({
      url: '../navigation_walk_detail/navigation'
    })
  },
  goToCar: function (e) {
    wx.reLaunch({
      url: '../navigation_car/navigation?longitude='+this.data.mubiaolat+'&latitude='+this.data.mubiaolng
    })
  },
  goToBus: function (e) {
    wx.reLaunch({
      url: '../navigation_bus/navigation'
    })
  },
  goToRide: function (e) {
    wx.reLaunch({
      url: '../navigation_ride/navigation'
    })
  },
  goToWalk: function (e) {
    wx.reLaunch({
      url: '../navigation_walk/navigation'
    })
  }
})
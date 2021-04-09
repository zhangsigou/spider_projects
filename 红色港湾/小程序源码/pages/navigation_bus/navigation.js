var amapFile = require('../../libs/amap-wx.js');
var config = require('../../libs/config.js');
Page({
  data: {
    markers: [{
      iconPath: "../../img/mapicon_navi_s.png",
      id: 0,
      latitude: 39.989643,
      longitude: 116.481028,
      width: 23,
      height: 33
    },{
      iconPath: "../../img/mapicon_navi_e.png",
      id: 0,
      latitude: 39.90816,
      longitude: 116.434446,
      width: 24,
      height: 34
    }],
    distance: '',
    cost: '',
    transits: [],
    polyline: [],
    mubiaolat:0,
    mubiaolng:0
  },
  onLoad: function(options) {
    var that = this;
    var origin = options.origin;
    var destination = options.destination;
    this.setData({
      mubiaolat: options.latitude,
      mubiaolng: options.longitude,
      origin: options.origin,
      destination: options.destination
    });
    var key = config.Config.key;
    var myAmapFun = new amapFile.AMapWX({key: key});
    myAmapFun.getTransitRoute({
      origin: origin,
      destination: destination,
      city: '山东',
      cityd: '山东',
      success: function(data){
        if(data && data.transits){
          var transits = data.transits;
          for(var i = 0; i < transits.length; i++){
            var segments = transits[i].segments;
            transits[i].transport = [];
            for(var j = 0; j < segments.length; j++){
              if(segments[j].bus && segments[j].bus.buslines && segments[j].bus.buslines[0] && segments[j].bus.buslines[0].name){
                var name = segments[j].bus.buslines[0].name
                if(j!==0){
                  name = '--' + name;
                }
                transits[i].transport.push(name);
              }
            }
          }
        }
        that.setData({
          transits: transits
        });
          
      },
      fail: function(info){

      }
    })
  },
  goToBus: function (e) {
    wx.redirectTo({
      url: '../navigation_bus/navigation?latitude=' + this.data.mubiaolat + '&longitude=' + this.data.mubiaolng + '&origin=' + this.data.origin + '&destination=' + this.data.destination
    })
  },
  goToCar: function (e) {
    wx.redirectTo({
      url: '../navigation_car_detail/navigation?latitude=' + this.data.mubiaolat + '&longitude=' + this.data.mubiaolng + '&origin=' + this.data.origin + '&destination=' + this.data.destination
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
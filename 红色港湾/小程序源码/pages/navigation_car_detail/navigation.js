var amapFile = require('../../libs/amap-wx.js');
var config = require('../../libs/config.js');

Page({
  data: {
    steps: {},
    mubiaolat: 0,
    mubiaolng: 0
  },
  onLoad: function (options) {
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
    var myAmapFun = new amapFile.AMapWX({ key: key });
    myAmapFun.getDrivingRoute({
      origin: origin,
      destination: destination,
      success: function (data) {
        if (data.paths && data.paths[0] && data.paths[0].steps) {
          that.setData({
            steps: data.paths[0].steps
          });
        }

      },
      fail: function (info) {

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
})
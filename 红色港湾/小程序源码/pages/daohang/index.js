// pages/daohang/index.js
var amapFile = require('../../utils/amap-wx.js');

Page({
  data: {
    markers: [{
      iconPath: "../image/s.png",
      id: 0,
      latitude: 35.007714,
      longitude: 118.377600,
      width: 33,
      height: 33
    },{
      iconPath: "../image/e.png",
      id: 0,
      latitude: 35.103738,
      longitude: 118.356426,
      width: 34,
      height: 34
    }],
    distance: '',
    cost: '',
    polyline: []
  },
  onLoad: function(options) {
    
    var that = this;
    //var key = config.Config.key;
    var myAmapFun = new amapFile.AMapWX({key: '91d746fc5c00999831cb5c913254f8ed'});
    myAmapFun.getDrivingRoute({
      origin: '118.377600,35.007714',
      destination: '118.356426,35.103738',
      success: function(data){
        console.log("高德：",data);
        var points = [];
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
        that.setData({
          polyline: [{
            points: points,
            color: "#0091ff",
            width: 6
          }]
        });
        console.log('polyline:',that.data.polyline);
        if(data.paths[0] && data.paths[0].distance){
          that.setData({
            distance: data.paths[0].distance + '米'
          });
        }
        if(data.taxi_cost){
          that.setData({
            cost: '打车约' + parseInt(data.taxi_cost) + '元'
          });
        }
          
      },
      fail: function(info){

      }
    })
    
  },
  goDetail: function(){
     
  },
  goToCar: function (e) {
    
  },
  goToBus: function (e) {
     
  },
  goToRide: function (e) {
     
  },
  goToWalk: function (e) {
    wx.reLaunch({
      url: '../navigation_walk/navigation'
    })
  }
})
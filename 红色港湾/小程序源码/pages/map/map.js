// pages/map/map.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    mapid: 1,
    map: {
      latitude: 34.811943,
      longitude: 117.161351,
      markers: [],
      hasMarkers: false
    },
    id: 1,
    tupian: '../image/danghui.png',
    tupians: '../image/rxing.png',
    textlist: [],
    markerslist: [],

  },
  daohangs: function () {
    var that = this;
    wx.navigateTo({
      url: '../navigation_car/navigation?longitude=' + that.data.textlist[0].latitude + '&latitude=' + that.data.textlist[0].longitude
    })
    // wx:wx.navigateTo({
    //   url: '/pages/daohang/index?id='+this.data.mapid,
    // })

    // var that=this;
    // wx:wx.getLocation({
    //   altitude: true,
    //   highAccuracyExpireTime: 0,
    //   isHighAccuracy: true,
    //   success: (result) => {
    //     //console.log(result);
    //     console.log(that.data.textlist);
    //     wx:wx.request({
    //       url: 'https://apis.map.qq.com/ws/direction/v1/driving/?from='+result.latitude+','+result.longitude+'&to='+that.data.textlist[0].longitude+','+that.data.textlist[0].latitude+'&output=json&callback=cb&key=VTWBZ-4MZEV-S7SPF-UINTN-7HDEV-6BFV3',
    //       success: (result) => {
    //         console.log(result);
    //       },
    //     })
    //   },
    //   type: 'wgs84',
    // });

  },
  Homes: function () {
    wx.reLaunch({
      url: '../index/index',
    })
  },
  help: function () {
    wx.reLaunch({
      url: '../help/help',
    })
  },
  Talent: function () {
    wx.reLaunch({
      url: '../Talent/Talent',
    })
  },
  impression: function () {
    wx.reLaunch({
      url: '../impression/impression',
    })
  },
  maskerstap: function (e) {
    console.log(this.data.markerslist);
    console.log(e)
    var id = e.detail.markerId
    console.log(id)
    this.setData({
      mapid: this.data.markerslist[id].id,
      textlist: [{
        mapname: this.data.markerslist[id].title,
        mapdizhi: this.data.markerslist[id].address,
        mappeople: this.data.markerslist[id].population,
        mapshuji: this.data.markerslist[id].secretary,
        mapphone: this.data.markerslist[id].phone,
        maplian: this.data.markerslist[id].contacts,
        description: this.data.markerslist[id].description,
        longitude: this.data.markerslist[id].lat,
        latitude: this.data.markerslist[id].lng
      }],
    })
  },
  regionchange(e) {
    let markers = this.data.map.markers
    if (e.type == 'end') {
      if (e.detail.scale > 18) {
        markers.forEach((v) => {
          v.callout.display = 'ALWAYS'
        })
      }else {
        markers.forEach((v) => {
          v.callout.display = 'BYCLICK'
        })
      }
      this.setData({ 'map.markers': markers })
    }
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
    var markers = [];
    wx.getLocation({
      type: "wgs84",
      success: function (res) {
        var latitude = res.latitude;
        var longitude = res.longitude;
        // console.log(res.latitude);
        that.setData({
          // 'map.latitude': res.latitude,
          // 'map.longitude': res.longitude,
          // markers: [{
          //   latitude: res.latitude,
          //   longitude: res.longitude
          // }]
        })
      }
    });
    wx.request({
      url: 'https://hong.linyiit.cn/api/wechat/maps',
      method: 'get',
      success: (result) => {
        console.log(result)

        that.setData({
          markerslist: result.data,
          textlist: [{
            mapname: result.data[0].title,
            mapdizhi: result.data[0].address,
            mappeople: result.data[0].population,
            mapshuji: result.data[0].typename,
            mapphone: result.data[0].phone,
            longitude: result.data[0].lat,
            latitude: result.data[0].lng

          }],
        })
        for (var i = 0; i < that.data.markerslist.length; i++) {
          markers[i] = {}
        }
        for (var i = 0; i < that.data.markerslist.length; i++) {
          markers[i].id = i
          markers[i].latitude = Number(that.data.markerslist[i]["lat"])
          markers[i].longitude = Number(that.data.markerslist[i]["lng"])
          // markers[i].title = that.data.markerslist[i].title
          markers[i].callout = {
            content: that.data.markerslist[i].title,
            fontSize: '14px',
            padding: '5px',
            borderRadius: '3px',
            borderColor: '#FFD700',
            display: 'BYCLICK'
          }
          if (that.data.markerslist[i].type == 1) {
            markers[i].iconPath = that.data.tupian
          } else {
            markers[i].iconPath = that.data.tupians
          }
          markers[i].width = 20
          markers[i].height = 20
        }
        that.setData({
          'map.markers': markers,
          'map.hasMarkers': true
        })
        // console.log(that.data.map.markers);
        // console.log(that.data.map.hasMarkers);


      },
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {
    // wx.reLaunch({
    //   url: '../index/index',
    // })
  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})
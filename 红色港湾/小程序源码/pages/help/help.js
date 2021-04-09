// pages/help/help.js

var util = require('../../utils/util')

Page({

  /**
   * 页面的初始数据
   */
  data: {
    addresses: {},
    helps: {
      address: '',
      lat: '',
      lng: '',
      content: '',
      users: '',
      telphone: '',
      title: '',
      timer: '',
      type: '',
    },
    id:2,
    index: null,
    picker: [],
    colors: 0,
  },

  address:function(){
    var that=this
   wx:wx.chooseLocation({
     latitude: 0,
     longitude: 0,
     success: (result) => {
       console.log(result)
       that.setData({
        addresses: result
       })
       console.log(that.data.addresses)
     },
   })
  },

  submit:function(e){
    console.log(e) 
    var that = this
    var times = util.formatTime(new Date());
    that.setData({
      'helps.content': e.detail.value.content,
      'helps.users': e.detail.value.users,
      'helps.telphone': e.detail.value.telphone,
      'helps.title': e.detail.value.title,
      'helps.address': that.data.addresses.address,
      'helps.lat': that.data.addresses.latitude,
      'helps.lng': that.data.addresses.longitude,
      'helps.timer': times,
    })
    console.log(that.data.addresses)
    console.log(that.data.helps)
    if(that.data.helps.address == undefined){
      wx.showToast({
        title: '地址为空!',
        icon: 'none',
        duration: 1500
      })
    }else if(that.data.helps.title == ''){
      wx.showToast({
        title: '标题为空!',
        icon: 'none',
        duration: 1500
      })
    }else if(that.data.helps.users == ''){
      wx.showToast({
        title: '求助人为空!',
        icon: 'none',
        duration: 1500
      })
    }else if(that.data.helps.telphone == ''){
      wx.showToast({
        title: '联系方式为空!',
        icon: 'none',
        duration: 1500
      })
    }else if(that.data.helps.content == ''){
      wx.showToast({
        title: '详情为空!',
        icon: 'none',
        duration: 1500
      })
    }else if(that.data.helps.type == ''){
      wx.showToast({
        title: '类型为空!',
        icon: 'none',
        duration: 1500
      })
    }else{
      wx.request({
        url: 'https://hong.linyiit.cn/api/wechat/addhelp',
        method: 'POST',
        data: that.data.helps,
        success: function(res){
          console.log(res)
          if(res.statusCode == 200){
            wx.showToast({
              title: '提交成功',
              icon: 'success',
              duration: 1500
            })
            wx.reLaunch({
              url: '/pages/help/complete',
            })
          }else{
            wx.showToast({
              title: '提交失败',
              icon: 'none',
              duration: 1500
            })
          }   
        }
      })
    }
  },

  PickerChange(e) {
    var that = this
    console.log(e);
    that.setData({
      index: e.detail.value,
      'helps.type': that.data.picker[e.detail.value].id,
      colors: 1,
    })
  },

  Homes:function(){
    wx.reLaunch({
      url: '../index/index',
    })
  },
  map:function(){
    wx.reLaunch({
      url: '../map/map',
    })
  },
  Talent:function(){
    wx.reLaunch({
      url: '../Talent/Talent',
    })
  },
  impression:function(){
    wx.reLaunch({
      url: '../impression/impression',
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
    wx.request({
      url: 'https://hong.linyiit.cn/api/wechat/helpcatelist',
      method: 'GET',
      success: function(res){
        console.log(res)
        that.setData({
          picker: res.data,
        })
        console.log(that.data.picker)
      }
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
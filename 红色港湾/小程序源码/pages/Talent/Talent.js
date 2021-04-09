//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
  list:[],
  banner:{},
  id:3,
  },
  //事件处理函数
  bindViewTap: function() {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  Homes:function(){
    wx.reLaunch({
      url: '../index/index',
    })
  },
  help:function(){
    wx.reLaunch({
      url: '../help/help',
    })
  },
  map:function(){
    wx.reLaunch({
      url: '../map/map',
    })
  },
  impression:function(){
    wx.reLaunch({
      url: '../impression/impression',
    })
  },
  // 人才之家跳转
  talenttz:function(e){
    console.log(e)
    var id=parseInt(e.currentTarget.dataset.id)
    
    wx.navigateTo({
      url: '/pages/news/list?id='+id,
    })
  },
  onLoad: function () {
    var that=this
   wx.request({
     url: 'https://hong.linyiit.cn/api/wechat/newscate',
     data:{id:1},
     method:'GET',
     success: (result) => {
       console.log(result)
       that.setData({
         list:result.data.catelist,
         banner:result.data.banner[0]
       })
     },
   })
  },
  getUserInfo: function(e) {
    console.log(e)
    app.globalData.userInfo = e.detail.userInfo
    this.setData({
      userInfo: e.detail.userInfo,
      hasUserInfo: true
    })
  }
})

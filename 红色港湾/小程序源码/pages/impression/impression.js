//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
  banner:{},
  wz:[],
  id:4,
  page:1,
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
  Talent:function(){
    wx.reLaunch({
      url: '../Talent/Talent',
    })
  },
  // 开发区跳转
  kfq:function(e){
    console.log(e)
    console.log(e)
    var id=parseInt(e.currentTarget.dataset.id)
    wx.navigateTo({
      url: '/pages/news/list?id='+id,
    })
  },
  onLoad: function () {
   var that=this;
   var i=that.data.page
   wx.request({
     url: 'https://hong.linyiit.cn/api/wechat/newscate',
     data:{id:2},
     method:'GET',
     success: (result) => {
       console.log(result)
       that.setData({
       wz:result.data.catelist,
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
  },
  // 上拉加载
  onReachBottom:function(e){
    // wx.showLoading({
    //   title: '正在加载中',
    // })
    //   // console.log("123")
    //   var that=this;
    //   this.setData({
    //     page:that.data.page+1
    //   })
    //   var i=that.data.page
    //   wx.request({
    //     url: 'https://hong.linyiit.cn/api/wechat/newslist/page/i',
    //     method:'GET',
    //     success: (result) => {
    //       console.log(result)
    //       that.setData({
    //       wz:result.data.newslist.data,
    //       banner:result.data.bannerlist
    //       })
    //      setTimeout(function(){
    //        wx.hideLoading()
    //      },1000)
    //     },
    //   })
  },
  // 下拉刷新
  onPullDownRefresh:function(){
    var that=this
    // var i=that.data.page
    var i=1
    wx.request({
      url: 'https://hong.linyiit.cn/api/wechat/newslist/page/'+i,
      method:'GET',
      success: (result) => {
        console.log(result)
        that.setData({
        wz:result.data.newslist.data,
        banner:result.data.bannerlist
        })
      },
    })
  }

})

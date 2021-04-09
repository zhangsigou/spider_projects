// pages/details/Details.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    textslist:[],
    introduceList:''
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that=this;
  wx.request({
    url: 'https://hong.linyiit.cn/api/wechat/newsinfo',
    data:{id:options.id},
    method:'GET',
    success: (result) => {
      console.log(result)
      that.setData({
        textslist:result.data
      })
      this.setData({
        introduceList:result.data.content.replace(/\<img/gi, '<img style="max-width:100%;height:auto"')
      })
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
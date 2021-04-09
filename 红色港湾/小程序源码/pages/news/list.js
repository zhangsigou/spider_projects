// pages/member/member.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    list: [],
    flag: 1
  },
  // 跳转
  nav: function (e) {
    var id = parseInt(e.currentTarget.dataset.id)
    wx.navigateTo({
      url: '/pages/details/Details?id=' + id,
    })
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
    var id = options.id
    wx.request({
      url: 'https://hong.linyiit.cn/api/wechat/newslist',
      data: { id: id },
      method: 'GET',
      success: (result) => {
        console.log(result)
        if (result.data.data.length == 0) {
          that.setData({
            flag: 0
          })
        }
        that.setData({
          list: result.data.data
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
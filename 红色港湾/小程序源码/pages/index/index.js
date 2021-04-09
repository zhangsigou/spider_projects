Page({
  data: {
    list:[
      {name:"党建地图",image:"../image/ditu_20201120090037.png",id:"1"},
      {name:"红色帮办",image:"../image/bangban_20201120090042.png",id:"2"},
      {name:"人才之家",image:"../image/rencai_20201120090033.png",id:"3"},
      {name:"印象开发区",image:"../image/kaifaqu_20201120090021.png",id:"4"}
    ],
    lists:[
      {name:"党建地图",image:"../image/ditu_20201120090037.png",color:"#FECC2B",id:"1"},
      {name:"红色帮办",image:"../image/bangban_20201120090042.png",color:"#ED292A",id:"2"},
      {name:"人才之家",image:"../image/rencai_20201120090033.png",color:"#4A98FC",id:"3"},
      {name:"印象开发区",image:"../image/kaifaqu_20201120090021.png",color:"#FAA20C",id:"4"},
      {name:"党员之星",image:"../image/xings.png",color:"#ED292A",id:"5"},
      {name:"企业招聘",image:"../image/zhaopin.png",color:"#57C0EF",id:"6"}
    ],
    swiperList: [],
    noticelist:[],
   
  },
  nav:function(e){
    console.log(e)
    if(e.currentTarget.dataset.id==1){
     wx.reLaunch({
       url: '../map/map',
     })
    };
    if(e.currentTarget.dataset.id==2){
     wx.reLaunch({
       url: '../help/help',
     })
    };
    if(e.currentTarget.dataset.id==3){
     wx.reLaunch({
       url: '../Talent/Talent',
     })
    };
    if(e.currentTarget.dataset.id==4){
     wx.reLaunch({
       url: '../impression/impression',
     })
    };
    if(e.currentTarget.dataset.id==5){
      wx.reLaunch({
        url: '../news/list?id=16',
      })
     };
     if(e.currentTarget.dataset.id==6){
      wx.reLaunch({
        url: '../news/list?id='+13,
      })
     }
  },
  Jump:function(e) {
   console.log(e)
   if(e.currentTarget.dataset.id==1){
    wx.reLaunch({
      url: '../map/map',
    })
   };
   if(e.currentTarget.dataset.id==2){
    wx.reLaunch({
      url: '../help/help',
    })
   };
   if(e.currentTarget.dataset.id==3){
    wx.reLaunch({
      url: '../Talent/Talent',
    })
   };
   if(e.currentTarget.dataset.id==4){
    wx.reLaunch({
      url: '../impression/impression',
    })
   }
  },
  // 通知跳转
  notifytz:function(e){
    console.log(e)
    var index=parseInt(e.currentTarget.dataset.index)
    console.log("index"+index)
    wx.navigateTo({
      url: '/pages/indexxq/indexxq?index='+index,
    })
  },
  markers:function(e){
    console.log(e)
  },
  labels(e){
    console.log(e)
  },
  onLoad: function () {
    var that=this
   wx.request({
     url: 'https://hong.linyiit.cn/api/wechat/index',
     method: 'get',
     success: (result) => {
       console.log(result)
       that.setData({
         swiperList:result.data.bannerlist,
         noticelist:result.data.noticelist,
       })
     },
   })
   
  },
  onReady: function () {
 
  }
})
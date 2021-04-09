<?php /*a:1:{s:70:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/organizntion/maps.html";i:1609139703;}*/ ?>
<link href="https://cdn.bootcdn.net/ajax/libs/layer/3.1.1/mobile/need/layer.css" rel="stylesheet"><style>
        body{
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
        }
        iframe{
            width: 100%;
            height: 100%;
        }

    </style><iframe id="mapPage" width="100%" height="90%" frameborder=0
        src="https://apis.map.qq.com/tools/locpicker?search=1&type=1&key=VTWBZ-4MZEV-S7SPF-UINTN-7HDEV-6BFV3&referer=myapp"></iframe><script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script><script src="https://cdn.bootcdn.net/ajax/libs/layer/3.1.1/layer.js"></script><script>
    //iframe页面调用方法
    $(function(){

        window.addEventListener('message',function(event){
            var loc = event.data;
            console.log(loc);
            layer.confirm('你刚选择了'+loc.poiaddress, {
                btn: ['确定','重选'], //按钮
                closeBtn: 0
            }, function(){
                $('#address',window.parent.document).val(loc.poiaddress);
                $('#lng',window.parent.document).val(loc.latlng.lng);
                $('#lat',window.parent.document).val(loc.latlng.lat);
                var index1 = parent.layer.getFrameIndex(window.name);
                parent.layer.close(index1);
            });


        },true)

    });

</script>
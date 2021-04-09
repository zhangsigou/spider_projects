<?php /*a:3:{s:70:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/organizntion/form.html";i:1609139259;s:74:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/../../admin/view/main.html";i:1605948572;s:75:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/organizntion/formstyle.html";i:1607913097;}*/ ?>
<div class="layui-card layui-bg-gray"><style>
    .news-left {
        width: 300px;
        float: left;
        margin-right: 15px;
    }

    .news-right {
        overflow: hidden;
        width: 980px;
        position: relative;
        display: inline-block;
    }

    .news-left .news-item {
        height: 150px;
        cursor: pointer;
        max-width: 270px;
        overflow: hidden;
        position: relative;
        border-radius: 5px;
        border: 1px solid #ccc;
        background-size: cover;
        background-position: center center
    }

    .news-left .news-item.active {
        border: 1px solid #44b549 !important
    }

    .news-left .article-add {
        color: #999;
        display: block;
        font-size: 22px;
        text-align: center
    }

    .news-left .article-add:hover {
        color: #666
    }

    .news-left .news-title {
        bottom: 0;
        color: #fff;
        width: 272px;
        display: block;
        padding: 0 5px;
        max-height: 6em;
        overflow: hidden;
        margin-left: -1px;
        position: absolute;
        text-overflow: ellipsis;
        background: rgba(0, 0, 0, .7)
    }

    .news-left .news-item a {
        color: #fff;
        width: 30px;
        height: 30px;
        float: right;
        font-size: 12px;
        margin-top: -1px;
        line-height: 34px;
        text-align: center;
        margin-right: -1px;
        background-color: rgba(0, 0, 0, .5)
    }

    .news-left .news-item:hover a {
        display: inline-block !important
    }

    .news-left .news-item a:hover {
        text-decoration: none;
        background-color: #0C0C0C
    }

    .news-right .upload-image-box {
        width: 130px;
        height: 90px;
        border-radius: 5px;
        box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.2);
        background: url("/static/plugs/uploader/theme/image.png") no-repeat center center;
        background-size: cover;
    }
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><form class="layui-form layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off" style="padding-top: 20px"><div class="layui-form-item"><label class="layui-form-label">党组织全称：</label><div class="layui-input-block"><input type="hidden" value="<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'')); ?>" name="id"><input type="text" name="title" required  lay-verify="required|title" placeholder="请输入党组织全称" autocomplete="off" class="layui-input" style="width:450px" value="<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:'')); ?>"></div></div><div class="layui-form-item"><label class="layui-form-label">党组织人数：</label><div class="layui-input-block"><input type="hidden" value="<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'')); ?>" name="id"><input type="text" name="population" required  lay-verify="required" placeholder="请输入党组织人数" autocomplete="off" class="layui-input" style="width:450px" value="<?php echo htmlentities((isset($vo['population']) && ($vo['population'] !== '')?$vo['population']:'')); ?>"></div></div><div class="layui-form-item"><label class="layui-form-label">类型：</label><div class="layui-input-block" style="width: 450px;height: auto"><select required name="type" lay-verify="required"><?php foreach($typelist as $key=>$vos): if($vos['id'] == (isset($vo['type']) && ($vo['type'] !== '')?$vo['type']:0)): ?><option  value="<?php echo htmlentities($vos['id']); ?>" selected ><?php echo htmlentities($vos['typename']); ?></option><?php else: ?><option value="<?php echo htmlentities($vos['id']); ?>"><?php echo htmlentities($vos['typename']); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item layui-form-text"><label class="layui-form-label">简介：</label><div class="layui-input-block" ><textarea required name="description" placeholder="请填写简介" class="layui-textarea" lay-verify="layui-textarea|contact" style="width: 450px" ><?php echo htmlentities((isset($vo['description']) && ($vo['description'] !== '')?$vo['description']:'')); ?></textarea></div></div><div class="layui-form-item" ><label class="layui-form-label">地址：</label><div class="layui-input-inline" style="display: flex;flex-direction: row ;width: 600px"><input type="text" id="address" name="address" required  lay-verify="required" placeholder="请填写地址" autocomplete="off" class="layui-input" style="width: 450px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; " value="<?php echo htmlentities((isset($vo['address']) && ($vo['address'] !== '')?$vo['address']:'')); ?>" ><div style="margin-left: 20px"><button type="button" class="layui-btn openmap">地图选址</button></div></div></div><div class="layui-form-item" ><label class="layui-form-label" style="margin-top: 13px">经度：</label><div class="layui-input-inline" style="margin-top: 13px"><input readonly type="text" id="lng" name="lng" required  lay-verify="required" placeholder="请填写经度" autocomplete="off" class="layui-input" style="width:450px" value="<?php echo htmlentities((isset($vo['lng']) && ($vo['lng'] !== '')?$vo['lng']:'')); ?>" ></div></div><div class="layui-form-item"><label class="layui-form-label">纬度：</label><div class="layui-input-inline"><input readonly type="text" id="lat" name="lat" required  lay-verify="required" placeholder="请填写纬度" autocomplete="off" class="layui-input" style="width:450px" value="<?php echo htmlentities((isset($vo['lat']) && ($vo['lat'] !== '')?$vo['lat']:'')); ?>" ></div></div><div class="layui-form-item"><label class="layui-form-label">书记：</label><div class="layui-input-block"><input type="text" name="secretary" required  lay-verify="required|fname" placeholder="请输入书记姓名" autocomplete="off" class="layui-input" style="width:450px" value="<?php echo htmlentities((isset($vo['secretary']) && ($vo['secretary'] !== '')?$vo['secretary']:'')); ?>"></div></div><div class="layui-form-item"><label class="layui-form-label">联系人：</label><div class="layui-input-block"><input type="text" name="contacts" required  lay-verify="required|fnames" placeholder="请输入联系人" autocomplete="off" class="layui-input" style="width: 450px" value="<?php echo htmlentities((isset($vo['contacts']) && ($vo['contacts'] !== '')?$vo['contacts']:'')); ?>"></div></div><div class="layui-form-item"><label class="layui-form-label">联系人电话：</label><div class="layui-input-block"><input type="text" name="phone" required  lay-verify="required|phone" placeholder="请输入联系人电话" autocomplete="off" class="layui-input" style="width: 450px" value="<?php echo htmlentities((isset($vo['phone']) && ($vo['phone'] !== '')?$vo['phone']:'')); ?>"></div></div><div class="layui-form-item" ><label class="layui-form-label">服务项目:</label><div class="layui-input-block"><?php if(!(empty($vo['id']) || (($vo['id'] instanceof \think\Collection || $vo['id'] instanceof \think\Paginator ) && $vo['id']->isEmpty()))): foreach($catelist as $key=>$val): ?><input required name="helptype[]" type="checkbox" value="<?php echo htmlentities($val['id']); ?>" title="<?php echo htmlentities($val['hname']); ?>" type="checkbox" <?php if(in_array($val['id'],$vo['helptype'])): ?>checked<?php endif; ?> ><?php endforeach; ?><?php endif; if(empty($vo['id']) || (($vo['id'] instanceof \think\Collection || $vo['id'] instanceof \think\Paginator ) && $vo['id']->isEmpty())): foreach($catelist as $key=>$val): ?><input required name="helptype[]" type="checkbox" value="<?php echo htmlentities($val['id']); ?>" title="<?php echo htmlentities($val['hname']); ?>" type="checkbox" ><?php endforeach; ?><?php endif; ?></div></div><div class="layui-form-item text-center"><button class="layui-btn" lay-submit="" lay-verify="" type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div></form></div><script>
    form.render();
    $('.openmap').click(function(){
        layer.open({
            type: 2,
            title:"请选择地址",
            area:['600px','550px'],
            content: '<?php echo url("maps"); ?>'

        });
    });
    form.render();
    layui.use(['form'], function () {
        var form = layui.form;
        //自定义验证规则
        form.verify({
            title: function (value) {
                if (value.length < 5) {
                    return '党组织全称至少得5个字符啊';
                }
            }, fname: function (value) {
                if (value.length < 2) {
                    return '请输入至少2位的书记名';
                }
            },  fnames: function (value) {
                if (value.length < 2) {
                    return '请输入至少2位的联系人名';
                }
            },contact: function (value) {
                if (value.length < 4) {
                    return '简介请输入至少4个字符';
                }
            }
            , phone: [/^1[3|4|5|7|8]\d{9}$/, '手机必须11位，只能是数字！']
        });
        //监听提交
        form.on('submit(demo1)', function(data){
            layer.alert(JSON.stringify(data.field), {
                title: '最终的提交信息'
            })
            return false;
        });
    });


</script></div>
<?php /*a:3:{s:62:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/help/form.html";i:1607913084;s:74:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/../../admin/view/main.html";i:1605948572;s:67:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/help/formstyle.html";i:1607913085;}*/ ?>
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
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><form class="layui-form layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off" style="padding-top: 20px"><div class="layui-form-item"><label class="layui-form-label">标题：</label><div class="layui-input-block"><input type="hidden" value="<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'')); ?>" name="id"><input type="text" name="title" required  lay-verify="required|title" placeholder="请输入标题" autocomplete="off" class="layui-input" style="width: 550px" value="<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:'')); ?>"></div></div><div class="layui-form-item"><label class="layui-form-label">帮办类型：</label><div class="layui-input-block" style="width: 550px;height: auto"><select required name="type" lay-verify="required"><?php foreach($typelist as $key=>$vos): if($vos['id'] == (isset($vo['type']) && ($vo['type'] !== '')?$vo['type']:0)): ?><option value="<?php echo htmlentities($vos['id']); ?>" selected ><?php echo htmlentities($vos['hname']); ?></option><?php else: ?><option value="<?php echo htmlentities($vos['id']); ?>"><?php echo htmlentities($vos['hname']); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item layui-form-text"><label class="layui-form-label">内容：</label><div class="layui-input-block" ><textarea required name="content" placeholder="请输入内容" class="layui-textarea|content" style="width: 550px" ><?php echo htmlentities((isset($vo['content']) && ($vo['content'] !== '')?$vo['content']:'')); ?></textarea></div></div><div class="layui-form-item"><label class="layui-form-label">求助人：</label><div class="layui-input-block"><input type="text" name="users" required  lay-verify="required|fname" placeholder="请输入求助人姓名" autocomplete="off" class="layui-input" style="width: 550px" value="<?php echo htmlentities((isset($vo['users']) && ($vo['users'] !== '')?$vo['users']:'')); ?>" ></div></div><div class="layui-form-item"><label class="layui-form-label">联系方式：</label><div class="layui-input-block"><input type="text" name="telphone" required  lay-verify="required|phone" placeholder="请输入联系方式" autocomplete="off" class="layui-input" style="width: 550px" value="<?php echo htmlentities((isset($vo['telphone']) && ($vo['telphone'] !== '')?$vo['telphone']:'')); ?>"></div></div><div class="layui-form-item text-center"><button class="layui-btn" lay-submit="" lay-verify="" type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div></form></div><script>
    form.render();
    layui.use(['form'], function () {
        var form = layui.form;
        //自定义验证规则
        form.verify({
            title: function (value) {
                if (value.length < 5) {
                    return '标题至少得5个字符啊';
                }
            }, fname: function (value) {
                if (value.length < 4) {
                    return '请输入至少4位的用户名';
                }
            }, contact: function (value) {
                if (value.length < 4) {
                    return '内容请输入至少4个字符';
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
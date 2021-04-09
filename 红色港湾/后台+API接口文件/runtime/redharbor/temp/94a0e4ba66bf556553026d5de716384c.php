<?php /*a:3:{s:66:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/newscate/form.html";i:1607913094;s:74:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/../../admin/view/main.html";i:1605948572;s:67:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/help/formstyle.html";i:1607913085;}*/ ?>
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
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><form class="layui-form layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off"><div class="layui-card-body padding-left-40"><div class="layui-row layui-col-space15"><div class="layui-col-xs5"><label class="block relative"><span class="color-green font-w7">新闻分类名称</span><span class="color-desc margin-left-5">catename</span><input name="catename" lay-verify="title" value='<?php echo htmlentities((isset($vo['catename']) && ($vo['catename'] !== '')?$vo['catename']:"")); ?>' required placeholder="请输入新闻分类名称" class="layui-input"><span class="help-block">新闻分类名称，请保持不要重复</span></label></div><div class="layui-col-xs5"><div class="layui-form-item" data-keys-type='image'><span class="color-green font-w7">上传图片</span><div><input type="hidden" class="layui-input" onchange="$(this).nextAll('img').attr('src', this.value)" value="<?php echo htmlentities((isset($vo['catimg']) && ($vo['catimg'] !== '')?$vo['catimg']:'')); ?>"  name="catimg" required placeholder="请上传图片或输入图片URL地址"><a data-file="btn" data-type="bmp,png,jpeg,jpg,gif" data-field="catimg" class="input-group-addon"><i class="layui-icon layui-icon-upload">选择图片</i></a><img data-tips-image src='<?php echo htmlentities((isset($vo['catimg']) && ($vo['catimg'] !== '')?$vo['catimg']:"")); ?>' alt="img" style="width: 50px;height: 50px"></div><span class="help-block">新闻图片，请保持不要重复</span></div></div></div><div class="hr-line-dashed"></div><?php if(!(empty($vo['id']) || (($vo['id'] instanceof \think\Collection || $vo['id'] instanceof \think\Paginator ) && $vo['id']->isEmpty()))): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?><div class="layui-form-item text-center"><button class="layui-btn" lay-submit="" lay-filter=""  type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div></div></form></div><script>
    form.render();
    layui.use(['form'], function () {
        var form = layui.form;
        //自定义验证规则
        form.verify({
            title: function (value) {
                if (value.length < 3) {
                    return '新闻分类名称至少得3个字符啊';
                }
            }
        });
        //监听提交
        // form.on('submit(demo1)', function(data){
        // layer.alert(JSON.stringify(data.field), {
        // title: '最终的提交信息'
        // })
        // return false;
        // });
    });
</script></div>
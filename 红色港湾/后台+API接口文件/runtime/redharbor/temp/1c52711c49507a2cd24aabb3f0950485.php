<?php /*a:3:{s:64:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/help/shenhe.html";i:1607560318;s:74:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/../../admin/view/main.html";i:1605948572;s:67:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/help/formstyle.html";i:1606823369;}*/ ?>
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
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><form class="layui-form layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off" style="padding-top: 20px;height: 350px"><div class="layui-form-item"><label class="layui-form-label">标题：</label><div class="layui-input-block"><input type="hidden" value="<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'')); ?>" name="id"><input type="text" readonly name="" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" style="width: 550px" value="<?php echo htmlentities($lists['title']); ?>"></div></div><div class="layui-form-item"><input type="hidden" value="<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'')); ?>" name="id"><input type="hidden" value="3" name="status"><div class="layui-form-item layui-form-text"><label class="layui-form-label">内容：</label><div class="layui-input-block" ><textarea required name="content" placeholder="请输入内容" class="layui-textarea" style="width: 550px" ><?php echo htmlentities((isset($vo['content']) && ($vo['content'] !== '')?$vo['content']:'')); ?></textarea></div></div><div class="layui-form-item" data-keys-type='image'><label class="layui-form-label label-required">图片地址：</label><div class="layui-input-block"><input type="hidden" class="layui-input" onchange="$(this).nextAll('img').attr('src', this.value)" value="<?php echo htmlentities((isset($vo['thumb']) && ($vo['thumb'] !== '')?$vo['thumb']:'')); ?>"  name="thumb" required placeholder="请上传图片或输入图片URL地址"><a data-file="btn" data-type="bmp,png,jpeg,jpg,gif" data-field="thumb" class="input-group-addon"><i class="layui-icon layui-icon-upload">选择图片</i></a><img data-tips-image src='<?php echo htmlentities((isset($vo['thumb']) && ($vo['thumb'] !== '')?$vo['thumb']:"")); ?>' alt="img" style="width: 50px;height: 50px"></div></div></div><div class="layui-form-item text-center" style="margin-top: 40px"><button class="layui-btn" type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div></form></div><script>
    form.render();

</script></div>
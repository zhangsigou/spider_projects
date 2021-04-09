<?php /*a:3:{s:65:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/help/specify.html";i:1607913085;s:74:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/../../admin/view/main.html";i:1605948572;s:67:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/help/formstyle.html";i:1607913085;}*/ ?>
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
</style><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><form class="layui-form layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off" style="padding-top: 20px;height: 400px"><div class="layui-form-item"><input type="hidden" value="<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:'')); ?>" name="id"><input type="hidden" value="1" name="status"><label class="layui-form-label">请指定组织：</label><div class="layui-input-block" style="width: 550px;height: auto"><select required name="organizntionid" lay-verify="required"><!--                <?php foreach($typelist as $key=>$vos): ?>--><!--                <?php if($vos['id'] == (isset($vo['type']) && ($vo['type'] !== '')?$vo['type']:0)): ?>--><!--                <option value="<?php echo htmlentities($vos['id']); ?>" selected ><?php echo htmlentities($vos['hname']); ?></option>--><!--                <?php else: ?>--><!--                <option value="<?php echo htmlentities($vos['id']); ?>"><?php echo htmlentities($vos['hname']); ?></option>--><!--                <?php endif; ?>--><!--                <?php endforeach; ?>--><?php foreach($lists as $key=>$val): if($val['id'] == (isset($vo['organizntionid']) && ($vo['organizntionid'] !== '')?$vo['organizntionid']:0)): ?><option value="<?php echo htmlentities($val['id']); ?>" selected onclick="specify"><?php echo htmlentities($val['title']); ?></option><?php else: ?><option value="<?php echo htmlentities($val['id']); ?>" onclick="specify"><?php echo htmlentities($val['title']); ?></option><?php endif; ?><?php endforeach; ?></select></div></div><div class="layui-form-item text-center" style="margin-top: 40px"><button class="layui-btn" type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div></form></div><script>
    form.render();

</script></div>
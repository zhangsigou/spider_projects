<?php /*a:2:{s:62:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/news/form.html";i:1607913091;s:74:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/../../admin/view/main.html";i:1605948572;}*/ ?>
<div class="layui-card layui-bg-gray"><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><div class="layui-card-header notselect"><span class="layui-icon layui-icon-next font-s10 color-desc margin-right-5"></span><?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?><div class="pull-right"></div></div><?php endif; ?><div class="layui-card-body"><form class="layui-form layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off" enctype="multipart/form-data" style="padding-top: 20px"><div class="layui-form-item"><label class="layui-form-label">标题：</label><div class="layui-input-block"><input type="hidden" name="id"  placeholder="请输入ID" value='<?php echo htmlentities((isset($vo['id']) && ($vo['id'] !== '')?$vo['id']:"")); ?>' autocomplete="off" class="layui-input"><input type="text" name="title" required  lay-verify="required|title"  placeholder="请输入标题" value='<?php echo htmlentities((isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:"")); ?>' autocomplete="off" class="layui-input" style="width: 550px"></div></div><div class="layui-form-item" ><label class="layui-form-label">作者：</label><div class="layui-input-block"><input type="text" name="author" required  lay-verify="required|fname" placeholder="请输入姓名" autocomplete="off" class="layui-input" value='<?php echo htmlentities((isset($vo['author']) && ($vo['author'] !== '')?$vo['author']:"")); ?>' style="width: 550px"></div></div><div class="layui-form-item" data-keys-type='image'><label class="layui-form-label label-required">图片地址：</label><div class="layui-input-block"><input type="hidden" class="layui-input" onchange="$(this).nextAll('img').attr('src', this.value)" value="<?php echo htmlentities((isset($vo['thumb']) && ($vo['thumb'] !== '')?$vo['thumb']:'')); ?>"  name="thumb" required placeholder="请上传图片或输入图片URL地址"><a data-file="btn" data-type="bmp,png,jpeg,jpg,gif" data-field="thumb" class="input-group-addon"><i class="layui-icon layui-icon-upload">选择图片</i></a><img data-tips-image src='<?php echo htmlentities((isset($vo['thumb']) && ($vo['thumb'] !== '')?$vo['thumb']:"")); ?>' alt="img" style="width: 50px;height: 50px"></div></div><div class="layui-form-item" ><label class="layui-form-label">分类：</label><div class="layui-input-block" style="width: 550px"><select name="cateid" lay-verify="required" required><?php if(is_array($catelist) || $catelist instanceof \think\Collection || $catelist instanceof \think\Paginator): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;if($vos['id'] == (isset($vo['cateid']) && ($vo['cateid'] !== '')?$vo['cateid']:0)): ?><option value="<?php echo htmlentities($vos['id']); ?>" selected><?php echo htmlentities($vos['catename']); ?></option><?php else: ?><option value="<?php echo htmlentities($vos['id']); ?>"><?php echo htmlentities($vos['catename']); ?></option><?php endif; ?><?php endforeach; endif; else: echo "" ;endif; ?></select></div></div><div class="layui-form-item layui-form-text"><label class="layui-form-label">内容：</label><div class="layui-input-block" style="width: 550px"><textarea required name="content" placeholder="请填写内容" lay-verify="layui-textarea|contact" class="layui-textarea" id="demo"><?php echo htmlentities((isset($vo['content']) && ($vo['content'] !== '')?$vo['content']:'')); ?></textarea></div></div><div class="layui-form-item text-center"><button class="layui-btn" lay-submit="" lay-verify="" type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div></form><script type="text/javascript">
    // require(['ckeditor'], function () {
    //     window.createEditor('[name=content]', {height: 300});
    // })
    // require(['jquery'],function(){
    //     $('[name="bigpic"]').on('change',function(){
    //         var bigpicurl=$(this).val();
    //         $('#previmg').attr('src',bigpicurl);
    //     })
    // });
    form.render();
    layui.use(['layedit','form'], function(){
        var layedit = layui.layedit;
        layedit.set({
            uploadImage:{
                url:'<?php echo url("/admin/api.upload/editfile"); ?>',
                type:'post',
            }
        })
        layedit.build('demo', {
            height: 180 //设置编辑器高度
        }); //建立编辑器
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

</script></div></div>
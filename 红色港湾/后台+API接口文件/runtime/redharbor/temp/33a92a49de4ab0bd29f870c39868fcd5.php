<?php /*a:1:{s:66:"/www/wwwroot/hong.linyiit.cn/app/redharbor/view/helpcate/form.html";i:1606807370;}*/ ?>
<form class="layui-form layui-card" action="<?php echo request()->url(); ?>" data-auto="true" method="post" autocomplete="off"><div class="layui-card-body padding-left-40"><div class="layui-row layui-col-space15"><div class="layui-col-xs5"><label class="block relative"><span class="color-green font-w7">开放服务项目名称</span><span class="color-desc margin-left-5">Hname</span><input name="hname" value='<?php echo htmlentities((isset($vo['hname']) && ($vo['hname'] !== '')?$vo['hname']:"")); ?>' required placeholder="请输入开放服务项目名称" class="layui-input"><span class="help-block">开放服务项目名称，请保持不要重复</span></label></div></div><div class="hr-line-dashed"></div><?php if(!(empty($vo['id']) || (($vo['id'] instanceof \think\Collection || $vo['id'] instanceof \think\Paginator ) && $vo['id']->isEmpty()))): ?><input type='hidden' value='<?php echo htmlentities($vo['id']); ?>' name='id'><?php endif; ?><div class="layui-form-item text-center"><button class="layui-btn" type='submit'>保存数据</button><button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button></div></div></form>
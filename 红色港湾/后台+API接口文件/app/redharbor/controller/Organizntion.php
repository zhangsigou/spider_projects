<?php


namespace app\redharbor\controller;

//use app\BaseController;
use think\admin\Controller;
use think\facade\Db;
use think\facade\View;
use think\Request;
/**
 * 党组织管理
 * Class User
 * @package app\admin\controller
 */
class Organizntion extends Controller
{

    public $table = 'dz_organizntion';
    /**
     * 党组织列表
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index(){   //查询列表数据
        $info=Db::table('dz_organizntion')
            ->alias('o')
            ->join('dz_organizntion_type t','o.type=t.id')
            ->field('o.*,t.typename')
            ->where(['o.is_deleted' => 0])
            ->select();
        View::assign('list',$info);
        return View::fetch();
    }
    /**
     * 党组织删除
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function remove(){ //数据伪删除
        $id=input();
        $this->_delete($this->table);
    }
    /**
     * 党组织添加
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function add(){ //添加求助
        $data = input();
        $this->_form($this->table,'form');

    }
    /**
     * 表单数据处理
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function _form_filter(&$data){
        if(request()->isPost())
        {
            $data['helptype']=implode('|',$data['helptype']);
        }else{
           if(!empty($data))
           {
               $data['helptype']=explode('|',$data['helptype']);
           }

        }
        $info=Db::table('dz_organizntion_type')->select();
        View::assign('typelist',$info);
        $infos=Db::table('dz_helpcate')->select();
        View::assign('catelist',$infos);

    }
    /**
     * 表单结果处理
     * @param boolean $state
     */
    protected function _form_result(bool $state)
    {

        if ($state) {
            $this->success('内容保存成功！', 'javascript:history.go(0)');
        }
    }
    /**
     *党组织编辑
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function edit(){ //编辑求助内容
        $this->_form($this->table,'form');
    }
    /**
     * 打开地图
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function maps()
    {
        $this->_form($this->table,'maps');
    }
}
<?php


namespace app\redharbor\controller;


use think\admin\Controller;
use think\facade\Db;
use think\facade\View;
use think\admin\service\AdminService;
/**
 * 红色帮办
 * Class User
 * @package app\admin\controller
 */
class Help extends Controller
{
    public $table = 'dz_help';
    /**
     * 红色帮办列表
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index(){   //查询列表数据
        $orgid=AdminService::instance()->getOrgid();
        $where=[];
        if($orgid==0)
        {
            $where=['h.is_deleted' => 0];
        }else{
            $where=[
                'h.is_deleted' => 0,
                'organizntionid'=>$orgid
                ];
        }
        $info=Db::table('dz_help')
            ->alias('h')
            ->join('dz_helpcate c','h.type=c.id')
            ->field('h.*,c.hname')
            ->where($where)
            ->select();
        View::assign('list',$info);
        return View::fetch();
    }
    /**
     * 删除红色帮办
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
     * 添加红色帮办
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
     * 添加红色帮办分配
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function fenpei(){
         
    }

    /**
     * 表单数据处理
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function _form_filter(&$data){
        $info=Db::table('dz_helpcate')->select();
        View::assign('typelist',$info);
        $data['timer'] = date('Y-m-d H:i:s', time());
        $data['pubdate'] = date('Y-m-d H:i:s', time());


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
     *编辑红色帮办
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
     * 指定组织
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function specify(){
        $id=input('id');
        $info=Db::table('dz_help')->where("id",$id)->field('type')->find();
        $infos=Db::table('dz_organizntion')->where("helptype LIKE '%".$info['type']."%'")->field('title,id,helptype')->select();
        View::assign('lists',$infos);
        $this->_form($this->table,'specify');
    }
    /**
     * 帮办处理
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function process(){
        $id=input('id');
        $info=Db::table('dz_help')->where('id',$id)->field('organizntionid')->find();
        $infos=Db::table('dz_organizntion')->where('id',$info['organizntionid'])->field('title')->find();
        View::assign('lists',$infos);
//        print_r($infos);
//        exit;
        $this->_form($this->table,'process');
    }
    /**
     * 帮办审核
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function shenhe(){
        $id=input('id');
        $info=Db::table('dz_help')->where('id',$id)->field('organizntionid')->find();
        $infos=Db::table('dz_organizntion')->where('id',$info['organizntionid'])->field('title')->find();
        View::assign('lists',$infos);
        $this->_form($this->table,'shenhe');
    }


}
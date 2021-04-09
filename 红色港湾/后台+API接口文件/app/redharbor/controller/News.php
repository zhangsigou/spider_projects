<?php


namespace app\RedHarbor\controller;
use think\Request;
use think\admin\Controller;
use think\Console;
use think\facade\Db;
use think\facade\View;
/**
 * 新闻管理
 * Class User
 * @package app\admin\controller
 */
class News extends Controller
{
    public $table = 'dz_news';
    public $tables ='dz_cate';
    /**
     * 新闻列表
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function index(){
        $this->title = '新闻列表';
        $query = $this->_query($this->table);
        $query->equal('cateid')->like('title')->dateBetween('pubdate');
        // 加载对应数据列表
        $this->type = input('type', 'all');
        if ($this->type === 'all') {
            $query->where(['is_deleted' => 0]);
        } else if ($this->type = 'recycle') {
            $query->where(['is_deleted' => 0]);
        }
        $catelist=Db::name('dz_cate')->select();
        $this->assign('catelist',$catelist);
        // 列表倒叙序并显示
        $query->order('pubdate desc')->page();
    }
    /**
     * 数据列表处理
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    protected function _page_filter(array &$data)
    {
        foreach($data as &$t)
        {
            $t['catename']=Db::name('dz_cate')->where('id',$t['cateid'])->value('catename');
        }

    }
    /**
     * 新闻列表内容删除
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */

    public function remove()
    {
        $this->_applyFormToken();
        $this->_delete($this->table);
    }
    /**
     * 新闻内容添加
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function add(){
//        $this->title="添加求助内容";
        $this->_form($this->table,'form');
    }
    /**
     * 数据列表处理
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function _form_filter(&$data){
        $catelist=Db::table('dz_cate')->select()->toArray();
        $this->assign('catelist',$catelist);
//        $catelist=DataExtend::arr2table($catelist);
//        $data['timer'] = date('Y-m-d H:i:s', time());
        $data['pubdate'] = date('Y-m-d H:i:s', time());
    }
    /**
     * 表单结果处理
     * @param boolean $state
     */
    public function _form_result($state){
        if ($state){
//            redirect('/rednews/news/news')->send();
//            $this->success('成功保存',url('/index/index'));
//            $this->success('成功保存','javascript:history.back()');
        }
    }
    /**
     * 新闻内容修改
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function edit(){

//        $this->title="修改求助信息";
        $this->_form($this->table,'form');

    }

}
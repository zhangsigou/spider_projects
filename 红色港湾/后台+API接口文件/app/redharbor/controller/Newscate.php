<?php

// +----------------------------------------------------------------------
// | ThinkAdmin
// +----------------------------------------------------------------------
// | 版权所有 2014~2020 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: https://thinkadmin.top
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 代码仓库：https://gitee.com/zoujingli/ThinkAdmin
// | github 代码仓库：https://github.com/zoujingli/ThinkAdmin
// +----------------------------------------------------------------------

namespace app\redharbor\controller;

use think\admin\Controller;

use think\admin\extend\DataExtend;

/**
 * 新闻分类管理
 * Class User
 * @package app\admin\controller
 */
class Newscate extends Controller
{

    /**
     * 绑定数据表
     * @var string
     */
    public $table = 'dz_cate';

    /**
     * 新闻分类列表
     * @auth true
     * @menu true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    // public function index()
    // {
    //     $this->title = '新闻分类列表';
    //     $query = $this->_query($this->table);
    //     $query->equal('status');
    //     $query->like('hname');
    //     // 加载对应数据列表
    //     $this->type = input('type', 'all');
    //     if ($this->type === 'all') {
    //         $query->where(['is_deleted' => 0, 'status' => 1]);
    //     } elseif ($this->type = 'recycle') {
    //         $query->where(['is_deleted' => 0, 'status' => 0]);
    //     }
    //     // 列表排序并显示
    //     $query->order('id desc')->page();
    // }
    public function index()
    {
        $this->title = '新闻分类列表';
        $this->_page($this->table, false);
    }
    /**
     * 列表数据处理
     * @param array $data
     */
    protected function _index_page_filter(array &$data)
    {
        foreach ($data as &$vo) {
            $vo['ids'] = join(',', DataExtend::getArrSubIds($data, $vo['id']));
        }
        $data = DataExtend::arr2table($data);
    }
    /**
     * 添加新闻分类
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function add()
    {
        $this->_applyFormToken();
        $this->_form($this->table, 'form');
    }

    /**
     * 编辑新闻分类
     * @auth true
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function edit()
    {
        $this->_applyFormToken();
        $this->_form($this->table, 'form');
    }



    /**
     * 表单数据处理
     * @param array $data
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    protected function _form_filter(array &$data)
    {
        if ($this->request->isPost()) {
            // print_r($data);

        } else {

        }
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
     * 修改新闻分类状态
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function state()
    {
//        $this->_checkInput();
//        $this->_applyFormToken();
        $this->_save($this->table, $this->_vali([
            'status.in:0,1'  => '状态值范围异常！',
            'status.require' => '状态值不能为空！',
        ]));
    }

    /**
     * 删除新闻分类
     * @auth true
     * @throws \think\db\exception\DbException
     */
    public function remove()
    {
//        $this->_checkInput();
//        $this->_applyFormToken();
        $this->_delete($this->table);
    }



}

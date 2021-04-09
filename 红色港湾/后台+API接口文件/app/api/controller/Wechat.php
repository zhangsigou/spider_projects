<?php


namespace app\api\controller;


use think\admin\Controller;
use think\facade\Db;

class Wechat extends Controller
{
    public function index(){
        $data['bannerlist']=Db::name('dz_news')->where('cateid',8)->select();
        $data['noticelist']=Db::name('dz_news')->where('cateid',9)->select();
        return json($data);
    }
    public function maps()
    {
        $list=Db::name('dz_organizntion')
            ->alias('o')
            ->join('dz_organizntion_type ot','ot.id=o.type')
            ->field('o.*,ot.typename')
            ->select()->toArray();
        foreach($list as &$v)
        {
            $arrtype=explode('|',$v['helptype']);
            $v['helptype']=Db::name('dz_helpcate')
                ->whereIn('id',$arrtype)
                ->field('id,hname')->select()->toArray();
        }
//
//        echo "<pre>";
//        print_r($list);
        return json($list);
    }
    public function newscate($id=0)
    {
        $data['banner']=Db::name('dz_rencai')->where('cateid',$id)->select();
        $data['catelist']=Db::name('dz_cate')->where('pid',$id)->select();
         return json($data);
    }
    //印象开发区
    public function newslist($id=0)
    {
        $newslist=Db::name('dz_news')
            ->where('cateid',$id)
            ->paginate(10);
        return json($newslist);
    }
    //人才之家
    public function rencailist()
    {
        $where=[
            'cateid'=>11,
            'is_banner'=>1
        ];
        $data['bannerlist']=Db::name('dz_news')->where($where)->select();
        $data['rencailist']=Db::name('dz_news')
            ->where('cateid',11)
            ->paginate(4);
        return json($data);
    }
    //帮办类型
    public function helpcatelist()
    {
        $data=Db::name('dz_helpcate')->select();
        return json($data);
    }
    //党员之星
    public function dangyuanlist()
    {
        $where=[
            'cateid'=>10,
            'is_banner'=>1
        ];
        $data['bannerlist']=Db::name('dz_news')->where($where)->select();
        $data['dangyuanlist']=Db::name('dz_news')
            ->where('cateid',10)
            ->paginate(4);
        return json($data);
    }
    public function newsinfo($id=0){
        if($id==0)
        {
            return '参数错误';
        }
        else{
            $data=Db::name('dz_news')->where('id',$id)->find();
        }
        return json($data);
    }
    public function addhelp()
    {
        $data=input();
        $data['pubdate']=date('Y-m-d H:i:s',time());
        $info=Db::name('dz_help')->insert($data);
        return json($info);
    }
}
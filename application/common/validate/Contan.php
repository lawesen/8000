<?php
namespace app\common\validate;
use think\Validate;
class Contan extends Validate{
    protected $rule =   [
        'username' => 'require|length:3,25', //用户ID:
        'zwh' => 'require|length:2,25',//座位号
        'pingpai' => 'require|length:2,25',//品牌
        'sbxh' => 'require|length:2,25',//设备型号
        'gzbh' => 'require|length:8,25',//固资编号
        'bxsn' => 'require|length:5,25',//供应商机器报修编号SN:
        'miaoshu' => 'require|length:1,250',//故障现象:
        'ghpj' => 'require|length:2,250',//故障配件:
        'glbz' => 'require|length:8,250',//关联BZ单号:
        //'yjwcsj' => 'require|length:6,250',//预计完成时间:
        'dqzt' => 'require|length:1,25',//当前状态:
        'gjr' => 'require|length:1,25',//跟进人
        'gjr_mobphone' => 'require|length:1,25',//跟进人电话：
    ];

    protected $message  =   [
        'username.require' => '用户名不能为空',
        'username.length' => '用户名长度不足，请重新输入',
        'zwh.require' => '座位号不能为空',
        'zwh.length' => '座位号长度不足，请重新输入',
        'pingpai.require' => '品牌不能为空',
        'pingpai.length' => '品牌长度不足，请重新输入',
        'sbxh.require' => '设备型号不能为空',
        'sbxh.length' => '设备型号长度不足，请重新输入',
        'gzbh.require' => '固资编号不能为空',
        'gzbh.length' => '固资编号长度不足，请重新输入',
        'bxsn.require' => '供应商机器报修编号SN不能为空',
        'bxsn.length' => '供应商机器报修编号SN长度不足，请重新输入',
        'miaoshu.require' => '故障描述不能为空',
        'miaoshu.length' => '故障描述长度不足，请重新输入',
        'gzpj.require' => '故障配件不能为空',
        'gzpj.length' => '故障配件长度不足，请重新输入',
        'glbz.require' => '关联BZ单号不能为空',
        'glbz.length' => '关联BZ单号长度不足，请重新输入',
        'dqzt.require' => '请选择当前状态',
        'dqzt.length' => '当前状态长度不足，请重新输入',
        'gjr.require' => '跟进人不能为空',
        'gjr.length' => '跟进人长度不足，请重新输入',
        'gjr_mobphone.require' => '跟进人电话不能为空',
        'gjr_mobphone.length' => '跟进人电话长度不足，请重新输入',
    ];
}
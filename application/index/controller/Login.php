<?php
namespace app\index\controller;
use app\common\model\Rules;
use think\Controller;
use think\Db;
use think\Request;

class Login extends controller {
    public function index(){
        return $this->fetch();
    }
    // 处理用户提交的登录数据
    public function login()
    {
        // 接收post信息
        $postData = Request::instance()->post();
        // 直接调用M层方法，进行登录。
        if (Rules::login($postData['username'], $postData['password'])) {
            return $this->success('登陆成功，正在跳转···', "Index/index");
            session('id', $Rules->getData('id'));
            session('username', $Rules->getData('username'));
            session('chname', $Rules->getData('chname'));
        } else {
            return $this->error('用户名或密码不正确', 'Login/index');
        }
    }
    // 注销
    public function logOut()
    {
        if (Rules::logOut()) {
            return $this->success('成功退出登录！，正在跳转登录页面','Index/index');
        } else {
            return $this->error('退出失败，请联系管理员v_wslai','Index/index');
        }
    }

}
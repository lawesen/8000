<?php
// 简单的原理重复记： namespace说明了该文件位于application\common\model 文件夹中
namespace app\common\model;
use think\Model;    //  导入think\Model类
/**
 * Contan 教师表
 */

// 我的类名叫做Teacher，对应的文件名为Teacher.php，该类继承了Model类，Model我们在文件头中，提前使用use进行了导入。
class Rules extends Model
{
    static public function login($username, $password)
    {
        // 验证用户是否存在
        $map = array('username' => $username);
        $Rules = self::get($map);

        if (!is_null($Rules)) {
            // 验证密码是否正确
            if ($Rules->checkPassword($password)) {
                // 登录
                session('id', $Rules->getData('id'));
                session('username', $Rules->getData('username'));
                session('chname', $Rules->getData('chname'));
                return true;
            }
        }
        return false;
    }

    /**
     * 验证密码是否正确
     * @param  string $password 密码
     * @return bool
     */
    public function checkPassword($password)
    {
        if ($this->getData('password') === $password)
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 判断用户是否已登录
     * @return boolean 已登录true
     * @author  panjie <panjie@yunzhiclub.com>
     */
    static public function isLogin()
    {
        $id = session('id');
        // isset()和is_null()是一对反义词
        if (isset($id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 注销
     * @return bool  成功true，失败false。
     * @author panjie
     */
    static public function logOut()
    {
        // 销毁session中数据
        session('id', null);
        session('username', null);
        session('chname', null);
        return true;
    }

}
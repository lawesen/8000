<?php
namespace app\index\controller;
use think\controller;
class Teacher extends controller{
    public function index(){
        return $this->fetch('index',['name'=>'index']);
    }
}

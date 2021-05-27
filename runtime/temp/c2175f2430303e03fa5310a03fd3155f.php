<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"C:/xampp/htdocs/8000/application/view/index\index.html";i:1621839153;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>基础管理平台</title>
    <link rel="stylesheet" type="text/css" href="/static/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>

<body class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <hr>
            8000设备报修系统 - 待认领
        <hr />
        <div class="row">
            <div class="col-md-8">
                <form class="form-inline">
                    <div class="form-group">
                        <label class="sr-only" for="username">用户名</label>
                        <input name="username" type="text" class="form-control" placeholder="用户名..." value="<?php echo input('get.username'); ?>">
                    </div>
                    <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>&nbsp;查询</button>
                </form>
            </div>
            <div class="col-md-4 text-left">
                <a href="<?php echo url('Index/add'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;新增单据</a>
<!--                <a href="<?php echo url('Index/select'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;select</a>-->
            </div>
        </div>
        <hr />
        <table class="table table-hover table-bordered">
            <tr>
                <!--<td>
                    <a href="<?php echo url('Index/send_email'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-send"> </i>&nbsp;测试邮件</a>
                </td>-->
                <td colspan="12">
                    <p style="margin-bottom: 10px"><i class="glyphicon glyphicon-user"></i> 当前用户：<?php echo \think\Session::get('username'); ?> ( <?php echo \think\Session::get('chname'); ?> )</p>
                </td>
<!--                <td>-->
<!--                    <a href="<?php echo url('Index/imports'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>&nbsp;导入</a>-->
<!--                </td>-->
<!--                <td>-->
<!--                    <a href="<?php echo url('Index/exp'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>&nbsp;导出</a>-->
<!--                </td>-->
                <td>
                    <a href="<?php echo url('Login/logOut'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-log-out"></i>&nbsp;注销登陆</a>
                </td>
            </tr>
            <tr class="info" >
                <th>ID</th>
                <th>报修单号</th>
                <th>用户名</th>
                <th>座位号</th>
                <th>提单时间</th>
                <th>设备型号</th>
                <th>固资编号</th>
                <th>报修编号SN</th>
                <th>故障描述</th>
                <th>更换配件</th>
                <th>状态</th>
                <th>预计完成时间</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($contans) || $contans instanceof \think\Collection || $contans instanceof \think\Paginator): $key = 0; $__LIST__ = $contans;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $vo->getData('bxhao'); ?></td>
                <td><?php echo $vo->getData('username'); ?></td>
                <td><?php echo $vo->getData('diqu'); ?>-<?php echo $vo->getData('dasha'); ?>-<?php echo $vo->getData('zwh'); ?></td>
                <td><?php echo date("Y-m-d",$vo->getData('create_time')); ?></td>
                <!--<td><?php echo $vo->getData('pingpai'); ?></td>-->
                <td><?php echo $vo->getData('sbxh'); ?></td>
                <td><?php echo $vo->getData('gzbh'); ?></td>
                <td><?php echo $vo->getData('bxsn'); ?></td>
                <td><?php echo $vo->getData('miaoshu'); ?></td>
                <td><?php echo $vo->getData('ghpj'); ?></td>
                <td><?php if($vo->getData("dqzt") == '0'): ?>未完成<?php else: ?>已完成<?php endif; ?></td>
                <td><?php echo $vo->getData('yjwcsj'); ?></td>
                <td>
                    </i><a href="<?php echo url('Index/edit?id=' . $vo->getData('id')); ?>" class="btn btn-sm btn-primary" target="_blank"><i class="glyphicon glyphicon-pencil"></i>&nbsp;编辑</a>
                    <a href="<?php echo url('Index/xiangqing?id=' . $vo->getData('id')); ?>" class="btn btn-sm btn-primary" target="_blank"><i class="glyphicon glyphicon-search"></i>&nbsp; 查看详情</a>
                    <a href="<?php echo url('Index/del?id=' . $vo->getData('id')); ?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i>&nbsp;删除</a>
                <!--<a href="/index/index/index/del?id=<?php echo $vo->getData('id'); ?>.html">删除</a>-->
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <tr>
                <td colspan="13" style="text-align: center"><?php echo $contans->render(); ?></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>

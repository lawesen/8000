<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"C:/xampp/htdocs/8000/application/view/index\xiangqing.html";i:1620645115;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>基础管理平台</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body class="container">
<div class="row">
    <div class="col-md-12">
        <br>
        <br>
        <table class="table table-hover table-bordered">
            <tr>
                <td colspan="2" class="info"><label>单据详情</label></td>
            </tr>
            <tr>
                <td class="info"><label>ID:</label></td>
                <td>
                    <?php echo $contans->getData('id'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>报修单号:</label></td>
                <td>
                    <?php echo $contans->getData('bxhao'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>用户名:</label></td>
                <td>
                    <?php echo $contans->getData('username'); ?>
                </td>
            </tr>


            <tr>
                <td class="info"><label>座位号:</label></td>
                <td>
                    <?php echo $contans->getData('zwh'); ?>
            </tr>
            <tr>
                <td class="info"><label>品牌:</label></td>
                <td>
                    <?php echo $contans->getData('pingpai'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>设备型号:</label></td>
                <td>
                    <?php echo $contans->getData('sbxh'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>固资编号:</label></td>
                <td>
                    <?php echo $contans->getData('gzbh'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>供应商机器<br>报修编号SN:</label></td>
                <td>
                    <?php echo $contans->getData('bxsn'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>故障描述:</label></td>
                <td>
                    <?php echo $contans->getData('miaoshu'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>更换配件:</label></td>
                <td>
                    <?php echo $contans->getData('ghpj'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>预计完成时间:</label></td>
                <td>
                    <?php echo $contans->getData('yjwcsj'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>创建时间:</label></td>
                <td>
                    <?php echo date('Y-m-d H:m:s',$contans->getData('create_time')); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>更新时间:</label></td>
                <td>
                    <?php echo date('Y-m-d H:m:s',$contans->getData('update_time')); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>当前状态:</label></td>
                <td>
                    <?php if($contans->getData("dqzt") == '0'): ?>未完成<?php else: ?>已完成<?php endif; ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>关联BZ单号:</label></td>
                <td>
                    <?php echo $contans->getData('glbz'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>单据责任人:</label></td>
                <td>
                    <?php echo $contans->getData('gjr'); ?> - 联系方式：<?php echo $contans->getData('gjr_mobphone'); ?>
                </td>
            </tr>
            <tr>
                <td class="info"><label>操作记录:</label></td>
                <td>
                    <?php echo $contans->getData('jl'); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <a href="<?php echo url('Index/index'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i>&nbsp;返回主页</a>
                </td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>
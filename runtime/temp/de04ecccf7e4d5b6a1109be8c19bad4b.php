<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"C:/xampp/htdocs/8000/application/view/index\edit.html";i:1620638787;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>基础管理平台</title>
    <link rel="stylesheet" type="text/css" href="/static/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>

<body class="container">
<div class="row">
    <div class="col-md-12">
        <br>
        <br>
        <form action="<?php echo url('update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $vo->getData('id'); ?>" />
            <input type="hidden" name="update_time" value="<?php echo time(); ?>"/>
            <table class="table table-hover table-bordered">
                <tr>
                    <td colspan="2" class="info"><label>单据编辑</label></td>
                </tr>
                <tr>
                    <td class="info"><label>报修单号:</label></td>
                    <td>
                        <?php echo $vo->getData('bxhao'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>用户名:</label></td>
                    <td>
                        <?php echo $vo->getData('username'); ?>
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>座位号:</label></td>
                    <td>
                        <input type="text" name="zwh" value="<?php echo $vo->getData('zwh'); ?>">
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>设备型号:</label></td>
                    <td><input type="text" name="sbxh" value="<?php echo $vo->getData('sbxh'); ?>"/></td>
                </tr>
                <tr>
                    <td class="info"><label>固资编号:</label></td>
                    <td><input type="text" name="gzbh" value="<?php echo $vo->getData('gzbh'); ?>"/></td>
                </tr>
                <tr>
                    <td class="info"><label>供应商机器<br>报修编号SN:</label></td>
                    <td><?php echo $vo->getData('bxsn'); ?></td>
                </tr>
                <tr>
                    <td class="info"><label>故障描述:</label></td>
                    <td><textarea name="miaoshu" class="common-textarea" style="width: 100%;" rows="10"><?php echo $vo->getData('miaoshu'); ?></textarea></td>
                </tr>
                <tr>
                    <td class="info"><label>更换配件:</label></td>
                    <td><input type="text" name="ghpj" value="<?php echo $vo->getData('ghpj'); ?>"/></td>
                </tr>
                <tr>
                    <td class="info"><label>预计完成时间:</label></td>
                    <td>
                        <input type="date" name="yjwcsj" value="<?php echo $vo->getData('yjwcsj'); ?>">
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>当前状态:</label></td>
                    <td>
                        <select name="dqzt">
                            <option value="">当前：<?php if($vo->getData("dqzt") == '0'): ?>未完成<?php else: ?>已完成<?php endif; ?></option>
                            <option value="1">更改为：已完成</option>
                            <option value="0">更改为：未完成</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>关联BZ单号:</label></td>
                    <td><input type="text" name="glbz" value="<?php echo $vo->getData('glbz'); ?>"/></td>
                </tr>
                <tr>
                    <td class="info"><label>8000处理人:</label></td>
                    <td><?php echo $vo->getData('gjr'); ?>
                        <b> &nbsp;- &nbsp;</b>
                        联系电话：<?php echo $vo->getData('gjr_mobphone'); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i>&nbsp;保存
                        </button>&nbsp;
                        <a href="<?php echo url('Index/index'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i>&nbsp;返回主页</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
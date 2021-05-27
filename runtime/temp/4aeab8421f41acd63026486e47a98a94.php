<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"C:/xampp/htdocs/8000/application/view/index\add.html";i:1621843839;}*/ ?>
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
        <form action="<?php echo url('insert'); ?>" method="post">
            <input type="hidden" name="create_time" value="<?php echo time(); ?>">
            <table class="table table-hover table-bordered">
                <tr>
                    <td colspan="2" class="info"><label>新增单据</label></td>
                </tr>
                <tr>
                    <td class="info"><label>用户ID:</label></td>
                    <td>
                        <input type="text" name="username" placeholder="格式：luxiaoming(鲁小明)">
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>座位号:</label></td>
                    <td>
                        <select name="diqu">
                            <option value="">请选择地区</option>
                            <option value="深圳">深圳</option>
                            <option value="广州">广州</option>
                            <option value="北京">北京</option>
                        </select> -
                        <select name="dasha">
                            <option value="">请选择大厦</option>
                            <option value="滨海大厦">滨海大厦</option>
                            <option value="腾讯大厦">腾讯大厦</option>
                            <option value="大族">大族</option>
                        </select> -
                        <input type="text" name="zwh" placeholder="座位号">
                </tr>
                <tr>
                    <td class="info"><label>品牌:</label></td>
                    <td>
                        <select name="pingpai">
                            <option value="">--请选择--</option>
                            <option value="Apple">Apple</option>
                            <option value="联想">联想</option>
                            <option value="戴尔">戴尔</option>
                            <option value="惠普">惠普</option>
                            <option value="三星">三星</option>
                            <option value="华为">华为</option>
                            <option value="小米">小米</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>设备型号:</label></td>
                    <td><input type="text" name="sbxh" placeholder="例如：Carbon X1"/></td>
                </tr>
                <tr>
                    <td class="info"><label>固资编号:</label></td>
                    <td><input type="text" name="gzbh" placeholder="例如：TKPC180506N1"/></td>
                </tr>
                <tr>
                    <td class="info"><label>供应商机器<br/>报修编号SN:</label></td>
                    <td><input type="text" name="bxsn" placeholder="例如：R90TxPF2"/></td>
                </tr>
                <tr>
                    <td class="info"><label>故障现象:</label></td>
                    <td><textarea name="miaoshu" class="common-textarea" style="width: 100%;" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td class="info"><label>故障配件:</label></td>
                    <td><input type="text" name="ghpj"/></td>
                </tr>
                <tr>
                    <td class="info"><label>关联BZ单号:</label></td>
                    <td><input type="text" name="glbz"/></td>
                </tr>
                <tr>
                    <td class="info"><label>预计完成时间:</label></td>
                    <td><input type="date" name="yjwcsj">
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>当前状态:</label></td>
                    <td>
                        <select name="dqzt">
                            <option value="">--请选择--</option>
                            <option value="1">已完成</option>
                            <option value="0">未完成</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="info"><label>8000处理人:</label></td>
                    <!--<input type="hidden" name="gjr" value="<?php echo \think\Session::get('username'); ?>(<?php echo \think\Session::get('chname'); ?>)"/>-->
                    <td><input type="text" name="gjr" value="<?php echo \think\Session::get('username'); ?>"/><b> &nbsp;- &nbsp;</b>联系电话：<input type="text" name="gjr_mobphone" placeholder="联系电话"></td>
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
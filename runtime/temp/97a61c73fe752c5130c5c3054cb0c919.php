<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"C:/xampp/htdocs/8000/application/view/index\imports.html";i:1620889586;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>基础管理平台</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
</head>

<body class="container">
<table class="table table-hover table-bordered">
    <form action="<?php echo url('Index/importsa'); ?>" method="post" class="form form-horizontal" enctype="multipart/form-data">
    <tr>
        <td width="500px">
            <label>导入数据：</label>
        </td>
        <td>
            <input type="file" name="excel" />
        </td>

    </tr>
    <tr>
        <td colspan="2">
            <input class="btn btn-primary radius"  type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
        </td>
    </tr>
    </form>
</table>
</div>
</body>
</html>
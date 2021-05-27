<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"C:/xampp/htdocs/8000/application/view/login\index.html";i:1619573137;}*/ ?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>系统后台登录</title>

    <link rel="stylesheet" href="/static/bootstrap-3.3.7-dist/css/style.css" rel="stylesheet" />

</head>
<body>

<div class="form-structor">
    <div class="signup">
        <h2 class="form-title" id="signup">系统后台登录</h2>
        <form name="form" id="login-form" class="form-vertical" method="POST" action="<?php echo url('Login/login'); ?>">
            <div class="form-holder">
                <input type="text" name="username" class="input" placeholder="用户名" />
                <input type="password" name="password" class="input" placeholder="密码" />

            </div>
                <button type="submit" class="submit-btn">登录</button>
<!--            -->
        </form>
    </div>
    <div class="login slide-up"></div>
</div>
</body>
</html>
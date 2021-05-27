<?php

namespace app\index\controller;
// 该文件的位于application\index\controller文件夹
use app\common\model\Contan;
use app\common\model\Rules;
use think\Db;
use phpmailer\PHPMailer;
use think\Controller;
use think\helper\Str;
use think\Request;
use PhpOffice\PhpSpreadsheet;
use think\api\Client;

class Index extends Controller
{
    public function exp(){
        echo '导出';
    }

    public function imports(){
        return $this->fetch();
    }

    public function importsa(){
        // '导入'
        //import('phpexcel.PHPExcel', EXTEND_PATH);//方法二
        vendor("PHPExcel.PHPExcel"); //方法一
        $objPHPExcel = new \PHPExcel();

        //获取表单上传文件
        $file = request()->file('excel');
        $info = $file->validate(['ext'=>'xlsx,xls,csv'])->move(ROOT_PATH . 'public' . DS . 'excel');
        if($info){
            $exclePath = $info->getSaveName();  //获取文件名
            $file_types = explode(".", $exclePath);
            $file_type = $file_types [count($file_types) - 1];//xls后缀
            $file_name = ROOT_PATH . 'public' . DS . 'excel' . DS . $exclePath;   //上传文件的地址
            if($file_type == 'xls'){
                $objReader =\PHPExcel_IOFactory::createReader('Excel5');
            }else{
                $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
            }
            $obj_PHPExcel =$objReader->load($file_name, $encode = 'utf-8');  //加载文件内容,编码utf-8
            echo "<pre>";
            $excel_array=$obj_PHPExcel->getsheet(0)->toArray();   //转换为数组格式
            array_shift($excel_array);  //删除第一个数组(标题);
            $data = [];
            $i=0;
            foreach($excel_array as $k=>$v) {
                $data[$k]['bxhao'] = $v[0];
                $data[$k]['username'] = $v[1];
                $data[$k]['diqu'] = $v[2];
                $data[$k]['dasha'] = $v[3];
                $data[$k]['zwh'] = $v[4];
                $data[$k]['pingpai'] = $v[5];
                $data[$k]['sbxh'] = $v[6];
                $data[$k]['gzbh'] = $v[7];
                $data[$k]['bxsn'] = $v[8];
                $data[$k]['create_time'] = time();
                $i++;
            }
            $success=db('contan')->insertAll($data); //批量插入数据  这里的数据表改为你需要的。
            $error=$i-$success;
            $this->success("导入成功.'$success.'条记录，失败.'$error.'条记录",url('Index/index'));
        }else{
            // 上传失败获取错误信息
            $this->error($file->getError());
        }
    }

    //发送邮箱验证码
    public function email($titles, $connet_nr,$tousermail,$createUser)
    {
        //$toemail = '981991663@qq.com';//定义收件人的邮箱
        $toemail = 'v_wslai@tencent.com';//定义收件人的邮箱
        //$toemail2 = 'v_wslai@tencent.com';//定义收件人的邮箱
        $mail = new PHPMailer();
        $mail->isSMTP();// 使用SMTP服务
        $mail->CharSet = "utf8";// 编码格式为utf8，不设置编码的话，中文会出现乱码
        $mail->Host = "smtp.163.com";// 发送方的SMTP服务器地址
        $mail->SMTPAuth = true;// 是否使用身份验证
        $mail->Username = "lawesen@163.com";//发送方的qq邮箱用户名，就是你申请qq的SMTP服务使用的qq邮箱
        $mail->Password = "HPJSBAICSOOTXEOP";//发送方的邮箱密码，注意用qq邮箱这里填写的是“客户端授权密码”而不是邮箱的登录密码
        $mail->SMTPSecure = "ssl";//使用ssl协议方式
        $mail->Port = 465;// qq邮箱的ssl协议方式端口号是465/587
        $mail->setFrom("lawesen@163.com", "8000helper8");// 设置发件人信息，如邮件格式说明中的发件人，这里会显示为Mailer(xxxx@qq.com），Mailer是当做名字显示
        $mail->addAddress($toemail);// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@qq.com)
        //$mail->addAddress($toemail2);// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@qq.com)
        $mail->addAddress($tousermail);// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@qq.com)
        $mail->addAddress($createUser);// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@qq.com)
        //$mail->addAddress($toemail,'Zhang');// 设置收件人信息，如邮件格式说明中的收件人，这里会显示为Liang(yyyy@qq.com)
        $mail->addReplyTo("v_wslai@tencent.com", "8000helper8");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
        //$mail->addCC("xxx@qq.com");// 设置邮件抄送人，可以只写地址，上述的设置也可以只写地址(这个人也能收到邮件)
        //$mail->addBCC("xxx@qq.com");// 设置秘密抄送人(这个人也能收到邮件)
        //$mail->addAttachment("bug0.jpg");// 添加附件
        $mail->Subject = $titles;// 邮件标题
        $mail->Body = $connet_nr;// 邮件正文
        //$mail->AltBody = "This is the plain text纯文本";// 这个是设置纯文本方式显示的正文内容，如果不支持Html方式，就会用到这个，基本无用

        if (!$mail->send()) {// 发送邮件
            //echo "Message could not be sent.";
            $this->error('报修单据创建失败，倒计时3秒后返回', 'Index/index');
        } else {
            $this->success('报修单据创建成功，倒计时3秒后返回', url('Index/index'));
        }
    }

    public function send_email()
    {
        $results = 'HI，v_wslai(赖伟胜)，您的硬件于2021-03-29 14:03:53已提交报修。 
        品牌：联想
        型号：Carbon X1
        固资编号：TKPC180504N
        报修编号SN：R90TxPF2
        故障描述：笔记本经常死机
        更换配件：屏幕、D壳
        当前状态:未完成
        8000责任人：zblin(林志彬)
        联系方式：13990909090
        ';
        $this->email('v_wslai(赖伟胜)的硬件报修单据', $results);
    }

    public function index()
    {
        // 验证用户是否登录
        if (!Rules::isLogin()) {
            return $this->error('请登录！', url('Login/index'));
        }
        // 获取查询信息
        $id = input('get.id');
        $username = input('get.username');
        $chname = input('get.chname');

        try {
            // 获取查询信息
            $username = Request::instance()->get('username');
            # echo $username;

            $pageSize = 5; // 每页显示5条数据

            $Contan = new Contan();

            // 定制查询信息
            if (!empty($username)) {
                $Contan->where('username', 'like', '%' . $username . '%');
            }

            // 按条件查询数据并调用分页
            $contan = $Contan->paginate($pageSize, false, [
                'query' => [
                    'username' => $username,
                ],
            ]);

            // 向V层传数据
            $this->assign('contans', $contan);

            // 取回打包后的数据
            $htmls = $this->fetch();

            // 将数据返回给用户
            return $htmls;

            // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

            // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function select()
    {
        // 验证用户是否登录
        if (!Rules::isLogin()) {
            return $this->error('请登录！', url('Login/index'));
        }
        // 获取查询信息
        $id = input('get.id');
        $username = input('get.username');
        $chname = input('get.chname');

        try {
            // 获取查询信息
            $username = Request::instance()->get('username');
            # echo $username;

            $pageSize = 10; // 每页显示5条数据

            $Contan = new Contan();

            // 定制查询信息
            if (!empty($username)) {
                $Contan->where('username', 'like', '%' . $username . '%');
            }

            // 按条件查询数据并调用分页
            $contan = $Contan->paginate($pageSize, false, [
                'query' => [
                    'username' => $username,
                ],
            ]);

            // 向V层传数据
            $this->assign('contans', $contan);

            // 取回打包后的数据
            $htmls = $this->fetch();

            // 将数据返回给用户
            return $htmls;

            // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

            // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function add()
    {
        return $this->fetch();
    }

    public function insert()
    {
        $postData = Request::instance()->post();
        $Contan = new Contan();
        $Contan->bxhao = 'BX' . $postData['create_time'];
        $Contan->username = $postData['username'];
        $Contan->diqu = $postData['diqu'];
        $Contan->dasha = $postData['dasha'];
        $Contan->zwh = $postData['zwh'];
        $Contan->pingpai = $postData['pingpai'];
        $Contan->sbxh = $postData['sbxh'];
        $Contan->gzbh = $postData['gzbh'];
        $Contan->bxsn = $postData['bxsn'];
        $Contan->miaoshu = $postData['miaoshu'];
        $Contan->ghpj = $postData['ghpj'];
        $Contan->glbz = $postData['glbz'];
        $Contan->yjwcsj = $postData['yjwcsj'];
        $Contan->dqzt = $postData['dqzt'];
        $Contan->gjr = $postData['gjr'];
        $Contan->gjr_mobphone = $postData['gjr_mobphone'];
        $Contan->create_time = $postData['create_time'];

        $Contan->jl = '新增记录<br>' . '新增时间：' . $postData['create_time'] . '<br>' . '用户名：' . $postData['username'] .
            '<br>' . '设备型号：' . $postData['sbxh'] . '<br>' . '固资编号：' . $postData['gzbh'] . '<br>' . '报障描述：' . $postData['miaoshu'] .
            '<br>' . '更换配件：' . $postData['ghpj'] . '<br>' . '关联BZ：' . $postData['glbz'] . '<br>';
        $result = $Contan->validate()->save($Contan->getData());

        $results = '用户' . $postData['username'] . '电脑报修厂商售后详情:
        ' . '大厦：'. $postData['diqu'] . $postData['dasha'].'。
        ' .'座位号：' . $postData['zwh'] .'
        ' .'品牌：' . $postData['pingpai'] .'
        设备型号：' . $postData['sbxh'] .'
        固资编号：' . $postData['gzbh'] .'
        机器编号SN：' . $postData['bxsn'] .'
        报障描述：' . $postData['miaoshu'] .'
        更换配件：' . $postData['ghpj'] .'
        预计完成时间：' . $postData['yjwcsj'] .'
        关联BZ：' . $postData['glbz'].'
        8000跟进人：' . $postData['gjr'].'
        联系方式：' . $postData['gjr_mobphone'];
        $tousermails =$postData['username'];
        $arr = preg_split('/\(.*?\)/',$tousermails);
        //echo dump($arr);
        $tousermail = $arr[0].'@tencent.com';
        $createUser = $postData['gjr'].'@tencent.com';
//        echo dump($postData['gjr'].'@tencent.com');
        if (false === $result) {
            $this->error('新增失败！' . $Contan->getError());
            //return '新增失败:' . $Teacher->getError();
        } else {
            //$this->success('报修单据创建成功，倒计时3秒后返回',url('Index/index'));
            $this->email('送修邮件说明', $results,$tousermail,$createUser);
        }

    }

    public function xiangqing()
    {
        // 获取传入ID
        $id = Request::instance()->param('id/d');
        // 在Teacher表模型中获取当前记录
        $Contan = Contan::get($id);
        if ($Contan != null) {
            // 将数据传给V层
            $this->assign('contans', $Contan);

            // 获取封装好的V层内容
            $htmls = $this->fetch();
            // 将封装好的V层内容返回给用户
            return $htmls;
        } else {
            $this->error('ID不存在，正在返回主页', 'Index/index');
        }
    }

    public function del()
    {
        // 获取pathinfo传入的ID值.
        $id = Request::instance()->param('id/d'); // “/d”表示将数值转化为“整形”
        if (is_null($id) || 0 === $id) {
            return $this->error('未获取到ID信息,正在返回主页···');
        }
        // 获取要删除的对象
        $Contan = Contan::get($id);
        // 要删除的对象不存在
        if (is_null($Contan)) {
            return $this->error('不存在id为' . $id . '的硬件报修单，删除失败');
        }
        // 删除对象
        if (!$Contan->delete()) {
            return $this->error('删除失败:' . $Contan->getError());
        }
        // 进行跳转
        return $this->success('删除成功，正在返回', url('Index/index'));

    }

    public function edit()
    {
        // 获取传入ID
        $id = Request::instance()->param('id/d');

        // 在Teacher表模型中获取当前记录
        $Contan = Contan::get($id);
        if ($Contan != null) {
            // 将数据传给V层
            $this->assign('vo', $Contan);

            // 获取封装好的V层内容
            $htmls = $this->fetch();

            // 将封装好的V层内容返回给用户
            return $htmls;
        } else {
            $this->error('ID不存在，正在返回');
        }
    }

    public function update()
    {
        // 接收数据，获取要更新的关键字信息
        $id = Request::instance()->post('id/d');
        // 获取当前对象
        $Contan = Contan::get($id);
        if (!is_null($Contan)) {
            // 写入要更新的数据
            #$Teacher->bxhao = Request::instance()->post('bxhao');
            $Contan->update_time = Request::instance()->post('update_time');
            $Contan->zwh = Request::instance()->post('zwh');
            $Contan->sbxh = Request::instance()->post('sbxh');
            $Contan->gzbh = Request::instance()->post('gzbh');
            $Contan->miaoshu = Request::instance()->post('miaoshu');
            $Contan->ghpj = Request::instance()->post('ghpj');
            $Contan->yjwcsj = Request::instance()->post('yjwcsj');
            $Contan->dqzt = Request::instance()->post('dqzt');
            $Contan->glbz = Request::instance()->post('glbz');
            //$Contan->gjr = Request::instance()->post('gjr');
            // 更新
            if (false === $Contan->validate()->save()) {
                # $message =  '更新失败' . $Teacher->getError();
                $this->error('更新失败,' . $Contan->getError());
            } else {
                $this->success('更新成功，正在返回', url('Index/index'));
            }
        } else {
            # throw new \Exception("所更新的记录不存在", 1);   // 调用PHP内置类时，需要在前面加上 \
            $this->error('所更新的记录不存在,正在返回');
        }
    }

    public function select_option()
    {
        $Contan = new Contan();
        $contan = $Contan->select();
        $this->assign('pinpais', $contan);
    }

    public function test()
    {
        $Index = new Contan();
        $teachers = $Index->select();
        // 向V层传数据
        $this->assign('teachers', $teachers);
        // 取回打包后的数据
        $htmls = $this->fetch();
        // 将数据返回给用户
        return $htmls;
    }
    public function demos(){
        return 'demos';

    }
}
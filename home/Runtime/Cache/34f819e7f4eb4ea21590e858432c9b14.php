<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link href="/abcTest/public/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">


<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/indexFrame.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/invalid.css" type="text/css" media="screen" />

	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/abcTest/public/static/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="/abcTest/public/static/bootstrap/js/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="/abcTest/public/static/bootstrap/js/facebox.js"></script>
<script type="text/javascript" src="/abcTest/public/static/bootstrap/js/jquery.wysiwyg.js"></script>




</head>

<body>
        <div id="main-content">
          
                <div class="content-box">
                
                  
                  
                  <div class="content-box-content">
<table id="table" >
        <thead>
          <tr>
            <th>会员名</th>
            <th>性别</th>
            <th>家庭住址</th>	 
            <th>健康情况</th>
            <th>身份证号</th>
            <th>联系方式</th>
            <th>注册时间</th>				
            <th>备注</th>
          </tr>
        </thead>
          
        <!-- 表内容部分 -->
        <tbody>
          <?php if(is_array($studentInfo)): $i = 0; $__LIST__ = $studentInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo['memName']); ?></td>
            <td><?php echo ($vo['memSex']); ?></td>
            <td><?php echo ($vo['memAddr']); ?> </td>
            <td><?php echo ($vo['memHealth']); ?> </td>
            <td><?php echo ($vo['memIdCard']); ?></td>
            <td><?php echo ($vo['memTel']); ?></td>
            <td><?php echo ($vo['memRegisteDate']); ?> </td>	
            <td><?php echo ($vo['memRemarks']); ?> </td>				
           
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>                        
        </tbody>
        
          <!-- 表尾 -->
        <tfoot>
          <tr>
           
          </tr>
        </tfoot>
      </table>
      </div>
      </div>
      </div>
    </body>
   
    </html>
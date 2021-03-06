<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <title>健身管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    <link href="/abcTest/public/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/indexFrame.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/invalid.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/user.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/checkbox3.min.css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/select2.min.css">
    <!-- CSS App -->
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/style1.css">
    <link rel="stylesheet" type="text/css" href="/abcTest/public/static/bootstrap/css/flat-blue.css">

</head>

<body class="flat-blue">
    <div id="startTime" style="display: none"><?php echo ($startTime); ?></div>
    <div id="endTime" style="display: none"><?php echo ($endTime); ?></div>
	<div id="remarks" style="display: none"><?php echo ($remarks); ?></div>
	<div id="cardDiscount" style="display: none"><?php echo ($cardDiscount); ?></div>
	
    <div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                      
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li class="active">欢迎登陆</li>
                        </ol>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                      
                        
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo ($name); ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="profile-img">
                                    <img src="/abcTest/public/Images/icons/human.png" class="profile-img">
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username"><?php echo ($name); ?></h4>
                                        <p><?php echo ($tel); ?></p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#passwordModal">修改密码</button>
                                            <button type="button" class="btn btn-default" onclick="logout()">退出</button>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
           
            
            <!-- Main Content -->
            <div id="main-content">
            <div class="container-fluid">
                <div class="side-body padding-top">
                    <div class="row">
                       
                            <a href="#" onclick="courseAction()">
                                <div class="course">
                                    <div class="card-body">
                                        我的课程
                                        
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                       
                       
                            <a href="#" onclick="consumeAction()" id="consumeLink">
                                <div class="consume">
                                    <div class="card-body">
                                        消费
                                        
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                        
                        
                            <a href="#" onclick="leave()">
                                <div class="leave">
                                    <div class="card-body">
                                        
                                        请假
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                       
                        
                            <a href="#" onclick="detail()">
                                <div class="consumeDetail">
                                    <div class="card-body">
                                        
                                        消费明细

                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                            </a>
                       
                    </div>
                    
                </div>
                <div class="content-box userTable">
          
      
                       
                          
                            <!-- 表头 -->
                            <table id="table">
                              <thead>
                                <tr>
                                  <th>课程号</th>
                                  <th>课程名</th>
                                  <th>上课时间</th>	 
                                  <th>上课地点</th>
                                  <th>教练</th>
                                  <th>课程售价</th>
                                  
                                </tr>
                              </thead>
                                
                              <!-- 表内容部分 -->
                              <tbody>
                                <?php if(is_array($courseList)): $i = 0; $__LIST__ = $courseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                  
                                        <td><?php echo ($vo['courseID']); ?></td>
                                        <td><?php echo ($vo['courseName']); ?></td>
                                        
                                        <td><?php echo ($vo['courseTime']); ?> </td>
                                        <td><?php echo ($vo['courseArea']); ?></td>
                                        <td><?php echo ($vo['courseTeacher']); ?></td>
                                        <td><?php echo ($vo['coursePrice']); ?> </td>	
                                        <td style="display: none" id="cardId"><?php echo ($vo['cardID']); ?></td>
                               
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>                        
                              </tbody>
                              
                                <!-- 表尾 -->
                              <tfoot>
                                <tr>
                                  <td colspan="6">
                                      
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                          
                  </div>
                </div>

                
            </div>
        </div>
        
        <!--选择课程模态框-->
        <div id="main-content">
        <div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content cModel">
                        <div class="modal-header">
                            
                            <h4 class="modal-title" id="myModalLabel">
                                选择课程
                            </h4>
                        </div>
                        <div class="modal-body" id="introModalBody">
                                <div class="content-box-content">
        
                                        <!-- 表头 -->
                                        <table id="courseTable" >
                                          <thead>
                                            <tr>
                                              <th>课程号</th>
                                              <th>课程名</th>
                                              <th>上课时间</th>
                                              <th>上课地点</th>
                                              <th>教练</th>
                                              <th>课程原价</th>
                                              <th>选项</th>
                                              
                                            </tr>
                                          </thead>
                                            
                                          <!-- 表内容部分 -->
                                          <tbody>
                                            <?php if(is_array($chooseList)): $i = 0; $__LIST__ = $chooseList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                              <td><?php echo ($vo['courseID']); ?></td>
                                              <td><?php echo ($vo['courseName']); ?></td>
                                              <td><?php echo ($vo['courseTime']); ?> </td>
                                              <td><?php echo ($vo['courseArea']); ?></td>
                                              <td><?php echo ($vo['courseTeacher']); ?></td>
                                              <td><?php echo ($vo['coursePrice']); ?> </td> 			
                                              <td><a onclick="chooseCourse(this)" id="edit" style="cursor: pointer">选择</a></td>
                    
                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>                        
                                          </tbody>

                                        </table>
                                      </div>
                        </div>
            
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>

            
   <!--修改密码模态框-->
      
   <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content cModel">
                <div class="modal-header">
                    
                    <h4 class="modal-title" id="myModalLabel">
                        修改密码
                    </h4>
                </div>
                <div class="modal-body" id="introModalBody">
                        <form class="form-horizontal" method="post" name="memberForm">
      
                                <div class="form-group">
                                  <label for="inputText" class="col-sm-2 control-label">新密码</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="password" placeholder="新密码">
                                  </div>					
                                </div>
                                
                                <div class="form-group">
                                  <label for="inputText" class="col-sm-2 control-label">确认密码</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="confirmPassword" placeholder="确认密码">
                                  </div>					
                                </div>
                    </form>
                </div>
    
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="button" class="btn btn-primary" onclick="changePassword()">
                            修改
                        </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
            
<!--修改密码模态框-->

        </div>
        <!--选择课程模态框-->
        <script src="/abcTest/public/static/bootstrap/js/echarts-all-3.js" charset="utf-8" type="text/javascript"></script>
    
        <div id="detailBox"></div>
        <div id="consumeInfo">
                <ul class="list-group transferUl" id="memUl">
                        <li class="list-group-item" id="cName">课程名</li>
                        <li class="list-group-item" ID="cPrice">价格</li>
                        <li class="list-group-item" id="cDate">消费日期</li>
                        
                      </ul>
        </div>
        <footer class="app-footer">
            
        </footer>
       <script language="javascript">
           function logout(){
               window.location.href='/abcTest/index.php/Login/index';
              
           }
           function changePassword(){
               var newPass=$('input[name="password"]').val();
               var confirmPass=$('input[name="confirmPassword"]').val();
               if(newPass!=confirmPass){
                    alert("两次输入密码不一致，请重新输入");
                    //$('input[name="password"]').val("");
               }
               else{
                $.ajax({
                   url:"/abcTest/index.php/UserIndex/changePass",
                   type:"post",
                   data:{"newPass":newPass},
                   success:function(msg){
                        alert(msg);
                        $('#passwordModal').modal('hide');
                   },
                   error:function(msg){
                        alert(msg);
                   }
               });
               }
              
           }
            function detail(){
        var chart = echarts.init(document.getElementById("detailBox"));
        $("#table").css('display','none'); 
        $('#detailBox').css('display','block');
        $('#consumeInfo').css('display','none');
              //  alert("加载js成功");
        var data1=[];
        var data2=[];
        var array=[];
           //alert(id);
        $.ajax({
            url:"/abcTest/index.php/UserIndex/show",
            type:"post",
            data:{},
 
            success:function(data){
  
                var text=eval("("+data+")");
                for(var i=0;i<text.length;i++){

                   data1.push(text[i]['TIME']);data2.push(text[i]['SUM( price )']);                          
                }

                 var option = {

                color : [ '#3398DB' ],

                title : {

                    text : '个人消费情况统计', //主标题文本，支持使用 \n 换行。

                    link : '', //主标题文本超链接

                    textStyle : { //该属性用来定义主题文字的颜色、形状等

                        color : '#3398DB',

                    }

                },

                tooltip : {

                    trigger : 'axis',

                    axisPointer : { // 坐标轴指示器，坐标轴触发有效

                        type : 'shadow' // 默认为直线，可选为：'line' | 'shadow'

                    }

                },

                grid : {

                    left : '6%',

                    right : '20%',

                    bottom : '20%',

                    containLabel : true

                },

                xAxis : [ { //x轴列表展示

                    type : 'category',

                    data : data1,

                } ],

                yAxis : [ { //定义y轴刻度

                    type : 'value',

                    scale : true,

                    name : '消费金额',

                    max : 2000,

                    min : 0,
                   
                } ],

                series : [ {

                    name : '消费',

                    type : 'bar', //bar 柱状图     line 折线图 等

                    barWidth : '30%', //柱的宽度

                    data : data2

                } ]

                };



                chart.setOption(option);
                
               chart.on('click', function (params) {
                    //alert(params.name);//name是横坐标，
                    
                   
                    var date=params.name;
                    

                    $.ajax({
                        url:"/abcTest/index.php/UserIndex/showDetail",
                        type:"post",
                        data:{"date":date},
                        success:function(msg){
                            var data=eval("("+msg+")");
                            /*点击柱状图以后以饼状图的形式详细展示消费情况：消费时间，课程名，课程价格*/
                           for(var i=0;i<data.length;i++){
                            //alert(data[i]['courseName']);
                            obj=data[i];
                            var ul=$('<ul class="list-group"></ul>');//memId,memName,vipCardId,memTel,memSex,memHealth,memRemarks
                       
                        ul.append('<li class="list-group-item">'+ obj['courseName'] + '</li>');
                        ul.append('<li class="list-group-item">'+ obj['price'] + '</li>');
                        ul.append('<li class="list-group-item">'+ obj['cTime'] + '</li>');
                          $('#consumeInfo').append(ul);  
                           }
                           $('#consumeInfo').css('display','block');

                        },
                        error:function(){
                            alert("error!");
                        }
                    });

                });

            },
            error:function(){
                alert("error");
            }
        });
    }
           function leave(){
          //var id=document.getElementById('memberId').innerHTML;
          var time=getTime();
          //var butt=document.getElementById("leave");
          var remark=document.getElementById("remarks");
          switch (remark.innerHTML){
            case '已转卡':
                alert("已转卡，不能请假");
                break;
            case '已请假':
                alert("已请假，不能请假");
                break;
            case '已到期':alert("已到期，不能请假");
                break;
            case '':
            $.ajax({
            url:"/abcTest/index.php/UserIndex/leave",
            type:"POST",
            data:{"time":time},
            //dataType:"json",
            success:function(msg){
              
              alert("请假成功！");
              remark.innerHTML="已请假";

             /*点击请假一天后恢复可以正常状态，服务器一直开，单位为毫秒*/
             setTimeout(returnClass,86400000);
            
            },
            error:function(){
              alert("请假失败！");
            }
          });

          }
        
        }
           function consumeAction(){
               var sTime=document.getElementById("startTime").innerHTML;
               var eTime=document.getElementById("endTime").innerHTML;
               var hour=getTime().hour;
               //alert(hour);
               if(hour>sTime && hour<eTime){
                var remark=document.getElementById('remarks');
            //alert(remark);
            switch (remark.innerHTML){
            case '已转卡':
                alert("已转卡，不能消费");
                break;
            case '已请假':
                alert("已请假，不能消费");
                break;
            case '已到期':alert("已到期，不能消费");
                break;
            case '':
                $("#consumeLink").attr("data-toggle","modal");
                $("#consumeLink").attr("data-target","#courseModal");
                            
    
           }
               }
               else{
                   alert("当前时段您还不能消费");
               }
            
           }
           function chooseCourse(obj){

        var td = event.srcElement; // 通过event.srcElement 获取激活事件的对象 td 
		var index=td.parentElement.parentElement.rowIndex;		
		
		var tab = document.getElementById("courseTable");
    var discount=document.getElementById("cardDiscount").innerHTML;
    //alert(discount);
		var row = tab.rows; //获取table的行
		var cell = row[index].cells; 
		var courseID=cell[0].innerHTML; 
    var price=cell[5].innerHTML;
    var courseName=cell[1].innerHTML;
    var realPrice=discount*price; 
        //alert(courseID);
    if (confirm('课程名:'+courseName+'\n\n折后价格:'+realPrice+'\n\n是否确认选择？')) {  
          var consumeTime=getTime().time;
       
        $.ajax({
          
            url:"/abcTest/index.php/UserIndex/chooseCourse",
            type:"POST",
            data:{"courseID":courseID,"price":realPrice,"consumeTime":consumeTime},
            success:function(msg){
              
              var text = msg.split("<")[0];
                alert (text);
                window.location.reload();
            },
            error:function(){
                alert("选课失败");
            }
        });
        }  
        
        else {  
            //alert("点击了取消");  
        }  
  
    }
           function courseAction(){
            $("#table").css('display','block'); 
            $('#detailBox').css('display','none');
            $('#consumeInfo').css('display','none');
              
           }
           function getTime(){
        var time,year,month,day,hours,minute,second;
        time=new Date();
        year=time.getFullYear();
        month = (time.getMonth()+1)<10?("0"+(time.getMonth()+1)):(time.getMonth()+1);
        date = time.getDate()<10?("0"+time.getDate()):time.getDate();
        hours = time.getHours()<10?("0"+time.getHours()):time.getHours();
        minutes = (time.getMinutes()<10?("0"+time.getMinutes()):time.getMinutes());
        seconds = (time.getSeconds()<10?("0"+time.getSeconds()):time.getSeconds());

        time = year+"-"+month+"-"+date+" "+hours+":"+minutes+":"+seconds;
        hour=hours+":"+minutes+":"+seconds;
        return {'time':time,'hour':hour};
        

    }
        </script>
            <!-- Javascript Libs -->
         <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/jquery.min.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/Chart.min.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/bootstrap-switch.min.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/jquery.matchHeight-min.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/dataTables.bootstrap.min.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/select2.full.min.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/ace.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/mode-html.js"></script>
            <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/theme-github.js"></script>
            <!-- Javascript -->
            <script type="text/javascript" src="../js/app.js"></script>
            <script type="text/javascript" src="../js/index.js"></script>
</body>

</html>
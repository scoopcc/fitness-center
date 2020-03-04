<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link href="/abcTest/public/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/indexFrame.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/invalid.css" type="text/css" media="screen" />

<script src="/abcTest/public/static/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/abcTest/public/static/bootstrap/js/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/abcTest/public/static/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="/abcTest/public/static/bootstrap/js/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="/abcTest/public/static/bootstrap/js/facebox.js"></script>
<script type="text/javascript" src="/abcTest/public/static/bootstrap/js/jquery.wysiwyg.js"></script>




</head>

<body>
        <div id="main-content">
          <div style="display: none;" id="coachRemarks"><?php echo ($coachRemarks); ?></div>
                <div class="content-box">
                
                  
                  
                  <div class="content-box-content">
<table id="table" >
        <thead>
          <tr>
            <th>课程号</th>
            <th>课程名</th>
            <th>课程内容</th>	 
            <th>上课时间</th>
            <th>上课地点</th>
            <th>教练</th>
            <th>课程价格</th>				
            <th>选项</th>
          </tr>
        </thead>
          
        <!-- 表内容部分 -->
        <tbody>
          <?php if(is_array($courseInfo)): $i = 0; $__LIST__ = $courseInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo['courseID']); ?></td>
            <td><?php echo ($vo['courseName']); ?></td>
            <td><a id="showCourseInfo"class="courseIntro" onclick="showIntro()" data-toggle="modal" data-target="#introModal"><?php echo ($vo['courseContent']); ?> </a></td>
            <td><?php echo ($vo['courseTime']); ?> </td>
            <td><?php echo ($vo['courseArea']); ?></td>
            <td><?php echo ($vo['courseTeacher']); ?></td>
            <td><?php echo ($vo['coursePrice']); ?> </td>				
            <td><button onclick="doclick(this)" id="edit">编辑</button></td>
           <td><a title="删除" onclick="coachDelCourse('<?php echo ($vo[courseID]); ?>')"><img src="/abcTest/public/Images/icons/cross.png" alt="删除" /></a></td>
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
      <!--显示信息模态框-->
<div class="modal fade" id="introModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title" id="myModalLabel">
            课程信息
          </h4>
        </div>
        <div class="modal-body" id="introModalBody">
          
        </div>
  
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">关闭
          </button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal -->
  </div>
  <!--显示信息模态框-->
    </div>
      <script language="javascript">
        function showIntro(){
		var td = event.srcElement; // 通过event.srcElement 获取激活事件的对象 td 
		var index=td.parentElement.parentElement.rowIndex;
   
		var tab = document.getElementById("table");
		var row = tab.rows; //获取table的行
		var cell = row[index].cells; 
		var cID=cell[0].innerText; //获取课程号
		//alert(cID);
		var showModal=document.getElementById("introModalBody");
		$.ajax({
                    url: "/abcTest/index.php/ManageCourse/showCourseContent",  
                    type: "POST",                    
					data: {"cid":cID},//前端数据通过ajax传到后端
					success:function(msg){
           // alert(msg);  data-toggle="modal" data-target="#introModal"
						//window.location.reload();
            //alert(msg);
					
						showModal.innerHTML=msg;
            
					},
                    error: function(){  
                        alert('加载内容失败');  
                    }
                });
}
        function coachDelCourse(obj){
         // alert("aaaaaaaaaaaaaaaaaaaaaaaaaa");
         // alert(obj);
          var remarks=document.getElementById('coachRemarks').innerHTML;
         if(remarks=='已禁用'){
          alert("您没有权限删除课程，请与管理员联系！");
          
         }
         else{
          $.ajax({
            url:"/abcTest/index.php/ManageCourse/delCourse",
            type:"post",
            data:{"id":obj},
            success:function(msg){
              if(msg=='删除成功'){
                alert(msg);
              window.location.reload();
              }
              else{
                alert(msg);
              }
              
            },
            error:function(msg){
              alert(msg);
            }
          });
        }
        }
       function doclick(obj) {
         var remarks=document.getElementById('coachRemarks').innerHTML;
         if(remarks=='已禁用'){
          alert("您没有权限修改课程信息，请与管理员联系！");
         }
         else{
          var td = event.srcElement; // 通过event.srcElement 获取激活事件的对象 td 
		var index=td.parentElement.parentElement.rowIndex;
		//alert(index);
		var tab = document.getElementById("table");
		var row = tab.rows; //获取table的行
		var cell = row[index].cells; 
		var courseID=cell[0].innerHTML; //获取课程号
		var c=index;
		
        
		for(var i=0;i<tab.rows[index].cells.length-2;i++){
			var text = tab.rows[index].cells[i].innerText;
		tab.rows[index].cells[i].innerHTML = '<input class="input" name="input'+ index + '" type="text" value="" style="width:70px;"/>';
		var input = document.getElementsByName("input" + index);	
		if(i==0 ||i==5 ){
			input[i].value=text;
			input[i].setAttribute('readonly','readonly');
		}	
    
		input[i].value = text;
		input[0].focus();
		input[0].select();
			
		}

		
		obj.innerHTML="确定";

		
		obj.onclick = function onclick(event) {
                          
                
                $.ajax({
                    url: "/abcTest/index.php/ManageCourse/editCourse",  
                    type: "POST",                    
					data: {"id":courseID,"name":input[1].value,"content":input[2].value,
					"time":input[3].value,"area":input[4].value,"teacher":input[5].value,
					"price":input[6].value},//前端数据通过ajax传到后端
					success: function(msg){
						window.location.reload();
						//alert(msg)
					},
                    error: function(msg){  
                        alert(msg);  
                    }
                });
                   
    }
         }
		
    }
      </script>
    </body>
   
    </html>
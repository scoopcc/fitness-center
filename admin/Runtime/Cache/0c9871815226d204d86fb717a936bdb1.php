<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>

<link href="/abcTest/public/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/indexFrame.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/invalid.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/abcTest/public/static/bootstrap/css/consume.css" type="text/css" media="screen"/>
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
  <div class="placeHolder"> </div>
 <div class="container">
    <div class="row">    
        <div class="col-lg-6 searchContainer">
          <div class="input-group searchInputGroup">
            <input type="text" class="form-control consumeInput" id="memberID" placeholder="请输入会员卡号或手机号"/>
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" onclick="searchMember()">搜索</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
 </div>


 <!--主题内容部分-->
 <div id="main-content">
  <div class="content-box boxContainer">
  
    
    
    <div class="content-box-content">
      
        <!-- 表头 -->
        <table id="table" >
          <thead>
            <tr>
              <th>会员号</th>
      <th>会员名</th>
              <th>会员卡号</th>
              <th>联系方式</th>	 
              <th>卡售价</th>
              <th>剩余次数</th>
              <th>备注</th>
      <th>充值时间</th>
              <th>价格</th>
     
              <th>选项</th>
            </tr>
          </thead>
            
          <!-- 表内容部分 -->
          <tbody>
            <?php if(is_array($memberList)): $i = 0; $__LIST__ = $memberList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><!--memId,memName,vipCardId,memTel,cardPrice,validTimes-->
                <td><?php echo ($vo['memId']); ?></td>
                <td><?php echo ($vo['memName']); ?></td>
                <td><?php echo ($vo['vipCardId']); ?> </td>
				        <td><?php echo ($vo['memTel']); ?> </td>
                <td><?php echo ($vo['cardPrice']); ?></td>
                <td><?php echo ($vo['validTimes']); ?></td>
                
        <td><button onclick="doclick(this)" id="edit">选课</button>
          <button onclick="pay(this)" id="edit">缴费</button>
        </td>
        
               
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>                
          </tbody>
          
            <!-- 表尾 -->
          <tfoot>
            <tr>
              <td colspan="6">
                  <div id="test"></div>
         
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
</div>

 <!--主体部分结束-->
	<script language="javascript">
   
   function searchMember(){
          //alert("搜索");
            var id=document.getElementById("memberID");
            var text=id.value;
            var voList=document.getElementById("test");
            $.ajax({
                url:"/abcTest/admin.php/Pay/search",
                //dataType:"json",
                type:"POST",
                async:false,
                
                
                data:{"id":text},
                success:function(data){
                  if(data=='未查询到用户信息'){
                    alert(data);
                  }
                  else{
                    //var text = data.split("<")[0];//返回值会带着<html>要用split把它分隔开
                    var test=eval("("+data+")");//转化为{object,object的形式}
                 
                    var tbody=$('<tbody></tbody>');
                    for(var i=0;i<test.length;i++){
                      var obj = test[i];//获取数组内每个对象。
                       // alert(obj);
                        var tr=$('<tr></tr>');
                      // 
                        tr.append('<td>'+ obj['memId'] + '</td>');
                        tr.append('<td>'+ obj['memName'] + '</td>');
                        tr.append('<td  id="cardId">'+ obj['vipCardId'] + '</td>');
                        tr.append('<td>'+ obj['memTel'] + '</td>');
                        tr.append('<td id="price">'+ obj['cardPrice'] + '</td>');
                        tr.append('<td id="times">'+ obj['validTimes'] + '</td>');
                        tr.append('<td id="remarks">'+ obj['memRemarks'] + '</td>');
                        tr.append('<select id="payTime" onchange="selectTime()">'+'<option value="">'+'请选择'+'</option>'+'<option value="1">'+'一个月'+'</option>'+'<option value="3">'+'三个月'+'</option>'+'<option value="6">'+'六个月'+'</option>'+'<option value="12">'+'一年'+'</option>'+'</select>');
                        tr.append('<td id="cost">'+'</td>');
                        tr.append('<td>'+ '<a onclick="pay()" style="cursor:pointer">'+'缴费'+'</a>' + '</td>');
                        tbody.append(tr);
                        }
                        $('#table tbody').replaceWith(tbody);
                        var remark=document.getElementById('remarks');
                        var cardId=document.getElementById("cardId");
                        if(remark.innerHTML=='已转卡'){
                            cardId.innerHTML='';
                            
                        }
                        
                  }
                 
                   
                  
                },
                error:function(){
                    alert("error");
                }
            });
        }
        function selectTime(){
          var selItem=document.getElementById('payTime');
	        var time = selItem.options[selItem.selectedIndex].value;
          var costNum=document.getElementById('cost');
          var cardPrice=document.getElementById('price').innerHTML;
          costNum.innerHTML=((cardPrice/12)*time).toFixed(1);
          //alert(time);
        }
        function pay(){
          //alert("aaa");
          var cardId=document.getElementById('cardId').innerHTML;
          var selItem=document.getElementById('payTime');
          var times=selItem.options[selItem.selectedIndex].value*30;
          var remark=document.getElementById('remarks').innerHTML;
          if (remark=="已请假"){
            alert("已请假，不能缴费！");
          }
          else{
            if(remark=="已转卡"){
              alert("已转卡，不能缴费！");
            }
            else{
              $.ajax({
            url:"/abcTest/admin.php/Pay/cost",
            data:{"time":times,"id":cardId},
            type:"post",
            dataType:"json",
            success:function(msg){
              alert("缴费成功");
              //alert(msg);
              $("#times").html(msg);
              
            },
            error:function(msg){
              alert(msg);
            }
          });
            }
          }
          //alert (times);
          
        }
 
    </script>
	</body>
<!-- Download From www.exet.tk-->
</html>
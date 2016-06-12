function check(){
	var sel=document.getElementById("type").value;
    if(sel==2){
        document.getElementById("building").innerHTML="<option value='0'>请选择栋数</option> <option value='A'>A座</option> <option value='B'>B座</option> <option value='C'>C座</option> <option value='D'>D座</option> <option value='E'>E座</option>";
		//document.getElementById("room").style.display="none";
		//document.getElementById("room").style.visibility="none";
		//document.getElementById("lab").style.display="block";
		//document.getElementById("lab").style.visibility="visible";

    }if(sel==1){
        document.getElementById("building").innerHTML="<option value='0'>请选择栋数</option> <option value='A'>A栋</option> <option value='B'>B栋</option> <option value='C'>C栋</option> <option value='D'>D栋</option> <option value='E'>E栋</option> <option value='F'>F栋</option> <option value='G'>G栋</option>";
		//document.getElementById("lab").style.display="none";
		//document.getElementById("lab").style.visibility="none";
		//document.getElementById("room").style.display="block";
		//document.getElementById("room").style.visibility="visible";
	
		
    }
}
function cover(){
	document.getElementById("sub").style.backgroundColor="green";	
}
function out(){
    document.getElementById("sub").style.backgroundColor="#FF9900";
}
function cli(){
    var re = /^1\d{10}$/;
    var res=/^\+?[1-9][0-9]*$/;
    var p=document.getElementsByName("phone")[0].value;
    var m=document.getElementsByName("email")[0].value;
    var r=document.getElementsByName("reason")[0].value;
    var t=document.getElementsByName("agree")[0].checked;

    if(p==""||m==""||r==""){alert("所有信息均不能为空");return false;}
    else if (m.replace(/\ /g,"").search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) == -1)
    { alert('请输入正确的Email地址');
        if(document.all)
        {
            event.returnValue=false;
        }
        else
        {
            event.preventDefault();
        }
    }
    else if (!re.test(p)) {
        alert("请输入正确的电话号码");
        if(document.all)
        {
            event.returnValue=false;
        }
        else
        {
            event.preventDefault();
        }
    } else if(r.length>100){
        alert("理由应少于100字");
        if(document.all)
        {
            event.returnValue=false;
        }
        else
        {
            event.preventDefault();
        }
    }else if(t==false){
        alert("请阅读并接受协议");
        if(document.all)
        {
            event.returnValue=false;
        }
        else
        {
            event.preventDefault();
        }
    }
}




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
/*$.ajax({

    type: 'POST',

    url: 'getClass.php' ,

    data: {
        date:
            time:
building:
           
    } ,
    dataType: "json",
    success: function (data) {

    }

    

});*/
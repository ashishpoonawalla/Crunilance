<HTML><HEAD><SCRIPT type="text/javascript">
function searchSel() {
  var input=document.getElementById('realtxt').value.toLowerCase();
  var output=document.getElementById('realitems').options;
  for(var i=0;i<output.length;i++) {
    if(output[i].value.indexOf(input)==0){
      output[i].selected=true;
    }
    if(document.getElementById('realtxt').value==''){
      output[0].selected=true;
    }
  }
}
</SCRIPT></HEAD><BODY>
<FORM>
Search <input type="text" id="realtxt" onkeyup="searchSel()">
<SELECT id="realitems">
<OPTION value="">Select...
<OPTION value="afghanistan">Afghanistan
<OPTION value="albania">Albania
<OPTION value="algeria">Algeria
<OPTION value="andorra">Andorra
<OPTION value="angola">Angola
</SELECT>
</FORM></BODY></HTML>
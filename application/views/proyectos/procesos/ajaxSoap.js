var httpRequest = null;
var xhrTimeout = null;
var url = "http://www.techni-translate.de/cartas_tt/nusoap/ws_figuras.php";
var soapMessage = null;


function myAjax()
{
   var l_var = document.getElementById("l_id").value;
   var L_var = document.getElementById("L_id").value;
            alert("test");
   soapMessage = '<?xml version="1.0" encoding="utf-16"?>';
   soapMessage =  soapMessage + ' <SOAP-ENV:Envelope SOAP-ENV:encodingStyle=';
   soapMessage =  soapMessage + '      "http://schemas.xmlsoap.org/soap/encoding/" ';
   soapMessage =  soapMessage + '      xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" ';
   soapMessage =  soapMessage + '      xmlns:xsd="http://www.w3.org/2001/XMLSchema" ';
   soapMessage =  soapMessage + '         xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ';
   soapMessage =  soapMessage + '         xmlns:SOAP-ENC="http://schemas.xmlsoap.org/soap/encoding/" ';
   soapMessage =  soapMessage + '         xmlns:tns="urn:mathwsdl">';
   soapMessage =  soapMessage + '         <SOAP-ENV:Body>';
   soapMessage =  soapMessage + '           <tns:RectangleArea xmlns:tns="urn:mathwsdl">';
   soapMessage =  soapMessage + '             <L xsi:type="xsd:int">' +L_var+'</L>';
   soapMessage =  soapMessage + '             <l xsi:type="xsd:int">'+l_var+'</l>';
   soapMessage =  soapMessage + '           </tns:RectangleArea>';
   soapMessage =  soapMessage + '         </SOAP-ENV:Body>';
   soapMessage =  soapMessage + '       </SOAP-ENV:Envelope>';
    
   if(window.XMLHttpRequest) {
      httpRequest=new XMLHttpRequest();
   } else if (window.ActiveXObject) { 
      httpRequest=new ActiveXObject("Microsoft.XMLHTTP"); 
   }
                  
   httpRequest.open("POST",url,true);
   if (httpRequest.overrideMimeType) { 
      httpRequest.overrideMimeType("text/xml"); 
   }
   httpRequest.onreadystatechange=callbackAjax;
      
   httpRequest.setRequestHeader("Man", 
      "POST http://www.techni-translate.de/cartas_tt/nusoap/ws_figuras.php HTTP/1.1")
   httpRequest.setRequestHeader("MessageType", "CALL");
   httpRequest.setRequestHeader("Content-Type", "text/xml");

   httpRequest.send(soapMessage);
   xhrTimeout=setTimeout("ajaxTimeout(httpRequest);",120000);                                                
}            
                              
function callbackAjax(){
   try {
      if(httpRequest.readyState==4) {
         if(httpRequest.status==200) {
            clearTimeout(xhrTimeout);                                                             
            resultDiv=document.getElementById("resultDiv");            
            resultDiv.style.display='inline';                                          
            resultDiv.innerHTML='<font color="#cc0000" size="4"><b>' + 
               httpRequest.responseText+'</b></font>';
         }
      } 
   }catch(e) { 
      alert("Error!"+e); }      
   }
  
function ajaxTimeout(ajaxOBJ) {     
   ajaxOBJ.abort();
}

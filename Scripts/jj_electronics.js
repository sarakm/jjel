function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

var xmlhttp;

function showCategories(idx)
{
	if (idx)
	{
			xmlhttp=GetXmlHttpObject();
			
			if (xmlhttp==null)
			{
			  alert ("Your browser does not support XMLHTTP!");
			  return;
			}
			
			var url="subcat.php";
			url=url+"?id="+idx;
			xmlhttp.onreadystatechange=stateChanged;
			xmlhttp.open("GET",url,true);
			xmlhttp.send(null);
	}
}

function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
	{
	  // code for IE7+, Firefox, Chrome, Opera, Safari
	  return new XMLHttpRequest();
	}
	
	if (window.ActiveXObject)
	{
	  // code for IE6, IE5
	  return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}

function stateChanged()
{
	if (xmlhttp.readyState==4)
	{
		document.getElementById("subcategorydiv").innerHTML=xmlhttp.responseText;
	}
}

function stateChanged2()
{
	if (xmlhttp.readyState==4)
	{
		document.getElementById("mainwindow").innerHTML=xmlhttp.responseText;
	}
}

function showRFQ(id)
{
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	var url="addrfq.php";
		url=url+"?id="+id;
		xmlhttp.onreadystatechange=stateChanged2;
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
}

function showSearch(str)
{
	var field = document.getElementById('field').value;
	
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	if (str)
	{
		var url="product_list.php";
		url=url+"?search="+str;
		url=url+"&field="+field;
		url=url+"&mode=search";
		xmlhttp.onreadystatechange=stateChanged2;
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	}
}

function showSubcat(idx)
{
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	if (idx)
	{
		var url="product_list.php";
		url=url+"?id="+idx;
		url=url+"&mode=cat";
		xmlhttp.onreadystatechange=stateChanged2;
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	}
}

function showStart(ltr, cat)
{
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	var url="product_list.php";
	url=url+"?start="+ltr;
	url=url+"&mode=start";
	url=url+"&id="+cat;
	xmlhttp.onreadystatechange=stateChanged2;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function showProductDetail(id)
{
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	var url="showproduct.php";
	url=url+"?id="+id;
	xmlhttp.onreadystatechange=stateChanged2;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function removeRFQ(itm)
{
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	var url="removerfq.php";
	url=url+"?item="+itm;
	xmlhttp.onreadystatechange=stateChanged2;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function viewRFQ()
{
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	var url="rfqcart.php";
	xmlhttp.onreadystatechange=stateChanged2;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function updateRFQ(f)
{
	var theform = f;
	var str = "";
	
	for (i=6; i < theform.length; i++)
	{
		str += '&'+theform.elements[i].name+'='+theform.elements[i].value;
	}
	
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	var url="updaterfq.php";
	url=url+"?rfqrequest=1";
	url=url+str;
	xmlhttp.onreadystatechange=stateChanged2;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function showElements(f)
{
    var theform = f;
	var str = "";
	
	for (i=6; i < theform.length; i++)
	{
		str += '&'+theform.elements[i].name+'='+theform.elements[i].value;
	}
	
	alert(str);
	
}

function checkForInt(evt) 
{
	var charCode = ( evt.which ) ? evt.which : event.keyCode;
	
	return ((charCode >= 48 && charCode <= 57) || charCode == 8 );
}

function checkForPrice(value) 
{
	var ch = "";
	var ret = "";
	var decPos = -1; //position of "." in value string if exist
	// ignore all but digits and decimal points.
	for(i=0; i < value.length; i++) {
		ch = value.substring(i,i+1);
		if((ch >= "0" && ch <= "9") || ch == ".") {
			if(ch >= "0" && ch <= "9"){
				if(decPos == -1 || i<=(decPos +2)){
					ret += ch;
				}
			}else if(ch == "." && decPos == -1) {
				decPos = i;
				ret += ch;
			}
		}
	}
	return ret;
}

//var RE_SSN = /^[0-9]{3}[\- ]?[0-9]{2}[\- ]?[0-9]{4}$/;

// function checkSsn(ssn){
 // if (RE_SSN.test(ssn)) {
  // alert("VALID SSN");
 // } else {
  // alert("INVALID SSN");
 // }
// }

function showRFQform()
{
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	var url="sendrfq.php";
	xmlhttp.onreadystatechange=stateChanged2;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

function emailRFQ()
{	
	xmlhttp=GetXmlHttpObject();
	
	if (xmlhttp==null)
	{
	  alert ("Your browser does not support XMLHTTP!");
	  return;
	}
	
	var companyname = document.getElementById('companyname').value;
	var contactname = document.getElementById('contactname').value;
	var address = document.getElementById('address').value;
	var city = document.getElementById('city').value;
	var postal = document.getElementById('postal').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	var sendme = document.getElementById('sendme').value;
	var comments = document.getElementById('comments').value;
	var str = "";
	
	if (contactname == "")
		str += "Contact name must not be blank\n";
		
	if (phone == "")
		str += "Phone must not be blank\n";
		
	if (comments == "")
		str += "Comments must not be blank\n";
	
	if (str)
	{
		alert(str);
		return;
	}
		
	var url="email.php";
	url=url+"?companyname="+companyname+"&contactname="+contactname+"&address="+address+"&city="+city+"&postal="+postal+"&phone="+phone+"&email="+email+"&sendme="+sendme+"&comments="+comments;
	xmlhttp.onreadystatechange=stateChanged2;
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
}

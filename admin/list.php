<?php
session_start();
include('authenticate.php');
include('../config.php');
include('../opendb.php');
if(isset($_GET['cat'])){
	$cat = $_GET['cat'];
	$order = $_GET['order'];
	$sortby = $_GET['sortby'];
	if(isset($_GET['dateI'])){
		list($m,$d,$y) = split("/",$_GET['dateI']);
		if((strlen($d))<2)
		$d="0".$d;
		if((strlen($m))<2)
		$m="0".$m;
		$date_added=$y."-".$m."-".$d;
		echo $date_added;
}	
	
}else{
	$cat = "";
	$order = "";
	$sortby = "";
}

$page_max = 50;
$page_show = 5;

if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = 1;
}
$sql_product = "SELECT 
	products.productid, products.productname, products.stockno, products.partno, products.sku, 
	products.qty, products.price, products.img, 
	categories.catname, products.manufacturer, products.flag
	FROM
	products, categories
	WHERE
	products.catid = categories.catid";
	
if ($cat != ""){
	$sql_product .= " AND products.catid = '$cat'";
	$query_string = "?cat=".$cat."&order=".$order."&sortby=".$sortby."&page=";
	if($date_added !=""){
    $sql_product .= " AND products.date_added >= '$date_added'";
	}
}else{
	$query_string = "?page=";
}


if ($sortby != ""){
	$sql_product .= " ORDER BY ".$sortby." ".$order;
}else{
	$sql_product .= " ORDER BY products.productid DESC";
}
echo $sql_product;
$results = mysql_query($sql_product) or die(mysql_error());

$page_total = floor((mysql_num_rows($results)-1) / $page_max + 1);
?>
<?
include('top.php');
?>
    <link rel="stylesheet" type="text/css" href="css/page.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/calendar-eightysix-default.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/calendar-eightysix-vista.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/calendar-eightysix-osx-dashboard.css" media="screen" />
	
	<script type="text/javascript" src="js/mootools-1.2.4-core.js"></script>
	<script type="text/javascript" src="js/mootools-1.2.4.2-more.js"></script>
	<script type="text/javascript" src="js/compressed/calendar-eightysix-v1.0.1.js"></script>
	
	<script type="text/javascript">
		window.addEvent('domready', function() {
			new CalendarEightysix('exampleI', 	 { 'offsetY': -4 });
			
			/*new CalendarEightysix('exampleII', 	 { 'startMonday': true, 'format': '%m.%d.%Y', 'slideTransition': Fx.Transitions.Back.easeOut, 'draggable': true, 'offsetY': -4 });
			new CalendarEightysix('exampleIII',  { 'excludedWeekdays': [0, 6], 'toggler': 'exampleIII-picker', 'offsetY': -4 });
			new CalendarEightysix('exampleIV', 	 { 'excludedDates': ['12/25/2012', '12/26/2012'], 'defaultDate': '12/01/2012', 'offsetY': -4 });
			new CalendarEightysix('exampleV',	 { 'theme': 'default red', 'defaultDate': 'next Wednesday', 'minDate': 'tomorrow', 'offsetY': -4 });
			new CalendarEightysix('exampleVI', 	 { 'defaultView': 'decade', 'theme': 'vista', 'disallowUserInput': true, 'offsetY': -4 });
			new CalendarEightysix('exampleVII',  { 'defaultView': 'year', 'theme': 'osx-dashboard', 'alignX': 'left', 'alignY': 'bottom', 'offsetX': -4 });
			new CalendarEightysix('exampleVIII', { 'format': '%A %D %B', 'alignX': 'middle', 'alignY': 'top' });
			new CalendarEightysix('exampleIXb',	 {
				'pickFunction': function(date) {
					$('exampleIXa').set('value', date.get('month') + 1);
					$('exampleIXc').set('value', date.get('year'));
				},
				'linkWithInput': false, 'defaultDate': '1/1/2010', 'minDate': '1/1/2010', 'maxDate': '12/31/2014', 'format': '%d', 'toggler': 'exampleIX-picker', 'offsetY': -4, 'offsetX': 76
			});
			
			MooTools.lang.set('nl-NL', 'Date', {
				months:    ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'],
				days:      ['Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag'],
				dateOrder: ['date', 'month', 'year', '/']
			});
			MooTools.lang.set('de-DE', 'Date', {
				months:    ['Januar', 'Februar', 'M&auml;rz', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
				days:      ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
				dateOrder: ['date', 'month', 'year', '/']
			});
			
			$('exampleXa').addEvent('click', function() { MooTools.lang.setLanguage('nl-NL'); });
			$('exampleXb').addEvent('click', function() { MooTools.lang.setLanguage('de-DE'); });*/
		});	
	</script>
<script>
function refreshList()
{
	var s = document.getElementById('cat').value;
	var o = document.getElementById('order').value;
	var sb = document.getElementById('sortby').value;
	//var date= document.getElementById('exampleI').value;
	location.href = "list.php?cat="+s+"&order="+o+"&sortby="+sb;
}
function refreshList1()
{
	var s = document.getElementById('cat').value;
	var o = document.getElementById('order').value;
	var sb = document.getElementById('sortby').value;
	var date= document.getElementById('exampleI').value;
	location.href = "list.php?cat="+s+"&order="+o+"&sortby="+sb+"&dateI="+date;
}
function editClick(id)
{
	location.href = "edit.php?id="+id;
}
</script>


<table width="950" border="0" align="center" cellpadding="2" cellspacing="6" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px">
  <tr>
    <td height="25" colspan="10"><h3 class="p_list2">CLICK ON THE ITEMS TO EDIT</h3></td>
  </tr>
  <tr>
    <td height="25"><div align="right"><strong>Sort:</strong></div></td>
    <td height="25" colspan="9">
    <select name="sortby" id="sortby" style="width:200px;" onChange="refreshList()">
    			<? if ($sortby == "stockno") { ?>
                    <option value="stockno" selected="selected">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "partno") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno" selected="selected">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "sku") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku" selected="selected">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "qty") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty" selected="selected">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "price") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price" selected="selected">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "flag") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag" selected="selected">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } elseif ($sortby == "manufacturer") { ?>
                    <option value="stockno">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer" selected="selected">Manufacturer</option>
                <? } else { ?>
                    <option value="stockno" selected="selected">Stock number</option>
                    <option value="partno">Part number</option>
                    <option value="sku">SKU number</option>
                    <option value="qty">Quantity</option>
                    <option value="price">Price</option>
                    <option value="flag">Showing</option>
                    <option value="manufacturer">Manufacturer</option>
                <? } ?>                                                                                                        
    </select> 
    &nbsp;   <strong>Order:
    <select name="order" id="order" style="width:200px;" onChange="refreshList()">
    	<? if ($order == "asc") { ?>
          	<option value="asc" selected="selected">Ascending</option>
            <option value="desc">Descending</option>
        <? } else { ?>
        	<option value="asc">Ascending</option>
	  		<option value="desc" selected="selected">Descending</option>
        <? } ?>
    </select>
    </strong></td>
  </tr>
  <tr>
    <td height="25"><div align="right"><strong>Go to:</strong></div></td>
    <td height="25" colspan="9"><strong>
      <select name="cat" id="cat" style="width:200px;" onChange="refreshList()">
      <?php
//		$sql = "SELECT catid, catname FROM categories ORDER BY catparent ASC";
//		$sql = "SELECT catid, catname FROM categories WHERE catparent not like '%0%' ORDER BY catname ASC";
		$sql = "SELECT catid, catname FROM categories WHERE catparent!='0' ORDER BY catname ASC";
		$res = mysql_query($sql) or die(mysql_error());
		
			while(list($catid, $catname) = mysql_fetch_array($res))
			{
				if ($cat == $catid)
					echo "<option value=\"$catid\" selected=\"selected\">$catname</option>\n";
				else
					echo "<option value=\"$catid\">$catname</option>\n";
			}
		
		?>
    </select>
    </strong><input type="button" name="go" value="Go" onClick="refreshList()" /> </td>
  </tr>
  <tr>
    <td height="25" colspan="10" align="left">
    <strong>Enter date to Search from </strong>
			<input type="text" id="exampleI" name="dateI"  maxlength="10" />
			<input type="button" name="go2" id="go2" value="Go" onclick="refreshList1()" /></td>
  </tr>
  </table>
  <div align="center"><p align="center">
  <font color="#660033" size="+3"><?php if(isset($_SESSION['msg'])&&($_SESSION['msg']!=""))
  {echo $_SESSION['msg']; 
  unset($_SESSION['msg']);
  }?></font></p>
      <p align="right"><a href="excel_format.php"><img src="../images/B.jpg" BORDER="0" ALT="EXPORT" /></a></p>
    </div>
<div style="float: right; margin-right: 20px;">
  <?
if($page < $page_show){
	$first_show = 1;
}else{
	$first_show = $page - $page_show;
}
if(($page_total -$page) < $page_show){
	$last_show = $page_total;
}else{
	$last_show = $page + $page_show;
}
if($page!=1){
?>
  <a href="list.php<?print$query_string.($page-1);?>">Previous</a>
<?
}
for($i=$first_show; $i<=$last_show;$i++){
	if($i==$page){
?>
		<?=$i?>
<?
	}else{
?>	
		<a href="list.php<?print$query_string.$i;?>"><?=$i?></a>
<?
	}
?>

<?
}
if($page!=$page_total){
?>
	<a href="list.php<?print$query_string.($page+1);?>">Next</a>
<?
}
?>
</div> 


  <table width="940" border="1" align="center" cellpadding="2" cellspacing="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:10px">
  <tr>
    <td width="170" height="30" bgcolor="#990000"><div align="center" class="p_list1">Product<br> name </div></td>
    <td width="50" height="30" bgcolor="#990000"><div align="center" class="p_list1">Stock<br> no</div></td>
    <td width="220" height="30" bgcolor="#990000"><div align="center" class="p_list1">Part no</div></td>
    <td width="50" height="30" bgcolor="#990000"><div align="center" class="p_list1">SKU #</div></td>
    <td width="30" height="30" bgcolor="#990000"><div align="center" class="p_list1">Qty</div></td>
 <!--   <td width="40" height="30" bgcolor="#990000"><div align="center" class="p_list1">Price</div></td> -->
    <td width="40" height="30" bgcolor="#990000"><div align="center" class="p_list1">Image</div></td>
    <td width="130" height="30" bgcolor="#990000"><div align="center" class="p_list1">Category</div></td>
    <td width="200" height="30" bgcolor="#990000"><div align="center" class="p_list1">Manufacturer</div></td>
 <!--   <td width="40" height="30" bgcolor="#990000"><div align="center" class="p_list1">Shows</div></td> -->
    <td width="40" height="30" bgcolor="#990000"><div align="center" class="p_list1">Delete</div></td>
  </tr> 
 <?php  $_SESSION['sql']= $sql_product;
		$start = ($page -1) * $page_max;
		$sql_product .= " LIMIT ".$start.", ".$page_max;

		$results = mysql_query($sql_product) or die(mysql_error());
		
		$cnt = 1;
			
		while(list($productid, $productname, $stockno, $partno, $sku, $qty, $price, $img, $catname, $manufacturer, $flag) = mysql_fetch_array($results))
		{ 
  ?>
  <tr onMouseOver="this.style.backgroundColor='#E7E7E7'" onMouseOut="this.style.backgroundColor='#FFFFFF'" onClick="javascript:void(0);">
    <td height="30" width="" onClick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $productname; ?></div></td>  
    <td height="30" width="" onClick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $stockno; ?></div></td>
    <td height="30" width="" onClick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $partno; ?></div></td>
    <td height="30" width="" onClick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $sku; ?></div></td>
    <td height="30" width="" onClick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $qty; ?></div></td>
<!--    <td height="30" width="" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $price; ?></div></td> -->
    <td height="30" width="" onClick="editClick(<?= $productid; ?>);" style="cursor:pointer;">
<div align="center"><img src="../uploads/product-images/<?= $img; ?>" height="30" width="30" onMouseOver="document.getElementById('div<?= $cnt; ?>').style.display='block';" onMouseOut="document.getElementById('div<?= $cnt; ?>').style.display='none';"/></div>
<div style="position:absolute; display:none; z-index:2; margin-left:45px;" id="div<?= $cnt; ?>">
            	<img src="../uploads/product-images/<?= $img; ?>" width="150" height="150" />
            </div>    </td>
    <td height="30" width="" onClick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $catname; ?></div></td>
    <td height="30" width="" onClick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><?= $manufacturer; ?></div></td>
<!--    <td height="30" width="" onclick="editClick(<?= $productid; ?>);" style="cursor:pointer;"><div align="center"><? if ($flag == 1) { echo "Yes"; } else { echo "No"; } ?></div></td> -->
    <td height="30" width=""><div align="center"><a href="delete_product.php?id=<?=$productid;?>&cat=<?=$cat;?>&order=<?=$order;?>&sortby=<?=$sortby;?>" onClick="return confirm('Are you sure you want to delete this product?');"><img src="delete-16x16.png" width="16" height="16" border="0"/></a></div></td>
  </tr>
  <? 
		$cnt++;
		} 
  ?>
</table>
<br><br><br>

<?
include('bottom.php');
?>
<html>

<head>
<script type="text/javascript">

function CreateExcelSheet()
{


var x=myTable.rows

var xls = new ActiveXObject("Excel.Application")
xls.visible = true
xls.Workbooks.Add
for (i = 0; i < x.length; i++)
{
var y = x[i].cells

for (j = 0; j < y.length; j++)
{
xls.Cells( i+1, j+1).Value = y[j].innerText
}
}




}
</script>


</head>

<body marginheight="0" marginwidth="0">
<form>
<input type="button" onclick="CreateExcelSheet()" value="Create Excel Sheet">
</form>
<table id="myTable" border="1">
<tr> <b><td>Name </td> <td>Age</td></b></tr>
<tr> <td>Shivani </td> <td>25</td> </tr>
<tr> <td>Naren </td> <td>28</td> </tr>
<tr> <td>Logs</td> <td>57</td> </tr>
<tr> <td>Kas</td> <td>54</td> </tr>
<tr> <td>Sent </td> <td>26</td> </tr>
<tr> <td>Bruce </td> <td>7</td> </tr>
</table>



//jquery plugins
<script src="tableExport.js"></script>
<script src="jquery.base64.js"></script>

//ping export
<script src="html2canvas.js"></script>

//pdf export
<script src="jspdf/libs/sprintf.js"></script>
<script src="jspdf/jspdf.js"></script>
<script src="jspdf/libs/base64.js"></script>

//usage
onClick ="$('#tableID').tableExport({type:'pdf',escape:'false'});"

//types
{type:'json',escape:'false'}
{type:'json',escape:'false',ignoreColumn:'[2,3]'}
{type:'json',escape:'true'}

{type:'xml',escape:'false'}
{type:'sql'}

{type:'csv',escape:'false'}
{type:'txt',escape:'false'}

{type:'excel',escape:'false'}
{type:'doc',escape:'false'}
{type:'powerpoint',escape:'false'}

{type:'png',escape:'false'}
{type:'pdf',pdfFontSize:'7',escape:'false'}

//options
separator: ','
ignoreColumn: [2,3],
tableName:'yourTableName'
type:'csv'
pdfFontSize:14
pdfLeftMargin:20
escape:'true'
htmlContent:'false'
consoleLog:'false' 
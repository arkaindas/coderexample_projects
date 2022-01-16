<!DOCTYPE html>
<html>
	<title>Datatable Demo7   Table tools (Server Side) | CoderExample</title>
	<head>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.tableTools.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
			   var dataTable =  $('#employee-grid').DataTable( {
			   	dom: 'T<"clear">lfrtip',
			   		"tableTools": {
			   	   	"sSwfPath": "swf/copy_csv_xls_pdf.swf",
			   	    	"sRowSelect": "multi",
				    	"aButtons": [
					        	"select_all", 
					        	"select_none",
							{
						    		"sExtends":    "collection",
						    		"sButtonText": "Export",
						    		"aButtons":    [ "csv", "xls", "pdf","print" ]
							}
				    	]
				},
			   	processing: true,
			   	serverSide: true,
		   		ajax: "employee-grid-data.php", // json datasource
			    } );
			} );
		</script>
		<style>
			div.container {
			    max-width: 980px;
			    margin: 0 auto;
			}
			div.header {
			    margin: 0 auto;
			    max-width:980px;
			}
			body {
			    background: #f7f7f7;
			    color: #333;
			}
		</style>
	</head>
	<body>
		<div class="header"><h1>DataTable Table tools (Server Side) </h1></div>
		<div class="container">
			<table id="employee-grid"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Employee name</td>
						<td>Salary</td>
						<td>Position</td>
						<td>City</td>
						<td>Extension</td>
						<td>Joining date</td>
						<td>Age</td>
					</tr>
				</thead>	
			</table>
		</div>
	</body>
</html>
<!DOCTYPE html>
<html>
	<title>Datatable Demo5   Custom Loader | CoderExample</title>
	<head>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="custom-loader-css/dataTables.customLoader.walker.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
	
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
			   var dataTable =  $('#employee-grid').DataTable( {
			   	processing: true,
				"language": {
					"processing": "<div></div><div></div><div></div><div></div><div></div>"
				},
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
		<div class="header"><h1>DataTable  Custom Loader </h1></div>
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

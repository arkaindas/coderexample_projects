<!DOCTYPE html>
<html>
	<title>Datatable Demo6   Datatable Columnvis (Column Visibility) | CoderExample</title>
	<head>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.colVis.css">
		
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.colVis.js"></script>
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
			   var dataTable =  $('#employee-grid').DataTable( {
			   	processing: true,
				serverSide: true,
				ajax: "employee-grid-data.php", // json datasource
			
			    } );
			   var colvis = new $.fn.dataTable.ColVis( dataTable, {
					buttonText: '<img src="images/down.gif" >',
					activate: 'mouseover',
					exclude: [ 0 ]	
    			   } );
			   $( colvis.button() ).prependTo('th:nth-child(1)');
		    
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
		<div class="header"><h1>DataTable  Columnvis (Column Visibility) </h1></div>
		<div class="container">
			<table id="employee-grid"  class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Employee name</th>
						<th>Salary</th>
						<th>Position</th>
						<th>City</th>
						<th>Extension</th>
						<th>Joining date</th>
						<th>Age</th>
					</tr>
				</thead>
			</table>
		</div>
	</body>
</html>

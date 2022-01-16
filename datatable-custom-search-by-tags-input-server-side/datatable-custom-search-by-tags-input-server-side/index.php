<!DOCTYPE html>
<html>
	<title>Datatable Demo8 | CoderExample</title>
	<head>
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.tagsinput.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.tagsinput.css">
		
		
		<script type="text/javascript" language="javascript" >
			$(document).ready(function() {
				var dataTable = $('#employee-grid').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"employee-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".employee-grid-error").html("");
							$("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#employee-grid_processing").css("display","none");
							
						}
					}
				} );
				$("#employee-grid_filter").css("display","none");  // hiding global search box

				$('.search-input-text').tagsInput({   // initialization of tags input 
					'height':'100%',
					'width':'100%',
					'interactive':true,
					'defaultText':'Add a tag',
					'hide':true,
					'delimiter':',',
					'unique':true,
					'onAddTag':tagDraw,
					'onRemoveTag':tagDraw,
					'removeWithBackspace' : true,
					'minChars' : 0,
					'maxChars' : 0, //if not provided there is no limit,
					'placeholderColor' : '#AAA'
				});
				function tagDraw(){              //draw a request on add or remove tag
					var v= $(".search-input-text").val();
					dataTable.search(v).draw();
				}
			} );
			

		</script>
		<style>
			div.container {
			    margin: 0 auto;
			    max-width:760px;
			}
			div.header {
			    margin: 100px auto;
			    line-height:30px;
			    max-width:760px;
			}
			body {
			    background: #f7f7f7;
			    color: #333;
			    font: 90%/1.45em "Helvetica Neue",HelveticaNeue,Verdana,Arial,Helvetica,sans-serif;
			}
		</style>
	</head>
	<body>
		<div class="header"><h1>DataTable Custom Search By Tags Input (Server side) </h1></div>
		<div class="container">
			<table id="employee-grid"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
					<thead>
						<tr>
							<th>Employee name</th>
							<th>Salary</th>
							<th>Age</th>
						</tr>
					</thead>
					<thead>
						<tr>
							<td colspan="3" ><input type="text" data-column="0"  class="search-input-text"></td>

						</tr>
					</thead>
			</table>
		</div>
	</body>
</html>

<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>jQuery Datatable with Custom Json format in Php, Mysql </title>
		<meta name="description" content="jQuery Datatable with Custom Json format in Php, Mysql" />
		<meta name="author" content="Arkaprava Majumder" />
		<!-- bootstrap css -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<!-- css for datatable-->
		<link rel="STYLESHEET" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css" type="text/css">
    </head>
    <body>
		<div class="nav-top clearfix">
			<span class="left"><a  title="CoderExample" href="http://coderexample.com/" ><span> <i class="lh1 fa fa-angle-left"></i>CODER<i class="lh1 fa fa-angle-right"></i><i class="lh1 fa fa-angle-left"></i>/EXAMPLE<i class="lh1 fa fa-angle-right"></i></span></a></span>
			
			<span class="left"><a target="_blank" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=http://coderexample.com/jquery-datatable-with-custom-json-format-in-php-mysql/" title="Share on Facebook" ><span> <i class="lh1 fa fa-facebook"></i></span></a></span>
			
			<span class="left"><a target="_blank" rel="nofollow" href="https://twitter.com/intent/tweet?url=http://coderexample.com/jquery-datatable-with-custom-json-format-in-php-mysql/&text=jQuery Datatable with Cusom Json format in Php, Mysql&via=coderexample" title="Share on  Twitter" ><span> <i class="lh1 fa fa-twitter"></i></a></span>
			
			<span class="right"><a  href="http://coderexample.com/jquery-datatable-with-custom-json-format-in-php-mysql/"><i class="lh1 fa fa-arrow-left"></i> <span class="header-nav">Back to Tutorial Article</span></a></span>
		</div>
        <div class="container">
			<div class="header">
				<h1>jQuery Datatable with Custom Json format in Php, Mysql</h1>	
			</div>
			<div class="main">
				<table id="datatable_demo" class="display" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Invoice #</th>
							<th>Product Name</th>
							<th>Delivery Status</th>
							<th>Address</th>
						</tr>
					</thead>
				</table>		
			</div>
        </div>
		<div class="footer-area clearfix">
			Made with ♡ in India ©2016
			<a href="http://coderexample.com/" title="CoderExample"> CoderExample</a>
		</div>
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function() {
		    $('#datatable_demo').DataTable( {
				"processing": true,
				"serverSide": true,
		        "ajax": {
		            "url": "server-json-data.php",
		            "type": "POST",
		            "dataSrc": "records"
		        },
		        "columns": [
		            { "data": "invoice_no" },
		            { "data": "product_name" },
		            { "data": "delivery_status" },
					{ "data": "pin_code" },
		        ],
				"columnDefs": [
					{
			        	"targets": 2,
			            "render": function ( data, type, row ) {
			                return data == 1 ? 'Delivered': 'Not delivered';
			            }
		        	},
		        	{
		      		 	"targets": 3,
		                "render": function ( data, type, row ) {
		                    return row["city"] +', ' + row["country"] +', '+data;
		                },
		              
		            },
		        ]
		    });
		});
		</script>
    </body>
</html>

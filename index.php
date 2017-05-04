<?php include 'lib/header.php'; ?>
<?php include 'lib/Database.php'; ?>

    <div class="container mt-2 ">
    	<div class="row">
    		<div class="col-lg-12">
    			<div class="panel ">
    			    <dev class="panel-heading main-color-bg bg-faded">
    			        <h3 class="panel-title">Student List <span class="pull-right"><a href="addstudent.php" class="btn btn-primary">Add Student</a></span></h3>
    			    </dev>
    			    <?php 
    			    $msg =Session::get("msg");
    			    if(!empty($msg))
    			    {
    			     	echo "<h2 class='alert alert-success'><strong>$msg</strong></h2>";
    			     	Session::unset();
    			    }
    			    ?>
    			    <div class="panel-body">
    			        <table class="table table-bordered table-striped table-sm">
    			        	<thead>
    			        		<tr>
    			        			<th><strong>Serial</strong></th>
    			        			<th><strong>Name</strong></th>
    			        			<th><strong>Email</strong></th>
    			        			<th><strong>Phone</strong></th>
    			        			<th><strong>Action</strong></th>
    			        		</tr>
    			        	</thead>
    			        	<tbody>
    			        	<?php 
    			        	$db = new Database;
    			        	
    			        	$tablename = "tbl_student";
    			        	$orderby = ["order_by" => "id"];
    			        	$selectcon = ["select" => "name"];
    			        	$wherecon = [
    			        			"where" => ["id" => 1, "email" =>"binoy3412@gmail.com"],
    			        			"return_type" => "single"
    			        		];
    			        	$limit = ["start" => "1","limit" => "4"];	

    			        	$studentdata = $db-> select($tablename,$orderby);
    			        	if (!empty($studentdata)) {
    			        		$i = 0;
	    			        	foreach ($studentdata as $value) {
	    			        		$i++;
	    			        		?>
									<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $value["name"]; ?></td>
										<td><?php echo $value["email"]; ?></td>
										<td><?php echo $value["phone"]; ?></td>
										<td>
											<a href="editstudent.php?id=<?php echo $value["id"]; ?>" class="btn btn-secondary">Edit</a>
											<a href="lib/process_student.php?action=delete&id=<?php echo $value["id"]; ?>" class="btn btn-danger">Delete</a>
										</td>
									</tr>
	    			        		<?php
	    			        	}
    			        	}
    			        	else
    			        	{
    			        		?>
    			        		<tr><td><h2>No data found</h2></td></tr>
    			        		<?php
    			        	}


    			        	 ?>
    			        		
    			        		
    			        	</tbody>
    			        </table>
    			    </div> 
    			</div>
    		</div>
    	</div>
    </div>

    <?php include 'lib/footer.php'; ?>
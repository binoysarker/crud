<?php include 'lib/header.php'; ?>
<?php include 'lib/Database.php'; ?>
    <div class="container mt-2 ">
    	<div class="row">
    		<div class="col-lg-12">
    			<div class="panel ">
    			    <dev class="panel-heading main-color-bg bg-faded">
    			        <h3 class="panel-title">Update Student <span class="pull-right"><a href="addstudent.php" class="btn btn-primary">Back</a></span></h3>
    			    </dev>
    			    <div class="panel-body">
                    <?php 
                    $db = new Database;
                    $id = $_GET["id"];
                    $tablename = "tbl_student";
                    $wherecon = [
                                    "where" => ["id" => $id],
                                    "return_type" => "single"
                                ];
                    $singledata = $db->select($tablename,$wherecon);

                    if (!empty($singledata)) {
                        ?>
                        <form class="form" action="lib/process_student.php" method="POST">
                            <fieldset class="form-group">
                                <label for="name"><strong>Student Name</strong></label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $singledata["name"]; ?>">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="email"><strong>Student Email</strong></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $singledata["email"]; ?>">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="phone"><strong>Student Phone</strong></label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $singledata["phone"]; ?>">
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="hidden" name="id" value="<?php echo $singledata["id"]; ?>">
                                <input type="hidden" name="action" value="edit">
                                <input type="submit" class="btn btn-primary" id="submit" name="update" Value="Update Student">
                            </fieldset>
                        </form>
                        <?php
                    } else {
                        # code...
                    }
                    
                     ?>
    			        
    			    </div> 
    			</div>
    		</div>
    	</div>
    </div>

    <?php include 'lib/footer.php'; ?>
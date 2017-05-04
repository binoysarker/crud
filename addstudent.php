<?php include 'lib/header.php'; ?>

    <div class="container mt-2 ">
    	<div class="row">
    		<div class="col-lg-12">
    			<div class="panel ">
    			    <dev class="panel-heading main-color-bg bg-faded">
    			        <h3 class="panel-title">Add Student <span class="pull-right"><a href="index.php" class="btn btn-primary">Back</a></span></h3>
    			    </dev>
    			    <div class="panel-body">
    			        <form class="form form-control" action="lib/process_student.php" method="POST">
                            <fieldset class="form-group">
                                <label for="name"><strong>Student Name</strong></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Student Name" required="1">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="email"><strong>Student Email</strong></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Student Email" required="1">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="phone"><strong>Student Phone</strong></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Student Phone" required="1">
                            </fieldset>
                            <fieldset class="form-group">
                                <input type="hidden" name="action" value="add">
                                <input type="submit" class="btn btn-primary" id="submit" name="submit" Value="Add Student">
                            </fieldset>
                        </form>
    			    </div> 
    			</div>
    		</div>
    	</div>
    </div>

    <?php include 'lib/footer.php'; ?>
<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: goods_index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM goods where Id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-2.1.0.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>G&S Record</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      

			<div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Description'];?>
                            </label>
                        </div>
                      </div>
                      
			<div class="control-group">
                        <label class="control-label">Class</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Class'];?>
                            </label>
                        </div>
                      </div>


			<div class="control-group">
                        <label class="control-label">Ledger In</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['LedgerIn'];?>
                            </label>
                        </div>
                      </div>


			<div class="control-group">
                        <label class="control-label">Cost</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Cost'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Ledger Out</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['LedgerOut'];?>
                            </label>
                        </div>
                      </div>
                        
			<div class="control-group">
                        <label class="control-label">Price</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Price'];?>
                            </label>
                        </div>
                      </div>
		
			<div class="control-group">
                        <label class="control-label">Primary Supplier</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['PrimarySupplier'];?>
                            </label>
                        </div>
                      </div>

			<div class="control-group">
                        <label class="control-label">Primary Supplier Part No.</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['PrimarySupplierPartNo'];?>
                            </label>
                        </div>
                      </div>

			<div class="control-group">
                        <label class="control-label">Image Name</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['ImageName'];?>
                            </label>
                        </div>
                      </div>
			
			<div class="control-group">
                        <label class="control-label">Quantity On Hand</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['QOH'];?>
                            </label>
                        </div>
                      </div>
			
			<div class="control-group">
			<label class="control-label">Safety Level</label>
			<div class="controls">
				<label class="checkbox">
					<?php echo $data['SafetyLevel'];?>
				</label>
			</div>
			</div>

			<div class="form-actions">
                          <a class="btn" href="goods_index.php">Back</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

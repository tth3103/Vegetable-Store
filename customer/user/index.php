<?php 
session_start();
if (isset($_SESSION['yourID'])) {
    require_once("../../class/order.php");
    require_once("../../class/customer.php");
    require_once("../../menu.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Account Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container light-style flex-grow-1 container-p-y">

    <h4 class="font-weight-bold py-3 mb-4">
        Account Manager
    </h4>

    <div class="card overflow-hidden">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-history">History</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
            <a class="list-group-item list-group-item-action" href="../logout.php">Logout</a>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">
              <div class="card-body media align-items-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    Upload new photo
                    <input type="file" class="account-settings-fileinput">
                  </label> &nbsp;
                  <button type="button" class="btn btn-default md-btn-flat">Reset</button>

                  <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
                <?php
                $classCus = new customer();
                $result_cus = $classCus->getByID($_SESSION['yourID']);
                foreach ($result_cus as $Cus) {}
                ?>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Username:</label>
                        <input type="text" class="form-control mb-1" name="Username" value="<?= $Cus['Username'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-6 ml-auto">
                        <label class="form-label">Fullname:</label>
                        <input type="text" class="form-control mb-1" name="Fullname" value="<?= $Cus['Fullname'] ?>">
                    </div>
                </div>

                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Phone:</label>
                        <input type="text" class="form-control mb-1" name="Phone" value="<?= $Cus['Phone'] ?>">
                    </div>
                    <div class="form-group col-md-6 ml-auto">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control mb-1" name="Email" value="<?= $Cus['Email'] ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12">
                        <label>Address:</label>
                        <textarea class="form-control" id="add_staff_address" name="Address" rows="2"><?= $Cus['Address'] ?></textarea>
                    </div>
                </div>
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary" id="add_staff" name="Add">Update</button>
                </div>
            </div>
            </div>
            <div class="tab-pane fade" id="account-history">
                <div class="card-body pb-2">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php
                            $cusID = $_SESSION['yourID'];
                            $order = new order();
                            $result = $order->getAllOrderByCusID($cusID);
                            if(is_array($result) || is_object($result)){
                                foreach($result as $key => $value):    
                            ?>
                            <tr>
                                <td><?php echo $value['OrderID'] ?></td>
                                <td><?php echo $value['OrderDate']; ?></td>
                                <td><?php echo number_format($value['Total']).' VND' ?></td>
                                <td>
                                    <?php 
                                    if ($value['Status'] == "Unprocessed") {
                                        echo '<span class="badge badge-warning" style="color: white; font-size: 15px">Unprocessed</span>';
                                    } else if ($value['Status'] == "Confirmed") {
                                        echo '<span class="badge badge-primary" style="color: white; font-size: 15px">Confirmed</span>';
                                    } else if ($value['Status'] == "Shipping") {
                                        echo '<span class="badge badge-info" style="color: white; font-size: 15px">Shipping</span>';
                                    } else if ($value['Status'] == "Shipped") {
                                        echo '<span class="badge badge-info" style="color: white; font-size: 15px">Shipped</span>';
                                    } else echo '<h5><span class="badge badge-danger" style="color: white; font-size: 15px">Cancelled</span></h5>';       
                                    ?>
                                </td>
                                <td>
                                    <a href="../../cart/receipt.php?id=<?php echo $value['OrderID']?>"><i class="fas fa-info-circle" style="font-size: 17px"></i></a>
                                    <a href="../../cart/status.php?id=<?php echo $value['OrderID']?>"><i class="fas fa-shipping-fast" style="font-size: 17px"></i></a>
                                </td>
                                <?php endforeach;} ?>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
            <div class="tab-pane fade" id="account-change-password">
              <div class="card-body pb-2">
                <div class="form-group">
                  <label class="form-label">Current password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-label">New password</label>
                  <input type="password" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-label">Repeat new password</label>
                  <input type="password" class="form-control">
                  <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary" id="add_staff" name="Add">Update</button>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<style type="text/css">
body{
    background: #f5f5f5;
    margin-bottom: 0;
}

.ui-w-80 {
    width: 80px !important;
    height: auto;
}

.btn-default {
    border-color: rgba(24,28,33,0.1);
    background: rgba(0,0,0,0);
    color: #4E5155;
}

label.btn {
    margin-bottom: 0;
}

.btn-outline-primary {
    border-color: #26B4FF;
    background: transparent;
    color: #26B4FF;
}

.btn {
    cursor: pointer;
}

.text-light {
    color: #babbbc !important;
}

.btn-facebook {
    border-color: rgba(0,0,0,0);
    background: #3B5998;
    color: #fff;
}

.btn-instagram {
    border-color: rgba(0,0,0,0);
    background: #000;
    color: #fff;
}

.card {
    background-clip: padding-box;
    box-shadow: 0 1px 4px rgba(24,28,33,0.012);
}

.row-bordered {
    overflow: hidden;
}

.account-settings-fileinput {
    position: absolute;
    visibility: hidden;
    width: 1px;
    height: 1px;
    opacity: 0;
}
.account-settings-links .list-group-item.active {
    font-weight: bold !important;
}
html:not(.dark-style) .account-settings-links .list-group-item.active {
    background: transparent !important;
}
.account-settings-multiselect ~ .select2-container {
    width: 100% !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.material-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24, 28, 33, 0.03) !important;
}
.material-style .account-settings-links .list-group-item.active {
    color: #4e5155 !important;
}
.dark-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(255, 255, 255, 0.03) !important;
}
.dark-style .account-settings-links .list-group-item.active {
    color: #fff !important;
}
.light-style .account-settings-links .list-group-item.active {
    color: #4E5155 !important;
}
.light-style .account-settings-links .list-group-item {
    padding: 0.85rem 1.5rem;
    border-color: rgba(24,28,33,0.03) !important;
}



</style>

<script type="text/javascript">

</script>
</body>
</html>
<?php } ?>
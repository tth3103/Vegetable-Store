<?php 
    session_start();
    $server_root = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://'.$_SERVER['SERVER_NAME'].'/vegetablestore';
    if (isset($_SESSION['yourID'])) {

?>
<style>
body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgb(0, 0, 34);
    font-size: 0.8rem
}

.card {
    max-width: 1000px;
    margin: 2vh
}

.card-top {
    padding: 0.7rem 5rem
}

.card-top a {
    float: left;
    margin-top: 0.7rem
}

#logo {
    font-family: 'Dancing Script';
    font-weight: bold;
    font-size: 1.6rem
}

.card-body {
    padding: 0 5rem 5rem 5rem;
    background-image: url("https://i.imgur.com/4bg1e6u.jpg");
    background-size: cover;
    background-repeat: no-repeat
}

@media(max-width:768px) {
    .card-body {
        padding: 0 1rem 1rem 1rem;
        background-image: url("https://i.imgur.com/4bg1e6u.jpg");
        background-size: cover;
        background-repeat: no-repeat
    }

    .card-top {
        padding: 0.7rem 1rem
    }
}

.row {
    margin: 0
}

.upper {
    padding: 1rem 0;
    justify-content: space-evenly
}

#three {
    border-radius: 1rem;
    width: 22px;
    height: 22px;
    margin-right: 3px;
    border: 1px solid blue;
    text-align: center;
    display: inline-block
}

#payment {
    margin: 0;
    color: blue
}

.icons {
    margin-left: auto
}

form span {
    color: rgb(179, 179, 179)
}

form {
    padding: 2vh 0
}

input {
    border: 1px solid rgba(0, 0, 0, 0.137);
    padding: 1vh;
    margin-bottom: 4vh;
    outline: none;
    width: 100%;
    background-color: rgb(247, 247, 247)
}

input:focus::-webkit-input-placeholder {
    color: transparent
}

.header {
    font-size: 1.5rem
}

.left {
    background-color: #ffffff;
    padding: 2vh
}

.left img {
    width: 2rem
}

.left .col-4 {
    padding-left: 0
}

.right .item {
    padding: 0.3rem 0
}

.right {
    background-color: #ffffff;
    padding: 2vh
}

.col-8 {
    padding: 0 1vh
}

.lower {
    line-height: 2
}

.btn {
    background-color: rgb(23, 4, 189);
    border-color: rgb(23, 4, 189);
    color: white;
    width: 100%;
    font-size: 0.7rem;
    margin: 4vh 0 1.5vh 0;
    padding: 1.5vh;
    border-radius: 0
}

.btn:focus {
    box-shadow: none;
    outline: none;
    box-shadow: none;
    color: white;
    -webkit-box-shadow: none;
    -webkit-user-select: none;
    transition: none
}

.btn:hover {
    color: white
}

a {
    color: black
}

a:hover {
    color: black;
    text-decoration: none
}

input[type=checkbox] {
    width: unset;
    margin-bottom: unset
}

#cvv {
    background-image: linear-gradient(to left, rgba(255, 255, 255, 0.575), rgba(255, 255, 255, 0.541)), url("https://img.icons8.com/material-outlined/24/000000/help.png");
    background-repeat: no-repeat;
    background-position-x: 95%;
    background-position-y: center
}

#cvv:hover {}

.btn.btn-primary {
    background-color: #48b83e;
    color: #fff;
    border: 1px solid #008000;
    border-radius: 10px;
    font-weight: 800
}

.btn.btn-primary:hover {
    background-color: #48b83ee8
}
.btn.btn-success {
    background-color: #48b83e;
    color: #fff;
    border: 1px solid #008000;
    border-radius: 10px;
    font-weight: 800;
}

.btn.btn-success:hover {
    background-color: #48b83ee8;
}
</style>
<title>Pay </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="card">
    <div class="card-top border-bottom text-center"> <a href="<?php echo $server_root.'/vegetable/index.php'?>"> Back to shop</a> <span id="logo">Payment Information</span> </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="row"> <span class="header">Payments</span>
                        <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                    </div>      
                    <div class="float-right"><a href="#">Edit address information</a></div>
                    <form method="POST" action="saveorder.php"> 
                        <span>Full name:</span> <input class="form-control" value="<?php echo $_SESSION['Fullname'] ?>" readonly>
                        <div class="row">
                            <div class="col-7"><span>Email:</span> <input class="form-control" value="<?php echo $_SESSION['Email'] ?>" readonly></div>
                            <div class="col-5"><span>Phone:</span> <input class="form-control" value="<?php echo $_SESSION['Phone'] ?>" readonly> </div>
                        </div> 
                        <div class="row">
                        <div class="col-12">
                            <span>Address:</span> 
                            <input class="form-control" name="Address" value="<?php echo $_SESSION['Address'] ?>">
                         </div>

                            <div class="col-12">
                                <span>Payment Methods:</span>
                                <select id="payments" name="Payments" class="form-control">    
                                    <option value="Cash">Pay Cash After Receive</option>
                                    <option value="Credit Card/Debit Card">Credit Card/Debit Card</option>
                                </select>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-12">
                                <span>Note:</span>
                                <textarea name="Note" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="right border">
                    <div class="header">Order Summary</div>
                    <p><?php echo $_SESSION['stt'].' items' ?></p>
                    <?php
                        $server_root = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://'.$_SERVER['SERVER_NAME'].'/vegetablestore';
                        foreach ($_SESSION['cart'] as $product) {
                            echo '<div class="row item">
                                    <div class="col-4 align-self-center"><img class="img-fluid" src="'.$server_root.'/'.$product['Image'].'"></div>
                                    <div class="col-8">
                                        <div class="row"><b>'.number_format($product['Price']).' VND</b></div>
                                        <div class="row text-muted">'.$product['VegetableName'].'</div>
                                        <div class="row">Quantity: '.$product['Quantity'].'</div>
                                    </div>
                                </div>';
                        }
                    ?>
                 
                    <hr>
                    <div class="row lower">
                        <div class="col text-left">Subtotal</div>
                        <div class="col text-right"><?php echo number_format($_SESSION['count_price']).' VND' ?></div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left">Delivery</div>
                        <div class="col text-right">Free</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><b>Total to pay</b></div>
                        <div class="col text-right"><b><?php echo number_format($_SESSION['count_price']).' VND' ?></b></div>
                    </div>
                    <div class="row lower">
                    </div> <button type="submit" class="btn btn-success">Pay Now</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div> </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<?php 
    } else {
        echo "<script>alert('You need to login before ordering !')
            window.location ='../customer/login.php'</script>";
    }
?>
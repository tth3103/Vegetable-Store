<?php
  session_start();
  require_once($_SERVER['DOCUMENT_ROOT'].'/vegetablestore/menu.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/vegetablestore/class/vegetable.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/vegetablestore/class/category.php');
  $server_root = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://'.$_SERVER['SERVER_NAME'].'/vegetablestore';
  $classCategory = new category();
  $classVegetable = new vegetable();

?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif
}

.wrapper {
    padding: 30px;
    max-width: 1200px;
    margin: auto
}

.h3 {
    font-weight: 900
}

.views {
    font-size: 0.85rem
}

.btn {
    color: #666;
    font-size: 0.85rem
}

.btn:hover {
    color: #61b15a
}

.green-label {
    background-color: #defadb;
    color: #48b83e;
    border-radius: 5px;
    font-size: 0.8rem;
    margin: 0 3px
}

.radio,
.checkbox {
    padding: 6px 10px
}

.border {
    border-radius: 12px
}

.options {
    position: relative;
    padding-left: 25px
}

.radio label,
.checkbox label {
    display: block;
    font-size: 14px;
    cursor: pointer;
    margin: 0
}

.options input {
    opacity: 0
}

.checkmark {
    position: absolute;
    top: 0px;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    border-radius: 50%
}

.options input:checked~.checkmark:after {
    display: block
}

.options .checkmark:after {
    content: "";
    width: 9px;
    height: 9px;
    display: block;
    background: white;
    position: absolute;
    top: 52%;
    left: 51%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark {
    background: #61b15a;
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
}

.count {
    font-size: 0.8rem
}

label {
    cursor: pointer
}

.tick {
    display: block;
    position: relative;
    padding-left: 23px;
    cursor: pointer;
    font-size: 0.8rem;
    margin: 0
}

.tick input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0
}

.check {
    position: absolute;
    top: 1px;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #f8f8f8;
    border: 1px solid #ddd;
    border-radius: 3px
}

.tick:hover input~.check {
    background-color: #f3f3f3
}

.tick input:checked~.check {
    background-color: #61b15a
}

.check:after {
    content: "";
    position: absolute;
    display: none
}

.tick input:checked~.check:after {
    display: block;
    transform: rotate(45deg) scale(1)
}

.tick .check:after {
    left: 6px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg) scale(2)
}

#country {
    font-size: 0.8rem;
    border: none;
    border-left: 1px solid #ccc;
    padding: 0px 10px;
    outline: none;
    font-weight: 900
}

.close {
    font-size: 1.2rem
}

div.text-muted {
    font-size: 0.85rem
}

#sidebar {
    width: 25%;
    float: left
}

.category {
    font-size: 0.9rem;
    cursor: pointer
}

.list-group-item {
    border: none;
    padding: 0.3rem 0.4rem 0.3rem 0rem
}

.badge-primary {
    background-color: #defadb;
    color: #48b83e
}

.brand .check {
    background-color: #fff;
    top: 3px;
    border: 1px solid #666
}

.brand .tick {
    font-size: 1rem;
    padding-left: 25px
}

.rating .check {
    background-color: #fff;
    border: 1px solid #666;
    top: 0
}

.rating .tick {
    font-size: 0.9rem;
    padding-left: 25px
}

.rating .fas.fa-star {
    color: #ffbb00;
    padding: 0px 3px
}

.brand .tick:hover input~.check,
.rating .tick:hover input~.check {
    background-color: #f9f9f9
}

.brand .tick input:checked~.check,
.rating .tick input:checked~.check {
    background-color: #61b15a
}

#products {
    width: 75%;
    padding-left: 30px;
    margin: 0;
    float: right
}

.card:hover {
    transform: scale(1.1);
    transition: all 0.5s ease-in-out;
    cursor: pointer
}

.card-body {
    padding: 0.5rem
}

.card-body .description {
    font-size: 0.78rem;
    padding-bottom: 8px
}

div.h6,
h6 {
    margin: 0
}

.product .fa-star {
    font-size: 0.9rem
}

.rebate {
    font-size: 0.9rem
}

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

img {
    width: 192px;
    height: 132px;
    object-fit: contain
}

.clear {
    clear: both
}

.btn.btn-success {
    visibility: hidden
}

@media(min-width:992px) {

    .filter,
    #mobile-filter {
        display: none
    }
}

@media(min-width:768px) and (max-width:991px) {

    .radio,
    .checkbox {
        padding: 6px 10px;
        width: 49%;
        float: left;
        margin: 5px 5px 5px 0px
    }

    .filter,
    #mobile-filter {
        display: none
    }
}

@media(min-width:576px) and (max-width:767px) {
    #sidebar {
        width: 35%
    }

    #products {
        width: 65%
    }

    .filter,
    #mobile-filter {
        display: none
    }

    .h3+.ml-auto {
        margin: 0
    }
}

@media(max-width:575px) {
    .wrapper {
        padding: 10px
    }

    .h3 {
        font-size: 1.3rem
    }

    #sidebar {
        display: none
    }

    #products {
        width: 100%;
        float: none
    }

    #products {
        padding: 0
    }

    .clear {
        float: left;
        width: 80%
    }

    .btn.btn-success {
        visibility: visible;
        margin: 10px 0px;
        color: #fff;
        padding: 0.2rem 0.1rem;
        width: 20%
    }

    .green-label {
        width: 50%
    }

    .btn.text-success {
        padding: 0
    }

    .content,
    #mobile-filter {
        clear: both
    }
}
</style>
<html>
<head>
    <title>Shop</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="../css/style.css">
    
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css	">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="wrapper">
    <div class="d-md-flex align-items-md-center">
        <div class="h3">Products</div>
        <div class="form-inline ml-auto">
          <input type="text" style="font-size: 100%" placeholder="What do yo u need?">&nbsp;&nbsp;
        <button type="button" class="btn btn-primary">Search</button>
        </div>    
        <div class="ml-auto d-flex align-items-center views"> <span class="btn text-success"> <span class="fas fa-th px-md-2 px-1"></span><span>Grid view</span> </span> <span class="btn"> <span class="fas fa-list-ul"></span><span class="px-md-2 px-1">List view</span> </span> <span class="green-label px-md-2 px-1"><?php $result_count = $classVegetable->countAll(); foreach ($result_count as $vegetable){ echo $vegetable['COUNT(*)']; }?></span> <span class="text-muted">Vegetables</span> </div>
    </div>

  
 
    <div class="content py-md-0 py-3">
        <section id="sidebar">
            <div class="py-3">
                <h5 class="font-weight-bold">Categories</h5>
                <ul class="list-group">
                    <?php 
                      $result_category = $classCategory->executeResult("SELECT * FROM `category`");
                      foreach ($result_category as $category) {
                          if ($category['Hidden'] == "no") {
                        $result_count_category = $classCategory->countVgtOfCategory($category['CategoryID']);
                        foreach ($result_count_category as $count_vgt_of_category) {
                    ?>
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category"> <?php echo $category['CategoryName'] ?> <span class="badge badge-primary badge-pill"> <?php echo $count_vgt_of_category['COUNT(*)'] ?></span> </li>
                    <?php } } } ?> 
                </ul>
            </div>
        </section> <!-- Products Section -->
        <section id="products">
            <div class="container py-3">
                <div class="row">
                    <?php 
                      $result_vegetable = $classVegetable->getAll();
                      foreach ($result_vegetable as $vegetable):
                        if ($vegetable['Hidden'] == "no") {
                            if ($vegetable['Amount'] == "0") {
                                $result = $classVegetable->setStatus("Sold out",$vegetable['VegetableID']);
                                $text ="Sold out";
                            } else $text = "";
                        
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-4 pt-4">
                        <div class="card"> <img class="card-img-top" src="<?php echo $server_root.'/'.$vegetable['Image'] ?>">
                            <div class="card-body">
                                <h6 class="font-weight-bold pt-1"><?php echo $vegetable['VegetableName'] ?></h6>
                                <span class="badge badge-danger" style="font-size:13px"><?= $text ?></span>
                                <div class="d-flex align-items-center justify-content-between pt-3">
                                    <div class="d-flex flex-column">
                                        <div class="h6 font-weight-bold"><?php echo number_format($vegetable['Price']).' VND/'.$vegetable['Unit'] ?></div>
                                    </div>
                                </div>
                                <div><form method="POST" action="../cart/index.php"></div>
                                  <input type="hidden" name="VegetableID" value="<?php echo $vegetable['VegetableID'] ?>">
                                  <button class="btn btn-primary" style="font-size: 12px">Add To Cart</button>
                                </form>
                                <button class="btn btn-primary"style="font-size: 12px">View Details</button>
                            </div>
                        </div>
                    </div>
                    <?php } endforeach; ?>
                   
              
              </div>
          </div>
      </section>
    </div>
</div>
<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

$products = $conn->query("select * from cart where user_id ='$_SESSION[user_id]'");
$products->execute();

$allproducts = $products->fetchAll(PDO::FETCH_OBJ);


?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Checkout
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7">
                        <h5 class="mb-3">BILLING DETAILS</h5>
                        <!-- Bill Detail of the Page -->
                        <form action="#" class="bill-detail">
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" placeholder="Name" type="text">
                                    </div>
                                    <div class="col">
                                        <input class="form-control" placeholder="Last Name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Company Name" type="text">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Town / City" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="State / Country" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Postcode / Zip" type="text">
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" placeholder="Email Address" type="email">
                                    </div>
                                    <div class="col">
                                        <input class="form-control" placeholder="Phone Number" type="tel">
                                    </div>
                                </div>
                              
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Order Notes"></textarea>
                                </div>
                            </fieldset>
                        </form>
                        <!-- Bill Detail of the Page end -->
                    </div>
                    <div class="col-xs-12 col-sm-5">
                        <div class="holder">
                            <h5 class="mb-3">YOUR ORDER</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php foreach ($allproducts as $products): ?>
                                        <tr>
                                            <td>
                                                 <?php echo $products->pro_title; ?> x  <?php echo $products->pro_qty; ?>
                                            </td>
                                            <td class="text-right">
                                              USD  <?php echo $products->pro_price; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <td>
                                                <strong>Cart Subtotal</strong>
                                            </td>
                                            <td class="text-right">
                                                 <?php if(isset($_SESSION['saleprice'])) : ?>
                                                USD <?php echo $_SESSION['saleprice']; ?>
                                            <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Shipping</strong>
                                            </td>
                                            <td class="text-right">
                                               USD 20
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>ORDER TOTAL</strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>USD <?php echo $_SESSION['saleprice'] + 20; ?></strong>
                                            </td>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>

                         
                        </div>
                        <p class="text-right mt-3">
                            <input checked="" type="checkbox"> I’ve read &amp; accept the <a href="#">terms &amp; conditions</a>
                        </p>
                        <a href="#" class="btn btn-primary float-right">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>
                        <div class="clearfix">
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php require "../includes/footer.php"; ?>

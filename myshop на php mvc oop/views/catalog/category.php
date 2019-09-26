<?php include ROOT. '/views/layouts/header.php'; ?>


        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">
                            
                                                                                    
                                <?php foreach($categories as $categoryItem):?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="/category/<?php echo $categoryItem['id'];?>"  class="<?php if($categoryItem['id']==$categoryId) echo 'active'; ?>"> <?php echo $categoryItem['name'];?></a></h4>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                
                             
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            
                          
                              <?php foreach($categoryProducts as $product):?>
                            <div class="col-sm-4">
                                                      
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo Product::getImage($product['id']); ?>" alt="" /> <br /> <br /> 
                                            <a href="/product/<?php echo $product['id']; ?>">
                                            <?php echo $product['name']; ?>
                                                </a>
                                                <h3><?php echo $product['price']; ?> руб.</h3> 
                                            
                                            
                                            
                                            <a href="/cart/add/<?php echo $product['id']; ?>" class="btn btn-default add-to-cart" ><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if($product['is_new']): ?>
                                    
                                        <img src="/images/home/new.png" class="new" alt="" />
                                        <?endif;?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>                            
                           
                                <!-- Постраничная навигация -->
                    <?php echo $pagination->get(); ?>

                        </div><!--features_items-->

                       

                    </div>
                </div>
            </div>
        </section>

       
<?php include ROOT. '/views/layouts/footer.php'; ?>



        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/price-range.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
<?php $readuser = $this->request->session()->read('Auth.User')?>
<style type="text/css">
    
</style>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60"></div>
            <div>
                <div class=" col-sm-12">
                    <div class="col-sm-3 abcde" >
                            <div class="space50">&nbsp;</div>
                        <h4>Danh Mục bánh</h4>
                        <ul class="aside-menu primary-nav">
                            <?php foreach ($typeproducts as $type) { ?>
                            <li>
                                <a href="\cakecosy/typeProduct/<?php echo $type->id ?>"><?php echo $type->name ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                        <div class="space60">&nbsp;</div>
                        <h4>Sản phẩm Theo giá</h4>
                        <ul class="aside-menu primary-nav">
                            <li><a href="\cakecosy/viewMoreProduct/11">Sản phẩm khuyến mãi</a></li>
                            <li><a href="\cakecosy/viewMoreProduct/80000">Bánh dưới 100,000đ</a></li>
                            <li><a href="\cakecosy/viewMoreProduct/180000">Bánh từ 100,000đ- 200,000đ</a></li>
                            <li><a href="\cakecosy/viewMoreProduct/280000">Bánh từ 200,000d - 300,000đ</a></li>
                            <li><a href="\cakecosy/viewMoreProduct/310000">Bánh từ 300,000đ</a></li>
                        </ul>
                    </div>
                    <div class="beta-products-list col-sm-6 ">
                        <div class="space60">&nbsp;</div>
                        <div >     
                                <div style="float:left;">
                                    <div >
                                        <a  href=""><?php echo $getnews['author'] ?></a>
                                    </div>
                                    <div >          
                                            <i class="fa fa-mobile"></i>
                                        <span > <?php echo date_format($getnews['created_at'],'d/m/Y H:i:s') ?></span>
                                    </div>
                                </div>
                           <div class="clearfix"></div>
                           <div class="space10">&nbsp;</div>
                            <div >
                                <a href="" ><?php echo $getnews['title'] ?></a>
                                <div class="space10">&nbsp;</div>
                                <div>
                                    <span><?php echo $getnews['content'] ?></span><a href="">Xem thêm</a>
                                </div>
                            </div>
                             <div class="space10">&nbsp;</div>
                            <div>
                                <?php foreach ($image as $key) { ?>
                                    <div class="single-item col-sm-6" style="display: inline-block;">
                                        <div class="single-item-header abc">
                                            <img style="border-radius: 10px;" src="<?php echo '/cakecosy/'.$key->image ?> " >
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>  
                    <div class="col-xs-3 col-sm-3 aside  abcde" style="float: right;padding-top: 50px;">
                        <div class="widget">
                            <h3 class="widget-title">Sản Phẩm Nhiều Người Mua Nhất</h3>
                            <div class="widget-body">
                                <div class="beta-sales beta-lists">
                                    <?php foreach($product_sale as $new): ?> 
                                        <div class="media beta-sales-item">
                                            <a class="pull-left" href="\cakecosy/detailProduct/<?php echo $new->id ?>"><img src="<?php echo '/cakecosy/'.$new['image'] ?>" height="250px" ></a>
                                            <div class="media-body">
                                                <span class="beta-sales"><?php echo $new['name'] ?> </span>
                                                <br>
                                                <span class="flash-sale"><?php echo $new['unit_price'] ?> đồng</span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div> <!-- best sellers widget -->
                        <!-- best sellers widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



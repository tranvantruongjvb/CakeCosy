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
                        <div class="space50">&nbsp;</div>
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
                        <div> 
                                <div >
                                    <div >
                                        <b style="color: #337ab7"><?php echo $getnews['author'] ?></b>
                                    </div>
                                    <div >          
                                            <i class="fa fa-mobile"></i>
                                        <span > <?php echo date_format($getnews['created_at'],'d/m/Y H:i:s') ?></span>
                                        <br>
                                        <?php if($readuser['permission'] >=2) {?>
                                        <a href="\cakecosy/editNews/<?php echo $getnews['id'] ?>">Chỉnh sửa bài viết</a>
                                        <?php } ?>
                                    </div>
                                </div>
                               <div class="clearfix"></div>
                               <div class="space10">&nbsp;</div>
                                <div >
                                    <h3 style="color: #337ab7"><?php echo $getnews['title'] ?></h3>
                                    <div class="space10">&nbsp;</div>
                                    <div>
                                        <span><?php echo $getnews['content'] ?></span>
                                    </div>
                                    <div class="space20">&nbsp;</div>
                                    <h2 class="contact-title">Liên hệ để đặt bánh</h3>
                                    <p>Điện thoại: 0978 172 195, Email: tranvantruong.jvb@gmail.com.vn,</p>
                                    <p>Website: www.CakeFood.vn</p>
                                </div>
                             <div class="space20">&nbsp;</div>
                             <p>Hình ảnh: <br></p>
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
                          <div class="clearfix"></div>
                               <div class="space10">&nbsp;</div>
                        <div class="woocommerce-tabs">
                            <ul class="tabs">
                                <li><a href="#tab-description">Bình luận</a></li>
                            </ul>
                            <div class="panel" id="tab-description">
                                <form id="myForm" method="post" action="\cakecosy/news/addComment/<?php echo $getnews['id']?>">
                                    <?php if (count($comments)==0) { ?>
                                        <p>Chưa có bình luận nào. Hãy đăng nhập để bình luận</p>
                                    <?php } ?>
                                    <?php foreach ($comments as $key) {?>
                                        <div style="border-radius: 5px;border: 1px solid #FFCC33;">
                                            <p style="color: #f90; font-size: 15px;">&nbsp;&nbsp;<?php echo $key['email'] ?></p>
                                            <?php if($readuser['permission'] >=2) {?>
                                            <a class="pull-right" style=" width: 5px; padding-right: 20px;" href="\cakecosy/news/deleteComment/<?php echo $key['id'] ?>"><i class="fa fa-times"></i></a>
                                            <?php } ?>
                                            <p>&nbsp;&nbsp;<?php echo $key['comment']?> </p>
                                            <p style="font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date_format($key['created_at'],'d/m/Y H:i:s')?></p>
                                        </div>
                                        <div class="space5">&nbsp;&nbsp;</div>
                                    <?php } ?>
                                    <div class="clearfix"></div>
                                        <div>
                                            <ul class="pagination">
                                                <li> <?=  $this->Paginator->numbers(array('class'=> 'pagination_link')); ?></li>
                                            </ul>
                                        </div>
                                    <div class="panel" id="tab-description">
                                        <?php if(!$readuser) {?>
                                                <span>
                                                    <a class="beta-btn primary" href="\cakecosy/login">Đăng nhập để bình luận</a>
                                                </span>
                                        <?php }else {?>
                                                <span>
                                                    <input type="text" name="comment" id="comment" placeholder="Bình để bình luận">
                                                    <button type="submit" class="beta-btn primary" onclick="cm()"> Bình luận</button>
                                                </span>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>  
                    <div class="col-xs-3 col-sm-3 aside  abcde" style="float: right;padding-top: 50px;">
                        <div class="widget">
                            <h3 class="widget-title" style="color: #f90">Sản Phẩm Nhiều Người Mua Nhất</h3>
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

<script type="text/javascript">
   $(document).ready(function() {
        $("#myForm").validate(
        {
            rules: {
                comment: "required",
            },
            messages: {
                comment: "Bạn chưa bình luận gì cho bài viết",
            }
        }); 
    });   
</script>

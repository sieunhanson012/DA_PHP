<?php 
	if(isset($_GET['id']) && $_GET['id']>0){
		$id=$_GET['id'];
		clsDataBase::openConnect();
		$data_sanpham=clsSanPham::LaySanPhamTheoId($_GET['id']);
		$data_kichco=clsSanPham::LayKichCoTheoSanPham($_GET['id']);
		if(isset($_POST['dangbinhluan']) && $_POST['noidungbinhluan']!="" ){
			if(clsTaiKhoan::ThemBinhLuan($_SESSION['ma_tai_khoan'],$_POST['noidungbinhluan'])){
				
			}

		}


		clsDataBase::closeConnect();



	}else{
		echo "<script>window.location.href='?page=404.php'</script>";
	}

 ?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php 
						include_once('danh-muc.php');
					 ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="../components/user/images/product-details/1.jpg" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="../components/user/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../components/user/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../components/user/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="../components/user/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../components/user/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../components/user/images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="../components/user/images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="../components/user/images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="../components/user/images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="../components/user/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?=$data_sanpham['ten_san_pham']?></h2>
								<p>Thương hiệu : <?=$data_sanpham['ten_hang_sx']?></p>
								<img src="../components/user/images/product-details/rating.png" alt="" />
								<span>
									<span><?= number_format($data_sanpham['gia_ban'])?> VNĐ</span>
									<label>Số lượng:</label>
									<input id="soluong" type="number" value="1" />
									<a type="btn" href="javascript:ThemVaoGioHang();" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ
									</a>
								</span>
								<p><b>Loại : <?=$data_sanpham['ten_loai']?></b></p>
								<p><b>Kích cỡ : <?=$data_kichco[0]['kich_co']?></p> 
							
								<p><b>Chất liệu:</b> <?=$data_sanpham['chat_lieu']?></p>
								<p><b>Màu : <?=$data_sanpham['ten_mau']?></p> 
								<a href=""><img src="../components/user/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<script type="text/javascript">
						function ThemVaoGioHang(){
							var id="<?= $id?>";
							var soluong = $("#soluong").val();

							$.post("xuly_code/xuly_themgiohang.php",
							{
								"ThaoTac":"ThemVaoGioHang",
								"ID":id,
								"SoLuong":soluong,
							},
							function(data,status){
								if(data=="thanh cong"){
									alertify.success('Đã thêm sản phẩm vào giỏ hàng');
								}else{
									if(data=="khong du san pham"){
										alertify.error('Không đủ số lượng');
									}else{
										alertify.error('không có sản phẩm này');
									}
								}
							}
							);
						}

					</script>

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../components/user/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../components/user/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../components/user/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../components/user/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../components/user/images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../components/user/images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../components/user/images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="../components/user/images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							
							<div class="tab-pane fade active in" id="reviews">
								<div class="col-sm-12">
									<?php 
											if(isset($_SESSION['ten_dang_nhap'])){
												date_default_timezone_set('Asia/Ho_Chi_Minh');

												?>
									<ul>
										<li><a href=""><i class="fa fa-user"></i><?=$_SESSION['ten_dang_nhap']?></a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?=date('H:i:s')?></a></li> 
										<li><a href=""><i class="fa fa-calendar-o"></i><?=date('d-m-Y')?></a></li>
									</ul>
									
									
									
									<form action="#" method="POST">
										
													<p><b>Viết bình luận</b></p>
													
													<textarea name="noidungbinhluan" ></textarea>
													<b>Rating: </b> <img src="../components/user/images/product-details/rating.png" alt="" />
													<button type="submit" name="dangbinhluan" class="btn btn-default pull-right">
														Đăng bình luận
													</button>
												<?php
											}else{
												echo "<p>Vui lòng đăng nhập để bình luận</p>";
											}
										 ?>
										
									</form>
								</div>
								<?php 

								 ?>
								<ul>
										<li><a href=""><i class="fa fa-user"></i>admin</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>10:35:20</a></li> 
										<li><a href=""><i class="fa fa-calendar-o"></i>09-12-2017</a></li>
								</ul>

							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../components/user/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../components/user/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../components/user/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../components/user/images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../components/user/images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../components/user/images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>

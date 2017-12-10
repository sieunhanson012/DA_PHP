<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="?page=trang-chu.php">Home</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiên</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

						<?php 

							if(isset($_SESSION["Gio_Hang"])){
								
								foreach ($_SESSION["Gio_Hang"] as $key => $rows) {
									
									?>
										<tr id="bangsanpham_<?=$rows['masanpham']?>">
											<td class="cart_product">
												<a href=""><img style="max-width: 100px;height: auto;" src="../images/<?=$rows['hinhanh']?>" alt=""></a>
											</td>
											<td class="cart_description">
												<h4><a href="?page=chi-tiet-san-pham.php&&id=<?=$rows['masanpham']?>"><?=$rows['tensanpham']?></a></h4>
												<p><?=$rows['loaisanpham']?></p>
											</td>
											<td class="cart_price">
												<p><?= number_format($rows['gia'])?> VNĐ</p>
											</td>
											<td class="cart_quantity">
												<div class="cart_quantity_button">
												
													<input class="cart_quantity_input" style="max-width: 50px;" type="number" name="quantity" value="<?=$rows['soluong']?>" autocomplete="off" size="2">
													
												</div>
											</td>
											<td class="cart_total">
												<p class="cart_total_price"><?= number_format($rows['tongtien'])?> VNĐ</p>
											</td>
											<td class="cart_delete">
												<a class="cart_quantity_delete btn" onclick="XoaSanPhamTrongGioHang(<?=$rows['masanpham']?>)"><i class="fa fa-times"></i></a>
											</td>
										</tr>
									<?php
								}
							}else{
								?>
								<tr>
											<td class="cart_product">
												
											</td>
											<td class="cart_description">
												<h4><a href="">Chưa có sản phẩm nào</a></h4>
												
											</td>
											<td class="cart_price">
											
											</td>
											<td class="cart_quantity">
												
											</td>
											<td class="cart_total">
												
											</td>
											<td class="cart_delete">
												
											</td>
										</tr>
								
							<?php
							}
							
						 ?>
						

						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				
				<p>Chọn nếu bạn có mã giảm giá hoặc điểm thưởng mà bạn muốn sử dụng hoặc muốn ước tính chi phí giao hàng của bạn.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Tổng giá tiền : <span class="tongtientronggiohang">$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<script type="text/javascript">
		function XoaSanPhamTrongGioHang(Id){
			$.post("xuly_code/xuly_themgiohang.php",{
				"ThaoTac":"XoaSanPhamTrongGioHang",
				"ID":Id,
				
			},function(data,status){
				if(data=="xoa thanh cong"){
					$("#bangsanpham_"+Id+"").remove();
					alertify.success('Đã xoa sản phẩm khỏi giỏ hàng');
				}
			});
		};
		$(document).ready(function(){
			

		});
	</script>
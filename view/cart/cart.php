	<main class="bg_gray">
		<div class="container margin_30">
			<div class="page_header">
				<div class="breadcrumbs">
					<ul>
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="index.php?act=cart">Giỏ hàng</a></li>
					</ul>
				</div>
				<h1>Giỏ hàng</h1>
			</div>
			<!-- /page_header -->
			<?php if (!empty($cart_info)) { ?>
			<table class="table table-striped cart-list">
				<thead>
					<tr>
						<th>
							Sản phẩm
						</th>
						<th>
							Size
						</th>
						<th>
							Giá
						</th>
						<th>
							Số lượng
						</th>
						<th>
							Tổng tiền
						</th>
						<th>

						</th>
					</tr>
				</thead>
				<tbody>
						<?php 
						foreach ($cart_info as $cart) : ?>
							<tr>
								<td>
									<div class="thumb_cart">
										<img src="upload/<?= $cart['img_name'] ?>" data-src="upload/<?= $cart['img_name'] ?>" class="lazy" alt="Image">
									</div>
									<span class="item_cart"><?= $cart['product_name'] ?></span>
								</td>
								<td>
									<strong><?= $cart['product_size'] ?></strong>
								</td>
								<td>
									<strong><?= number_format($cart['product_price'], 0, ',', '.') . ' đ' ?></strong>
								</td>
								<td>
									<div class="numbers-row">
										<input type="number" onchange="return confirm('ahihi')" value="<?= $cart['product_quantity'] ?>" id="quantity_1" class="quantity" name="quantity_1">
										<div class="inc button_inc">+</div>
										<div class="dec button_inc">-</div>
									</div>
								</td>
								<td>
									<strong class="price"><?= number_format($cart['total'], 0, ',', '.') . ' đ' ?></strong>
								</td>
								<td class="options">
									<a href="index.php?act=xoasp&id=<?= $cart['cart_detail_id'] ?>"><i class="ti-trash"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
				</tbody>
			</table>

			<div class="row add_top_30 flex-sm-row-reverse cart_actions">
				<div class="col-sm-4 text-end">
					<button type="button" class="btn_1 gray">Update Cart</button>
				</div>
			</div>
			<!-- /cart_actions -->

		</div>
		<!-- /container -->

		<div class="box_cart">
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-xl-4 col-lg-4 col-md-6">
						<ul>
							<li>
								<span>Tổng tiền</span> <?= number_format($total['tongtien'], 0, ',', '.') . ' đ' ?>
							</li>
						</ul>
						<a href="cart-2.html" class="btn_1 full-width cart">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->
	<?php } else { ?>
		<div style="height: 500px;" class="d-flex justify-content-center align-items-center text-center"><p>Không có sản phẩm trong giỏ hàng</p></div>
	<?php } ?>

	</main>
	<!--/main-->
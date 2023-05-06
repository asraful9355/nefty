<!--start quick view product-->
<!-- Modal -->
<div class="modal fade" id="QuickViewProduct">
	<div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
		<div class="modal-content bg-dark-4 rounded-0 border-0">
			<div class="modal-body">
				<button type="button" class="btn-close float-end" data-bs-dismiss="modal" id="closeModel"></button>
				<div class="row g-0">
					<div class="col-12 col-lg-6">
						<div class="item">
							<img id="pimage" src="" class="img-fluid" alt="product image" />
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="product-info-section p-3">
							<h3 id="product_name" class="mt-3 mt-lg-0 mb-0"></h3>
							<!-- <div class="product-rating d-flex align-items-center mt-2">
								<div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
									<i class="bx bxs-star text-warning"></i>
									<i class="bx bxs-star text-warning"></i>
									<i class="bx bxs-star text-warning"></i>
									<i class="bx bxs-star text-light-4"></i>
								</div>
								<div class="ms-1">
									<p class="mb-0">(24 Ratings)</p>
								</div>
							</div> -->
							<div class="d-flex align-items-center mt-3 gap-2">
								<h4 class="mb-0" id="pprice">৳</h4>
								<h5 class="mb-0 text-decoration-line-through text-light-3" id="oldprice">৳</h5>
							</div>
							<!-- <div class="mt-3">
								<h6>Discription :</h6>
								<p class="mb-0" id="product_description"></p>
							</div> -->
							<dl class="row mt-3">
								<dt class="col-sm-3">Product Code:</dt>
								<dd class="col-sm-9" id="product_code"></dd>
								<dt class="col-sm-3">Category:</dt>
								<dd class="col-sm-9" id="pcategory"></dd>
								<dt class="col-sm-3">Brand:</dt>
								<dd class="col-sm-9" id="pbrand"></dd>
								<dt class="col-sm-3">Stock:</dt>
								<dd class="col-sm-9" id="pbrand">
									<span class="badge badge-pill badge-success" id="pavailable" style="background: green; color: white;">Available</span>
                                    <span class="badge badge-pill badge-danger" id="pstockout" style="background: red; color: white;">Stock Out</span>
								</dd>
							</dl>
							<div class="row row-cols-auto align-items-center mt-3">
								<div class="col-3">
									<label class="form-label">Quantity:</label>
									<a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="number" name="quantity" class="qty-val form-control" value="1" min="1" id="qty">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
								</div>
								<div class="row" id="attributes">
									<!-- <div class="col-6">
										<label class="form-label">Color</label>
										<select class="form-select form-select-sm" id="color">
											<option></option>
										</select>
									</div> -->
								</div>
							</div>
							<!--end row-->
							<div class="d-flex gap-2 mt-3">
								<input type="hidden" id="product_id">
                               	<input type="hidden" id="pname">
                                <input type="hidden" id="product_price">
                                <input type="hidden" id="discount_amount">
                                <input type="hidden" id="pfrom" value="modal">
                                <input type="hidden" id="pvarient" value="">
                                
								<a href="javascript:;" class="btn btn-white btn-ecomm" onclick="addToCart()" id="closeModel">
									<i class="bx bxs-cart-add"></i>Add to Cart
								</a>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
</div>
<!--end quick view product-->


<?php include "includes/header.php" ?>
		<!--header ends -->

		<!------------ضعي الكود هنا-------------->

		<div class="container fill_height">

			<div class="container py-5 payment">
				<!-- For demo purpose -->
				<div class="row x">
					<div class="col-lg-8 mx-auto text-center">
						<h1 class="display-6">طــريقـة الـدفـع </h1>
					</div>
				</div> <!-- End -->
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="card ">
							<div class="card-header">
								<div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
									<!-- Credit card form tabs -->
									<ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
										<li class="nav-item"> <a data-toggle="pill" href="#credit-card"
												class="nav-link active "> البطاقة الأتمانيـة</a> </li>
										<li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link ">
												الدفع عند الاستلام </a> </li>

									</ul>
								</div> <!-- End -->
								<!-- Credit card form content -->
								<div class="tab-content">
									<!-- credit card info-->
									<div id="credit-card" class="tab-pane fade show active pt-3">
										<form role="form" onsubmit="event.preventDefault()">
											<div class="form-group"> <label for="username">
													<h6>الاسم على البطاقة </h6>
												</label> <input type="text" name="username" placeholder="rana alharbi"
													required class="form-control "> </div>
											<div class="form-group"> <label for="cardNumber">
													<h6>رقم البطاقة</h6>
												</label>
												<div class="input-group"> <input type="text" name="cardNumber"
														placeholder="1111 2222 3333 4444" class="form-control "
														required>
													<div class="input-group-append"> <span
															class="input-group-text text-muted"> <img
																src="https://b.top4top.io/p_22406gqf61.png" width="60"
																height="25"> </span> </div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-8">
													<div class="form-group"> <label><span class="hidden-xs">
																<h6>صالح حتـى </h6>
															</span></label>
														<div class="input-group"> <input type="number" placeholder="شهر"
																name="" class="form-control" min="0" required> <input
																type="number" placeholder="السنة" name=""
																class="form-control" min="0" required> </div>
													</div>
												</div>
												<div class="col-sm-4">
													<div class="form-group mb-4"> <label data-toggle="tooltip"
															title="Three digit CV code on the back of your card">
															<h6>الرمز <i class="fa fa-question-circle d-inline"></i>
															</h6>
														</label> <input type="text" required class="form-control">
													</div>
												</div>
											</div>
											<div class="card-footer"> <button type="button"
													class="subscribe btn btn-block shadow-sm"> تأكيد الدفع </button>
										</form>
									</div>
								</div> <!-- End -->
								<!-- cash info -->
								<div id="paypal" class="tab-pane fade pt-3">

									<p> <button type="button" class="btn btn-primary "> تأكيد الطلب </button> </p>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<!------------الكود ينتهي هنا-------------->
	<!-- Footer starts -->

	<?php include "../includes/footer.php" ?>
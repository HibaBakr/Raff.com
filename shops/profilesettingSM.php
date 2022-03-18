<?php include "../includes/headerL2.php" ?>
		<!--header ends -->

		<!------------ضعي الكود هنا-------------->

		<div class="smProSet">
			<div class="ghbigset">
				<div class="ghbigset2">
					<h1 id="gh2">إعدادات الحساب <img src="../media/image/seetings.png" width="60px" height="60px"> </h1>

					<form id="gh">

						<div class="setgh2">
							<div class="ghcustom">
								<label>:المدينة<span>*</span></label><br>
								<select name="city" id="city" class="ghcustom" required>
									<option value="med">المدينة المنورة </option>
									<option value="jeddah">جدة </option>
									<option value="Riyadh">الرياض </option>
								</select>
							</div>
							<br>
							<div class="ghcustom">
								<label>:الفئة <span>*</span></label><br>
								<select name="category" id="category" class="ghcustom" required>
									<option value="food">طعام </option>
									<option value="gifts">هدايا </option>
									<option value="clothes">أزياء </option>
								</select>
							</div>

							<br>
							<div class="ghcustom">
								<label>:الشحن <span>*</span></label><br>
								<select name="shipping" id="shipping" class="ghcustom" required>
									<option value="fed">Fedex </option>
									<option value="dhl">DHL </option>

								</select>

							</div>
							<br>
							<div class="ghcustom">
								<label>:طرق الدفع <span>*</span></label><br>
								<select name="payment" id="payment" class="ghcustom" required>
									<option value="cash">الدفع عند الاستلام </option>
									<option value="way2">مدى </option>

								</select>

							</div><br>
							<div class="ghcustom">
								<label>:السياسة </label><br>
								<select name="policy" id="policy" class="ghcustom">
									<option value="policy1">سياسة الاسترجاع</option>
									<option value="policy2">سياسة الاستبدال </option>

								</select>

							</div>
							<br>

							<br>
							<div class="btn-blockgh">
								<button id="ghwhat" type="submit" href="/">حفظ </button>
							</div> <br>

						</div>
						<div class="setgh1">

							<div class="ghcustom">
								<label>:الاسم الأول <span>*</span></label> <br>
								<input type="text" class="ghcustom" required>
							</div> <br>
							<div class="ghcustom">
								<label>:الاسم الأخير <span>*</span></label> <br>
								<input type="text" class="ghcustom" required>
							</div> <br>
							<div class="ghcustom">
								<label>:رقم الجوال<span>*</span></label> <br>
								<input type="tel" id="phone" name="phone" placeholder="0557657986" pattern="[0-9]{10}"
									required>
							</div>
							<br>

							<div class="ghcustom">
								<label>:البريد الالكتروني <span>*</span></label> <br>
								<input type="email" id="email" name="email">
							</div> <br>
							<div class="ghcustom">
								<label for="lname"> :وصف السياسة </label><br>
								<textarea type="text" class="ghcustom"></textarea>
							</div>
						</div>
					</form>
				</div>

			</div>

		</div>






		<!------------الكود ينتهي هنا-------------->
<!-- Footer starts -->

<?php include "../includes/footerL2.php" ?>
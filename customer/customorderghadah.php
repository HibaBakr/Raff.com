<?php include "../includes/headerL2.php" ?>
		<!--header ends -->

		<!------------ضعي الكود هنا-------------->
<div class="customorder">
			<div class="ghbig">
				<div class="ghbig2">
					<h1 id="gh2"> أنشأ طلبك الخاص </h1>
					<form id="gh">

						<br>
						<div class="ghcustom">
							<div class="ghcustom">
								<label>: اسم الطلب <span>*</span></label> <br>
								<input type="text" class="ghcustom" required>
							</div>
							<br>
							<div class="ghcustom">
								<label>:تاريخ تسليم الطلب <span>*</span></label><br>
								<input type="date" class="ghcustom" required>
							</div>
							<br>
							<div class="ghcustom">
								<label>:السعر (قم باختيار أقصى قيمة تريدها)<span>*</span></label><br>
								<input type="number" class="ghcustom">
							</div>
							<br>
							<div class="ghcustom">
								<label>:فئة الطلب<span>*</span></label><br>
								<select name="category" id="category" class="ghcustom" required>
									<option value="food">طعام</option>
									<option value="gifts">هدايا</option>
									<option value="clothes">ألبسة</option>
								</select>
							</div>
							<br>

							<br>
							<div class="ghcustom">
								<label for="lname"> :إضافة وصف<span>*</span></label><br>
								<textarea type="text" class="ghcustom" required></textarea>
							</div>
							<div class="ghcustom"> <br>
								<label>:ارفق صورة<span></span></label><br>

								<label class="filebutton">
									<img src="../media/image/K1.png" width="50" height="50"></p>
									<span><input type="file" id="myfile" name="myfile" style="display: none;"
											class="ghcustom"></span>
								</label>
							</div>

							<div class="btn-blockgh">
								<button id="ghwhat" type="submit" href="/">نشر</button>
							</div>

					</form>
				</div>

			</div>

			<div class="ghbig3">
				<img src="../media/image/mp.jpg" ">
 </div>
 </div>
</div>    




<!------------الكود ينتهي هنا-------------->
<!-- Footer starts -->
<?php include "../includes/footerL2.php" ?>
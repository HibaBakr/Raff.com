<?php include "includes/headerAdmin.php"?>
<?php include "includes/sidebarAdmin.php"?>

<div class="main">
		<div class="container promotion">
			<form class="promo">

				<h2 style="margin: 3%; text-align: right;">تحديث قائمة العروض</h2>
				<div class="form-group">
					<label>نص العرض</label>
					<input class="form-control" type="text" placeholder="">
				</div>
				<div class="form-group">
					<label>اسم القسم</label>
					<input type="text" class="form-control">
					<small class="form-text text-muted">
						مثال: قسم العناية
					</small>
				</div>
				<div class="form-group">
					<label>رابط القسم</label>
					<input class="form-control" value="https://getbootstrap.com" type="url">
				</div>

				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">لون الخط</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" value="#563d7c" type="color">
					</div>
				</div>



				<div class="form-group">
					<label>صورة العرض</label>
					<input type="file" class="form-control-file form-control height-auto">
				</div>
				<div>
					<button type="submit" class="btn badge-light btn-lg" style="background-color: #C4A39B; margin-left: 1%;"> تحديث</button><button type="submit"
						class="btn badge-secondary btn-lg"> الغاء</button>
				</div>

			</form>

		</div>
		</div>

<?php include "includes/footerAdmin.php"?>
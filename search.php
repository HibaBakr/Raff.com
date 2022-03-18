<?php include "includes/header.php" ?>
<!--header ends -->


<div class="search-body">
<div class="container search-cont">
<div class="row">
  <!-- BEGIN SEARCH RESULT -->
  <div class="col-md-12">
    <div class="grid search">
      <div class="grid-body">
        <div class="row">
          <!-- BEGIN FILTERS -->
          <div class="col-md-3">
            <h2 class="grid-title"><i class="fa fa-filter"></i> تصفية</h2>
            <hr>
            
            <!-- BEGIN FILTER BY CATEGORY -->
            <h4>التصنيف</h4>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck">طعام</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> أزياء</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> عناية</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" class="icheck"> هدايا</label>
            </div>
            <!-- END FILTER BY CATEGORY -->
            
            <div class="padding"></div>
            

          </div>
          <!-- END FILTERS -->
          <!-- BEGIN RESULT -->
          <div class="col-md-9">
            <h2><i class="fa fa-file-o"></i> النتائج</h2>
            <hr>
            <!-- BEGIN SEARCH INPUT -->
            <div class="input-group">
              <input type="text" class="form-control" value="تمر">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div>
            <!-- END SEARCH INPUT -->
            <p>كل النتائج التي تطابق "تمر"</p>
            
            <div class="padding"></div>
            
            <div class="row">
            
            <!-- BEGIN TABLE RESULT -->
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody><tr>
                  <td class="number text-center">1</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/FF8C00" alt=""></td>
                  <td class="product"><strong>منتج 1</strong><br></td>

                  <td class="price text-right">350 ريال</td>
                </tr>
                <tr>
                  <td class="number text-center">2</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/5F9EA0" alt=""></td>
                  <td class="product"><strong>منتج 2</strong><br></td>
                  <td class="price text-right">1,000 ريال</td>
                </tr>
                <tr>
                  <td class="number text-center">3</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300" alt=""></td>
                  <td class="product"><strong>منتج 3</strong><br></td>
                  <td class="price text-right">550 ريال</td>
                </tr>
                <tr>
                  <td class="number text-center">4</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/8A2BE2" alt=""></td>
                  <td class="product"><strong>منتج 4</strong><br></td>

                  <td class="price text-right">330 ريال</td>
                </tr>
                <tr>
                  <td class="number text-center">5</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300" alt=""></td>
                  <td class="product"><strong>منتج 5</strong><br></td>

                  <td class="price text-right">540 ريال</td>
                </tr>
                <tr>
                  <td class="number text-center">6</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/6495ED" alt=""></td>
                  <td class="product"><strong>منتج 6</strong><br></td>

                  <td class="price text-right">870 ريال</td>
                </tr>
                <tr>
                  <td class="number text-center">7</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/DC143C" alt=""></td>
                  <td class="product"><strong>منتج 7</strong><br></td>

                  <td class="price text-right">620 ريال</td>
                </tr>
                <tr>
                  <td class="number text-center">8</td>
                  <td class="image"><img src="https://via.placeholder.com/400x300/9932CC" alt=""></td>
                  <td class="product"><strong>منتج 8</strong><br></td>

                  <td class="price text-right">550 ريال</td>
                </tr>
              </tbody></table>
            </div>
            <!-- END TABLE RESULT -->
            
            <!-- BEGIN PAGINATION -->
            <ul class="pagination" >
              <li class="disabled"><a href="#">«</a></li>
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
            </ul>
            <!-- END PAGINATION -->
          </div>
          <!-- END RESULT -->
        </div>
      </div>
    </div>
  </div>
  <!-- END SEARCH RESULT -->
</div>
</div>
</div>

<!-- Footer starts -->

<?php include "includes/footer.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    <!-- Navigation -->
    @include('includes.nav')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('storage/img/bg3.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>First Slide</h3>
                        <p>This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('storage/img/bg2.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('storage/img/bg1.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
        </div>
    </header>
    <!-- Page Content -->
    <div class="container">
        <h1 class="my-4">Sản phẩm mới nhất</h1>
        <!-- Marketing Icons Section -->
        <div class="row">
            @foreach ($idSanphamMoi as $id)
            <?php
                $sp = \App\Http\Controllers\ProductController::getProductByID($id->id);
            ?>
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
                        <img src="{{$sp->defaultImage}}" class="imgProduct">
                        <strong>{{ $sp->productName }}</strong>
                        <p>{{\App\Http\Controllers\PricelistController::getPriceByProductID($sp->id)}} VND</p>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->
        @foreach ($theloai as $tl)
        <div class="row spaceProduct">
            <div class="col-lg-3 dvTitlepd">
                <h3>{{$tl->categoryName}}</h3>
            </div>
            <div class="col-md-9 dvTitlehr"></div>
            <div class="row">
                 <?php
                    $sanphamList = \App\Http\Controllers\HomeController::showProductByCategory($tl->id);
                ?>
                    @foreach ($sanphamList as $spl)
                    <div class="col-lg-3">
                        <div class="dvproduct">
                            <a href="">
                                <img src="{{$spl->defaultImage}}" class="imgProduct">
                                <strong>{{$spl->productName}}</strong>
                                <p> {{\App\Http\Controllers\PricelistController::getPriceByProductID($spl->id)}} VND</p>
                            </a>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
        @endforeach
        <!-- Dòng có 4 sản phẩm 

        <div class="row spaceProduct">
            <div class="col-lg-3 dvTitlepd">
                <h3>Áo thun không cổ</h3>
            </div>
            <div class="col-md-9 dvTitlehr"></div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
        <img src="img/ts1.jpg" class="imgProduct">
        <strong>Renewable Energy tshirt</strong>
        <p>by Weenietees</p>
      </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
        <img src="img/ts5.jpg" class="imgProduct">
        <strong>Renewable Energy tshirt</strong>
        <p>by Weenietees</p>
      </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
      <img src="img/ts3.jpg" class="imgProduct">
      <strong>Renewable Energy tshirt</strong>
      <p>by Weenietees</p>
    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="dvproduct">
                    <a href="">
                        <div style="height: 255px">
                            <img src="img/ts4.jpg" class="imgProduct">
                        </div>
                        <div>
                            <strong>Renewable Energy tshirt</strong>
                            <p>by Weenietees</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        -->
        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>Chờ đếch gì nữa, đặt hàng nhanh và luôn</h2>
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li>
                        <strong>Bootstrap v4</strong>
                    </li>
                    <li>jQuery</li>
                    <li>Font Awesome</li>
                    <li>Working contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="storage/img/promotion_background.jpg" alt="">
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">Liên lạc ngay với chúng tôi</a>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- Footer -->
    @include('includes.footer')
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
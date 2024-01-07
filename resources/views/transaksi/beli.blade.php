<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('layout/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Jquery UI -->
  <link type="text/css" href="{{ asset('layout/plugins/jqueryui/jquery-ui.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('layout/css/main.css') }}">
  <title>Toko Sejahtera</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-white fixed-top py-4 shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="index.html">Indo<span>Toko</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="input-group mx-auto mt-5 mt-lg-0">
          <input type="text" class="form-control" placeholder="Mau cari apa?" aria-label="Mau cari apa?"
            aria-describedby="button-addon2">
          <button class="btn btn-outline-warning" type="button" id="button-addon2"><i class="bx bx-search"></i></button>
        </div>
        <ul class="navbar-nav ms-auto mt-3 mt-sm-0">
          <li class="nav-item me-3">
            <a class="nav-link active" href="#">
              <i class="bx bx-heart"></i>
              <span class="badge text-bg-warning rounded-circle position-absolute">2</span>
            </a>
          </li>
          <li class="nav-item me-5">
            <a class="nav-link" href="#">
              <i class="bx bx-cart-alt"></i>
              <span class="badge text-bg-warning rounded-circle position-absolute">3</span>
            </a>
          </li>
          <!-- mobile menu -->
          <div class="dropdown mt-3 d-lg-none">
            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1"
              data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Home</a></li>
              <li><a class="dropdown-item" href="#">Best Seller</a></li>
              <li><a class="dropdown-item" href="#">New Arrival</a></li>
              <li><a class="dropdown-item" href="#">Blog</a></li>
            </ul>
          </div>
          <li class="nav-item mt-5 mt-lg-0 text-center">
            <a class="nav-link btn-second me-lg-3" href="#">Login</a>
          </li>
          <li class="nav-item mt-3 mt-lg-0 text-center">
            <a class="nav-link btn-first" href="#">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="breadcrumb-section pb-4 pb-md-4 pt-4 pt-md-4">
    <div class="container">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="products.html">Products</a></li>
          <li class="breadcrumb-item active" aria-current="page">Single Product Page</li>
        </ol>
      </nav>
    </div>
  </section>
  <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="product-images" class="carousel slide" data-ride="carousel">
                        <!-- slides -->
                        <div class="carousel-inner">
                            @foreach ($products as $key => $rs)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('uploads/' . $product->image) }}" class="d-block w-100">
                                </div>
                            @endforeach
                        </div>
                        <!-- Left right -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#product-images"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#product-images"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
        <div class="col-md-6">
          <div class="product-detail mt-6 mt-md-0">
            <h1 class="mb-1">{{ $product->nama }}</h1>
            <div class="mb-3 rating">
              <small class="text-warning">
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star"></i>
                <i class="bx bxs-star-half"></i>
              </small>
              <a href="#" class="ms-2">{{ $product->stok }}</a>
            </div>
            <div class="price">
              <span class="active-price text-dark">IDR. {{ $product->harga }}</span>
            </div>
            <hr class="my-6">
            <div class="product-select mt-3 row justify-content-start g-2 align-items-center">
              <div class="col-md-2 col-2">
                <input type="number" name="qty" value="1" class="form-control" min="1" />
              </div>
              <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                <button type="button" class="btn btn-add-cart"><i class="bx bx-cart-alt"></i>Beli</button>
              </div>
              <div class="col-md-4 col-4">
                <a class="btn btn-light" href="shop-wishlist.html" data-bs-toggle="tooltip" data-bs-html="true"
                  aria-label="Wishlist"><i class="bx bx-heart"></i></a>
              </div>
            </div>
            <hr class="my-6">
            <div class="product-info">



            <form action="{{ route('landingpage.store') }}" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                    <label for="tgl_beli" class="form-label">Tanggal Pembelian</label>
                    <input type="date" name="tgl_beli" class="form-control" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input type="id_barang" class="form-control" id="id_barang" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Kategori</label>
                  <input type="kategori_id" class="form-control" id="kategori_id" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Anda</label>
                  <input type="id_pelanggan" class="form-control" id="id_pelanggan" aria-describedby="emailHelp" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>





            
            </div>
            <hr class="my-6">
            <div class="product-share">
              <ul>
                <li><a href="#"><i class="bx bxl-facebook-circle"></i></a></li>
                <li><a href="#"><i class="bx bxl-pinterest"></i></a></li>
                <li><a href="#"><i class="bx bxl-whatsapp"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container pt-5">
      <div class="row row-content">
        <div class="col-md-6">
          <h1 class="logo-brand">Indo <span>Toko</span></h1>
          <p>Lorem ipsum dolor sit amet</p>
        </div>
        <div class="col-md-3 mt-4 mt-sm-0">
          <h3 class="mb-3">Navigation</h3>
          <ul class="p-0">
            <li><a href="#">Home</a></li>
            <li class="mt-3"><a href="#">Best Seller</a></li>
            <li class="mt-3"><a href="#">Category</a></li>
            <li class="mt-3"><a href="#">Comunity</a></li>
            <li class="mt-3"><a href="#">Blog</a></li>
          </ul>
        </div>
        <div class="col-md-3 mt-4 mt-sm-0">
          <h3 class="mb-3">Company</h3>
          <a href="#">john@example.com</a>
          <p>Jln. Tamansiswa, No 32 Yogyakarta Indonesia</p>
        </div>
      </div>
      <div class="row row-copy mt-4 mt-sm-0">
        <div class="col-md-6">
          <p>&copy; 2023 IndoToko. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-sm-end">
          <a href="#"><i class='bx bxl-instagram-alt'></i></a>
          <a href="#"><i class='bx bxl-facebook-circle'></i></a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="{{ asset('layout/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('layout/plugins/jqueryui/jquery-ui.min.js') }}"></script>

  <!-- Main JS-->
  <script src="{{ asset('layout/assets/js/main.js') }}"></script>
</body>

</html>
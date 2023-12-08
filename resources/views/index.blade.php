<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portofolio Website</title>
    {{-- Link Box Icon --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- Link Bootsrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- Link Css Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body>

    <style>
        /* Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Variable */
        :root {
            --primary-color: #FB6A27;
            --dark-color: #0f0f0f;
            --gray-color: gray;

            --h1-font-size: 40px;
            --h2-font-size: 32px;
            --small-font-size: 14px;
        }

        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        img {
            max-width: 100;
        }

        a {
            text-decoration: none;
        }

        /* Global CSS */
        section {
            padding: 70px 0;
        }

        section .section-title {
            font-size: var(--h2-font-size);
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-orange {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-orange:hover {
          background-color: var(--dark-color);
          color: white;
        }

        .text-orange {
          color: var(--primary-color);
        }

        .text-dark {
            color: var(--dark-color);
        }

        .fs-7 {
            font-size: var(--small-font-size)
        }

        .form-control:focus {
            box-shadow: none;
            border-color: var(--primary-color);
        }

        /* CSS Per Section */

        /* Navbar */
        .navbar .nav-item .nav-link:hover,
        .navbar .nav-item .nav-link.active {
          color: var(--primary-color);
        }

        /* Header */
        .header-section .header-title {
          font-size: var(--h1-font-size);
        }

        .header-section .header-skill{
          color: var(--dark-color);
        }

        .header-section .header-skill:hover {
          color: var(--primary-color);
        }

        .header-section .header-skill i {
          transition: .3s;
        }

        .header-section .header-skill:hover i {
          transform: rotate(-45deg)
        }

        .header-section .header-image,.skill-section .skill-image {
          width: 90%;
        }

        /* Portofolio */
        .books-section .card .card-img-top {
          width: 100%;
          height: 200px;
          object-fit: cover;
        }

        @media screen and (max-width: 768px) {
          .books-section .card .card-img-top {
            height: 100px;
          }
        }

        /* Skills */
        .skill-section {
          background-color: #030304;
        }

        .skill-section .progress-bar {
          width: 100%;
          height: 10px;
          border-radius: 10px;
          background-color: var(--gray-color);
        }

        .skill-section .progress-bar .progress, {
          background-color: var(--primary-color);
        }

        
        /* footer */
        footer {
          background-color: var(--dark-color);
        }
        /*  */
    </style>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Book Rental</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#books">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- End Navbar --}}

    {{-- Header --}}
    <section class="header-section" id="header">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-6">
            <p class="text-orange fw-semibold">Abizar Zauli Rafie</p>
            <h1 class="header-title text-uppercase fw-bold mb-5">Full Stack Developer & <br class="d-none d-md-block"> Laravel Junior</h1>
            
            <a href="#" class="header-skill d-inline-flex align-items-center gap-2">
              Web Developer <i class="bx bx-right-arrow-alt fs-4"></i>
            </a> <br>
            <a href="#" class="header-skill d-inline-flex align-items-center gap-2">
              Web Developer <i class="bx bx-right-arrow-alt fs-4"></i>
            </a> <br>
            <a href="#" class="header-skill d-inline-flex align-items-center gap-2">
              Web Developer <i class="bx bx-right-arrow-alt fs-4"></i>
            </a>

            <div class="d-flex align-items-center gap-4 mt-5">
              <div class="d-flex align-items-center gap-2">
                <h2 class="header-skill fw-bold mb-0">1+</h2>
                <p class="text-secondary fs-7 mb-0">Years of <br> Experince</p>
              </div>
              <div class="d-flex align-items-center gap-2">
                <h2 class="header-skill fw-bold mb-0">2+</h2>
                <p class="text-secondary fs-7 mb-0">Happy of <br> Experince</p>
              </div>
            </div>

          </div>
          <div class="col-md-5">
            <img src="{{ asset('images-2/header-photo.png') }}" class="header-image" alt="">
          </div>
        </div>
      </div>
    </section>
    {{-- End Header --}}

    {{-- Books --}}
    <section class="books-section" id="books">
      <div class="container">
        <p class="text-orange fw-semibold">Books List</p>
        <h2 class="section-title">Select Books</h2>

        <div class="swiper books-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <img src="{{ asset('images-2/portfolio-1.jpg') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Pomodora Timer App</h6>
                  <a href="{{ route('login') }}" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <img src="{{ asset('images-2/portfolio-2.jpg') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Ride Share App</h6>
                  <a href="#" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <img src="{{ asset('images-2/portfolio-3.jpg') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Elearning App</h6>
                  <a href="#" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <img src="{{ asset('images-2/portfolio-4.jpg') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Elearning App</h6>
                  <a href="#" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <img src="{{ asset('images-2/portfolio-5.jpg') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Elearning App</h6>
                  <a href="#" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex align-items-center justify-content-end gap-3 mt-2">
            <button class="btn btn-light d-flex align-items-center justify-content-center btn-prev">
              <i class="bx bx-left-arrow-alt fs-5"></i>
            </button>
            <button class="btn btn-light d-flex align-items-center justify-content-center btn-next">
              <i class="bx bx-right-arrow-alt fs-5"></i>
            </button>
          </div>
        </div>

      </div>
    </section>
    {{-- End Books --}}

    {{-- Skiils --}}
    <section class="skill-section" id="section">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-6">
            <p class="text-orange fw-semibold">Skiils</p>
            <h2 class="section-title">Programming Skill</h2>
              <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <p class="text-white text-uppercase fw-semibold mb-0">PHP</p>
                  <p class="text-white text-uppercase mb-0">75%</p>
                </div>
                <div class="progress-bar">
                  <span class="progress" style="width: 75%"></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <p class="text-white text-uppercase fw-semibold mb-0">Laravel</p>
                  <p class="text-white text-uppercase mb-0">95%</p>
                </div>
                <div class="progress-bar">
                  <span class="progress" style="width: 95%"></span>
                </div>
              </div>
              <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <p class="text-white text-uppercase fw-semibold mb-0">Bootsrap</p>
                  <p class="text-white text-uppercase mb-0">85%</p>
                </div>
                <div class="progress-bar">
                  <span class="progress" style="width: 85%"></span>
                </div>
              </div>
          </div>
          <div class="col-md-5">
            <img src="{{ asset('images-2/skill-photo.png') }}" class="skill-image" alt="">
          </div>
        </div>
      </div>
    </section>
    {{-- End Skills --}}

    {{-- Tabel Peminjaman --}}
    <section class="peminjaman-section" id="peminjaman">
      <div class="container">
        <p class="text-orange fw-semibold">Tabel Peminjaman</p>
        <h2 class="section-title">Detail Peminjaman</h2>

        <div class="row py-3 border-bottom working-periode-item">
          <div class="col-md-4">Buku</div>
          <div class="col-md-4">User</div>
          <div class="col-md-4">Status</div>
        </div>
        <div class="row py-3 border-bottom working-periode-item">
          <div class="col-md-4">Laravel Jago</div>
          <div class="col-md-4">Laravel Jago</div>
          <div class="col-md-4">Belum Dikembalikan</div>
        </div>
        <div class="row py-3 border-bottom working-periode-item">
          <div class="col-md-4">Laravel Jago</div>
          <div class="col-md-4">Laravel Jago</div>
          <div class="col-md-4">Belum Dikembalikan</div>
        </div>
      </div>
    </section>
    {{-- End Tabel Peminjaman --}}

    {{-- Buku Terbaru --}}
    <section class="books-section" id="books">
      <div class="container">
        <p class="text-orange fw-semibold">News Book</p>
        <h2 class="section-title">Select New Books</h2>

        <div class="swiper books-swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <h6 class="fw-semibold text-blue">New Book</h6>
                  <img src="{{ asset('images-2/news-1.png') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Mahir Java & Spring Boot</h6>
                  <p class="text-secondary">14 Januari 2023</p>
                  <a href="#" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <h6 class="fw-semibold text-blue">New Book</h6>
                  <img src="{{ asset('images-2/news-2.png') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Mahir Java & Spring Boot</h6>
                  <p class="text-secondary">14 Januari 2023</p>
                  <a href="#" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <h6 class="fw-semibold text-blue">New Book</h6>
                  <img src="{{ asset('images-2/news-3.png') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Mahir Java & Spring Boot</h6>
                  <p class="text-secondary">14 Januari 2023</p>
                  <a href="#" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="card">
                <div class="card-body">
                  <h6 class="fw-semibold text-blue">New Book</h6>
                  <img src="{{ asset('images-2/news-4.png') }}" alt="" class="card-img-top rounded mb-3">
                  <h6 class="fw-semibold">Mahir Java & Spring Boot</h6>
                  <p class="text-secondary">14 Januari 2023</p>
                  <a href="#" class="text-orange">Detail Book</a>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex align-items-center justify-content-end gap-3 mt-2">
            <button class="btn btn-light d-flex align-items-center justify-content-center btn-prev">
              <i class="bx bx-left-arrow-alt fs-5"></i>
            </button>
            <button class="btn btn-light d-flex align-items-center justify-content-center btn-next">
              <i class="bx bx-right-arrow-alt fs-5"></i>
            </button>
          </div>
        </div>

      </div>
    </section>
    {{-- End Buku Terbaru --}}

    {{-- Contact --}}
    <section class="contact-section" id="contact">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md-6">
            <p class="text-orange fw-semibold">Contact</p>
            <h2 class="section-title">Please Contact Me</h2>
            <p class="text-secondary">
              please fill out the form on this section to contact with me . Or call betwen 9:00 a.m and 8:00 p.m ET, Monday through Friday
            </p>
    
            <div class="d-flex align-items-center gap-2 mb-3">
                <i class="bx bx-map-pin text-orange fs-5"></i>
                <div class="mb-0">75112 Abizar, Samarinda, Kalimantan Timur</div>
            </div>
            <div class="d-flex align-items-center gap-2 mb-3">
                <i class="bx bx-phone-call text-orange fs-5"></i>
                <div class="mb-0">+62 822-4922-1234</div>
            </div>
            <div class="d-flex align-items-center gap-2 mb-3">
                <i class="bx bx-envelope text-orange fs-5"></i>
                <div class="mb-0">abizarzauli24@gmail.com</div>
            </div>
          </div>
          <div class="col-md-5">
            <form action="#">
              <input type="text" name="name" id="name" placeholder="Name" class="form-control rounded-0 mb-2">
              <input type="email" name="email" id="email" placeholder="Email" class="form-control rounded-0 mb-2">
              <textarea name="body" id="body" placeholder="Message" cols="30" rows="3" class="form-control rounded-0 mb-3"></textarea>
              <button class="btn btn-orange w-100 rounded-0">Submit</button>
            </form>
          </div>
        </div>

      </div>
    </section>
    {{-- End Contact --}}

    {{-- Footer --}}
    <footer class="py-3">
      <div class="container">
        <p class="text-white fs-7 mb-0">
          Copyright &copy; 2023 Book Rental x Abizar. All Right Reserved
        </p>
      </div>
    </footer>
    {{-- End Footer --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".books-swiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
        nextEl: ".btn-next",
        prevEl: ".btn-prev",
        },
        breakpoints: {
          // when window width is >= 320px
          320: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          // when window width is >= 480px
          480: {
            slidesPerView: 3,
            spaceBetween: 30,
          }
          
        }
      });
    </script>

</body>

</html>

<?php



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atraksi</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .caraousel-image {
            max-width: 750px;
            min-width: 700px;
        }

        .infopenting {
            background-color: #e1eaf7;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <!-- caraousel -->
        <div class="d-flex justify-content-center">
            <div id="carouselExampleIndicators" class="carousel slide caraousel-image">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./download.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./images.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./Tiket Dunia Fantasi di Jakarta.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


        <div class="ms-5 me-5">

            <ul class="nav nav-underline sticky-top bg-body-tertiary">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Ringkasan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Highlight</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Paket</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Review</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Lokasi</a>
                </li>

            </ul>
            <hr>


            <div>
                <div class="d-flex justify-content-between">
                    <div>
                        <h1>Tiket Dunia Fantasi </h1>
                    </div>
                    <div>
                        <p class="m-0">Mulai dari</p>
                        <h3><span class="text-danger">IDR 150.000</span></h3>
                        <button class="btn btn-primary">Lihat Paket</button>
                    </div>
                </div>
                <div class="mb-3">
                    <a href="" class="text-decoration-none text-dark"><i class="bi bi-pin-map-fill"></i> Jalan Lodan Timur, RW.10, Ancol, North Jakarta City, Jakarta, Indonesia, Jakarta Utara, Jakarta, Indonesia <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="mb-4">
                    <a href="" class="text-decoration-none text-dark"><i class="bi bi-clock-fill"></i> Buka &#x25CF Sabtu &#x25CF 10:00-20:00 <i class="bi bi-chevron-right"></i></a>
                </div>

                <div class="card mb-4 infopenting">
                    <div class="card-body ">
                        <h5 class="card-title">Info Penting & Highlight</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>

                        <a href="#" class="card-link text-decoration-none fw-bolder">Baca Selengkapnya</a>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-9">
                        <h3 class="mt-5">Paket</h3>
                        <p class="mb-4">Cek Ketersediaan paket</p>
                        <div class="card infopenting m-4">
                            <div class="m-4 mt-0">
                                <!-- card jenis paket -->
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Reguler Weekday Dufan (belum termasuk tiket Ancol)</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-danger fw-bold fs-4 m-0">IDR 100.000</p>
                                            <a href="#" class="btn btn-primary ">Pilih Tiker</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Reguler Weekday Dufan (belum termasuk tiket Ancol)</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-danger fw-bold fs-4 m-0">IDR 100.000</p>
                                            <a href="#" class="btn btn-primary ">Pilih Tiker</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Reguler Weekday Dufan (belum termasuk tiket Ancol)</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-danger fw-bold fs-4 m-0">IDR 100.000</p>
                                            <a href="#" class="btn btn-primary ">Pilih Tiker</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-3">

                    </div>
                </div>

                <hr>

                <div class="mt-3">
                    <h3>Review</h3>
                    <h1>4,4<span class="fs-4">/5</span></h1>
                    <div class="d-flex flex-wrap ">
                        <div class="card mb-3 w-25 me-2">
                            <div class="card-body ">
                                <h5 class="card-title">Info Penting & Highlight</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            </div>
                        </div>

                        <div class="card mb-3 w-25 me-2">
                            <div class="card-body ">
                                <h5 class="card-title">Info Penting & Highlight</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            </div>
                        </div>

                        <div class="card mb-3 w-25 me-2">
                            <div class="card-body ">
                                <h5 class="card-title">Info Penting & Highlight</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            </div>
                        </div>

                    </div>
                </div>

                <hr>

                <div class="mt-4">
                    <h3>Lokasi</h3>
                    <div class="mapouter w-100">
                        <div class="gmap_canvas">
                            <iframe height="450" id="gmap_canvas" src="https://maps.google.com/maps?q=-6.126385%2C+106.834075&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://www.analarmclock.com"></a><br><a href="https://www.onclock.net"></a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 560px;
                                    width: 820px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 560px;
                                    width: auto;
                                }

                                #gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    width: 100%;
                                }
                            </style>
                        </div>
                    </div>
                </div>

                <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-1 border-top">
                    <div class="col mb-3">
                        <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                            <svg class="bi me-2" width="40" height="32">
                                <use xlink:href="#bootstrap"></use>
                            </svg>
                        </a>
                        <p class="text-body-secondary">© 2024</p>
                    </div>

                    <div class="col mb-3">

                    </div>

                    <div class="col mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                        </ul>
                    </div>

                    <div class="col mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                        </ul>
                    </div>

                    <div class="col mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
                        </ul>
                    </div>
                </footer>

            </div>
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            const cardContainer = $('#atraksi-container');
            $.ajax({
                url: 'example_api.php',
                type: 'get',
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data)
                    data.jam_buka.forEach(function(element) {
                        console.log(element);
                        //             const card = `<div class="card" style="width: 18rem;">
                        //     <div id="${element.atraksi.slug}" class="carousel slide">
                        //         <div class="carousel-inner card-img-top" id="photos-${element.atraksi.slug}">

                        //         </div>
                        //         <button class="carousel-control-prev" type="button" data-bs-target="#${element.atraksi.slug}" data-bs-slide="prev">
                        //             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        //             <span class="visually-hidden">Previous</span>
                        //         </button>
                        //         <button class="carousel-control-next" type="button" data-bs-target="#${element.atraksi.slug}" data-bs-slide="next">
                        //             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        //             <span class="visually-hidden">Next</span>
                        //         </button>
                        //     </div>
                        //     <div class="card-body">
                        //         <h5 class="card-title">${element.atraksi.title}</h5>
                        //         <div class="card-text">${element.atraksi.deskripsi}</div>
                        //     </div>
                        // </div>`;

                        //             cardContainer.append(card);
                        //             const photos = element.atraksi.photo
                        //             const photosContainer = $(`#photos-${element.atraksi.slug}`);
                        //             photos.forEach((photo, index) => {
                        //                 const content = ` <div class="carousel-item active">
                        //                 <img src="http://127.0.0.1:8000/${photo.image}" class="card-img-top" alt="...">
                        //             </div>`;
                        //                 photosContainer.append(content);
                        //             });
                        //             console.log('append');
                    });

                }
            });
        });
    </script>
</body>

</html>
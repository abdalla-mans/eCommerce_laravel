@extends('app.app')

@section('title', 'shop')

@section('section')
    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content overflow-hidden border-0">
                <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <div class="row align-items-stretch">
                        <div class="col-lg-6 p-lg-0">
                            <a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url({{ asset('assets/img/product-5.jpg') }})" href="{{ asset('assets/img/product-5.jpg') }}" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a>
                            <a class="glightbox d-none" href="{{ asset('assets/img/product-5-alt-1.jpg') }}" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a>
                            <a class="glightbox d-none" href="{{ asset('assets/img/product-5-alt-2.jpg/') }}" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-4 my-md-4">
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                                    <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                                    <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                                    <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                                    <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                                </ul>
                                <h2 class="h4">Red digital smartwatch</h2>
                                <p class="text-muted">$250</p>
                                <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut
                                    ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis
                                    parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                                <div class="row align-items-stretch mb-4 gx-0">
                                    <div class="col-sm-7">
                                        <div class="border d-flex align-items-center justify-content-between py-1 px-3">
                                            <span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                            <div class="quantity">
                                                <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                                <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                                <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5"><a class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" href="cart">Add to cart</a></div>
                                </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Shop</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                                <li class="breadcrumb-item"><a class="text-dark" href="{{ route('page.main') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <div class="container p-0">
                <div class="row">
                    <!-- SHOP SIDEBAR-->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <h5 class="text-uppercase mb-4">Categories</h5>
                        <h5>
                            <a href="{{ route('page.shop') }}">All Categories</a>
                        </h5><br>
                        <div class="accordion" id="accordionExample">
                            @foreach ($categories as $category)
                                <a class="d-block" style="{{ isset($category_id) ? ($category->id == $category_id ? 'color:black' : '') : '' }}" href="{{ url('page/shop?sort_category=' . $category->id) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                        <br>
                        {{-- <h6 class="text-uppercase mb-3">Show only</h6>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_1">
                            <label class="form-check-label" for="checkbox_1">Returns Accepted</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_2">
                            <label class="form-check-label" for="checkbox_2">Returns Accepted</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_3">
                            <label class="form-check-label" for="checkbox_3">Completed Items</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_4">
                            <label class="form-check-label" for="checkbox_4">Sold Items</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="checkbox" id="checkbox_5">
                            <label class="form-check-label" for="checkbox_5">Deals &amp; Savings</label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="checkbox_6">
                            <label class="form-check-label" for="checkbox_6">Authorized Seller</label>
                        </div> --}}
                        {{-- <h6 class="text-uppercase mb-3">Buying format</h6>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="customRadio" id="radio_1">
                            <label class="form-check-label" for="radio_1">All Listings</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="customRadio" id="radio_2">
                            <label class="form-check-label" for="radio_2">Best Offer</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="customRadio" id="radio_3">
                            <label class="form-check-label" for="radio_3">Auction</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input" type="radio" name="customRadio" id="radio_4">
                            <label class="form-check-label" for="radio_4">Buy It Now</label>
                        </div> --}}
                    </div>
                    <!-- SHOP LISTING-->
                    <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                                {{-- <p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p> --}}
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                    <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th-large"></i></a></li>
                                    <li class="list-inline-item text-muted me-3"><a class="reset-anchor p-0" href="#!"><i class="fas fa-th"></i></a></li>
                                    <li class="list-inline-item">
                                        <select class="selectpicker" data-customclass="form-control form-control-sm">
                                            <option value>Sort By </option>
                                            <option value="default">Default sorting </option>
                                            <option value="popularity">Popularity </option>
                                            <option value="low-high">Price: Low to High </option>
                                            <option value="high-low">Price: High to Low </option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <!-- PRODUCT-->
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product text-center">
                                        <div class="mb-3 position-relative">
                                            <div class="badge text-white bg-"></div>
                                            <a class="d-block" href="{{ route('page.detail', $product->id) }}">
                                                <img class="img-fluid w-100" src="{{ asset('../storage/img/' . ($product->images[0]->name ?? 'default.jpg')) }}" alt="...">
                                                {{-- <img class="img-fluid w-100" src="{{ asset('assets/img/' . $product->images[0]->name) }}" alt="..."> --}}
                                            </a>
                                            <div class="product-overlay">
                                                <ul class="mb-0 list-inline">
                                                    <li class="list-inline-item m-0 p-0">
                                                        <a class="btn btn-sm btn-outline-dark" href="#!"><i class="far fa-heart"></i></a>
                                                    </li>
                                                    <li class="list-inline-item m-0 p-0">
                                                        <a class="btn btn-sm btn-dark" href="{{ route('page.cart') }}">Add to cart</a>
                                                    </li>
                                                    <li class="list-inline-item mr-0">
                                                        <a class="btn btn-sm btn-outline-dark" href="#productView" data-bs-toggle="modal"><i class="fas fa-expand"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h6> <a class="reset-anchor" href="{{ route('page.detail', $product->id) }}">{{ $product->title }}</a>
                                        </h6>
                                        <p class="small text-muted">${{ $product->salary }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $products->onEachSide(1)->links('pagination::bootstrap-5') }}
                    </div>
                </div>
        </section>
    </div>
@endsection


{{-- <div class="btn-group" style="max-width: 400px;">
    اذا كان رقم الصفحه لا يساوي 0 اذا انت بحاجه الي وضع اسهم للتنقل
    @if ($page_number != 0)
        السهمين المزدوجين للرجوع الي النقطه الاولي
        <a href="?page_number=0&sort_category={{ $category_id ?? '' }}" class="btn btn-outline-secondary">&lt;&lt;</a>
        السهم المفرد للرجوع خطوه واحده فقت
        <a href="?page_number={{ $page_number - 1 }}&sort_category={{ $category_id ?? '' }}" class="btn btn-outline-secondary">&lt;</a>
    @endif
    @php
        /**
         * you have
         * - @var $page_number by default = 0
         * - @var $count the count products from database
         */
        $button_numbers = floor($count / 12);

        /**
         * get the number of remaining numbers,
         * maximum 5 numbers
         *
         * @var $num
         */
        $num = 0;
        for ($i = 0; $i < 5; $i++) {
            if ($page_number + $i > $button_numbers) {
                break;
            } else {
                $num++;
            }
        }
    @endphp
    @if ($page_number != 0)
        <a href="?page_number={{ $page_number - 1 }}&sort_category={{ $category_id ?? '' }}" class="btn btn-outline-secondary">{!! $page_number !!}</a>
    @endif
    @for ($i = $page_number; $i < $page_number + $num; $i++)
        <a href="?page_number={{ $i }}&sort_category={{ $category_id ?? '' }}" class="btn btn-outline-secondary {!! $i == $page_number ? 'active' : '' !!}">{!! $i + 1 !!}</a>
    @endfor
    اذا لم تكن قد وصلت لنهايه الصفحات اذا انت بحاجه الي وضع اسهم للتنقل
    @if ($page_number != $button_numbers)
        انتقل خطوه واحده
        <a href="?page_number={{ $page_number + 1 }}&sort_category={{ $category_id ?? '' }}" type="button" class="btn btn-outline-secondary">></a>
        انتقل خطوتان
        <a href="?page_number={{ $button_numbers }}&sort_category={{ $category_id ?? '' }}" type="button" class="btn btn-outline-secondary">>></a>
    @endif
</div> --}}

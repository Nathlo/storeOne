@extends('layouts.shop')

@section('title')
    Cartzio | Product Détail
@endsection


@section('content')
    
    <!-- Start -->
    <section class="relative md:py-24 py-16 ">
        <div class="container relative">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-6 items-center">
                <div class="">
                    <ul class="product-imgs flex list-none items-center">
                        <li>
                            <ul class="img-select list-none">
                                <li class="p-px">
                                    <a href="#" data-id="1">
                                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket.jpg" class="shadow dark:shadow-gray-800" alt="">
                                    </a>
                                </li>
                                <li class="p-px">
                                    <a href="#" data-id="2">
                                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket-3.jpg" class="shadow dark:shadow-gray-800" alt="">
                                    </a>
                                </li>
                                <li class="p-px">
                                    <a href="#" data-id="3">
                                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket-left.jpg" class="shadow dark:shadow-gray-800" alt="">
                                    </a>
                                </li>
                                <li class="p-px">
                                    <a href="#" data-id="4">
                                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket-back.jpg" class="shadow dark:shadow-gray-800" alt="">
                                    </a>
                                </li>
                                <li class="p-px">
                                    <a href="#" data-id="5">
                                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket-4.jpg" class="shadow dark:shadow-gray-800" alt="">
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="img-display shadow dark:shadow-gray-800 m-px">
                            <div class="img-showcase flex w-full duration-500">
                                <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket.jpg" class="min-w-full" alt="shoe image">
                                <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket-3.jpg" class="min-w-full" alt="shoe image">
                                <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket-left.jpg" class="min-w-full" alt="shoe image">
                                <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket-back.jpg" class="min-w-full" alt="shoe image">
                                <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/mens-jecket-4.jpg" class="min-w-full" alt="shoe image">
                            </div>
                        </li>
                    </ul>
                </div><!--end content-->

                <div class="">
                    <h5 class="text-2xl font-semibold">{{$product->name}}</h5>
                    <div class="mt-2">
                        <span class="text-slate-400 font-semibold me-1">{{$product->price}}€</span>

                        <ul class="list-none inline-block text-orange-400">
                            <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                            <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                            <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                            <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                            <li class="inline"><i class="mdi mdi-star text-lg"></i></li>
                            <li class="inline text-slate-400 font-semibold">4.8 (45)</li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <h5 class="text-lg font-semibold">Description :</h5>
                        <p class="text-slate-400 mt-2">{{$product->description}}</p>
                    
                        
                    </div>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-4">
                        

                        <div class="flex items-center">
                            <h5 class="text-lg font-semibold me-2">Quantity:</h5>
                            <div class="qty-icons ms-3 space-x-0.5">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="size-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white minus">-</button>
                                <input min="0" name="quantity" value="0" type="number" class="h-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white pointer-events-none w-16 ps-4 quantity">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="size-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white plus">+</button>
                            </div>
                        </div><!--end content-->

                       
                    </div><!--end grid-->

                    <div class="mt-4 space-x-1">
                        <a href="{{ route('panier.ajouter', $product) }}" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white mt-2">Ajoutez au panier</a>
                    </div>
                </div><!--end content-->
            </div><!--end grid-->
            
    
        </div><!--end container-->

        <div class="container lg:mt-24 mt-16">
            <div class="grid grid-cols-1 mb-6 text-center">
                <h3 class="font-semibold text-3xl leading-normal">Produits similaires</h3>
            </div><!--end grid-->

            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6 pt-6">
                <div class="group">
                    <div class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/sweater-t-shirt.jpg" class="group-hover:scale-110 duration-500" alt="">

                        <div class="absolute -bottom-20 group-hover:bottom-3 start-3 end-3 duration-500">
                            <a href="shop-cart.html" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-slate-900 text-white w-full rounded-md">Add to Cart</a>
                        </div>

                        <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500 space-y-1">
                            <li><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="heart" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="shop-item-detail.html" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="eye" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="bookmark" class="size-4"></i></a></li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <a href="product-detail-one.html" class="hover:text-orange-500 text-lg font-medium">Sweater T-Shirt</a>
                        <div class="flex justify-between items-center mt-1">
                            <p>$16.00 <del class="text-slate-400">$21.00</del></p>
                            <ul class="font-medium text-amber-400 list-none">
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div><!--end content-->

                <div class="group">
                    <div class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/trendy-t-shirt2.jpg" class="group-hover:scale-110 duration-500" alt="">

                        <div class="absolute -bottom-20 group-hover:bottom-3 start-3 end-3 duration-500">
                            <a href="shop-cart.html" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-slate-900 text-white w-full rounded-md">Add to Cart</a>
                        </div>

                        <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500 space-y-1">
                            <li><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="heart" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="shop-item-detail.html" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="eye" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="bookmark" class="size-4"></i></a></li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <a href="product-detail-one.html" class="hover:text-orange-500 text-lg font-medium">Trendy T-shirt</a>
                        <div class="flex justify-between items-center mt-1">
                            <p>$16.00 <del class="text-slate-400">$21.00</del></p>
                            <ul class="font-medium text-amber-400 list-none">
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div><!--end content-->

                <div class="group">
                    <div class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/men-white-espadrilles-slip-shoes.jpg" class="group-hover:scale-110 duration-500" alt="">

                        <div class="absolute -bottom-20 group-hover:bottom-3 start-3 end-3 duration-500">
                            <a href="shop-cart.html" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-slate-900 text-white w-full rounded-md">Add to Cart</a>
                        </div>

                        <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500 space-y-1">
                            <li><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="heart" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="shop-item-detail.html" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="eye" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="bookmark" class="size-4"></i></a></li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <a href="product-detail-one.html" class="hover:text-orange-500 text-lg font-medium">Mens White Slip Shoes</a>
                        <div class="flex justify-between items-center mt-1">
                            <p>$16.00 <del class="text-slate-400">$21.00</del></p>
                            <ul class="font-medium text-amber-400 list-none">
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div><!--end content-->

                <div class="group">
                    <div class="relative overflow-hidden shadow dark:shadow-gray-800 group-hover:shadow-lg group-hover:dark:shadow-gray-800 rounded-md duration-500">
                        <img src="https://shreethemes.in/cartzio/layouts/assets/images/shop/luxurious-bag.jpg" class="group-hover:scale-110 duration-500" alt="">

                        <div class="absolute -bottom-20 group-hover:bottom-3 start-3 end-3 duration-500">
                            <a href="shop-cart.html" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-slate-900 text-white w-full rounded-md">Add to Cart</a>
                        </div>

                        <ul class="list-none absolute top-[10px] end-4 opacity-0 group-hover:opacity-100 duration-500 space-y-1">
                            <li><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="heart" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="shop-item-detail.html" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="eye" class="size-4"></i></a></li>
                            <li class="mt-1"><a href="javascript:void(0)" class="size-10 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-center rounded-full bg-white text-slate-900 hover:bg-slate-900 hover:text-white shadow"><i data-feather="bookmark" class="size-4"></i></a></li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <a href="product-detail-one.html" class="hover:text-orange-500 text-lg font-medium">Ladies Luxurious Bag</a>
                        <div class="flex justify-between items-center mt-1">
                            <p>$16.00 <del class="text-slate-400">$21.00</del></p>
                            <ul class="font-medium text-amber-400 list-none">
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                                <li class="inline"><i class="mdi mdi-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div><!--end content-->
            </div>
        </div>
    </section><!--end section-->
    <!-- End -->



@endsection
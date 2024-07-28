@extends('layouts.shop')

@section('title')
    Cartzio | Votre Panier
@endsection


@section('content')

     <!-- Start Hero -->
     <section class="relative table w-full py-20 lg:py-24 bg-gray-50 dark:bg-slate-800">
        <div class="container relative">
            <div class="grid grid-cols-1 mt-14">
                <h3 class="text-3xl leading-normal font-semibold">Votre Panier</h3>
            </div><!--end grid-->

            <div class="relative mt-3">
                <ul class="tracking-[0.5px] mb-0 inline-block">
                    <li class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out hover:text-orange-500"><a href="{{ route('product') }}">Accueil</a></li>
                    <li class="inline-block text-base text-slate-950 dark:text-white mx-0.5 ltr:rotate-0 rtl:rotate-180"><i class="mdi mdi-chevron-right"></i></li>
                    <li class="inline-block uppercase text-[13px] font-bold text-orange-500" aria-current="page">panier</li>
                </ul>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->

        <!-- Start -->
        <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid lg:grid-cols-1">
                <div class="relative overflow-x-auto shadow dark:shadow-gray-800 rounded-md">
                    <table class="w-full text-start">
                        <thead class="text-sm uppercase bg-slate-50 dark:bg-slate-800">
                            <tr>
                                <th scope="col" class="p-4 w-4"></th>
                                <th scope="col" class="text-start p-4 min-w-[220px]">Produits</th>
                                <th scope="col" class="p-4 w-24 min-w-[100px]">Prix</th>
                                <th scope="col" class="p-4 w-56 min-w-[220px]">Quantité</th>
                                <th scope="col" class="p-4 w-24 min-w-[100px]">Total(€)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Looping on products in cart to display -->
                            @forelse ($paniers as $panier)
                                @php
                                    $total = 0;
                                    $total += $panier->product->price * $panier->quantite;
                                    // $nbrArticle += $panier->quantite
                                @endphp

                                        <!-- Start Product info -->
                                    <tr class="bg-white dark:bg-slate-900">
                                        <td class="p-4"><a href="{{ route('panier.enleverTout', $panier) }}"><i class="mdi mdi-window-close text-red-600"></i></a></td>
                                        <td class="p-4">
                                            <span class="flex items-center">
                                                <img src="assets/images/shop/black-print-t-shirt.jpg" class="rounded shadow dark:shadow-gray-800 w-12" alt="">
                                                <span class="ms-3">
                                                    <span class="block font-semibold">{{$panier->product->name}}</span>
                                                </span>
                                                        </span>
                                                    </td>
                                                    <td class="p-4 text-center">{{$panier->product->price}}</td>
                                                    <td class="p-4 text-center">
                                                        <div class="qty-icons">
                                                            <button onclick="location.href='{{route('panier.enleverUn', $panier)}}' " class="size-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white minus">-</button>
                                                            <input min="0" name="quantity" value="{{$panier->quantite}}" type="number" readonly="readonly" class="h-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white pointer-events-none w-16 ps-4 quantity">
                                                            <button onclick="location.href='{{route('panier.ajouter', $panier->product)}}' " class="size-9 inline-flex items-center justify-center tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white plus">+</button>
                                                        </div>
                                                    </td>
                                                    <td class="p-4  text-end">{{ $total }}</td>
                                    </tr>
                                        <!-- End Product info -->
                                        @empty
                                        <p class="text-sm font-semibold leading-6 text-gray-900">Votre Panier est vide.</p>    
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
                    <div class="lg:col-span-9 md:order-1 order-3">
                        <div class="space-x-1">
                            <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle text-base text-center bg-orange-500 text-white rounded-md mt-2">COMMANDER</a>
                            <div>
                                <a href="{{ route('product') }}" class="py-2 px-4 inline-block font-semibold tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white mt-2">Continuez Vos Achats</a>
                                <a href="{{ route('panier.vider') }}" class="py-2 px-4 inline-block font-semibold tracking-wide align-middle text-base text-center rounded-md bg-orange-500/5 hover:bg-orange-500 text-orange-500 hover:text-white mt-2">Vider votre Panier</a>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-3 md:order-2 order-1">
                        <ul class="list-none shadow dark:shadow-gray-800 rounded-md">
                            <li class="flex justify-between p-4">
                                <span class="font-semibold text-lg">Sous-total :</span>
                                <span class="text-slate-400">{{ $totalPrice }} €</span>
                            </li>
                            <li class="flex justify-between p-4 border-t border-gray-100 dark:border-gray-800">
                                <span class="font-semibold text-lg">TVA :</span>
                                <span class="text-slate-400">{{ $totalPrice * (20 / 100) }}</span>
                            </li>
                            <li class="flex justify-between font-semibold p-4 border-t border-gray-200 dark:border-gray-600">
                                <span class="font-semibold text-lg">Total :</span>
                                <span class="font-semibold">{{ $totalPrice + ($totalPrice * 20 / 100) }} €</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center">
                <div class="lg:col-span-5 md:col-span-6">
                    <img src="assets/images/envelope.svg" class="mx-auto d-block" alt="">
                </div>

                
            </div><!--end gird-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->


@endsection
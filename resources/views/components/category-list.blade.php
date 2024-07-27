 <!-- Start Hero -->
 <section class="relative md:pt-32">
    <div class="container-fluid relative mt-6 lg:mx-6 mx-3">
        <div class="grid xl:grid-cols-6 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">


            @foreach ($categories as $category)

                <x-category-card :category="$category" /> 
                {{-- 
                    pass variable 'category' that is caught in the CategoryCard 
                    :category is a placeholder for the constructor parameter named $category in the component 'CategoryCard'
                    =$category is the value of this placeholder coming from the foreach loop
                --}}
            
                @endforeach

            
            
            
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->



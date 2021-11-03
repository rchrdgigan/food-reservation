
@extends('layouts.app')

@section('content')



<!-- about -->
<section id="about">
    <div class="container-fluid about">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-12 about-left">
                <h2>About</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, reiciendis. Eaque incidunt dolor consectetur quisquam labore harum odio, distinctio perspiciatis. Ipsam nobis labore earum excepturi quos fugiat quam iste maxime!</p>
            </div>
            <div class="col-lg-6 col-sm-12 col-12 about-right">
                
            </div>
        </div>
    </div>
</section>
<!-- End about --> 
<!-- Start Contact --> 
<section id="contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-12 contact-left">

            </div>
            <div class="col-lg-6 col-sm-12 col-12 contact-right">
                    <h2>Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio officia mollitia et delectus veniam adipisci sit expedita corrupti dolore ipsam!</p>
                    <p><b>{{($business == '' || $business->cpnumber == NULL) ? 'Not availabe!' : $business->cpnumber}}</b></p>
                    <p><b>{{($business == '' || $business->email == NULL) ? 'Not availabe!' : $business->email}}</b></p>
            </div>
        </div>
    </div>
</section>
<!-- end of contact -->
<!-- start of services -->
<section id="services">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-12 services-left">
                <h2>Services</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente, nihil? Modi quod exercitationem dolor temporibus iusto facere atque porro harum itaque, illum repudiandae ipsum corrupti, ratione quidem asperiores. Saepe, voluptas?</p>
                <input type="submit" value="See More Food">
            </div>
            <div class="col-lg-6 col-sm-12 col-12 services-right">
                
            </div>
        </div>
    </div>
</section>

<section class="products">
    <div class="container-fluid">
        <h2 class="mt-5"><b>Main Food Menu</b></h2>
        <div class="row">
        @forelse($foods->where('categories','Main Dish') as $data1)
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 card-holder">
                <div class="card" style="width: 18rem;">
                    <img src="/storage/foods_image/{{($data1->image == '' || $data1->image == NULL) ? 'no-image.png' : $data1->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{($data1 == '' || $data1->food_title == NULL) ? 'Not Availabe' : $data1->food_title}}</h5>
                        <p class="card-text">{{($data1 == '' || $data1->description == NULL) ? 'Not Availabe' : $data1->description}}</p>
                        <p><b>Price: ₱</b>{{($data1 == '' || $data1->price == NULL) ? 'Not Availabe' : $data1->price}}</p>
                    </div>
                </div>
            </div>
            @empty
            <h6 class="mx-auto mt-5 text-center text-danger"><b>Main food not availabe!</b></h6>
        @endforelse
        </div>
      
        <h2 class="mt-5"><b>Dessert Food Menu</b></h2>
        <div class="row">
        @forelse($foods_desert as $data1)
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 card-holder">
                <div class="card" style="width: 18rem;">
                    <img src="/storage/foods_image/{{($data1->image == '' || $data1->image == NULL) ? 'no-image.png' : $data1->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{($data1 == '' || $data1->food_title == NULL) ? 'Not Availabe' : $data1->food_title}}</h5>
                        <p class="card-text">{{($data1 == '' || $data1->description == NULL) ? 'Not Availabe' : $data1->description}}</p>
                        <p><b>Price: ₱</b>{{($data1 == '' || $data1->price == NULL) ? 'Not Availabe' : $data1->price}}</p>
                    </div>
                </div>
            </div>
            @empty
            <h6 class="mx-auto mt-5 text-center text-danger"><b>Dessert food not availabe!</b></h6>
        @endforelse
        </div>
       

        
        <h2 class="mt-5"><b>Drinks Menu</b></h2>
        <div class="row">
        @forelse($foods->where('categories','Beverage') as $data1)
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 card-holder">
                <div class="card" style="width: 18rem;">
                    <img src="/storage/foods_image/{{($data1->image == '' || $data1->image == NULL) ? 'no-image.png' : $data1->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{($data1 == '' || $data1->food_title == NULL) ? 'Not Availabe' : $data1->food_title}}</h5>
                        <p class="card-text">{{($data1 == '' || $data1->description == NULL) ? 'Not Availabe' : $data1->description}}</p>
                        <p><b>Price: ₱</b>{{($data1 == '' || $data1->price == NULL) ? 'Not Availabe' : $data1->price}}</p>
                    </div>
                </div>
            </div>
            @empty
            <h6 class="mx-auto mt-5 text-center text-danger"><b>Drinks menu not availabe!</b></h6>
        @endforelse
        </div>
    </div>  
</section>

<footer>
    <div class="row">
        <div class="col-6">
        &copy;All Right Reserve 2021
        </div>
        <div class="ml-auto">
            <ul>
                <li class="float-left mr-3"><a href="{{($link == '' || $link->facebook == NULL) ? '#' : $link->facebook}}"><i class="fab fa-facebook"></i> Facebook </a></li>
                <li class="float-left mr-3"><a href="{{($link == '' || $link->twitter == NULL) ? '#' : $link->twitter}}"><i class="fab fa-twitter"></i> Twitter </a></li>
                <li class="float-left mr-3"><a href="{{($link == '' || $link->instagram == NULL) ? '#' : $link->instagram}}"><i class="fab fa-instagram"></i> Instagram  </a></li>
                <li class="float-left mr-3"><a href="{{($link == '' || $link->youtube == NULL) ? '#' : $link->youtube}}"><i class="fab fa-youtube"></i> Youtube </a></li>
            </ul>
        </div>
    </div>
    
</footer>

@endsection


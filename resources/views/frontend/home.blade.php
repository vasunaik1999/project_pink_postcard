@extends('welcome')

@section('title')
Home | Pink Postcard
@endsection

@section('content')

<!-- ======= Header ======= -->
<header id="header" class="row">
    <div class="d-flex flex-column align-items-center col-lg-8 col-md-12 mb-5">
        <img style="max-height:70vh; width:60vw;" src="<?php echo asset('img/home.svg') ?>" alt="">
    </div>
    <div class="col-lg-4 col-md-12 mb-5">
        <h1>Pink Postcards</h1>
        <h2>Small contribution can change someone's life</h2>
        <!-- <ul class="fa-ul pb-2" style="line-height:2;">
            <li><span class="fa-li" style="color:#FF639A;"><i class="fas fa-envelope"></i></span>Use this platform to request for your needs.</li>
            <li><span class="fa-li" style="color:#FF639A;"><i class="fas fa-envelope"></i></span>Use this platform to help those in need.</li>
            <li><span class="fa-li" style="color:#FF639A;"><i class="fas fa-envelope"></i></span>Use this platform to volunteer and help those affected by covid.</li>
        </ul> -->
        <!-- #F50057 -->
        <p>A first of its kind community based initiative to help the digital generation experience the joy of sending and receiving postcards. All this, while contributing towards helping the needy students be able to afford the books they require.</p>
        <a type="button" class="btn justify-content-center homeorderbtn" href="{{url('/postcards')}}">Buy Now</a>
    </div>
</header>


<main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>About Us</h2>
                <p>
                    The initiative revolves around narrating interesting stories from India, through pictures.
                    Each postcard is valued at a nominal rate of Rs.80 to make it extremely affordable. The funds collected, minus the cost of printing and posting, will be directed towards a cause. The cause is to ensure accessibility to books for those who aren't as privileged.
                </p>
                <p>We work with contributors, photographers and storytellers who are willing to be a part of this non-profit initiative.</p>
            </div>

            <!--<div class="row mt-2">
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title"><a href="{{url('/')}}">Lorem</a></h4>
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum minus praesentium hic voluptas qui optio asperiores voluptatum voluptatibus assumenda? Possimus, distinctio ipsa. Perferendis optio, possimus nostrum alias tenetur veniam temporibus? </p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title">
                        lorem
                    </h4>
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui ipsam voluptate fuga et maxime! Pariatur expedita qui libero facere voluptas quos quae necessitatibus maiores praesentium, veritatis veniam nostrum omnis quaerat.</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <h4 class="title"><a href="mailto:help.goa.breathe@gmail.com">Lorem</a></h4>
                    <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quos cum dolores hic odio, at assumenda veniam blanditiis harum voluptatem. Quia dolorem atque eligendi nam voluptas veritatis ipsum sint maxime.</a> !! </p>
                </div>
            </div> -->

        </div>
    </section><!-- End About Us Section -->

    <!-- ======================================== CONTACT FORM SECTION ======================================== -->
    <section id="contactform">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
            </div>

            <div class="row mt-2">
                <div class="col">
                    @if (session('contactmessage'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('contactmessage') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="card" style="background-color: #f6f6f6;">
                        <div class="card-body">
                            <form method="post" action="{{route('contactform.store')}}">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" @auth value="{{Auth::user()->id}}" @endauth>
                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input required type="text" class="form-control rounded" id="name" placeholder="Enter Name..." name="name" @auth value="{{Auth::user()->name}}" @endauth>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="phone">Phone Number</label>
                                        <input required type="text" class="form-control rounded" id="phone" placeholder="Enter Phone no..." name="phone" @auth value="{{Auth::user()->phone}}" @endauth>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="category">Category</label>
                                        <select required class="form-control" id="category" name="category">
                                            <option value="General">General</option>
                                            <option value="Request">Order</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-md-12">
                                        <label for="message">Message</label>
                                        <textarea required name="message" class="form-control" id="message" rows="4" placeholder="Enter you message"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn text-white mt-3" style="background-color:#FF639A;">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================================== END OF CONTACT FORM SECTION ======================================== -->

</main><!-- End #main -->
@endsection

@section('script')

@endsection
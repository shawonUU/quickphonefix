@extends('frontend.layouts.app')
@section('content')
   <!-- Bread-Crumb style two -->
    <!-- rts breadcrumba area start -->
    <div class="rts-bread-crumb-area ptb--150 ptb_sm--100 bg-breadcrumb bg_image">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- bread crumb inner wrapper -->
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title">Our Projects</h1>
                        <div class="meta">
                            <a href="#" class="prev">Home /</a>
                            <a href="#" class="next">Our Projects</a>
                        </div>
                    </div>
                    <!-- bread crumb inner wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- rts breadcrumba area end -->
    <!-- Bread-Crumb style two End -->



    <!--rts projects area start -->
    <div class="rts-projects-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- projecta area tabs start -->
                    <div class="projects-wrapper-inner-page">
                        <ul class="nav nav-tabs mb--20" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">All</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Architecture</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Constrution</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contacts-tab" data-bs-toggle="tab" data-bs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Building</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contactes-tab" data-bs-toggle="tab" data-bs-target="#contactes" type="button" role="tab" aria-controls="contactes" aria-selected="false">Interior</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contactese-tab" data-bs-toggle="tab" data-bs-target="#contactese" type="button" role="tab" aria-controls="contactese" aria-selected="false">Renovation</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <!-- single tab content start -->
                                <div class="row g-24 mb--25">
                                    <div class="col-lg-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/18.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Oil Mill Construction</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="#">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/17.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="#">
                                                    <h5 class="title">Railcar Factory</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/19.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Station Home</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row g-24 mb--25">

                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/20.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Park Offices</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/21.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Maly Buildings</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/22.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">One Thousand Museum</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-24">
                                    <div class="col-lg-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/23.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Oil Mill Construction</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/24.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Luxury Buildings</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/25.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Maly Buildings</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single tab content end -->
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- single tab content start -->
                                <div class="row g-24 mb--25 justify-content-center">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/21.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Maly Buildings</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/17.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Railcar Factory</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/18.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Oil Mill Construction</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single tab content end -->
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <!-- single tab content start -->
                                <div class="row g-24 mb--25 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/18.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Oil Mill Construction</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/19.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Station Home</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/25.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Maly Buildings</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single tab content end -->
                            </div>
                            <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                                <!-- single tab content start -->
                                <div class="row g-24 mb--25 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/18.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Oil Mill Construction</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/17.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Railcar Factory</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/19.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Station Home</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- single tab content end -->
                            </div>
                            <div class="tab-pane fade" id="contactes" role="tabpanel" aria-labelledby="contactes-tab">
                                <!-- single tab content start -->
                                <div class="row g-24 mb--25 justify-content-center">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/20.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Park Offices</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/24.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Luxury Buildings</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/22.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">One Thousand Museum</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single tab content end -->
                            </div>
                            <div class="tab-pane fade" id="contactese" role="tabpanel" aria-labelledby="contactese-tab">
                                <!-- single tab content start -->
                                <div class="row g-24 mb--25 justify-content-center">
                                    <div class="col-lg-3">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/20.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Park Offices</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/21.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">Maly Buildings</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-case-wrapper">
                                            <a href="project-details.html">
                                                <img class="main-2" src="{{ asset('frontend') }}/assets/images/project/22.jpg" alt="projects-images">
                                            </a>
                                            <div class="content">
                                                <a href="project-details.html">
                                                    <h5 class="title">One Thousand Museum</h5>
                                                </a>
                                                <span>Building, Renovation</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single tab content end -->
                            </div>
                        </div>
                    </div>
                    <!-- projecta area tabs end -->
                </div>
            </div>
        </div>
    </div>
    <!--rts projects area end -->

@endsection
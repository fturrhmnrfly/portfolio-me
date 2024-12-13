<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Portfolio-rflyyyyyyyyyyyyyyyyy_</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">RF</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#masthead"> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skill">Skill</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Project</a></li>
                    <li class="nav-item"><a class="nav-link" href="#certificate">Certificate</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">RAFLY FATURACHMAN</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Thanks for taking the time to visit my portfolio. Here,
                        I’m excited to share my work, journey, and experiences in your field, e.g., design, photography,
                        or app development</h2>
                    <a class="btn btn-primary" href="#about">Get Started</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="about-section bg-dark text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">About Me</h2>
                    <p class="text-white-50">
                        Hey there! Im Rafly faturachman, a passionate web desaigner based in Bogor.
                        Ive always been driven by creativity and the desire to solve problems in unique ways.
                        Over the years, Ive had the privilege of working on a variety of projects that have pushed me to
                        learn, grow, and refine my skills.
                        Im all about finding innovative solutions, and I love collaborating with others to bring fresh
                        ideas to life. When Im not working, you can find me.
                        Feel free to browse through my work—if anything catches your eye or youd like to connect, dont
                        hesitate to reach out. Id love to chat!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Skill Section -->
    <section class="skill-section bg-dark text-center" id="skill">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">My Skills</h2>
                    <div class="row">
                        @foreach ($skill as $item)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <i class="fas fa-code text-primary mb-3"></i>
                                        <!-- Ikon ini dapat diganti sesuai kebutuhan -->
                                        <h4 class="card-title">{{ $item->title }}</h4>
                                        <p class="card-text text-black-50">
                                            {{ implode(' - ', explode(',', $item->description)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="page-section bg-dark" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-white text-uppercase">Project</h2>
            </div>
            <div class="row">
                @foreach ($project as $project)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" href="{{ $project->link }}" target="_blank">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <i class="fas fa-external-link-alt fa-3x"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $project->name }}</div>
                                <div class="portfolio-caption-subheading text-muted">{{ $project->description }}</div>
                                <a href="https://{{ $project->link }}" target="_blank">
                                    <div class="portfolio-caption-heading text-muted">{{ $project->link }}</div>
                                </a>
                                <div class="portfolio-caption-date">
                                    {{ \Carbon\Carbon::parse($project->date)->format('d M Y') }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Certificates Section -->
    <section class="page-section bg-dark" id="certificates">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-black text-uppercase">Certificates</h2>
            </div>
            <div class="row">
                @foreach ($certificates as $certificate)
                    <div class="col-lg-4">
                        <div class="team-member">
                            <div class="pdf-preview mb-3">
                                <embed src="{{ asset('storage/public/certificates/' . $certificate->file) }}"
                                    type="application/pdf" width="100%" height="300px" />
                            </div>
                            <h4>{{ $certificate->name }}</h4>
                            <p class="text-muted">{{ $certificate->issued_by }}</p>
                            <p>{{ $certificate->description }}</p>
                            <p class="text-muted">Issued: {{ $certificate->issued_at->format('M Y') }}</p>
                            <a href="{{ asset('storage/public/certificates/' . $certificate->file) }}"
                                class="btn btn-primary btn-sm" target="_blank">
                                View Full PDF
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-dark" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <!-- Address -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>
                <!-- Phone Number 1 -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-phone text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone Number</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+628988049488</div>
                        </div>
                    </div>
                </div>
                <!-- Phone Number 2 -->
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-phone text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Instagram</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">@rflyyyyyyyyyyyyyyyyy_</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
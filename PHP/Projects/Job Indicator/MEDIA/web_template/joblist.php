<?php

/**
 * This is the system landing page
 */

// start a session
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Indicator List</title>

    <!-- Bootstrap core CSS -->
    <link href="include/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- start of header -->

    <main>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">Job Indicator List</span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Job Indicator</a></li>
                    <li class="nav-item"><a href="joblist.php" class="nav-link active">Job Indicator List</a></li>
                </ul>
            </header>
        </div>

        <div class="container">
            <!-- Accordion Parent -->
            <div class="accordion" id="accordionExample">
                <!-- Accordion Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Web Designer
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                        </div>
                    </div>
                </div>

                <!-- Accordion Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Database Administrator
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">

                        </div>
                    </div>
                </div>

                <!-- Accordion Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Front End Developer
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionList">
                        <div class="accordion-body">
                            <!-- Accordion Parent -->
                            <div class="accordion" id="accordionList">
                                <!-- Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFront">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStrehl" aria-expanded="true" aria-controls="collapseStrehl">
                                            <div class="container ps-0">
                                                <div class="row g-0 justify-content-around">
                                                    <span class="col-6 p-0">Marcelo Strehl</span>
                                                    <span class="col-6 score text-end">56.76</span>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseStrehl" class="accordion-collapse collapse" aria-labelledby="headingFront" data-bs-parent="#accordionList">
                                        <div class="accordion-body">

                                        </div>
                                    </div>
                                </div>

                                <!-- Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFront">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDoe" aria-expanded="true" aria-controls="collapseDoe">
                                            <div class="container ps-0">
                                                <div class="row g-0 justify-content-around">
                                                    <span class="col-6 p-0">John Doe</span>
                                                    <span class="col-6 score text-end">55.14</span>
                                                </div>
                                            </div>
                                        </button>


                                    </h2>
                                    <div id="collapseDoe" class="accordion-collapse collapse" aria-labelledby="headingFront" data-bs-parent="#accordionList">
                                        <div class="accordion-body">

                                        </div>
                                    </div>
                                </div>

                                <!-- Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFront">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMiranda" aria-expanded="true" aria-controls="collapseMiranda">
                                            <div class="container ps-0">
                                                <div class="row g-0 justify-content-around">
                                                    <span class="col-6 p-0">Mary Miranda</span>
                                                    <span class="col-6 score text-end">22.39</span>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseMiranda" class="accordion-collapse collapse" aria-labelledby="headingFront" data-bs-parent="#accordionList">
                                        <div class="accordion-body">

                                        </div>
                                    </div>
                                </div>

                                <!-- Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFront">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMac" aria-expanded="true" aria-controls="collapseMac">
                                            <div class="container ps-0">
                                                <div class="row g-0 justify-content-around">
                                                    <span class="col-6 p-0">Paul McDonnalds</span>
                                                    <span class="col-6 score text-end">27.00</span>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseMac" class="accordion-collapse collapse show" aria-labelledby="headingFront" data-bs-parent="#accordionList">
                                        <div class="accordion-body">
                                            <p>E-mail: paul.mac@gmail.com</p>
                                            <p>Phone Number: +1 443 3331-0012</p>
                                            <div class="row">
                                                <h6>Competences Levels</h6>

                                                <div class="mb-3 col-6">
                                                    <ul>
                                                        <li class="row justify-content-end">
                                                            <span class="col-6">HTML</span>
                                                            <span class="col-6">No knowledge</span>
                                                        </li>

                                                        <li class="row justify-content-end">
                                                            <span class="col-6">CSS</span>
                                                            <span class="col-6">Beginner</span>
                                                        </li>

                                                        <li class="row justify-content-end">
                                                            <span class="col-6">Javascript</span>
                                                            <span class="col-6">Beginner</span>
                                                        </li>

                                                        <li class="row justify-content-end">
                                                            <span class="col-6">Angular framework</span>
                                                            <span class="col-6">Full</span>
                                                        </li>

                                                        <li class="row justify-content-end">
                                                            <span class="col-6">Automated Tests</span>
                                                            <span class="col-6">No knowledge</span>
                                                        </li>

                                                        <li class="row justify-content-end">
                                                            <span class="col-6">Work in groups</span>
                                                            <span class="col-6">Senior</span>
                                                        </li>

                                                        <li class="row justify-content-end">
                                                            <span class="col-6">Work with Agile Methods</span>
                                                            <span class="col-6">Full</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </main>


    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
</head>

<body>


    <script src="include/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
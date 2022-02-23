<?php

/**
 * This is the system landing page
 */

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Indicator</title>

    <!-- Bootstrap core CSS -->
    <link href="include/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- start of header -->

    <main>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">Job Indicator</span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Job Indicator</a></li>
                    <li class="nav-item"><a href="joblist.php" class="nav-link">Job Indicator List</a></li>
                </ul>
            </header>
        </div>

        <div class="container">

            <!-- main content goes here -->

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Web Designer
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h6>Competences Levels</h6>
                            <form>
                                <div class="mb-3">
                                    <label for="select-html" class="form-label">HTML</label>
                                    <select class="form-select" id="select-html" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-css" class="form-label">CSS</label>
                                    <select class="form-select" id="select-css" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-js" class="form-label">Javascript</label>
                                    <select class="form-select" id="select-js" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-angular" class="form-label">Angular framework</label>
                                    <select class="form-select" id="select-angular" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-tests" class="form-label">Automated Tests</label>
                                    <select class="form-select" id="select-tests" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-groups" class="form-label">Work in groups</label>
                                    <select class="form-select" id="select-groups" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-agile" class="form-label">Work with Agile Methods</label>
                                    <select class="form-select" id="select-agile" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputText" class="form-label">Applicant Name</label>
                                    <input type="text" class="form-control" id="exampleInputText">
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="exampleEmail" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="exampleEmail">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="examplePhoneNumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="examplePhoneNumber">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Database Administrator
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h6>Competences Levels</h6>
                            <form>
                                <div class="mb-3">
                                    <label for="select-html" class="form-label">HTML</label>
                                    <select class="form-select" id="select-html" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-css" class="form-label">CSS</label>
                                    <select class="form-select" id="select-css" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-js" class="form-label">Javascript</label>
                                    <select class="form-select" id="select-js" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-angular" class="form-label">Angular framework</label>
                                    <select class="form-select" id="select-angular" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-tests" class="form-label">Automated Tests</label>
                                    <select class="form-select" id="select-tests" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-groups" class="form-label">Work in groups</label>
                                    <select class="form-select" id="select-groups" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-agile" class="form-label">Work with Agile Methods</label>
                                    <select class="form-select" id="select-agile" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputText" class="form-label">Complete Name</label>
                                    <input type="text" class="form-control" id="exampleInputText">
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="exampleEmail" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="exampleEmail">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="examplePhoneNumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="examplePhoneNumber">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Front End Developer
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h6>Competences Levels</h6>
                            <form>
                                <div class="mb-3">
                                    <label for="select-html" class="form-label">HTML</label>
                                    <select class="form-select" id="select-html" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-css" class="form-label">CSS</label>
                                    <select class="form-select" id="select-css" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-js" class="form-label">Javascript</label>
                                    <select class="form-select" id="select-js" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-angular" class="form-label">Angular framework</label>
                                    <select class="form-select" id="select-angular" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-tests" class="form-label">Automated Tests</label>
                                    <select class="form-select" id="select-tests" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-groups" class="form-label">Work in groups</label>
                                    <select class="form-select" id="select-groups" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="select-agile" class="form-label">Work with Agile Methods</label>
                                    <select class="form-select" id="select-agile" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">No knowledge</option>
                                        <option value="2">Beginner</option>
                                        <option value="3">Full</option>
                                        <option value="4">Expert</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputText" class="form-label">Complete Name</label>
                                    <input type="text" class="form-control" id="exampleInputText">
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="exampleEmail" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="exampleEmail">
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="examplePhoneNumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="examplePhoneNumber">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
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
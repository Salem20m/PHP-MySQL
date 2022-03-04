<?php

	require_once("../lib/DB.php");
	$jobs = $DB->findAll("jobs");
	
	if($_POST) {
		extract($_POST);
		
		$DB->insert('applicant','name,email,phone_number,job_id',[$name,$email,$phone,$job_id]);
		
		$last_applicant = $DB->find('applicant','id','? ORDER BY job_id DESC',[1]); //Getting last applicant inserted
		
		$coms = $DB->findAll('competences', '*', 'job_id = ?', [$job_id]);
		$i = 0;
		foreach ($coms as $com) {
			$DB->insert('applicant_competence','applicant_id,competence_id,level_id',[$last_applicant['id'],$com['id'],$levels[$i]]);
			$i = $i + 1;
		}
		
		
	}
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
	            
	            <?php foreach ($jobs as $job): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="#heading">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$job['id']?>" aria-expanded="false" aria-controls="collapse">
                            <?= $job['job'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?=$job['id']?>" class="accordion-collapse collapse" aria-labelledby="#heading" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h6>Competences Levels</h6>
                            <form action="index.php" method="POST">
	                            <input name="job_id" hidden value="<?= $job['id'] ?>">
	                            <?php
	                                $id = $job['id'];
		                            $coms = $DB->findAll('competences', '*','job_id = ?', [$id]);
		                            //echo "<pre>";
		                            //var_dump($coms);
		                            foreach($coms as $com):
			                            ?>
		                                <div class="mb-3">
		                                    <label for="select-<?=$com['competence']?>" class="form-label"><?=$com['competence']?></label>
		                                    <select class="form-select" name="levels[]" id="select-<?=$com['competence']?>" aria-label="Default select example" required>
		                                        <option selected value="">Open this select menu</option>
		                                        <option value="1">No knowledge</option>
		                                        <option value="2">Beginner</option>
		                                        <option value="3">Full</option>
		                                        <option value="4">Expert</option>
		                                    </select>
		                                </div>
	                            <?php endforeach; ?>
	                            

                                <div class="mb-3">
                                    <label for="exampleInputText" class="form-label">Complete Name</label>
                                    <input type="text" class="form-control" id="exampleInputText" name="name" required>
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="exampleEmail" class="form-label">E-mail</label>
                                        <input type="email" class="form-control" id="exampleEmail" name="email" required>
                                    </div>

                                    <div class="mb-3 col-6">
                                        <label for="examplePhoneNumber" class="form-label">Phone Number</label>
                                        <input type="phone" class="form-control" id="examplePhoneNumber" name="phone" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
		            
	            <?php endforeach; ?>
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
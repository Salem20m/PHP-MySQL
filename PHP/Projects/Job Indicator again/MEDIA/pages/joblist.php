<?php
	
	require_once('../lib/DB.php');
	
	$jobs = $DB->findAll("jobs");

// start a session
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
	            
	            <?php $counter = 0;
		            foreach($jobs as $job):
			            $applicants = $DB->getApplicants($job['id']);
			            ?>
	                <!-- Accordion Item -->
	                
		
		            <div class="accordion-item">
			            <h2 class="accordion-header" id="headingThree">
				            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$counter?>" aria-expanded="false" aria-controls="collapseThree">
					            <?= $job['job']?>
				            </button>
			            </h2>
			            <div id="collapse<?=$counter?>" class="accordion-collapse collapsed collapse" aria-labelledby="headingThree" data-bs-parent="#accordionList<?=$counter?>">
				            <div class="accordion-body">
					            <!-- Accordion Parent -->
					            <div class="accordion" id="accordionList<?=$counter?>">
						            
						            <?php
						                foreach ($applicants as $app):
				                    ?>
							            <!-- Accordion Item -->
							            <div class="accordion-item">
								            <h2 class="accordion-header" id="headingFront">
									            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMac<?=$counter?>" aria-expanded="true" aria-controls="collapseMac">
										            <div class="container ps-0">
											            <div class="row g-0 justify-content-around">
												            <span class="col-6 p-0"><?=$app['name']?></span>
												            <span class="col-6 score text-end"><?=$app['referral_value']?></span>
											            </div>
										            </div>
									            </button>
								            </h2>
								            <div id="collapseMac<?=$counter?>" class="accordion-collapse collapse" aria-labelledby="headingFront" data-bs-parent="#accordionList">
									            <div class="accordion-body">
										            <p>E-mail: <?=$app['email']?></p>
										            <p>Phone Number: <?=$app['phone']?></p>
										            <div class="row">
											            <h6>Competences Levels</h6>
											
											            <div class="mb-3 col-6">
												            <ul>
													            <?php foreach($app['competences_levels'] as $com): ?>
													            <li class="row justify-content-end">
														            <span class="col-6"><?=$com['competence']?></span>
														            <span class="col-6"><?=$com['level']?></span>
													            </li>
													            <?php  endforeach; ?>
													            
												            </ul>
											            </div>
										            </div>
									            </div>
								            </div>
							            </div>
						            <?php endforeach; ?>
					            </div>
				            </div>
			            </div>
		            </div>
		            
	            <?php $counter = $counter + 1;
		            endforeach; ?>
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
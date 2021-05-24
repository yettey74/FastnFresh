<div class="jobsadds" style="text-align: center; float: center;">
	  <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#jobs">Jobs </button>
	  <div id="jobs" class="collapse">
	  	<div class="jobsadds" style="border-radius:185px;">
			  <div id="jobscarousel" class="carousel slide" data-ride="carousel">
				  
			  <!-- Indicators -->
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
						$specialQ = "SELECT s.*, `pt`.* 
									FROM `special` AS `s`
									JOIN `producttype` AS `pt`  
									ON`s`.`ptid` = `pt`.`ptid`
									WHERE `active` = '1'";
						if ( $conn->query($specialQ) == TRUE ){	
						  $count = 0;						
						  $specialR = $conn->query($specialQ);
						  if( $specialR !== false ) {
							foreach( $specialR as $special){
								$ptid = $special['ptid'];
								if( $count == 0 ){
						  			echo '<div class="item active">';
									$count = $count + 1;							
								} else {
						  			echo '<div class="item">';
								}
								echo'<img src="images/' . $special['specialImage'] . '" alt="' .  $special['specialTitle']. ' " title="' .  $special['specialTitle']. '" width="50px" height="50px">
										<div class="carousel-caption">
										  <h3> ' . $special['specialTitle'] . '</h3>
										  <p>' . $special['specialBlurb'] . '</p>
										</div>
									</div>';
							} 
						  } else {
							  echo 'Error';
						  }
						} else {
							echo "<div>No Specials Available.</div>";
						}					
					?>			 
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#jobscarousel" role="button" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#jobscarousel" role="button" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		  </div>
		  </div>
	  </div><!-- END advert-->
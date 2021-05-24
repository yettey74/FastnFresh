<?php
echo '<button type="button" class="btn btn-success" data-toggle="collapse" data-target="#demo">Specials </button>
	  <div id="demo" class="collapse">
	  <div class="adverts" style="background-color: #FCD299; border-radius:185px;">
			  <div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				  <li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

				  <div class="item active">
					<img src="images/apple.png" alt="Apple" width="50px" height="50px">
					<div class="carousel-caption">
					  <h3>Apple</h3>
					  <p>Apples are very delicious.</p>
					</div>
				  </div>

				  <div class="item">
					<img src="images/banana.png" alt="Banana" width="50px" height="50px">
					<div class="carousel-caption">
					  <h3>Banana</h3>
					  <p>Bananas are very delicious.</p>						 
					</div>
				  </div>

					<div class="item">
					<img src="images/cherry.png" alt="Cherry" title="Cherry" width="50px" height="50px">
					<div class="carousel-caption">
					  <h3>Cherry</h3>
					  <p>Cherries are very delicious.</p>
					</div>
				  </div>

				  <div class="item">
					<img src="images/potatoe.png" alt="Potatoe" width="50px" height="50px">
					<div class="carousel-caption">
					  <h3>Potatoe</h3>
					  <p>Potatos are very delicious.</p>
					</div>
				  </div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				  <span class="sr-only">Next</span>
				</a>
			</div>
		  </div>
		  </div>';
?>
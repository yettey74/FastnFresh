<!DOCTYPE html>
<html>
<head>
  <title>Frontpage</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <link rel="stylesheet" href="css/style.css">
<script>
  function openSlideMenu(){
    document.getElementById('menu').style.width = '250px';
    document.getElementById('content').style.marginLeft = '250px';
  }
  function closeSlideMenu(){
    document.getElementById('menu').style.width = '0';
    document.getElementById('content').style.marginLeft = '0';
  }
</script>
</head>
<body>

  <div id="content">

    <span class="slide">
      <a href="#" onclick="openSlideMenu()">
        <i class="fas fa-bars"></i>
      </a>
    </span>

    <div id="menu" class="nav">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
      </a>
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Services</a>
      <a href="#">Portfolio</a>
      <a href="#">Contact</a>
    </div>

  </div>
<div id="profiles">test</div>

<div class="footer" style="position: fixed; bottom: 0; right: 0; margin-bottom: -5px; z-index: 100;">
	  <a href="http://www.fastfreshproduce.com.au" target="_blank" style="z-index: 999!important; cursor: pointer!important;"><img src="images/bannerFFP.png" style="max-width: 100%; min-width: 100%;"></a>
	</div>
</body>
</html>
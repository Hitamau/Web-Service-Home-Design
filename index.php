<!DOCTYPE html>
<html lang="en">
<head>
  <title>Desain Rumah</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<style type="text/css">
body { background-color:#a0855b; }

  .geblek{
    background-image: url('header2.jpg');
    -webkit-background-size: 100% 100%;
    -moz-background-size: 100% 100%;
    -o-background-size: 100% 100%;
    background-size: 100% 100%;
  }

</style>

<div class="jumbotron text-center geblek">
  <font color="Brown">
  <h1 style="font-family:algreya; font-size:100px;">Desain Rumah </h1>
  <p style="font-family:algereya; font-size:25px;">Project UAS Web Service</p> 
  </font>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

  <li class="nav-item">
  <a class="nav-link" href="index.php?">Home <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Jenis Desain Rumah
  </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?Housedesign=moderndesign">Desain Rumah Modern</a>
          <a class="dropdown-item" href="index.php?Housedesign=Traditionaldesign">Desain Rumah Tradisional</a>
          <a class="dropdown-item" href="index.php?Housedesign=vintagedesign">Desain Rumah Vintage</a>
          <a class="dropdown-item" href="index.php?Housedesign=bohemiandesign">Desain Rumah Bohemian</a>
        </div>
      
      <li class="nav-item">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Desain Interior
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?Housedesign=livingroomdesign">Ruang Tamu</a>
          <a class="dropdown-item" href="index.php?Housedesign=bedroomdesign">Kamar</a>
          <a class="dropdown-item" href="index.php?Housedesign=diningroom">Ruang Makan</a>
          <a class="dropdown-item" href="index.php?Housedesign=bathroomdesign">Kamar Mandi</a>
          <a class="dropdown-item" href="index.php?Housedesign=familyroom">Ruang Keluarga</a>
          <a class="dropdown-item" href="index.php?Housedesign=interiorkitchen">Dapur</a>
        </div>

      <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Desain Eksterior
        </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="index.php?Housedesign=Swimmingpool">Kolam Renang</a>
        <a class="dropdown-item" href="index.php?Housedesign=backyard">Halaman Rumah</a>
        <a class="dropdown-item" href="index.php?Housedesign=Garden">Taman</a>
      </li>
      </li>
      
    </ul>
<form class="form-inline my-2 my-lg-0" action="index.php" method="post">
 <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Housedesign" aria-label="Search">
 <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
  </div>

</nav>  
<div class="container">
  <div class="row">
    <div class="col-sm-1">
    </div>
<div class="col-sm-12">
      <h3></h3> 

      <?php
if(isset($_REQUEST['Housedesign'])){
$Housedesign = $_REQUEST['Housedesign'];
}
else {
$Housedesign = 'Housedesign';
}

$url='https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=c627991fc2b2f4372196745eabd2a86a&text='.$Housedesign;

$url = file_get_contents($url);
$xml = simplexml_load_string($url);
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
?>
<div class="row">

<?php
//print_r($xml);
foreach($xml->photos->photo as $foto){
?>  
        <div class="col-sm-<?php echo $bootstrapColWidth; ?>">
<?php
echo $foto['title'];
$alamat = 'https://farm' . $foto['farm'] . '.staticflickr.com/' . 
$foto['server'] . '/' .
$foto['id'] . '_' .
$foto['secret'] . '.jpg'
;
echo '<br>';
echo "<img src='$alamat' class='img-thumbnail'>";

?>
</div>
<?php
$rowCount++;
if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
}
?>
</div>
    </div>
  </div>
</div>

</body>
</html>
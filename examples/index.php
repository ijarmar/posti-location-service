<?php 
require '../vendor/autoload.php';
$locations = new postiApi\Locations('https://locationservice.posti.com/api/2/location');

if(isset($_GET['city'])) {
    $city = $_GET['city'];
    $searchResults = $locations->getLocationsByCity($city);
}

?>
<!DOCTYPE html>
 <html lang="fi">
  <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Basic Tags -->
   <meta name="description" content="">
   <link rel="icon" href="favicon.ico">
   <title>Demo</title>

   <!-- Bootstrap -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Custom styles for this project -->
   <link href="css/style.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>
    <header class=""></header>
    
       <main>
        <div class="container">
         <h1 class="text-center mt-5">Search for Posti locations</h1>
         
         <div class="container mt-5 pt-5 mx-auto d-flex justify-content-center align-items-center flex-row">
          <form action="index.php" method="GET">
           <input type="text" class="form-control pt-0" style="display: inline; width: auto" name="city" required>
           <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
          <div class="row d-flex flex-column align-items-center mt-5">
           <?php
            if(isset($searchResults)) {

                foreach($searchResults as $output) {
                    echo "<div class='element'>
                           <div class='card' style='width: 38rem;'>
                            <div class='card-body'>
                             <h5 class='card-title'>".$output['publicName']."</h5>
                             <h6 class='card-subtitle mb-2 text-muted'>".$output['address']['address']."</h6>
                             <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                             <p class='card-link'>PuPcode: ".$output['pupCode']."</p>
                            </div>
                           </div>
                          </div>";
                }

            }
           ?>
          </div>
       </main>
    
       <footer class=""></footer>
    
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      </body>
     </html>
</head>
<body>
    
</body>
</html>
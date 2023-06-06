<?php include 'inc/functions.php';
   $all_services = array_reverse(service_get_all());
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Etkinlikler - Showmarket Yönetim</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
 <?php include 'sidenav.php' ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
  <?php include 'topnav.php'; ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Etkinlikler</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active" aria-current="page">Etkinlikler</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">Etkinlik Ekle</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Tüm Etkinlikler</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="budget">Sektör</th>
                    <th scope="col" class="sort" data-sort="status">Kategori</th>
                    <th scope="col">İşlem</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php 
$page = ! empty( $_GET['s'] ) ? (int) $_GET['s'] : 1;
$total = count( $all_services ); //total items in array    
$limit = 15; //per page    
$totalPages = ceil( $total/ $limit ); //calculate total pages
$page = max($page, 1); //get 1 page when $_GET['page'] <= 0
$page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
$offset = ($page - 1) * $limit;
if( $offset < 0 ) $offset = 0;

$all_services = array_slice( $all_services, $offset, $limit );

         
     
         
         for ($i=0; $i < count( $all_services ); $i++) { 
           echo '<tr>
           <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="'.$all_services[$i]['name'].'" src="https://showmarket-api.herokuapp.com/api/uploadImage/get-image/'.$all_services[$i]['img'].'">
                          </a>
                          <div class="media-body">
                            <span class="name mb-0 text-sm">'.$all_services[$i]['name'].'</span>
                          </div>
                        </div>
                      </th>
                      <td>'.implode(', ', $all_services[$i]['category']).'</td>
                      <td class="text-right">
                      <a href="etkinlik-duzenle.php?id='.$all_services[$i]['_id'].'" class="btn btn-sm btn-default">Düzenle</a>
                      <a href="etkinlik-sil.php?id='.$all_services[$i]['_id'].'" class="btn btn-sm btn-primary">Sil</a>
                    </td> </tr>';
         }
          ?>
                 
                  
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
           
            
            <nav aria-label="...">
                <ul class="pagination justify-content-center mb-0">
                <?php $link = 'etkinlikler.php?s=%d';
$pagerContainer = '';   
if( $totalPages != 0 ) 
{
  if( $page == 1 ) 
  { 
    $pagerContainer .= ''; 
  } 
  else 
  { 
    $pagerContainer .= sprintf( ' <li class="page-item">
                    <a class="page-link" href="' . $link . '"> &#171; </a></li>', 1 );     
                    $pagerContainer .= sprintf( ' <li class="page-item">
                    <a class="page-link" href="' . $link . '">  '. $page - 1 .' </a></li>', $page - 1 ); 
  }
  $pagerContainer .= ' <li class="page-item active">
  <a class="page-link">' . $page . '</a>
</li>'; 
  if( $page == $totalPages ) 
  { 
    $pagerContainer .= ''; 
  }
  else 
  { 
    $pagerContainer .= sprintf( ' <li class="page-item">
    <a class="page-link" href="' . $link . '">  '. $page + 1 .' </a></li>', $page + 1 ); 
    $pagerContainer .= sprintf( '<li class="page-item">
    <a class="page-link" href="' . $link . '">  &#187; </a></li>', $totalPages ); 

  }           
}                   

echo $pagerContainer; 

?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
   
      <!-- Footer -->
      <?php include 'footer.php';?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>

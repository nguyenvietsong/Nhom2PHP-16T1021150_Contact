<?php
include_once 'connectDB.php';
$result = mysqli_query($con, 'SELECT count(ma) as total FROM data');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
	$current_page = $total_page;
} else if ($current_page < 1) {
	$current_page = 1;
}

$start = ($current_page - 1) * $limit;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="2.css">
  <title>Danh Bạ Google</title>
</head>

<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light">

    <div class="collapse navbar-collapse" id="myNavbar">
      <div class="container-fluid">
        <div class="row">
          <!-- sidebar -->
          <div class="col-xl-3 sidebar fixed-top">
            <!-- danh ba -->
            <div class="navbar-brand d-block mx-auto p-2 mb-2 " style="background: none">
              <i class="fas fa-bars mr-2"></i>
             
              <a href="#" class="text-dark h5"><b>Danh Bạ</b> </a>
            </div>
            <!-- button them moi lien he -->

            <div class="mt-1 btn  ">
              <a href="#" class="btn btn-light search-button  p-1 pl-3 pr-3">
                <span aria-hidden="true" class="mr-2"><svg width="36" height="36" viewBox="0 0 36 36">
                    <path fill="#34A853" d="M16 16v14h4V20z"></path>
                    <path fill="#4285F4" d="M30 16H20l-4 4h14z"></path>
                    <path fill="#FBBC05" d="M6 16v4h10l4-4z"></path>
                    <path fill="#EA4335" d="M20 16V6h-4v14z"></path>
                    <path fill="none" d="M0 0h36v36H0z"></path>
                  </svg></span>
                <span class="float-right mt-2 ">Tạo liên hệ</span>
              </a>


              <!-- <button class="btn btn-light"> <i class="fas fa-plus-circle"></i>Tạo liên hệ</button> -->
            </div>
            <ul class="navbar-nav flex-column mt-3 font-weight-bold">
              <li class="nav-item"><a href="Home.php" class="nav-link  current p-2  "><i class="far fa-user   mr-3"></i>Danh bạ <b class="float-right mr-4"></b> </a></li>
              <li class="nav-item "><a href="#" class="nav-link current1 p-2  sidebar-link"><i class="fas fa-history mr-3"></i>Thường xuyên liên hệ </a></li>
              <li class="nav-item"><a href="#" class="nav-link current1 p-2  sidebar-link"><i class="far fa-copy mr-3"></i>Liên hệ trùng lặp</a></li>
              <div class="bottom-border"></div>
              <li class="nav-item"><a href="#" class="nav-link current1 p-2  sidebar-link"><i class="fas fa-chevron-up mr-3"></i></i>Nhãn</a></li>
              <li class="nav-item"><a href="FillerContact.php?nhan=1" class="nav-link current1 p-2  sidebar-link"><i class="fas fa-tag mr-3"></i>Người yêu</a></li>
              <li class="nav-item"><a href="FillerContact.php?nhan=2" class="nav-link current1 p-2  sidebar-link"><i class="fas fa-tag mr-3"></i>Gia Đình</a></li>
              <li class="nav-item"><a href="FillerContact.php?nhan=3" class="nav-link current1 p-2  sidebar-link"><i class="fas fa-tag mr-3"></i>Bạn bè</a></li>
              <li class="nav-item"><a href="#" class="nav-link current1 p-2  sidebar-link"><i class="fas fa-plus mr-3"></i>Tạo Nhãn</a></li>
            </ul>
          </div>
          <!-- end of sidebar -->

          <!-- top-nav search -->
          <div class="col-xl-9 ml-auto fixed-top  mt-3">
            <div class="row ">

              <div class="col-md-8 bg-light search-input  p-1 ">
                <form>
                  <div class="input-group ">
                    <button type="button" class="btn btn-light search-button mr-2 ml-2"><i class="fas fa-search "></i></button>
                    <input type="text" id="myInput" class="form-control search-input" placeholder="Tìm Kiếm...">

                  </div>
                </form>
              </div>
              <div class="col-md-4 ">
                <ul class="navbar-nav pl-5 ml-5">
                  <li class="nav-item icon-parent "><a href="#" class="nav-link  mr-2"><i class="far fa-question-circle fa-lg"></i></a></li>
                  <li class="nav-item icon-parent "><a href="#" class="nav-link  mr-5"><i class="fas fa-cog fa-lg"></i></a></li>
                  <li class="nav-item icon-parent "><a href="#" class="nav-link btn bo "><i class="fas fa-ellipsis-v"></i><i class="fas fa-ellipsis-v"></i><i class="fas fa-ellipsis-v"></i></a></li>
                
                </ul>
              </div>
            </div>

            <!-- table  -->

          </div>
          <!-- end of top-nav -->


        </div>
      </div>
    </div>
  </nav>
  <!-- end of navbar -->

  <!-- table  -->
  <section>
    <div class="container-fluid  ">
      <div class="row">
        <div class="col-xl-9  ml-auto">
          <div class="row pt-md-5   ">
            <table width="80%" class="text-xs-center mt-2 bg-light position-fixed" >
              <thead class="border-bottom  ">
                <tr>
                  <th width="20%">Name</th>
                  <th width="20%">Phone</th>
                  <th width="20%">Email</th>
                
                </tr>
              </thead>
              <tbody id="myTable">
                <?php
                include_once 'connectDB.php';
                $q = " SELECT * FROM data ORDER BY name LIMIT $start, $limit";
                $query = mysqli_query($con, $q);
                while ($row = mysqli_fetch_assoc($query)) {
                  ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                      <div class="d-flex justify-content-center">
                        <a class="text-white btn btn-warning mr-3" href="update.php?ma=<?php echo $row['ma']; ?>"><i class="fas fa-edit"></i> </a>
                        <a onclick="return confirm('Do you want delete??')" ; class="text-white btn btn-danger" href="delete.php?ma=<?php echo $row['ma']; ?>"><i class="fas fa-trash-alt"></i> </a>
                      </div>
                    </td> 
                  </tr>
                <?php
                }
                ?>
              </tbody>

            </table>
            <div class=" pagination d-flex justify-content-center align-items-center pt-2">
              <?php
              if ($current_page > 1 && $total_page > 1) {
                echo '<a href="Home.php?page=' . ($current_page - 1) . '"><i class="fas fa-angle-double-left"></i> Previous</a>  ';
              }

              for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                  echo '<span>' . $i . '</span>  ';
                } else {
                  echo '<a href="Home.php?page=' . $i . '">' . $i . '</a>  ';
                }
              }

              if ($current_page < $total_page && $total_page > 1) {
                echo '<a href="Home.php?page=' . ($current_page + 1) . '">Next <i class="fas fa-angle-double-right"></i></a>  ';
              }
              ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>




  <div style="height: 900px;"></div>

  <!-- footer -->
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-9 col-lg-9 col-md-8 ml-auto">
          <div class="row border-top pt-3">
            <div class="col-lg-6 text-center">
              <ul class="list-inline">
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark">Contact Google</a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark">About</a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark">Support</a>
                </li>
                <li class="list-inline-item mr-2">
                  <a href="#" class="text-dark">Blog</a>
                </li>
              </ul>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end of footer -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src="/assets/js/script.js"></script>
  <script>
		$(document).ready(function() {
			$("#myInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>s
</body>

</html>
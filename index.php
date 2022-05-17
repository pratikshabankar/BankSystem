<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
      .navbarUser{
        background-color:'blue'
      }
      </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">

    <title>Basic Banking System</title>
  </head>

  <body>
        
  
      <div class="container-fluid">
        
      <!-- Introduction section -->
            <div class="row intro py-1">
              
              <div class="col-sm-12 col-md bankImg">
                <?php
          include 'navbar.php';
        ?>
                <div class="heading text-center my-5 introText">
                  <h2 class="text">Let's Start Something Big Together.</h2>
                  <h3>Welcome <br>to</h3>
                  <div class="waviy">
                      <span style="--i:1">I</span>
                      <span style="--i:2">N</span>
                      <span style="--i:3">D</span>
                      <span style="--i:4">I</span>
                      <span style="--i:5">A</span>
                      <span style="--i:6">N</span>
                      <span style="--i:7"></span>
                      <span style="--i:7"></span>
                      <span style="--i:7"></span>
                      <span style="--i:7"></span>
                      <span style="--i:8">B</span>
                      <span style="--i:9">A</span>
                      <span style="--i:10">N</span>
                      <span style="--i:11">K</span>

                </div>
                </div>
              </div>
            </div>

      <!-- Activity section -->
            <div class="row activity text-center">

            <div class="cardContents">
                  <div class="col-md act">
                    <div class="card" style="width: fit-content;border-radius: 1rem;">
                        <div class="card-body">
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiIIM8TYGArqTJwVadV1EvyKKr15Z5nkY4we7MKxJ2XTlxw7nJzrNKGWaMyDzwg67zYIw&usqp=CAU" class="img-fluid">
                          <br>
                          <a href="createuser.php"><button style="background-color : #2785C4;">Create a User</button></a>
                        </div>
                    </div>
                  </div>

                  <div class="col-md act">
                    <div class="card" style="width: fit-content;border-radius: 1rem;">
                        <div class="card-body">
                          <img src="transfer.jpg" class="img-fluid">
                          <br>
                          <a href="transfermoney.php"><button style="background-color : #2785C4;">Make a Transaction</button></a>
                        </div>
                    </div>
                  </div>

                  <div class="col-md act">
                    <div class="card" style="width: fit-content;border-radius: 1rem;">
                      <div class="card-body">
                        <img src="history.jpg" class="img-fluid">
                        <br>
                        <a href="transactionhistory.php"><button style="background-color : #2785C4;">Transaction History</button></a>
                      </div>
                    </div>
                  </div>
            </div>
                  

            </div>
      </div>
      <footer class="text-center mt-5 py-2">
        <p>&copy 2021. Made by <b>We four</b> <br> ICOER foundation</p>
      </footer>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
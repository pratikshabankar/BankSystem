<?php
include 'conf.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from user where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from user where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    // constraint to check input of negative value by user
    if ($amount < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Your Account Balance is zero.)'; // showing an alert box.
        echo '</script>';
    }

    // constraint to check insufficient balance.
    elseif ($amount > $sql1['balance']) {
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")'; // showing an alert box.
        echo '</script>';
    }

    // constraint to check zero values
    elseif ($amount == 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo '</script>';
    } else {
        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE user set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);

        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE user set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction_table (`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";

        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Hurray! Transaction is Successful');
                           </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Navigation bar-->



    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SPARKS BANK </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="createuser.php">CREATE USER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="transfermoney.php">TRANSFER MONEY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="transactionhistory.php">TRANSACTION
                            HISTORY</a>
                    </li>

            </div>


            </ul>

        </div>
        </div>
    </nav> -->


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Money Transfer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="secondNavbar.css">
    <link rel="stylesheet" type="text/css" href="selecteduserdetails.css">


    <!-- <style type="text/css">
    /* .transferBody {
        background-image: linear-gradient(45deg,
                rgba(0, 0, 0, 0.856),
                rgba(0, 0, 0, 0.82)),
            url(bank3.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        width: 100vw;
        height: 100vh;
    } */

    button {
        border: none;
        background: #d9d9d9;
    }

    button:hover {
        background-color: #777E8B;
        transform: scale(1.1);
        color: white;
    }
    </style> -->
</head>

<body class="transferBody">

    <?php include 'navbar.php'; ?>

    <div class="transferContent">
        <?php
        include 'conf.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM  user where id=$sid";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo 'Error : ' . $sql . '<br>' . mysqli_error($conn);
        }
        $rows = mysqli_fetch_assoc($result);
        ?>
        <div class="createuserwindow">
            <div class="transferMainContent">

                <div class="transferLeft">
                    <img src="transferMoney.jpg" class="tranferimg">
                </div>

                <div class="transferRight">
                    <div class="container">
                        <h3 style="color : black; margin-bottom: 3rem;">Easy Money Transfer</h3>

                        <form method="post" name="tcredit" class="tabletext">
                            <div>
                                <table class="table table-striped table-condensed table-bordered">
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center"> Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Balane</th>
                                    </tr>
                                    <tr>
                                        <td class="py-2"><?php echo $rows[
                                            'id'
                                        ]; ?></td>
                                        <td class="py-2"><?php echo $rows[
                                            'name'
                                        ]; ?></td>
                                        <td class="py-2"><?php echo $rows[
                                            'email'
                                        ]; ?></td>
                                        <td class="py-2"><?php echo $rows[
                                            'balance'
                                        ]; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <br>

                            <div>
                                <label><b>Transfer To:</b></label>
                                <select name="to" class="form-control" required>
                                    <option value="" disabled selected>Choose account</option>
                                    <?php
                                    include 'conf.php';
                                    $sid = $_GET['id'];
                                    $sql = "SELECT * FROM user where id!=$sid";
                                    $result = mysqli_query($conn, $sql);
                                    if (!$result) {
                                        echo 'Error ' .
                                            $sql .
                                            '<br>' .
                                            mysqli_error($conn);
                                    }
                                    while (
                                        $rows = mysqli_fetch_assoc($result)
                                    ) { ?>
                                    <option class="table" value="<?php echo $rows[
                                        'id'
                                    ]; ?>">

                                        <?php echo $rows['name']; ?> (Balance:
                                        <?php echo $rows['balance']; ?> )

                                    </option>
                                    <?php }
                                    ?>
                                    <div>
                                </select>
                            </div>
                            <br>
                            <div>
                                <label><b>Amount:</b></label>
                                <input type="number" class="form-control" name="amount" required>
                            </div>
                            <br>

                            <div class="text-center">
                                <button class="btn userBtn form-control mb-2" name="submit" type="submit"
                                    id="myBtn">Transfer Money</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>
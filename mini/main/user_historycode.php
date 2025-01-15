<?php session_start(); ?>
<?php

if (!$_SESSION["username"]) {

    Header("Location: ../login/login.php");
} else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="assets/images/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        <title>Reward Point</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/owl.css">

        <script language="javascript">
            function showscroll() {
                document.body.style.overflow = 'scroll';
            }
        </script>

        <style>
            .frame::-webkit-scrollbar {
                -webkit-appearance: none;
            }

            .frame::-webkit-scrollbar:vertical {
                width: 12px;
            }

            .frame::-webkit-scrollbar:horizontal {
                height: 12px;
            }

            .frame::-webkit-scrollbar-thumb {
                border-radius: 10px;
                background-color: #f23030;
            }
        </style>

    </head>


    <body class="frame" onload="showscroll()">
        <?php
        include("../connect.php");
        $memid = $_SESSION["id"];

        $query = "SELECT SUM(pointout) AS pointout_sum FROM history WHERE id = '$memid'";
        @$run = mysqli_query($conn, $query);
        @$row = mysqli_fetch_array($run);
        $pointout = $row['pointout_sum'];

        $result2 = mysqli_query($conn, "SELECT SUM(pointin) AS pointin_sum FROM history WHERE id = '$memid'");
        $row2 = mysqli_fetch_assoc($result2);
        $pointin = $row2['pointin_sum'];

        $total = $pointin - $pointout;

        echo "<h3 align = right>";
        echo "Your Point : ", $total . ' P';
        echo "</h3>";
        ?>

        <?php echo "<h4 align = right>";
        echo "<strong>hi</strong>:";
        echo " ", $_SESSION["username"];
        echo "</h4>"; ?>


        <!-- ***** Preloader Start ***** -->
        <div id="preloader">
            <div class="jumper">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- ***** Preloader End ***** -->

        <!-- Header -->
        <header class="">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="user_index.php">
                        <h2>Reward <em>Point</em></h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="user_index.php">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>



                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Point</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="user_usecode.php">use code</a>

                                    <a class="dropdown-item" href="user_addcode.php">add code</a>

                                    <a class="dropdown-item" href="user_historycode.php">history</a>

                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="user_shoptest.php">Shop
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>


                            <li class="nav-item"><a class="nav-link" href="../login/login.php">Logout</a></li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Page Content -->
        <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-content">
                            <h4>My</h4>
                            <h2>History</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="send-message">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>History</h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="contact-form">
                            <form action="user_historycode.php" method="post">


                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ลำดับ</th>
                                                <th>โค้ดที่ใช้รับพ้อย</th>
                                                <th>จำนวนพ้อยที่ได้</th>
                                                <th>คูปองที่แลก</th>
                                                <th>จำนวนพ้อยที่ใช้</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php include("../connect.php");
                                            $memid = $_SESSION["id"];
                                            $query = "SELECT * FROM history WHERE id = '".$memid."' ORDER BY hid";
                                            $run = $conn->query($query);

                                            if ($run->num_rows > 0) {
                                                @$i++;
                                                while ($row = $run->fetch_assoc()) {

                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['code']; ?></td>
                                                        <td><?php echo $row['pointin']; ?></td>
                                                        <td><?php echo $row['pname']; ?></td>
                                                        <td><?php echo $row['pointout']; ?></td>
                                                    </tr>

                                            <?php $i++;
                                                }
                                            }else{
                                                echo "error";
                                            }
                                            ?>

</tbody>
</table>

                                            


                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-content">
                            <p>Copyright © 2020 REWARDPOINT</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>






        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


        <!-- Additional Scripts -->
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/owl.js"></script>
    </body>

    </html>
<?php } ?>
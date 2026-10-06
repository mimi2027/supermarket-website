<?php

include("connect.php");

/* =========================================
   DASHBOARD STATISTICS
========================================= */

/* PRODUCT COUNT */
$product_result = mysqli_query(
    $db_con,
    "SELECT COUNT(*) AS total FROM product"
);

$product_data = mysqli_fetch_assoc($product_result);
$total_product = $product_data ['total'];


/* STAFF COUNT */
$staff_result = mysqli_query(
    $db_con,
    "SELECT COUNT(*) AS total FROM staff"
);

$staff_data = mysqli_fetch_assoc($staff_result);
$total_staff = $staff_data['total'];


/* CUSTOMER COUNT */
$customer_result = mysqli_query(
    $db_con,
    "SELECT COUNT(*) AS total FROM customer"
);

$customer_data = mysqli_fetch_assoc($customer_result);
$total_customer = $customer_data['total'];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>market | Dashboard</title>

    <link
        rel="stylesheet"
        href="css/style.css"
    >

</head>


<body>


<!-- =========================================
     NAVIGATION
========================================= -->

<header class="navbar">

    <div class="logo">

        <span>Super</span>market

    </div>


    <nav>

        <a
            href="index.php"
            class="active"
        >
            Home
        </a>

        <a href="viewproduct.php">
            product
        </a>

        <a href="viewstaff.php">
            Staff
        </a>

        <a href="viewcustomer.php">
            customer
        </a>
		

        <a
            href="#"
            class="logout"
        >
            Logout
        </a>

    </nav>

</header>



<!-- =========================================
     MAIN DASHBOARD
========================================= -->

<main class="dashboard">


    <!-- =====================================
         DASHBOARD HEADER
    ====================================== -->

    <section class="dashboard-header">

        <div>

            <h1>
                Supermarket Management System
            </h1>

            <p>
                Welcome to the market administration dashboard.
            </p>

        </div>

    </section>



    <!-- =====================================
         STATISTICS CARDS
    ====================================== -->

    <section class="stats">


        <!-- CUSTOMER -->

        <div class="stat-card">

            <div class="stat-icon">
                &#128100;
            </div>


            <div>

                <h3>
                    Customer
                </h3>

                <p>
                    <?php echo $total_customer; ?>
                </p>

            </div>

        </div>



        <!-- STAFF -->

        <div class="stat-card">

            <div class="stat-icon">
                &#128188;
            </div>


            <div>

                <h3>
                    Staff
                </h3>

                <p>
                    <?php echo $total_staff; ?>
                </p>

            </div>

        </div>



        <!-- PRODUCT -->

        <div class="stat-card">

            <div class="stat-icon">
                &#128272;
            </div>


            <div>

                <h3>
                    Product
                </h3>

                <p>
                    <?php echo $total_product; ?>
                </p>

            </div>

        </div>


    </section>



    <!-- =====================================
         QUICK ACTIONS
    ====================================== -->

    <section class="quick-section">

        <h2>
            Quick Actions
        </h2>


        <div class="quick-actions">


            <!-- CUSTOMER -->

            <a
                href="viewproduct.php"
                class="action-card"
            >

                <span>
                    &#128100;
                </span>

                <h3>
                    Manage product
                </h3>

                <p>
                    Add, edit, view and delete student.
                </p>

            </a>



            <!-- STAFF -->

            <a
                href="viewstaff.php"
                class="action-card"
            >

                <span>
                    &#128188;
                </span>

                <h3>
                    Manage Staff
                </h3>

                <p>
                    Manage Market staff records.
                </p>

            </a>



            <!-- PRODUCT -->

            <a
                href="viewproduct.php"
                class="action-card"
            >

                <span>
                    &#128272;
                </span>

                <h3>
                    Manage product
                </h3>

                <p>
                    Manage system product records.
                </p>

            </a>


        </div>

    </section>


</main>



<!-- =========================================
     FOOTER
========================================= -->

<footer>

    <p>

        &copy;
        <?php echo date("Y"); ?>
        Supermarket Management System

    </p>

</footer>


</body>

</html>
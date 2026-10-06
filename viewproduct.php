
<?php

include 'connect.php';

/* =========================================
   SEARCH PRODUCT
========================================= */

$search = "";

if (isset($_GET['search'])) {

    $search = mysqli_real_escape_string(
        $db_con,
        $_GET['search']
    );

}


/* =========================================
   PRODUCT QUERY
========================================= */

if ($search != "") {

    $sql = mysqli_query(
        $db_con,
        "SELECT * FROM product
         WHERE name LIKE '%$search%'
         OR address LIKE '%$search%'
         OR age LIKE '%$search%'
         OR balance LIKE '%$search%'"
    );

} else {

    $sql = mysqli_query(
        $db_con,
        "SELECT * FROM product"
    );

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SuperMarket | product</title>

    <link rel="stylesheet"
          href="css/style.css">

</head>


<body>


<!-- =========================================
     HEADER
========================================= -->

<header class="navbar">

    <div class="logo">

        <span>Super</span>market

    </div>


    <nav>

        <a href="index.php">
            Home
        </a>


        <a href="viewcustomer.php"
           class="add-customer-btn">

            Customer

        </a>


        <a href="viewstaff.php">
            Staff
        </a>


        <a href="viewproduct.php">
            Product
        </a>


        <a href="#"
           class="logout">

            Logout

        </a>

    </nav>

</header>



<!-- =========================================
     PRODUCT SECTION
========================================= -->

<main class="product-page">


    <div class="product-header">

        <div>

            <h1>Product Management</h1>

            <p>
                View and manage SuperMarket product records.
            </p>

        </div>


        <a href="createproduct.php"
           class="add-product-btn">

            + Add product

        </a>

    </div>



    <!-- =====================================
         SEARCH
    ====================================== -->

    <div class="product-search">

        <form method="GET"
              action="viewproduct.php">

            <input
                type="text"
                name="search"
                placeholder="Search product by name, bactch no, storage..."
                value="<?php echo htmlentities($search); ?>"
            >


            <button type="submit">
                Search
            </button>


            <?php if ($search != "") { ?>

                <a href="viewproduct.php"
                   class="clear-search">

                    Clear

                </a>

            <?php } ?>

        </form>

    </div>



    <!-- =====================================
         PRODUCT TABLE
    ====================================== -->

    <div class="product-table-card">


        <!-- PRODUCT LIST HEADER -->

        <div class="table-title">

            <h2>
                Product List
            </h2>


            <a href="exportproduct.php<?php
                echo ($search != "")
                    ? '?search=' . urlencode($search)
                    : '';
            ?>"
               class="export-excel-btn">

                📊 Export Excel

            </a>

        </div>


        <?php if ($search != "") { ?>

            <p class="search-result-text">

                Search results for:

                <strong>
                    <?php echo htmlentities($search); ?>
                </strong>

            </p>

        <?php } ?>


        <div class="table-responsive">

            <table class="product-table">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Name</th>
						
                        <th>batch no</th>
						
						<th>storage</th>

                     

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>


                <?php

                $cnt = 1;

                if (mysqli_num_rows($sql) > 0) {

                    while ($row = mysqli_fetch_array($sql)) {

                ?>


                    <tr>

                        <td>

                            <?php echo $cnt; ?>

                        </td>


                        <td class="product-name">

                            <?php

                            echo htmlentities(
                                $row['product name']
                            );

                            ?>

                        </td>



                        <td>

                            <?php

                            echo htmlentities(
                                $row['batch no']
                            );

                            ?>

                        </td>
						
						 <td>

                            <?php

                            echo htmlentities(
                                $row['storage']
                            );

                            ?>

                        </td>


                        

                        </td>


                        <td>

                            <div class="action-buttons">


                                <a
                                    href="editproduct.php?id=<?php echo $row['id']; ?>"
                                    class="edit-btn"
                                >

                                    Edit

                                </a>


                                <a
                                    href="deleteproduct.php?id=<?php echo $row['id']; ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this product?');"
                                >

                                    Delete

                                </a>


                            </div>

                        </td>

                    </tr>


                <?php

                        $cnt++;

                    }

                } else {

                ?>


                    <tr>

                        <td
                            colspan="6"
                            class="no-product"
                        >

                            No product records found.

                        </td>

                    </tr>


                <?php } ?>


                </tbody>

            </table>

        </div>

    </div>


</main>



<!-- =========================================
     FOOTER
========================================= -->

<footer>

    <p>

        &copy; 2026 SuperMarket Management System

    </p>

</footer>


</body>

</html>

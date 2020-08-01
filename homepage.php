<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani Groceries | Homepage</title>

    <?php
		include('header.php');
		echo "<div class='hero__item set-bg' data-setbg='img/hero/banner.jpg'>";
			echo "<div class='hero__text'>";
				echo "<span>FRESH GROCERIES</span>";
					echo "<h2>100% Organic <br/> Probably</h2>";
					echo "<p>Free Pickup and Delivery Available</p>";
					echo "<a href='shop-list.php' class='primary-btn'>SHOP NOW</a>";
			echo "</div>";
        echo "</div>";
	?>

    <!-- Categories Section Begin -->
	<?php
    echo "<section class='categories'>";
        echo "<div class='container'>";
			echo "<div class='section-title'>";
				echo "<h2>Products for Sale</h2>";
			echo "</div>";
			
            echo "<div class='row'>";
                    echo "<div class='col-lg-3'>";
                        echo "<div class='categories__item set-bg' data-setbg='img/categories/cat-1.jpg'>";
                            echo "<h5><a href='#'>Fruits</a></h5>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='col-lg-3'>";
                        echo "<div class='categories__item set-bg' data-setbg='img/categories/cat-3.jpg'>";
                            echo "<h5><a href='#'>Vegetables</a></h5>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='col-lg-3'>";
                        echo "<div class='categories__item set-bg' data-setbg='img/categories/cat-4.jpg'>";
                            echo "<h5><a href='#'>Beverages</a></h5>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='col-lg-3'>";
                        echo "<div class='categories__item set-bg' data-setbg='img/categories/cat-5.jpg'>";
                            echo "<h5><a href='#'>Meats</a></h5>";
                        echo "</div>";
                    echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</section>";
	?>
    <!-- Categories Section End -->

    <!-- Banner Begin -->
	<?php
	echo "<br>";
    echo "<div class='banner'>";
        echo "<div class='container'>";
            echo "<div class='row'>";
                echo "<div class='col-lg-6 col-md-6 col-sm-6'>";
                    echo "<div class='banner__pic'>";
                        echo "<img src='img/banner/banner-1.jpg' alt='banner 1'>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='col-lg-6 col-md-6 col-sm-6'>";
                    echo "<div class='banner__pic'>";
                        echo "<img src='img/banner/banner-2.jpg' alt='banner 2'>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
	echo "<br>";
	?>
    <!-- Banner End -->

	<!-- Footer Section Begin -->
	<?php
		include('footer.php');
	?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
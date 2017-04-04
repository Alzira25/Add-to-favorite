//adding to favorites

function addFavorites(){

		global $con;

		$customer = $_SESSION['customer_email'];

				$get_customer = "SELECT * FROM customers where customer_email='$customer'";

				$run_customer = mysqli_query($con, $get_customer);

				while ($row_customer = mysqli_fetch_array($run_customer)){

				$cust_id = $row_customer['customer_id'];

			}

	if(isset($_GET['add_favorite'])){	

		$item_id = $_GET['add_favorite'];	

		$check_favorite = "SELECT * FROM favorites WHERE customer_id='$cust_id' AND product_id='$item_id'";

		$run_favorite = mysqli_query($con, $check_favorite);

		if(mysqli_num_rows($run_favorite) > 0){

			echo "<div class='alert alert-danger text-center center-block' id='success-alert'>";
			echo "<strong>You already have added to your favorites!</strong>";
			echo "</div>";
			
		}else{

			$insert_favorite = "INSERT INTO favorites (customer_id,product_id,favorite_date) VALUES ('$cust_id','$item_id',NOW())";

			$favorite_insert = mysqli_query($con, $insert_favorite);
			echo "<script>window.open('favorites.php','_self')</script>";
		
			}
		}
	}

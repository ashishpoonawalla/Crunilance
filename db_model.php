<?php 

	Class Model{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "crunilance";

/*
        private $server = "localhost";
		private $username = "u437512527_crunilance";
		private $password = "Crunilance001@";
		private $db = "u437512527_crunilance";

*/

		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}


		//include 'db_model.php';

		//$model = new Model();
		//$bidcount = $model->bid_count($pid);
		//echo $bidcount;


        //------------- jobsingle.php ------ line 216 -------------- bid count
        public function bid_count($pid){
			$data = 0;

			$query = "SELECT * FROM project_user where product_id=$pid ";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data++;
				}
			}
			return $data;
		}

		//------------- jobsingle.php ------ line 292 -------------- get employer data
        public function get_employer($userEmail){
			$data = null;

			$query = "SELECT * FROM user_info where email='$userEmail' ";		
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

//----------------------------------- INSERT -----------------------------------------------------------------
		public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address'])) {
					if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['address']) ) {
						
						$name = $_POST['name'];
						$mobile = $_POST['mobile'];
						$email = $_POST['email'];
						$address = $_POST['address'];

						$query = "INSERT INTO records (name,email,mobile,address) VALUES ('$name','$email','$mobile','$address')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}

		//------------------------------ SELECT
		public function fetch(){
			$data = null;

			$query = "SELECT * FROM records";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		//------------------------------- DELETE
		public function delete($id){

			$query = "DELETE FROM records where id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		//----------------------------- SELECT single 
		public function fetch_single($id){

			$data = null;

			$query = "SELECT * FROM records WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		//------------------------------------- SELECT Single
		public function edit($id){

			$data = null;

			$query = "SELECT * FROM records WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		//---------------------------------- UPDATE
		public function update($data){

			$query = "UPDATE records SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}


	}

 ?>


<!-- <?php // ------------------------- fetch multiple data data and display in table

                include 'model.php';
                $model = new Model();
                $rows = $model->fetch();
                $i = 1;
              if(!empty($rows)){
                foreach($rows as $row){ 
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['mobile']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td>
						<a href="read.php?id=<?php echo $row['id']; ?>" class="badge badge-info">Read</a>
						<a href="delete.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">Delete</a>
						<a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
						</td>
					</tr>

					<?php
                }
              }else{
                echo "no data";
              }

              ?> -->




<!-- <?php

	include 'model.php';
	$model = new Model();
	$id = $_REQUEST['id'];
	$row = $model->fetch_single($id);
	if(!empty($row)){

	?>
		<div class="card">
		<div class="card-header">
		Single Record
		</div>
		<div class="card-body">
		<p>Name = <?php echo $row['name']; ?></p>
		<p>Email = <?php echo $row['email']; ?></p>
		<p>Mobile No. = <?php echo $row['mobile']; ?></p>
		<p>Address = <?php echo $row['address']; ?></p>
		</div>
		</div>
		<?php
	}else{
		echo "no data";
	}
?> -->
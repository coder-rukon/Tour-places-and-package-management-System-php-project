<?php
	$messageFeedback = "";
	$data = array();
	$db = new Db();
	$users = new RsGlobal($db->con,'users');
	$messageConfirm = "";
	if(isset($_POST['send_email']) && isset($_POST['users'])){
		$messageBody = "";
		$headers = "From: info@digitalbd.net";
		$messageBody = $_POST['message'];
		$subject =  $_POST['subject'];
		$emails = $_POST['users'];
		$isMeailSent = false;
		if(!empty($emails)){
			foreach ( $emails as $key => $sendTo) {
				if(mail($sendTo,$subject,$messageBody,$headers))
					$isMeailSent = true;
			}
		}
		if($isMeailSent){
			$messageConfirm = "Message Sent";
		}else{
			$messageConfirm = "Message Can't Sent";
		}
		
	}
?>
<?php
	if(!empty($messageConfirm)){
		echo '<p class="alert alert-info">'.$messageConfirm.'</p>';
	}
?>
<form action="" method="post">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<label>Subject</label>
			<input class="form-control" name="subject" type="text">
			<label>Email Body</label>
			<textarea class="form-control" name="message" style="height: 500px;"></textarea>
		</div>
		<div class="col-xs-12  col-sm-4">
			<label>Select Users</label>
			<select class="form-control" multiple style="height: 600px;" name="users[]">
				<?php
					$allUsers = $users->Get();
					while($row = $allUsers->fetch_assoc()){
						echo '<option value="'.$row['email'].'">'.$row['name'].' ('.$row['email'].')</option>';
					}
				?>
			</select>
		</div>
	</div>
	<button type="submit"  name="send_email" class="btn btn-primary submit mb-4 mt-3">Submit</button>
	
</form>
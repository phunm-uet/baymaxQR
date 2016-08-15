<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Qr Code</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<style>
		.main{
			margin-top: 20px;
		}
	</style>
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="qrcode.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="col-xs-6 col-xs-offset-3 main">
		<label for="input"> Nhap Chuoi: </label>
		<input type="text" name="" id="input" class="form-control" value="" required="required" pattern="" title="">
		<br>
		<table class="table table-striped table-hover">
						<tbody>
							<tr>
								<td>QR Code</td>
								<td><div id="QR"></div></td>
							</tr>
							<tr>
								<td>Seri</td>
								<td id="seri"></td>
							</tr>
							<tr>
								<td>Token</td>
								<td id="token"></td>
							</tr>
						</tbody>
					</table>			
		</div>

	</div>
</body>
</html>

<script>
var QR = $("#QR")[0];
var qrcode = new QRCode(QR);
function makeQR () {		
	var input = $("#input").val();
	if (!input) {
		alert("Input a text");
		return;
	}

	qrcode.makeCode(input);
}
	$(document).ready(function() {
		$("#input").on("keydown", function (e){
			if (e.keyCode == 13){
				var input = $("#input").val();
				makeQR();
				$.getJSON('get.php', {input: input}, function(data) {
					$("#seri").html(data[1]);
					$("#token").html(data[2]);
				});
			}
		});
	});
</script>
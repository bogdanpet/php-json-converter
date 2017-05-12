<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Convert JSON to PHP Array</title>

	<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label for="json" class="control-label">Enter JSON code bellow</label>
				<textarea name="json" id="json" class="form-control" rows="25"></textarea>
			</div>
		</div>
		<div class="col-md-2 mt-5">
			<div class="form-group">
				<button class="btn btn-primary btn-block" id="json_to_php">JSON to PHP >></button>
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block" id="php_to_json"><< PHP to JSON</button>
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label for="php" class="control-label">Enter PHP array bellow</label>
				<textarea name="php" id="php" class="form-control" rows="25"></textarea>
			</div>
		</div>
	</div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/tether/dist/js/tether.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    $('#json_to_php').on('click', function () {
        $.post('decode.php', 'json=' + $('#json').val(), function (data) {
            $('#php').val(data);
        })
    });
    $('#php_to_json').on('click', function () {
        $.post('encode.php', 'php=' + $('#php').val(), function (data) {
            $('#json').val(data);
        })
    })
</script>
</body>
</html>
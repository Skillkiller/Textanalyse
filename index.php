<html>
<head>
<?php 
include(__DIR__ . "/config/Verbindungen.php");
include(__DIR__ . "/config/config.php");
?>
	<meta charset="utf-8">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
	<!-- Schrift Style -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	
	<!-- Form Style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>
<body style="background-color: #e5e5e5;">
<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
	<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Textanalyse</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="upload.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
					<div class="col-sm-10">
					  <label for="InputFile">Datei auswählen</label>
					  <input id="InputFile" type="file" name="datei" accept=".txt" required>

					  <p class="help-block">Es sind nur .txt Dateien erlaubt</p>
					</div>
                </div>
				<?php
				if ($enableMysql) {
				?>
				<div class="form-group">
					<div class="col-sm-10">
						<div class="checkbox">
						  <label>
							<input name = "Regeln" type="checkbox" value="ok" <?php if ($forceSave) { echo "required"; } ?>>Ich erlaube das Speicher bestimmter Daten</input>
						  </label>
						</div>
					</div>
				</div>
				<?php 
				}
				?>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
				<button type="submit" class="btn btn-primary">Hochladen</button>
				<span class="badge bg-red pull-right">Die Seite speichert zwischenzeitlich Cookies</span>
            </div>
            </form>
    </div>
</div>
</body>
</html>
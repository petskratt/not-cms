<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>This is not a CMS!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<!-- Step03 - load content from file specified as query parameter -->
<div class="container">
    <div class="row mt-5">
        <div class="col">
			<?php
			include ! empty( $_GET['page'] ) ? $_GET['page'] : 'content.html';
			?>
            <p class="small"> <?php
				echo "Pages:";
				foreach ( glob( '*.html' ) as $file ) {
					echo " <a href='?page=$file'>" . $file . "</a>";
				}
				?></p>
        </div>
    </div>
</div>

<!-- Bonus - Try accessing ?page=/etc/passwd  -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>
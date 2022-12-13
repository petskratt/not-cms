<?php include 'header.php'; ?>
    <!-- Step04 - This page uses template with a cat in left column -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                <img src="https://placekitten.com/500/1000" class="img-fluid" alt="Cute cat pic">
            </div>
            <div class="col-8">
				<?php echo file_get_contents( ! empty( $_GET['page'] ) ? $_GET['page'] : 'content.html' ); ?>
                <p class="small"> <?php
					echo "Pages:";
					foreach ( glob( '*.html' ) as $file ) {
						echo " <a href='?page=$file'>" . $file . "</a>";
					}
					?></p>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
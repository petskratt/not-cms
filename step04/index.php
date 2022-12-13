<?php include 'header.php'; ?>
    <!-- Step04 - Move header and footer to separate files, making templating easier -->
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
<?php include 'footer.php'; ?>
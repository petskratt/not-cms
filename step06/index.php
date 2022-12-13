<?php

require_once 'cms.php';
include 'header.php';

?>
    <!-- Step06 - content from database -->
    <div class="container">
        <div class="row mt-5">
            <div class="col">
				<?php
				the_content();
				?>
                <p class="small"> <?php
					echo "Pages: ";
					the_pages();
					?></p>
                <p class="small"><?php if ( ! empty( $_GET['page'] ) ) {
						echo "<a href='admin.php?page={$_GET['page']}'>Edit this page</a>";
					} ?></p>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
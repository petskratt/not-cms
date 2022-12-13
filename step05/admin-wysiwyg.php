<?php

if ( ! empty( $_POST['thecontent'] ) && ! empty( $_POST['filename'] ) ) {

	file_put_contents( $_POST['filename'], $_POST['thecontent'] );
	header( "Location: ./?page={$_POST['filename']}" );
}

include 'header.php'; ?>
    <!-- Step05 - Admin with simple contenteditable="true" div for WYSIWYG -->
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1>Welcome, mighty admin person!</h1>
                <p class="small"> <?php
					echo "Pages:";
					foreach ( glob( '*.html' ) as $file ) {
						echo " <a href='?page=$file'>" . $file . "</a>";
					}
					?></p>
                <form method='post' id="theform">
                    <div class='mb-3'>
                        <label for='filename' class='form-label'>Filename</label>
                        <input type='text' class='form-control' name='filename' id='filename'
                               placeholder='something.html' value='<?php
						echo ! empty( $_GET['page'] ) ? $_GET['page'] : '';
						?>'>
                    </div>
                    <div class='mb-3'>
                        <label for='wysiwyg' class='form-label'>The content (click anywhere to edit)</label>
                        <hr>
                        <div id="wysiwyg" contenteditable="true"><?php
							echo ! empty( $_GET['page'] ) && is_readable( $_GET['page'] ) ? file_get_contents( $_GET['page'] ) : '';
							?></div>
                        <hr>
                    </div>
                    <input type="hidden" name="thecontent" id="thecontent">
                    <button onclick="document.getElementById('thecontent').value = document.getElementById('wysiwyg').innerHTML; document.getElementById('theform').submit();" class='btn btn-success'>
                        Save me!
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bonus - add edit button to frontend pages
         if (! empty( $_GET['page'] )) { echo "<a href='admin-wysiwyg.php?page={$_GET['page']}'>Edit this page</a>";}
    -->
<?php include 'footer.php'; ?>
<?php

if ( ! empty( $_POST['thecontent'] ) && ! empty( $_POST['filename'] ) ) {

	file_put_contents( $_POST['filename'], $_POST['thecontent'] );
	header( "Location: ./?page={$_POST['filename']}" );
}

include 'header.php'; ?>
    <!-- Step05 - Admin page that allows editing of pages -->
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

                <form method='post'>
                    <div class='mb-3'>
                        <label for='filename' class='form-label'>Filename</label>
                        <input type='text' class='form-control' name='filename' id='filename'
                               placeholder='something.html' value='<?php
						echo ! empty( $_GET['page'] ) ? $_GET['page'] : '';
						?>'>
                    </div>
                    <div class="mb-3">
                        <label for='thecontent' class='form-label'>The content</label>
                        <textarea class='form-control' name='thecontent' id='thecontent' rows='3'><?php
							echo ! empty( $_GET['page'] ) && is_readable( $_GET['page'] ) ? file_get_contents( $_GET['page'] ) : '';
							?></textarea>
                    </div>

                    <button type='submit' class='btn btn-success'>Save me!</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bonus - Try creating backdoor.php that lists all pages, not just .html ;)
    example: foreach ( glob( '*.*' ) as $file ) { echo $file . PHP_EOL; }
    -->
<?php include 'footer.php'; ?>
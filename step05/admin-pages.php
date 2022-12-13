<?php

if ( ! empty( $_POST['heading'] ) && ! empty( $_POST['bodytext'] ) && ! empty( $_POST['filename'] ) ) {

	file_put_contents( $_POST['filename'],
		"<h1>{$_POST['heading']}</h1>\n<p>{$_POST['bodytext']}</p>\n" );
	header( "Location: ./?page={$_POST['filename']}" );
}

include 'header.php';

?>
    <!-- Step05 - Admin page that allows creation of pages -->
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h1>Welcome, mighty admin person!</h1>
                <form method='post'>
                    <div class='mb-3'>
                        <label for='filename' class='form-label'>Filename</label>
                        <input type='text' class='form-control' name='filename' id='filename'
                               placeholder='something.html'>
                    </div>
                    <div class='mb-3'>
                        <label for='heading' class='form-label'>Title</label>
                        <input type='text' class='form-control' name='heading' id='heading' placeholder='Some title'>
                    </div>
                    <div class='mb-3'>
                        <label for='bodytext' class='form-label'>Body text</label>
                        <textarea class='form-control' name='bodytext' id='bodytext' rows='3'></textarea>
                    </div>
                    <button type='submit' class='btn btn-success'>Save me!</button>
                </form>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
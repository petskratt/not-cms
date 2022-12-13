<?php

if ( ! empty( $_POST['thecontent'] ) && ! empty( $_POST['filename'] ) ) {

	file_put_contents( $_POST['filename'], $_POST['thecontent'] );
	header( "Location: ./?page={$_POST['filename']}" );
}

include 'header.php'; ?>
    <!-- Step05 - Admin with TinyMCE editor -->
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

                        <label for='wysiwyg' class='form-label'>The content</label>
                        <textarea id="wysiwyg" class='mb-3'><?php
							echo ! empty( $_GET['page'] ) && is_readable( $_GET['page'] ) ? file_get_contents( $_GET['page'] ) : '';
                            ?></textarea>

                    <input type="hidden" name="thecontent" id="thecontent">
                    <button onclick="document.getElementById('thecontent').value = tinymce.activeEditor.getContent(); document.getElementById('theform').submit();" class='btn btn-success mt-3'>
                        Save me!
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        textarea {
            display: none;
        }
    </style>

    <script src="https://cdn.tiny.cloud/1/[insert-api-key]/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>

    <script>

        tinymce.init({
            selector: 'textarea#wysiwyg',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tableofcontents footnotes autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontsize | bold italic underline strikethrough | checklist numlist bullist indent outdent align | link image media table | spellcheckdialog a11ycheck typography | emoticons charmap | removeformat',
        });

    </script>

<?php include 'footer.php'; ?>
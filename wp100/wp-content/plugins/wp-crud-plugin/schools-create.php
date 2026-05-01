<?php

function sinetiks_schools_create() {
    $id = $_POST["id"];
    $name = $_POST["name"];
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "school";

        $wpdb->insert(
                $table_name, //table
                array('id' => $id, 'name' => $name), //data
                array('%s', '%s') //data format			
        );
        $message.="School inserted";
    }
    ?>

<?php $url = includes_url();
echo $url; ?>

    <!-- C:\1_working\wp_docker_Oct\wordpress\wp-includes\js\tinymce -->
    <script src="<?php echo includes_url(); ?>js/tinymce/tinymce.min.js"></script>


    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/sinetiks-schools/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Add New School</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p>Three capital letters for the ID</p>
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th class="ss-th-width">ID</th>
                    <td><input type="text" name="id" value="<?php echo $id; ?>" class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">School</th>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" class="ss-field-width" /></td>
                </tr>
            </table>
            <textarea name="myTextarea"  id="myTextarea"></textarea>

            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>

    <script>

tinymce.init({
  selector: '#myTextarea',
  plugins: 'image code',
  toolbar: 'undo redo | image code',
  /* without images_upload_url set, Upload tab won't show up*/
  images_upload_url: 'http://localhost:8600/wp-content/plugins/wp-crud-plugin/postAcceptor.php',
  images_reuse_filename: true,
  automatic_uploads: true,
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
       </script>
    <?php
}
<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
  <title><?php echo lang('edit_uploaded_image');?></title>
  <!-- Notifications  Css -->
        <link href="<?php echo base_url('public/assets/plugins/notify/css/jquery.growl.css'); ?>" rel="stylesheet" />
        <link href="<?php echo base_url('public/assets/plugins/notify/css/notifIt.css'); ?>" rel="stylesheet" />
  <style>
    html, body, #editor-container {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
  </style>
</head>
<body>
<div id="editor-container"></div>
<script src="<?php echo base_url('public/assets/plugins/image-editor-v2/dist/pixie.umd.js'); ?>"></script>
<!-- Jquery js-->
        <script src="<?php echo base_url('public/assets/js/vendors/jquery-3.5.1.min.js'); ?>"></script>
<!-- Notifications js -->
<script src="<?php echo base_url('public/assets/plugins/notify/js/rainbow.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/notify/js/sample.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/notify/js/jquery.growl.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/plugins/notify/js/notifIt.js'); ?>"></script>
<script>
    var pixie = new Pixie({
        ui: {
            activeTheme: 'dark',
            allowEditorClose: true,
        },
        selector: "#editor-container",
        baseUrl: '<?php echo base_url('public/assets/plugins/image-editor-v2/assets'); ?>',
        image: "<?php echo $document->url; ?><?php if(!empty($document->last_modified)) echo '?m='. $document->last_modified;?>",
        onSave: async function(data, name) {
            var success = "<?php if(isset($_SESSION['success'])) echo $_SESSION['success']; ?>";
            const state = pixie.getState();
            const obj = {state: state, data: data, name: name, id: '<?php echo $document->id;?>' };
            const response = await fetch('patient/saveUploadEditChanges', {
                method: 'POST',
                body: JSON.stringify(obj)
            });
            return $.growl.success({
                message: "<?php echo lang('image_saved') ?>"
            });
            location.reload();
        },
    });
</script>
</body>
</html>
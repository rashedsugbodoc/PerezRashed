<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo base_url(); ?>">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
  <title><?php echo lang('edit_uploaded_image');?></title>
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
            const state = pixie.getState();
            const obj = {state: state, data: data, name: name, id: '<?php echo $document->id;?>' };
            const response = await fetch('patient/saveUploadEditChanges', {
                method: 'POST',
                body: JSON.stringify(obj)
            });
        },
    });
</script>
</body>
</html>
tinymce.init({
  selector: 'textarea#new_description',
  menubar: true,
  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  setup: function (editor) {
      editor.on('change', function () {
          tinymce.triggerSave();
      });
  }
});

tinymce.init({
  selector: 'textarea#update_description',
  menubar: true,
  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste"
  ],
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    }
});
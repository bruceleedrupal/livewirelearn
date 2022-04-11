window.onload = function () {
    const ckeditors = document.querySelectorAll(".ckeditor");
    ckeditors.forEach((ckeditor) => {
        ClassicEditor.create(ckeditor, {
            extraPlugins: [UploadAdapterPlugin],
        })
            .then((editor) => {
                window.editor = editor;
            })
            .catch((error) => {
                console.error(
                    "There was a problem initializing the editor.",
                    error
                );
            });
    });
};

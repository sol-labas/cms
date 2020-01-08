$(document).ready(function () {

    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });

});
$(document).ready(function () {
    $('#selectAllBoxes').click(function (event) {

        if (this.checked) {
            $('.checkboxBoxes').each(function () {
                this.checked = true;
            });
        } else {
            $('.checkboxBoxes').each(function () {
                this.checked = false;
            });
        }
    })

})
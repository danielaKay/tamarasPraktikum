$(document).ready(function() {
    
    $(".tag-manager .add-tag").on('click', function() {

        // $('#aioConceptName').find(":selected").val();

        var parentElement = $(this).closest('.tag-manager');

        var selectValue = $(parentElement).find(":selected").val();

        var selectText = $(parentElement).find(":selected").text().trim();

        var bookId = $(parentElement).find("[type='hidden']").val();
        $.post( "/index.php/api/tags?name=" + encodeURIComponent(selectValue) + "&display_name=" + encodeURIComponent(selectText) +"&book_id=" + encodeURIComponent(bookId), function( data ) {
        }).done(function() {
            alert( "tag was added successfully" );
        })
        .fail(function() {
            alert( "an error occurred" );
        });
    });
    
});
$(document).ready(function() {
    
    $(".tag-manager .add-tag").on('click', function() {

        // $('#aioConceptName').find(":selected").val();

        var parentElement = $(this).closest('.tag-manager');

        var selectValue = $(parentElement).find(":selected").val();
        console.log("val: ", selectValue);

        var selectText = $(parentElement).find(":selected").text().trim();
        console.log("text: ", selectText);

        var bookId = $(parentElement).find("[type='hidden']").val();
        console.log("bookid: ", bookId);

        console.log("index.php/api/tags?name=" + selectValue + "&display_name=" + selectText +"&book_id=" + bookId)

        $.post( "index.php/api/tags?name=" + selectValue + "&display_name=" + selectText +"&book_id=" + bookId, function( data ) {
        }).done(function() {
            alert( "tag was added successfully" );
        })
        .fail(function() {
            alert( "an error occurred" );
        });
    });
    
});
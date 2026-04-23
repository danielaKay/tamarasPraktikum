$(document).ready(function() {
    
    $(".js-tag-manager .js-add-tag").on('click', function() {

        // $('#aioConceptName').find(":selected").val();

        var parentElement = $(this).closest('.js-tag-manager');

        var selectValue = $(parentElement).find(":selected").val();

        var selectText = $(parentElement).find(":selected").text().trim();

        var bookId = $(parentElement).find("[type='hidden'][name='bookid']").val();

        $.post( "/index.php/api/tags?name=" + encodeURIComponent(selectValue) + "&display_name=" + encodeURIComponent(selectText) +"&book_id=" + encodeURIComponent(bookId), function( data ) {
        }).done(function() {
            alert( "tag was added successfully" );
            location.reload();
        })
        .fail(function() {
            alert( "an error occurred" );
        });
    });

    $(".js-tag-manager .js-delete-tag").on('click', function() {

        var parentElement = $(this).closest('.js-tag-manager');

        var tagElement = $(this).closest('.js-tag-display');

        var tagId = $(tagElement).find("[type='hidden'][name='tagid']").val();

        $.ajax({
            url: "/index.php/api/tags?id=" + tagId,
            type: "DELETE",
            success: function(result){
                alert("tag was removed successfully");
                location.reload();
            },
            fail:  function(result){
                alert( "an error occurred" );
            },
        });
    });
    
});
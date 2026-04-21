$(document).ready(function() {
    
    $(".js-readingstatus").each(function() {
        var totalPageNumber = $(this).attr("data-total-number");
        var readPageNumber = $(this).attr("data-read-number");
        if(readPageNumber != 0) {
            var percentage = Math.round((readPageNumber / totalPageNumber) * 100);
            $(this).children(".js-readingstatus-progress").css("width", percentage + "%")
        }
    });
    
});
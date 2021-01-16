$(document).ready(function () {
    $("#btn-favourite").on('click', function (e) {
        let favourite = $("#like").text();
        let user_id = $("#user_id").val();
        let product_id = $("#product_id").val();
        if (user_id == 0) {
            e.preventDefault();
            return;
        }
        $.ajax({
            type: "post",
            url: "/doanbe/favouriteproduct.php",
            data: {
                "favourite_check": 1,
                "favourite": favourite,
                "user_id": user_id,
                "product_id": product_id
            },
            dataType: "json",
            success: function (response) {
                // alert(response.result);
                if (response.checkUserFavourite) {
                    $("i.material-icons.favorite").css("color", "black");
                }else{
                    $("i.material-icons.favorite").css("color", "red");
                }
                $("#like").text(response.like);
            },
            error: function (error) {
                console.error(error)
                console.table(error)
                console.log(responseText);
            }
        });
    });
});
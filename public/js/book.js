const starsTotal = 5;

function getRatings(ratee) {
    // Get percentage
    const starPercentage = (ratee / starsTotal) * 100;

    // Round to nearest 10
    const starPercentageRounded = `${Math.round(starPercentage / 10) * 10}%`;

    // Set width of stars-inner to percentage
    document.querySelector(`#stars-inner`).style.width = starPercentageRounded;

    // Add number rating
    document.querySelector(`.number-rating`).innerHTML = ratee;
}

function updateRate(rate) {
    $.ajax({
        type: "GET",
        url: "/rate/",
        data: { rate: rate, book: book },
        success: function(response) {
            console.log("response");
        },
        error: function(response) {
            // alert the error if any error occured
            alert(response);
        }
    });
}

let love = document.querySelector("#love");
function updateFavorite() {
    $.ajax({
        type: "GEt",
        url: "/fav",
        data: {
            book: book
        },
        success: function(response) {
            console.log(response);
            if (response.like == "yes") {
                console.log(love);
                love.style.color = "red";
            } else {
                console.log(love.className);
                love.style.color = "gray";
            }
        },
        error: function(response) {
            // alert the error if any error occured
            alert(response);
        }
    });
}
function lease() {
    let from = document.querySelector("#from").value;
    let to = document.querySelector("#to").value;
    let quanitylabel = document.querySelector("#quantity");
    if (!from || !to) {
        alert("enter value");
    }
    $.ajax({
        type: "GET",
        url: "/lease",
        data: { from: from, to: to, book: book },
        success: function(response) {
            let quantity = parsInt(quanitylabel.innerText) - 1;
            quanitylabel.innerText = quantity + "Copies available";
        },
        error: function(response) {
            // alert the error if any error occured
            console.log(response);
            alert(response);
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    let bookAndToken = document.getElementById("book").innerText.split("!");
    let nextButton = document.getElementById("next");
    book = bookAndToken[0];
    Token = bookAndToken[1];
    rate = bookAndToken[2];
    nextButton.addEventListener("click", function() {
        $.ajax({
            type: "GEt",
            url: `/cat/${book}`,
            data: {},
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.log(response);
                // alert the error if any error occured
                alert(response);
            }
        });
    });

    getRatings(rate);
    console.log(rate);

    const ratingControl = document.getElementById("rating-control");
    ratingControl.value = rate;

    ratingControl.addEventListener("change", e => {
        const rating = e.target.value;
        // Change rating
        getRatings(rating);
        updateRate(rating);
    });

    document.getElementById("submitComment").onclick = function() {
        var comment = document.getElementById("addComment").value;
        console.log(comment);
        updateComment(comment, book, Token);
    };
    function updateComment(comment, book, Token) {
        $.ajax({
            type: "POST",
            url: "/comments",
            data: {
                _token: Token,
                body: comment,
                book: book
            },
            success: function(response) {
                $("#addComment").val("");
                newcomment = `<div class="media mb-4">
                          <div class="media-body">
                            <h5 class="mt-0">${response.name}</h5>
                            ${comment}
                          </div>
                        </div>`;
                $("#comments").append(newcomment);

                console.log(response.name);
            },
            error: function(response) {
                // alert the error if any error occured
                alert(response);
            }
        });
    }
});
function getRatings(ratee) {
    // Get percentage
    const starPercentage = (ratee / starsTotal) * 100;

    // Round to nearest 10
    const starPercentageRounded = `${Math.round(starPercentage / 10) * 10}%`;

    // Set width of stars-inner to percentage
    document.querySelector(`#stars-inner`).style.width = starPercentageRounded;

    // Add number rating
    document.querySelector(`.number-rating`).innerHTML = ratee;
}

$productRatingEL = $("#product-star-rating-value")

$productRatingEL.rateYo({
    // The width of each star
    starWidth: "32px",
    // The background color for the un-rated part of a star
    normalFill: "gray",
    // The background color for the rated part of a star
    ratedFill: "#f39c12",
    // Number of stars to use
    numStars: 5,
    // The Minimum value, you want the rating to start with.
    minValue: 0,
    // The Maximum value, you want the rating to end with.
    maxValue: 5,
    // The precision of rating.
    precision: 1,
    // The rating can be given in either percentage or number,
    rating: 0,
    
    readOnly  : true,
    // Called whenever the rating is changed.
    onChange: null,
    // Called whenever the rating is set by click. 
    onSet: null
});
// starWidth : "32px",
// normalFill: "gray",
// ratedFill : "#f39c12",
// numStars  : 5,
// maxValue  : 5,
// precision : 1,
// rating    : 0,
// fullStar  : false,
// halfStar  : false,
// readOnly  : false,
// spacing   : "0px",
// rtl       : false,
// multiColor: null,
// onInit    : null,
// onChange  : null,
// onSet     : null,
// starSvg   : null

setup()
function setup(){
    let ratingValue = document.querySelector("#product-star-rating-value").getAttribute("value")
    $productRatingEL.rateYo("method","rating", ratingValue);
}
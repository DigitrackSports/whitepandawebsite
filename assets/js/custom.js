$(document).ready(function () {
  $(".showBox").click(function () {
    $(".showBox").removeClass("active");
    $(this).addClass("active");
  });
});
// $(document).ready(function () {
//   $("#myButton").click(function () {
//     $("#myDiv").addClass("new-class");
//   });
// });

// $(document).ready(function () {
//   $(".tab-btn").click(function () {
//     $(".tab-btn").addClass("new-class");
//   });
// });

// $(document).ready(function () {
//   $("a").click(function () {
//     var id = $(this).attr("id");
//     $("#" + id).addClass("new-class");
//   });
// });

// $(document).ready(function () {
//   $(".showBox").click(function () {
//     const content = $(this).data("content");
//     $(".box").hide();
//     $("." + content).show();
//   });
// });

$(document).ready(function () {
  $("a").click(function () {
    var content = $(this).data("content");
    $(".box").removeClass("active");
    $(".box." + content).addClass("active");
  });
});

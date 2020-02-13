function updateOutput() {

    let htmlString = "<html>" +
        "<head>" +
        "<style type='text/css'>" +
        $("#cssPanel").val() +
        "</style>" +
        "</head>" +
        "<body>" +
        $("#htmlPanel").val() +
        "</body>" +
        "</html>";

    $("iframe").contents().find("html").html(htmlString);

    document.getElementById("outputPanel").contentWindow.eval($("#jsPanel").val());
}

$(" .toggleButton ").hover(function () {

    $(this).addClass("highlightedButton");

}, function () {

    $(this).removeClass("highlightedButton");

});

$(" .toggleButton ").click(function () {

    $(this).toggleClass("active");
    $(this).removeClass("highlightedButton");
    let panelId = "#" + $(this).attr("id") + "Panel";
    $(panelId).toggleClass("hidden");

    let numberOfActivePanels = 4 - $(".hidden").length;
    $(".panel").width(($(window).width() / numberOfActivePanels) - 5);

});

$(".panel").height($(window).height() - $("#header").height() - 17);
$(".panel").width(($(window).width() / 2) - 5);
updateOutput();

$("textarea").on('change keyup paste', function () {

    updateOutput();

});
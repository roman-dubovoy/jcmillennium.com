if (history && history.pushState) {
    $('.pagination-wrapper a').on('click', function () {
        $.getScript(this.href);
        history.pushState(null, document.title, this.href);
        return false;
    });
    $(window).bind("popstate", function () {
        $.getScript(location.href);
    });
}
$((function(){"use strict";$(".js-menu-toggle").click((function(s){var e=$(this);$("body").hasClass("show-sidebar")?($("body").removeClass("show-sidebar"),e.removeClass("active")):($("body").addClass("show-sidebar"),e.addClass("active")),s.preventDefault()})),$(document).mouseup((function(s){var e=$(".sidebar");e.is(s.target)||0!==e.has(s.target).length||$("body").hasClass("show-sidebar")&&($("body").removeClass("show-sidebar"),$("body").find(".js-menu-toggle").removeClass("active"))}))}));
//# sourceMappingURL=main.js.map
var App = (function () {
    const SIDE_BAR_OPEN = "1";
    const SIDE_BAR_CLOSED = "2";
    const SIDE_BAR_STATUS = "sidebar_status";

    var MediaSize = {
        xl: 1200,
        lg: 992,
        md: 991,
        sm: 576,
    };
    var ToggleClasses = {
        headerhamburger: ".toggle-sidebar",
        inputFocused: "input-focused",
    };

    var Selector = {
        mainHeader: ".header.navbar",
        headerhamburger: ".toggle-sidebar",
        fixed: ".fixed-top",
        mainContainer: ".main-container",
        sidebar: "#sidebar",
        sidebarContent: "#sidebar-content",
        sidebarStickyContent: ".sticky-sidebar-content",
        ariaExpandedTrue: '#sidebar [aria-expanded="true"]',
        ariaExpandedFalse: '#sidebar [aria-expanded="false"]',
        contentWrapper: "#content",
        contentWrapperContent: ".container",
        mainContentArea: ".main-content",
        searchFull: ".toggle-search",
        overlay: {
            sidebar: ".overlay",
            cs: ".cs-overlay",
            search: ".search-overlay",
        },
    };

    var toggleFunction = {
        sidebar: function ($recentSubmenu) {
            $(".sidebarCollapse").on("click", function (sidebar) {
                sidebar.preventDefault();
                let sidebarStatus = localStorage.getItem(SIDE_BAR_STATUS);

                $(Selector.mainContainer).toggleClass("sidebar-closed");
                $(Selector.mainHeader).toggleClass("expand-header");
                $(Selector.mainContainer).toggleClass("sbar-open");
                $(".overlay").toggleClass("show");
                $("html,body").toggleClass("sidebar-noneoverflow");

                switch (sidebarStatus) {
                    case SIDE_BAR_OPEN:
                        localStorage.setItem(SIDE_BAR_STATUS, SIDE_BAR_CLOSED);
                        break;
                    case SIDE_BAR_CLOSED:
                        localStorage.setItem(SIDE_BAR_STATUS, SIDE_BAR_OPEN);
                        break;
                    default:
                        break;
                }
            });
        },
        overlay: function () {
            $("#dismiss, .overlay, cs-overlay").on("click", function () {
                // hide sidebar
                $(Selector.mainContainer).addClass("sidebar-closed");
                $(Selector.mainContainer).removeClass("sbar-open");
                // hide overlay
                $(".overlay").removeClass("show");
                $("html,body").removeClass("sidebar-noneoverflow");
            });
        },
        search: function () {
            $(Selector.searchFull).click(function (event) {
                $(this)
                    .parents(".search-animated")
                    .find(".search-full")
                    .addClass(ToggleClasses.inputFocused);
                $(this).parents(".search-animated").addClass("show-search");
                $(Selector.overlay.search).addClass("show");
                $(Selector.overlay.search).addClass("show");
            });

            $(Selector.overlay.search).click(function (event) {
                $(this).removeClass("show");
                $(Selector.searchFull)
                    .parents(".search-animated")
                    .find(".search-full")
                    .removeClass(ToggleClasses.inputFocused);
                $(Selector.searchFull)
                    .parents(".search-animated")
                    .removeClass("show-search");
            });
        },
    };

    var inBuiltfunctionality = {
        mainCatActivateScroll: function () {
            const ps = new PerfectScrollbar(".menu-categories", {
                wheelSpeed: 0.5,
                swipeEasing: !0,
                minScrollbarLength: 40,
                maxScrollbarLength: 300,
                suppressScrollX: true,
            });
        },
        preventScrollBody: function () {
            $("#sidebar").bind("mousewheel DOMMouseScroll", function (e) {
                var scrollTo = null;

                if (e.type == "mousewheel") {
                    scrollTo = e.originalEvent.wheelDelta * -1;
                } else if (e.type == "DOMMouseScroll") {
                    scrollTo = 40 * e.originalEvent.detail;
                }

                if (scrollTo) {
                    e.preventDefault();
                    $(this).scrollTop(scrollTo + $(this).scrollTop());
                }
            });
        },
        functionalDropdown: function () {
            var getDropdownElement = document.querySelectorAll(
                ".more-dropdown .dropdown-item"
            );
            for (var i = 0; i < getDropdownElement.length; i++) {
                getDropdownElement[i].addEventListener("click", function () {
                    document.querySelectorAll(
                        ".more-dropdown .dropdown-toggle > span"
                    )[0].innerText = this.getAttribute("data-value");
                });
            }
        },
    };

    var _mobileResolution = {
        onRefresh: function () {
            var windowWidth = window.innerWidth;
            if (windowWidth <= MediaSize.md) {
                toggleFunction.sidebar();
            }
        },

        // Note : -  _mobileResolution -> onResize | Uncomment it if need for onresize functions for MOBILE RESOLUTION i.e. below or equal to 991px |

        /*
        onResize: function() {
            $(window).on('resize', function(event) {
                event.preventDefault();
                var windowWidth = window.innerWidth;
                if ( windowWidth <= MediaSize.md ) {
                }
            });
        }
        */
    };

    var _desktopResolution = {
        onRefresh: function () {
            var windowWidth = window.innerWidth;
            if (windowWidth > MediaSize.md) {
                toggleFunction.sidebar(true);
            }
        },

        // Note : -  _desktopResolution -> onResize | Uncomment it if need, for onresize functions for DESKTOP RESOLUTION i.e. above or equal to 991px |

        /*
        onResize: function() {
            $(window).on('resize', function(event) {
                event.preventDefault();
                var windowWidth = window.innerWidth;
                if ( windowWidth > MediaSize.md ) {
                }
            });
        }
        */
    };

    function sidebarFunctionality() {
        let sidebarStatus = localStorage.getItem(SIDE_BAR_STATUS);

        if (sidebarStatus === null) {
            localStorage.setItem(SIDE_BAR_STATUS, SIDE_BAR_OPEN);
            sidebarStatus = localStorage.getItem(SIDE_BAR_STATUS);
        }

        function sidebarCloser() {
            if (window.innerWidth <= 991 || sidebarStatus == SIDE_BAR_CLOSED) {
                if (!$("body").hasClass("alt-menu")) {
                    $("#container").addClass("sidebar-closed");
                    $(".overlay").removeClass("show");
                } else {
                    $(".navbar").removeClass("expand-header");
                    $(".overlay").removeClass("show");
                    $("#container").removeClass("sbar-open");
                    $("html, body").removeClass("sidebar-noneoverflow");
                }
            } else if (window.innerWidth > 991) {
                if (!$("body").hasClass("alt-menu")) {
                    $("#container").removeClass("sidebar-closed");
                    $(".navbar").removeClass("expand-header");
                    $(".overlay").removeClass("show");
                    $("#container").removeClass("sbar-open");
                    $("html, body").removeClass("sidebar-noneoverflow");
                } else {
                    $("html, body").addClass("sidebar-noneoverflow");
                    $("#container").addClass("sidebar-closed");
                    $(".navbar").addClass("expand-header");
                    $(".overlay").addClass("show");
                    $("#container").addClass("sbar-open");
                }
            }
        }

        function sidebarMobCheck() {
            if (window.innerWidth <= 991 || sidebarStatus == SIDE_BAR_CLOSED) {
                if ($(".main-container").hasClass("sbar-open")) {
                    return;
                } else {
                    sidebarCloser();
                }
            } else if (window.innerWidth > 991) {
                sidebarCloser();
            }
        }

        sidebarCloser();

        $(window).resize(function (event) {
            sidebarMobCheck();
        });
    }

    return {
        init: function () {
            toggleFunction.overlay();
            toggleFunction.search();
            /*
                Desktop Resoltion fn
            */
            _desktopResolution.onRefresh();

            // Note : -  _desktopResolution -> onResize | Uncomment it if need for onresize functions for MOBILE RESOLUTION i.e. above or equal to 991px |

            // _desktopResolution.onResize();

            /*
                Mobile Resoltion fn
            */
            _mobileResolution.onRefresh();

            // Note : -  _mobileResolution -> onResize | Uncomment it if need for onresize functions for DESKTOP RESOLUTION i.e. below or equal to 991px |

            // _mobileResolution.onResize();

            sidebarFunctionality();
            inBuiltfunctionality.mainCatActivateScroll();
            inBuiltfunctionality.preventScrollBody();
            inBuiltfunctionality.functionalDropdown();
        },
    };
})();

/**
 * calls the function func once within the within time window.
 * this is a debounce function which actually calls the func as
 * opposed to returning a function that would call func.
 *
 * @param func    the function to call
 * @param within  the time window in milliseconds, defaults to 300
 * @param timerId an optional key, defaults to func
 */
function callOnce(func, within = 300, timerId = null) {
    window.callOnceTimers = window.callOnceTimers || {};
    if (timerId == null) timerId = func;
    var timer = window.callOnceTimers[timerId];
    clearTimeout(timer);
    timer = setTimeout(() => func(), within);
    window.callOnceTimers[timerId] = timer;
}

/**
 * Get the element and append option from data array
 *
 * @param {String} element    The select element
 * @param {Array} data        The data array
 * @param {String} message    The message for first select option
 */
function appendOptions(element, data = [], message = null) {
    $el = $(element);

    $el.empty();
    $el.prop("disabled", false);

    $el.append(
        `<option selected disabled>-- ${message ? message : "Choose"} --</option>`
    );

    data.forEach((element) => {
        $el.append(`<option value="${element.id}">${element.name}</option>`);
    });

    $el.selectpicker("refresh");
}

/**
 * Reset the selects
 *
 * @param {String} element    The select element
 * @param {String} message    The message for first select option
 */
function resetSelects(el, message = null) {
    let $el = $(el);

    $el.empty();
    $el.append(
        `<option selected>-- ${message ? message : "Please Select"} --</option>`
    );
    $el.prop("disabled", true);
    $el.selectpicker("refresh");
}

/**
 * Apply the values to the selects
 *
 * @param {String} element      The select element
 * @param {Integer} value        The value for first select option
 */
function applyValueToSelect(el, value) {
    let $el = $(el);
    if (value) {
        $el.selectpicker('val', value).change();
    }
}

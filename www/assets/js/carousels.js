$(document).ready(function() {


    $("#owl-docs").owlCarousel({
        items: 5,
        pagination: false,
        navigation: true,
        navigationText: [
            "<i class='fas fa-caret-left'></i>",
            "<i class='fas fa-caret-right'></i>"
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                pagination: false,
                navigation: false,
                loop: true
            },
            600: {
                pagination: false,
                navigation: true,
                items: 3,
                navigationText: [
                    "<i class='fas fa-caret-left'></i>",
                    "<i class='fas fa-caret-right'></i>"
                ]
            },
        }
    });


    $("#owl-life").owlCarousel({
        items: 5,
        pagination: false,
        navigation: true,
        navigationText: [
            "<i class='fas fa-caret-left'></i>",
            "<i class='fas fa-caret-right'></i>"
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                pagination: false,
                navigation: false,
                loop: true
            },
            600: {
                pagination: false,
                navigation: true,
                items: 3,
                navigationText: [
                    "<i class='fas fa-caret-left'></i>",
                    "<i class='fas fa-caret-right'></i>"
                ]
            },
        }
    });
    $("#owl-partners").owlCarousel({
        items: 3,
        pagination: false,
        navigation: true,
        navigationText: [
            "<i class='fas fa-caret-left'></i>",
            "<i class='fas fa-caret-right'></i>"
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                pagination: false,
                navigation: false,
                loop: true
            },
            600: {
                pagination: false,
                navigation: true,
                items: 3,
                navigationText: [
                    "<i class='fas fa-caret-left'></i>",
                    "<i class='fas fa-caret-right'></i>"
                ]
            },
        }
    });

    $("#owl-factory").owlCarousel({
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                pagination: false,
                navigation: false,
                loop: true
            },
            600: {
                pagination: false,
                navigation: true,
                items: 3,
                navigationText: [
                    "<i class='fas fa-caret-left'></i>",
                    "<i class='fas fa-caret-right'></i>"
                ]
            }
        }
    });


    $("#owl-company").owlCarousel({
        items: 3,
        pagination: false,
        navigation: true,
        navigationText: [
            "<i class='fas fa-caret-left'></i>",
            "<i class='fas fa-caret-right'></i>"
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                pagination: false,
                navigation: false,
                loop: true
            },
            600: {
                pagination: false,
                navigation: true,
                items: 3,
                navigationText: [
                    "<i class='fas fa-caret-left'></i>",
                    "<i class='fas fa-caret-right'></i>"
                ]
            },
        }
    });


});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    var indiceId = {"system": 0, "notifications": 0, "informationsUser": 0};
    $('.menu .item').tab();
    $('.checkbox').checkbox();
    $('select').dropdown();

    $(window).resize(function () {

        if ($(window).width() >= 200 && $(window).width() <= 549) {

        } else {
            $("#sibebarMaior").addClass("visible");
        }
    });

    if ($(window).width() >= 200 && $(window).width() <= 549) {
        $("#sibebarMaior").removeClass("visible");
        $("#iconSidebarMobile").click(function () {
            $("#sibebarMaior").addClass("visible");
            var aux = auxWidthScreenSidebar();
            $("#sibebarMaior").css("width", aux + "%");
            $("#sibebarMaior").css("display", "block");
            $(".openbtn").addClass("closeMobile");
            clickDeviceMobile();
        });
    } else {
        $(".openbtn#btnDevices").click(function () {
            $(".ui.sidebar").toggleClass("very thin icon");
            $(".asd").toggleClass("marginlefting");
            $(".sidebar z").toggleClass("displaynone");
            $(".ui.accordion").toggleClass("displaynone");
            $(".ui.dropdown.item.iconShort").toggleClass("displayblock");
            var aux = auxWidthScreen();
            $(".teste").toggleClass(aux);
            $("#sibebarMaior").toggleClass("sibebarToMenor");
            $(".logo").find('img').toggle();

        });
    }

    function clickDeviceMobile() {
        $(".closeMobile").click(function () {
            $("#sibebarMaior").removeClass("visible");
            $(this).removeClass("closeMobile");
        });
    }


    $(".openDivNone").click(function () {
        var valorId = $(this).attr("id");
        $(".divMae").each(function () {
            $(this).removeClass("displayblock");
            $(this).addClass("displaynone");
        });
        $("#iconsAndInformationsUser .arrow").each(function () {
            $(this).removeClass("displayblock");
            $(this).addClass("displaynone");
        });
        if (indiceId[valorId] == 0) {
            $(".divMae#" + valorId).addClass("displayblock");
            $("#iconsAndInformationsUser .arrow#" + valorId).addClass("displayblock");
            auxIndiceArray(valorId, 1);
        } else {
            $(".divMae#" + valorId).removeClass("displayblock");
            $("#iconsAndInformationsUser .arrow#" + valorId).removeClass("displayblock");
            $(".divMae#" + valorId).addClass("displaynone");
            $("#iconsAndInformationsUser .arrow#" + valorId).addClass("displaynone");
            auxIndiceArray(valorId, 0);
        }
    });

    function auxIndiceArray(valorId, valorInteiro) {
        if (valorId == "system") {
            indiceId[valorId] = valorInteiro;
            indiceId["notifications"] = 0;
            indiceId["informationsUser"] = 0;
        } else if (valorId == "notifications") {
            indiceId[valorId] = valorInteiro;
            indiceId["system"] = 0;
            indiceId["informationsUser"] = 0;
        } else {
            indiceId[valorId] = valorInteiro;
            indiceId["system"] = 0;
            indiceId["notifications"] = 0;
        }
    }

    function auxWidthScreen() {
        var aux = "";
        if ($(window).width() >= 550 && $(window).width() <= 849) {
            aux = "marginLeftingResolutionMenor";
        } else {
            aux = "testeMarginLefting";
        }
        return aux;
    }

    function auxWidthScreenSidebar() {
        if ($(window).width() >= 500 && $(window).width() <= 549) {
            aux = "50";
        } else if ($(window).width() >= 450 && $(window).width() <= 499) {
            aux = "55";
        } else if ($(window).width() >= 350 && $(window).width() <= 449) {
            aux = "68";
        } else if ($(window).width() >= 200 && $(window).width() <= 349) {
            aux = "80";
        }
    }

    $(".ui.accordion .title").click(function () {
        var valorId = $(this).attr("id");
        clearClassActive(".ui.accordion .title", "active");
        clearClassActive(".ui.accordion .title", "activeAccordion");
        clearClassActive(".ui.accordion .content", "active");
        clearClassActive(".iconsSidebarFix .iconShort .icon", "active");
        $(".ui.accordion .content").each(function () {
            if ($(this).attr("id") != valorId) {
                $(this).hide(500);
            }
        });
        showElement(".ui.accordion .content", valorId);
//        addClassActive(".title", valorId, "activeAccordion");
//        addClassActive(".iconsSidebarFix .iconShort .icon", valorId, "active");
    });

    $(".iconsSidebarFix .iconShort .icon").click(function () {
        var valorId = $(this).attr("id");
        clearClassActive(".ui.accordion .title", "active");
        clearClassActive(".ui.accordion .title", "activeAccordion");
        clearClassActive(".iconsSidebarFix .iconShort .icon", "active");
        $(".ui.accordion .content").each(function () {
            if ($(this).attr("id") != valorId) {
                $(this).hide(500);
            }
        });
        showElement(".ui.accordion .content", valorId);
//        addClassActive(".title", valorId, "activeAccordion");
//        addClassActive(".iconsSidebarFix .iconShort .icon", valorId, "active");

    });

    function clearClassActive(elemento, valorClass) {
        $(elemento).each(function () {
            $(this).removeClass(valorClass);
        });
    }

    function addClassActive(elemento, valorId, valorClass) {
        $(elemento + "#" + valorId).addClass(valorClass);
    }

    function showElement(elemento, valorId) {
        $(elemento + "#" + valorId).show(500);
    }


});
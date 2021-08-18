function fetchPosByMapNameAndBombId(MapName,BombID) {

    var mapView = document.getElementById('map-view');
    var divSVGWrapper = create("div", { id: 'svg-wrapper' });

    axios.get('/getPos/'+MapName +"/"+BombID)
        .then(function (response) {
            this.data = response.data
            this.data.forEach(function (item) {
                if (item.bomb_id == 1) {
                    var divSmoke = create("div", { className: item.BombName });

                    divSmoke.style.position = 'absolute';
                    divSmoke.style.cursor = 'pointer';
                    divSmoke.style.visibility = "visible";
                    divSmoke.style.top = item.posTop + 'px';
                    divSmoke.style.left = item.posLeft + 'px';

                    var svgSmoke = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svgSmoke.setAttributeNS(null, 'width', 26);
                    svgSmoke.setAttributeNS(null, "height", "26");
                    svgSmoke.setAttributeNS(null, "viewBox", "0 0 100 100");
                    svgSmoke.setAttributeNS(null, "fill", 'none');

                    var circleSmoke1 = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                    circleSmoke1.setAttributeNS(null, 'class', 't-left');
                    circleSmoke1.setAttributeNS(null, 'cx', 50);
                    circleSmoke1.setAttributeNS(null, 'cy', 50);
                    circleSmoke1.setAttributeNS(null, 'r', 25);
                    circleSmoke1.setAttributeNS(null, "fill", '#d9d9d9');

                    var circleSmoke2 = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                    circleSmoke2.setAttributeNS(null, 'class', 't-right');
                    circleSmoke2.setAttributeNS(null, 'cx', 50);
                    circleSmoke2.setAttributeNS(null, 'cy', 50);
                    circleSmoke2.setAttributeNS(null, 'r', 25);
                    circleSmoke2.setAttributeNS(null, "fill", '#d9d9d9');

                    var circleSmoke3 = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                    circleSmoke3.setAttributeNS(null, 'class', 'b-left');
                    circleSmoke3.setAttributeNS(null, 'cx', 50);
                    circleSmoke3.setAttributeNS(null, 'cy', 50);
                    circleSmoke3.setAttributeNS(null, 'r', 25);
                    circleSmoke3.setAttributeNS(null, "fill", '#d9d9d9');

                    var circleSmoke4 = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                    circleSmoke4.setAttributeNS(null, 'class', 'b-right');
                    circleSmoke4.setAttributeNS(null, 'cx', 50);
                    circleSmoke4.setAttributeNS(null, 'cy', 50);
                    circleSmoke4.setAttributeNS(null, 'r', 25);
                    circleSmoke4.setAttributeNS(null, "fill", '#d9d9d9');

                    var circleSmoke5 = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                    circleSmoke5.setAttributeNS(null, 'class', 'c-left');
                    circleSmoke5.setAttributeNS(null, 'cx', 50);
                    circleSmoke5.setAttributeNS(null, 'cy', 50);
                    circleSmoke5.setAttributeNS(null, 'r', 25);
                    circleSmoke5.setAttributeNS(null, "fill", '#d9d9d9');

                    var circleSmoke6 = document.createElementNS("http://www.w3.org/2000/svg", "circle");
                    circleSmoke6.setAttributeNS(null, 'class', 'c-right');
                    circleSmoke6.setAttributeNS(null, 'cx', 50);
                    circleSmoke6.setAttributeNS(null, 'cy', 50);
                    circleSmoke6.setAttributeNS(null, 'r', 25);
                    circleSmoke6.setAttributeNS(null, "fill", '#d9d9d9');

                    var pathSmoke = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    pathSmoke.setAttributeNS(null,'d','M24.9696 73.8816C17.6107 66.4345 7.48676 47.0768 25.8624 29.2232C22.2943 35.5759 17.1204 53.4014 24.9696 73.8816Z');
                    pathSmoke.setAttributeNS(null,'fill','white');
                    pathSmoke.setAttributeNS(null,'opacity',0.4);

                    var textSmoke = document.createElementNS("http://www.w3.org/2000/svg", "text");
                    if (item.counter != 0) {
                        textSmoke.setAttributeNS(null, 'x', '50%');
                        textSmoke.setAttributeNS(null, 'y', '55%');
                        textSmoke.setAttributeNS(null, 'class', 'count');
                        textSmoke.textContent = item.counter;
                    } else textSmoke.textContent = ' ';

                    ac(svgSmoke, circleSmoke1);
                    ac(svgSmoke, circleSmoke2);
                    ac(svgSmoke, circleSmoke3);
                    ac(svgSmoke, circleSmoke4);
                    ac(svgSmoke, circleSmoke5);
                    ac(svgSmoke, circleSmoke6);
                    ac(svgSmoke, textSmoke);
                    ac(svgSmoke, pathSmoke);

                    ac(divSmoke, svgSmoke);
                    ac(divSVGWrapper, divSmoke);
                    ac(mapView, divSVGWrapper);
                    divSmoke.onclick = function(){
                        fetchVideoByPosID(item.id);
                    }
                }
                else if (item.bomb_id == 2) {
                    var divMolotov = create("div", { className: item.BombName });

                    divMolotov.style.position = 'absolute';
                    divMolotov.style.cursor = 'pointer';
                    divMolotov.style.visibility = "visible";
                    divMolotov.style.top = item.posTop + 'px';
                    divMolotov.style.left = item.posLeft + 'px';

                    var svgMolotov = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svgMolotov.setAttributeNS(null, 'width', 26);
                    svgMolotov.setAttributeNS(null, "height", "26");
                    svgMolotov.setAttributeNS(null, "viewBox", "0 0 100 100");
                    svgMolotov.setAttributeNS(null, "fill", 'none');

                    var pathMolotov = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    pathMolotov.setAttributeNS(null, "d", "M25.3982 48.7773C19.3236 45.1276 15.1936 28.4548 13.8879 20.5747C13.8893 19.9363 13.8938 19.2846 13.9016 18.6215C8.3084 27.1051 5 37.6095 5 48.9833C5 77.1591 25.3031 100 50.3483 100C75.3934 100 95.6965 77.1591 95.6965 48.9833C95.6965 36.7343 91.8594 25.4936 85.4636 16.6995C83.0925 27.4231 77.6266 34.0558 73.0224 37.9924C67.5367 14.5412 47.3277 4.2475 37.7941 0C41.9891 20.3651 32.1531 40.1073 25.3982 48.7773Z");
                    pathMolotov.setAttributeNS(null, 'fill', '#CE1B1B');

                    var textMolotov = document.createElementNS("http://www.w3.org/2000/svg", "text");
                    if (item.counter != 0) {
                        textMolotov.setAttributeNS(null, 'x', '50%');
                        textMolotov.setAttributeNS(null, 'y', '55%');
                        textMolotov.setAttributeNS(null, 'class', 'count');
                        textMolotov.textContent = item.counter;
                    } else textMolotov.textContent = ' ';

                    ac(svgMolotov, pathMolotov);
                    ac(svgMolotov, textMolotov);
                    ac(divMolotov, svgMolotov);
                    ac(divSVGWrapper, divMolotov);
                    ac(mapView, divSVGWrapper);
                    divMolotov.onclick = function () {
                        fetchVideoByPosID(item.id);
                    }
                }
                else if (item.bomb_id == 3) {
                    var divFlash = create("div", { className: item.BombName });

                    divFlash.style.position = 'absolute';
                    divFlash.style.cursor = 'pointer';
                    divFlash.style.visibility = "visible";
                    divFlash.style.top = item.posTop + 'px';
                    divFlash.style.left = item.posLeft + 'px';

                    var svgFlash = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svgFlash.setAttributeNS(null, 'width', 26);
                    svgFlash.setAttributeNS(null, "height", "26");
                    svgFlash.setAttributeNS(null, "viewBox", "0 0 100 100");
                    svgFlash.setAttributeNS(null, "fill", 'none');

                    var pathFlash1 = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    var pathFlash2 = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    var pathFlash3 = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    var pathFlash4 = document.createElementNS("http://www.w3.org/2000/svg", "path");

                    pathFlash1.setAttributeNS(null, "d", "M16 57L71 0L52.1429 57H16Z");
                    pathFlash2.setAttributeNS(null, "d", "M85 44L31 100L49.5143 44H85Z");
                    pathFlash3.setAttributeNS(null, "d", "M15 56L69 0L50.4857 56H15Z");
                    pathFlash4.setAttributeNS(null, "d", "M84 44L29 100L47.8571 44H84Z");

                    pathFlash1.setAttributeNS(null, 'fill', '#464646');
                    pathFlash2.setAttributeNS(null, 'fill', '#464646');
                    pathFlash3.setAttributeNS(null, 'fill', '#FFD600');
                    pathFlash4.setAttributeNS(null, 'fill', '#FFD600');

                    var textFlash = document.createElementNS("http://www.w3.org/2000/svg", "text");
                    if (item.counter != 0) {
                        textFlash.setAttributeNS(null, 'x', '50%');
                        textFlash.setAttributeNS(null, 'y', '55%');
                        textFlash.setAttributeNS(null, 'class', 'count');
                        textFlash.textContent = item.counter;
                    } else textFlash.textContent = ' ';

                    ac(svgFlash, pathFlash1);
                    ac(svgFlash, pathFlash2);
                    ac(svgFlash, pathFlash3);
                    ac(svgFlash, pathFlash4);
                    ac(svgFlash, textFlash);
                    ac(divFlash, svgFlash);
                    ac(divSVGWrapper, divFlash);
                    ac(mapView, divSVGWrapper);
                    divFlash.onclick = function () {
                        fetchVideoByPosID(item.id);
                    }

                }
                else if (item.bomb_id == 4) {

                    var divGrenade = create("div", { className: item.BombName });

                    divGrenade.style.position = 'absolute';
                    divGrenade.style.cursor = 'pointer';
                    divGrenade.style.visibility = "visible";
                    divGrenade.style.top = item.posTop + 'px';
                    divGrenade.style.left = item.posLeft + 'px';

                    var svgGrenade = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svgGrenade.setAttributeNS(null, 'width', 26);
                    svgGrenade.setAttributeNS(null, "height", "26");
                    svgGrenade.setAttributeNS(null, "viewBox", "0 0 100 100");
                    svgGrenade.setAttributeNS(null, "fill", 'none');

                    var pathGrenade1 = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    var pathGrenade2 = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    var pathGrenade3 = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    var pathGrenade4 = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    var pathGrenade5 = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    var pathGrenade6 = document.createElementNS("http://www.w3.org/2000/svg", "path");

                    pathGrenade1.setAttributeNS(null, "d", "M50 0L56.75 39.1747L96.7654 25L63.5 50L96.7654 75L56.75 60.8253L50 100L43.25 60.8253L3.23463 75L36.5 50L3.23463 25L43.25 39.1747L50 0Z");
                    pathGrenade2.setAttributeNS(null, "d", "M50 14L54.75 42.2058L82.909 32L59.5 50L82.909 68L54.75 57.7942L50 86L45.25 57.7942L17.091 68L40.5 50L17.091 32L45.25 42.2058L50 14Z");
                    pathGrenade3.setAttributeNS(null, "d", "M39.4887 36.6548L31.1415 21.2571L17.0686 15.7767L39.4887 36.6548Z");
                    pathGrenade4.setAttributeNS(null, "d", "M39.2623 23.2713L35.6463 17.0083L38.2047 12.3997L39.2623 23.2713Z");
                    pathGrenade5.setAttributeNS(null, "d", "M60.4394 65.5175L67.7217 78.2732L79.6326 83.0121L60.4394 65.5175Z");
                    pathGrenade6.setAttributeNS(null, "d", "M59.3836 79.31L62.9996 85.573L60.4412 90.1816L59.3836 79.31Z");

                    pathGrenade1.setAttributeNS(null, 'fill', '#CE1B1B');
                    pathGrenade2.setAttributeNS(null, 'fill', '#AC1C1C');
                    pathGrenade3.setAttributeNS(null, 'fill', 'black');
                    pathGrenade4.setAttributeNS(null, 'fill', 'black');
                    pathGrenade5.setAttributeNS(null, 'fill', 'black');
                    pathGrenade6.setAttributeNS(null, 'fill', 'black');

                    var textGrenade = document.createElementNS("http://www.w3.org/2000/svg", "text");
                    if (item.counter != 0) {
                        textGrenade.setAttributeNS(null, 'x', '50%');
                        textGrenade.setAttributeNS(null, 'y', '55%');
                        textGrenade.setAttributeNS(null, 'class', 'count');
                        textGrenade.textContent = item.counter;
                    } else textGrenade.textContent = ' ';

                    ac(svgGrenade, pathGrenade1);
                    ac(svgGrenade, pathGrenade2);
                    ac(svgGrenade, pathGrenade3);
                    ac(svgGrenade, pathGrenade4);
                    ac(svgGrenade, pathGrenade5);
                    ac(svgGrenade, pathGrenade6);
                    ac(svgGrenade, textGrenade);
                    ac(divGrenade, svgGrenade);
                    ac(divSVGWrapper, divGrenade);
                    ac(mapView, divSVGWrapper);
                    divGrenade.onclick = function () {
                        fetchVideoByPosID(item.id);
                    }
                }

                const elements = ["Smoke", "Molotov", "Flash", "Grenade"];
                for (var i = 0; i < elements.length; i++) {
                    var x = document.getElementsByClassName(elements[i]);
                    for (var j = 0; j < x.length; j++) {
                        x[j].addEventListener('click', triggerGridVideo, false);
                    }
                }
            });

        });
    
    SVGWrapper = document.getElementById("svg-wrapper");
    if (SVGWrapper) {
        mapView.removeChild(SVGWrapper);
    }
}

function fetchVideoByPosID(PosID) {
    var videoGrid = document.getElementById("video-grid");
    var divVideoListWrap = create("div", {
        id: 'video-list-wrap'
    });
    var divVideoList = create("div", {
        className: 'video-list'
    });
    axios.get('/getVideos/' + PosID)
        .then(function (response) {
            this.data = response.data;
            this.data.forEach(function (item) {
                //--create wrapper for all --//
                var divVideoItem = create("div", {
                    className: 'video-item'
                });
                var divNadeboxWrap = create("div", {
                    className: 'nadebox-wrap'
                });
                var divNadebox = create("div", {
                    className: 'nadebox'
                });
                var aDetailDirect = create("a", {
                    href: '/nades/'+item.slug 
                });

                //--create title---//
                var divTitleWrap = create("div", {
                    className: 'title'
                });
                var divTitleText = create("h3", {
                    className: 'title-text'
                });
                var spanMainTitle = create("span", {
                    className: 'main-title',
                    textContent: item.PosName +' '+item.BombName
                });
                var spanSubTitle = create("span", {
                    className: 'sub-title',
                    textContent: 'from ' +item.VideoName
                });

                //--create video--/
                var divVideo = create("div", {
                    className: 'video'
                });
                var divPlayer = create("div", {
                    className: 'player'
                });

                //--create front division--/
                var divFront = create("div", {
                    className: 'front'
                });
                var divThumbImg = create("div", {
                    className: 'thumb-img'
                });
                var divResultImgWrap = create("div", {
                    className: 'result-img'
                });
                var divImageWrapper1 = create("div", {
                    className: 'img-wrap'
                });
                var divResultImg = create("img", {
                    className: 'images',
                    src: item.ResultImagePath
                });
                var divLineUpBorder = create("div", {
                    className: 'lineup-border'
                });
                var divLineUpImgWrap = create("div", {
                    className: 'lineup-img'
                });
                var divImageWrapper2 = create("div", {
                    className: 'img-wrap'
                });
                var divLineUpImg = create("img", {
                    className: 'images',
                    src: item.LineUpImagePath
                });

                //--create crosshair--//
                var divCrossHair = create("div", {
                    className: 'crosshair'
                });
                var svgCrossHair = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                svgCrossHair.setAttributeNS(null, "viewBox", "0 0 43 44");
                svgCrossHair.setAttributeNS(null, "width", "20");
                svgCrossHair.setAttributeNS(null, "height", "21");
                var pathCrossHair = document.createElementNS("http://www.w3.org/2000/svg", "path");
                pathCrossHair.setAttributeNS(null, "d", "M19.5 27.5h4v16h-4zM19.5.5h4v16h-4zM16.5 20v4H.5v-4zM42.5 20v4h-16v-4z");
                pathCrossHair.setAttributeNS(null, "fill", '#fff');
                pathCrossHair.setAttributeNS(null, "stroke", '#000');

                //--create back division--//
                var divBack = create("div", {
                    className: 'back'
                });
                
                var divVidPreview = create("div", {
                    className: 'video-preview'
                });
                var iframe = create("iframe");
                iframe.setAttribute("src", getIframeLink(item.VideoPath) + "?controls=0&&speed=2");
                iframe.setAttribute("frameborder", 0);
                iframe.setAttribute("style", "width:100%;height:100%;position:absolute;top:0,left:0");

                //--create item bottoms division--//
                var divItemsBottom = create("div", {
                    className: 'items-bottom'
                });
                var divStatWrapper1 = create("div", {
                    className: 'stats'
                });
                var divStatWrapper2 = create("div", {
                    className: 'stats'
                });
                var divStatWrapper3 = create("div", {
                    className: 'stats'
                });
                var divStatItem1 = create("div", {
                    className: 'stat-item'
                });
                var divStatItem2 = create("div", {
                    className: 'stat-item'
                });
                var divStatItem3 = create("div", {
                    className: 'stat-item'
                });
                var divStatView = create("div", {
                    className: 'stat-view'
                });
                var divStatFavorite = create("div", {
                    className: 'stat-favorite'
                });
                var divStatComment = create("div", {
                    className: 'stat-comment'
                });
                var divStatViewCount = create("div", {
                    className: 'stat-count',
                    textContent: item.views
                });
                var divStatFavoriteCount = create("div", {
                    className: 'stat-count',
                    textContent: item.favorites
                });
                // var divStatCmtCount = create("div",{className:'stat-count'});
                var iconView = create("i", {
                    className: 'fas fa-eye'
                });
                var iconFavorite = create("i", {
                    className: 'fas fa-star'
                });
                // var iconComment = create("i",{className:'fas fa-comment-dots'});
                var divSpecials = create("div",{className: 'specials'});
                //--append child into title--//
                divTitleText1 = ac(divTitleText, spanMainTitle);
                ac(divTitleWrap, divTitleText1);
                divTitleText2 = ac(divTitleText, spanSubTitle);
                ac(divTitleWrap, divTitleText2);

                //--append child into front--// && //--append child into video--//
                var front1 = ac(divFront, ac(divThumbImg, ac(divResultImgWrap, ac(divImageWrapper1, divResultImg))));
                ac(divVideo, ac(divPlayer, front1));
                var front2 = ac(divFront, ac(divThumbImg, divLineUpBorder));
                ac(divVideo, ac(divPlayer, front2));
                var front3 = ac(divFront, ac(divThumbImg, ac(divLineUpImgWrap, ac(divImageWrapper2, divLineUpImg))));
                ac(divVideo, ac(divPlayer, front3));

                //--append child into back--// && //--append child into video--//
                ac(divVidPreview, iframe);
                var back = ac(divBack, divVidPreview);
                ac(divVideo, ac(divPlayer, back));

                //--append child into crosshair--//
                ac(svgCrossHair, pathCrossHair);
                ac(divCrossHair, svgCrossHair);
                ac(divLineUpImgWrap, divCrossHair);

                //--append child into item bottoms division--//
                ac(divStatView, iconView);
                ac(divStatView, divStatViewCount);
                ac(divStatFavorite, iconFavorite);
                ac(divStatFavorite, divStatFavoriteCount);
                // ac(divStatComment,iconComment);
                // ac(divStatComment,divStatCmtCount);
                ac(divStatItem1, divStatView);
                ac(divStatItem2, divStatFavorite);
                // ac(divStatItem3,divStatComment);
                ac(divStatWrapper1, divStatItem1);
                ac(divStatWrapper2, divStatItem2);
                // ac(divStatWrapper3,divStatItem3);
                ac(divItemsBottom, divStatWrapper1);
                ac(divItemsBottom, divStatWrapper2);
                // ac(divItemsBottom,divStatWrapper3);
                ac(divItemsBottom,divSpecials);
                //--append child into a--//
                ac(aDetailDirect, divTitleWrap);
                ac(aDetailDirect, divVideo);
                var divNadebox1 = ac(divNadebox, aDetailDirect);
                ac(divNadeboxWrap, divNadebox1);
                var divNadebox2 = ac(divNadebox, divItemsBottom);
                ac(divNadeboxWrap, divNadebox2);

                //--append child for all wrapper--//
                var x = ac(divVideoListWrap, ac(divVideoList, ac(divVideoItem, divNadeboxWrap)));
                ac(videoGrid, x);


                // console.log(Object.keys(response.data).length); //ham dem so video  
            });

        });
}

function createModalSignIn(){
    var body = document.getElementsByTagName("body")[0];
    var divModalBg = create("div", {className: 'modal-bg'});
    var divModalWrapper = create("div", {className: 'modal-wrapper'});
    var buttonCloseModal = create("button",{className: 'close-modal'});
    var iconButtonCloseModal = create("i",{className: 'fas fa-times'});
    var divModalTitle = create("div",{className: 'modal-title'});
    var divModalContent = create("div",{className: 'modal-content'});
    var h3ModalTitle = create("h3",{textContent: 'Sign In Required'});
    


    buttonCloseModal.addEventListener("click", closeModalSignIn);
    iconButtonCloseModal.setAttribute("fill","black");
    iconButtonCloseModal.setAttribute("stroke","white");
    iconButtonCloseModal.setAttribute("height","1em");
    iconButtonCloseModal.setAttribute("width","1em");
    ac(divModalTitle,h3ModalTitle);
    ac(buttonCloseModal,iconButtonCloseModal);

    var divSignInWarning = create("div",{className: 'sign-in-warning'});
    var divSection1 = create("div",{className: 'section', textContent:'Sign in and you can...'});
    var divSection2 = create("div",{className: 'section'});
    var divSection3 = create("div",{className: 'section'});
    var divSection4 = create("div",{className: 'section'});
    var spanSection2 = create("span");
    var iconSpanSection2 = create("i",{className: 'icon-plus fas fa-plus'});
    var textSpanSection2 = create("span",{textContent: 'Add new nades'});
    ac(spanSection2,iconSpanSection2);
    ac(spanSection2,textSpanSection2);
    ac(divSection2,spanSection2);

    var spanSection3 = create("span");
    var iconSpanSection3 = create("i",{className: 'icon-star fas fa-star'});
    var textSpanSection3 = create("span",{textContent: 'Favorite nades'});
    ac(spanSection3,iconSpanSection3);
    ac(spanSection3,textSpanSection3);
    ac(divSection3,spanSection3);

    var spanSection4 = create("span");
    var iconSpanSection4 = create("i",{className: 'fas fa-comment'});
    var textSpanSection4 = create("span",{textContent: 'Comment on nades'});
    ac(spanSection4,iconSpanSection4);
    ac(spanSection4,textSpanSection4);
    ac(divSection4,spanSection4);

    ac(divSignInWarning,divSection1);
    ac(divSignInWarning,divSection2);
    ac(divSignInWarning,divSection3);
    ac(divSignInWarning,divSection4);
    ac(divModalContent,divSignInWarning);

    var divBtnSignIn = create("div",{className:'btn-wrapper'});
    var divBtnSignInWrapper = create("div",{className: 'steam-login-wrapper-warning'});
    var anchorSignIn = create("a");
    anchorSignIn.setAttribute("href","../login");
    var buttonSignIn = create("button",{className:'btn btn-primary'});
    buttonSignIn.innerHTML = "Sign in with STEAM   ";
    var iconSteam = create("i",{className: 'fab fa-steam'});
    ac(buttonSignIn,iconSteam);
    ac(anchorSignIn,buttonSignIn);
    ac(divBtnSignInWrapper,anchorSignIn);
    ac(divBtnSignIn,divBtnSignInWrapper);
    ac(divSignInWarning,divBtnSignIn);

    ac(divModalWrapper, buttonCloseModal);
    ac(divModalWrapper,divModalTitle);
    ac(divModalWrapper,divModalContent);
    
    ac(divModalBg,divModalWrapper);
    ac(body,divModalBg);
}

function create(tagName, props) {
    return Object.assign(document.createElement(tagName), (props || {}));
}

function ac(p, c) {
    p.appendChild(c);
    return p;
}


function closeGridVideo() {
    var target = document.getElementById("video-grid-view");
    target.style.opacity = 0;
    target.style.transform = "translateY(-100%)";
    var videoListWrap = document.getElementById("video-list-wrap");
    videoListWrap.parentNode.removeChild(videoListWrap);
}

function triggerGridVideo() {
    var target = document.getElementById("video-grid-view");
    target.style.opacity = 1;
    target.style.transform = "translateY(0%)";
}

function getIframeLink(link) {
    var linkGenerate = link.slice(0, 19) + "ifr" + link.slice(18);
    return linkGenerate;
}

function closeModalSignIn() {
    var body = document.getElementsByTagName("body")[0];
    var divModalBg = document.getElementsByClassName("modal-bg")[0];
    body.removeChild(divModalBg);
}



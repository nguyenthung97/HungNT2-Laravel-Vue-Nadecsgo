
function fetchVideoBySteamIDAndMapID(steamId, MapID) {

    var videoGrid = document.getElementById("video-grid");
    var divVideoListWrap = create("div", {
        id: "video-list-wrap",
    });
    var divVideoList = create("div", {
        className: "video-list",
    });
    var url = "/users/" + steamId + "/" + MapID;
    axios.get(url)
    .then(function (response) {
        this.data = response.data;
     
        this.data.forEach(function (item) {
            
            //--create wrapper for all --//
            var divVideoItem = create("div", {
                className: "video-item",
            });
            var divNadeboxWrap = create("div", {
                className: "nadebox-wrap",
            });
            var divNadebox = create("div", {
                className: "nadebox",
            });
            var aDetailDirect = create("a", {
                href: "/nades/" + item.slug,
            });

            //--create title---//
            var divTitleWrap = create("div", {
                className: "title",
            });
            var divTitleText = create("h3", {
                className: "title-text",
            });
            var spanMainTitle = create("span", {
                className: "main-title",
                textContent: item.PosName + " " + item.BombName,
            });
            var spanSubTitle = create("span", {
                className: "sub-title",
                textContent: "from " + item.VideoName,
            });

            //--create video--/
            var divVideo = create("div", {
                className: "video",
            });
            var divPlayer = create("div", {
                className: "player",
            });

            //--create front division--/
            var divFront = create("div", {
                className: "front",
            });
            var divThumbImg = create("div", {
                className: "thumb-img",
            });
            var divResultImgWrap = create("div", {
                className: "result-img",
            });
            var divImageWrapper1 = create("div", {
                className: "img-wrap",
            });
            var divResultImg = create("img", {
                className: "images",
                src: item.ResultImagePath,
            });
            var divLineUpBorder = create("div", {
                className: "lineup-border",
            });
            var divLineUpImgWrap = create("div", {
                className: "lineup-img",
            });
            var divImageWrapper2 = create("div", {
                className: "img-wrap",
            });
            var divLineUpImg = create("img", {
                className: "images",
                src: item.LineUpImagePath,
            });

            //--create crosshair--//
            var divCrossHair = create("div", {
                className: "crosshair",
            });
            var svgCrossHair = document.createElementNS(
                "http://www.w3.org/2000/svg",
                "svg"
            );
            svgCrossHair.setAttributeNS(null, "viewBox", "0 0 43 44");
            svgCrossHair.setAttributeNS(null, "width", "20");
            svgCrossHair.setAttributeNS(null, "height", "21");
            var pathCrossHair = document.createElementNS(
                "http://www.w3.org/2000/svg",
                "path"
            );
            pathCrossHair.setAttributeNS(
                null,
                "d",
                "M19.5 27.5h4v16h-4zM19.5.5h4v16h-4zM16.5 20v4H.5v-4zM42.5 20v4h-16v-4z"
            );
            pathCrossHair.setAttributeNS(null, "fill", "#fff");
            pathCrossHair.setAttributeNS(null, "stroke", "#000");

            //--create back division--//
            var divBack = create("div", {
                className: "back",
            });

            var divVidPreview = create("div", {
                className: "video-preview",
            });
            var iframe = create("iframe");
            iframe.setAttribute(
                "src",
                getIframeLink(item.VideoPath) + "?controls=0&&speed=2"
            );
            iframe.setAttribute("frameborder", 0);
            iframe.setAttribute(
                "style",
                "width:100%;height:100%;position:absolute;top:0,left:0"
            );

            //--create item bottoms division--//
            var divItemsBottom = create("div", {
                className: "items-bottom",
            });
            var divStatWrapper1 = create("div", {
                className: "stats",
            });
            var divStatWrapper2 = create("div", {
                className: "stats",
            });
            var divStatWrapper3 = create("div", {
                className: "stats",
            });
            var divStatItem1 = create("div", {
                className: "stat-item",
            });
            var divStatItem2 = create("div", {
                className: "stat-item",
            });
            var divStatItem3 = create("div", {
                className: "stat-item",
            });
            var divStatView = create("div", {
                className: "stat-view",
            });
            var divStatFavorite = create("div", {
                className: "stat-favorite",
            });
            var divStatComment = create("div", {
                className: "stat-comment",
            });
            var divStatViewCount = create("div", {
                className: "stat-count",
                textContent: item.views,
            });
            var divStatFavoriteCount = create("div", {
                className: "stat-count",
                textContent: item.favorites,
            });
            // var divStatCmtCount = create("div",{className:'stat-count'});
            var iconView = create("i", {
                className: "fas fa-eye",
            });
            var iconFavorite = create("i", {
                className: "fas fa-star",
            });
            // var iconComment = create("i",{className:'fas fa-comment-dots'});
            var divSpecials = create("div", { className: "specials" });
            //--append child into title--//
            divTitleText1 = ac(divTitleText, spanMainTitle);
            ac(divTitleWrap, divTitleText1);
            divTitleText2 = ac(divTitleText, spanSubTitle);
            ac(divTitleWrap, divTitleText2);

            //--append child into front--// && //--append child into video--//
            var front1 = ac(
                divFront,
                ac(
                    divThumbImg,
                    ac(divResultImgWrap, ac(divImageWrapper1, divResultImg))
                )
            );
            ac(divVideo, ac(divPlayer, front1));
            var front2 = ac(divFront, ac(divThumbImg, divLineUpBorder));
            ac(divVideo, ac(divPlayer, front2));
            var front3 = ac(
                divFront,
                ac(
                    divThumbImg,
                    ac(divLineUpImgWrap, ac(divImageWrapper2, divLineUpImg))
                )
            );
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
            ac(divItemsBottom, divSpecials);
            //--append child into a--//
            ac(aDetailDirect, divTitleWrap);
            ac(aDetailDirect, divVideo);
            var divNadebox1 = ac(divNadebox, aDetailDirect);
            ac(divNadeboxWrap, divNadebox1);
            var divNadebox2 = ac(divNadebox, divItemsBottom);
            ac(divNadeboxWrap, divNadebox2);

            //--append child for all wrapper--//
            var x = ac(
                divVideoListWrap,
                ac(divVideoList, ac(divVideoItem, divNadeboxWrap))
            );
            ac(videoGrid, x);
            // console.log(Object.keys(response.data).length); //ham dem so video
        });
        //end of for-each loop
        // if(response.data = ''){
        //     divEmptyList = create('div',{className: empty-list, textContent: });
            
        // }
    });
    var videoListWrap = document.getElementById("video-list-wrap");
    if (videoListWrap) {
        videoGrid.removeChild(videoListWrap);
    }
}

function create(tagName, props) {
    return Object.assign(document.createElement(tagName), props || {});
}

function ac(p, c) {
    p.appendChild(c);
    return p;
}

function getIframeLink(link) {
    var linkGenerate = link.slice(0, 19) + "ifr" + link.slice(18);
    return linkGenerate;
}


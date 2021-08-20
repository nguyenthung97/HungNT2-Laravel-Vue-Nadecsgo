function displayIframe(videoID) {
    var divVideoLineupWrapper = document.getElementById("video-lineup-wrapper");
    var divMediaContainer =
        document.getElementsByClassName("media-container")[0];

    var divVideoTab = create("div", { className: "video-tab" });
    var divGfyWrap = create("div", { className: "gfy-wrap" });
    var iframe = create("iframe");
    axios.get("/getDetail/" + videoID).then(function (response) {
        this.data = response.data;
        this.data.forEach(function (item) {

            iframe.setAttribute(
                "src",
                getIframeLink(item.VideoPath) + "?controls=0&&speed=2"
            );
        });
    });
    iframe.setAttribute("frameborder", 0);
    iframe.setAttribute(
        "style",
        "width:100%;height:100%;position:absolute;top:0,left:0"
    );
    var divSelectedBg = document.getElementsByClassName("selected-bg")[0];
    divSelectedBg.removeAttribute("style");

    ac(divGfyWrap, iframe);
    ac(divVideoTab, divGfyWrap);
    ac(divMediaContainer, divVideoTab);
    ac(divVideoLineupWrapper, divMediaContainer);

    if (document.getElementsByClassName("lineup-tab")[0]) {
        var divLineupTab = document.getElementsByClassName("lineup-tab")[0];
        divLineupTab.parentNode.removeChild(divLineupTab);
    }
    var tabVideoButton = document.getElementsByClassName("tab-video")[0];
    tabVideoButton.classList.add("selected");
    var tabLineupButton = document.getElementsByClassName("tab-lineup")[0];
    tabLineupButton.classList.remove("selected");
}

function displayLineUpImage(videoID) {
    var divVideoLineupWrapper = document.getElementById("video-lineup-wrapper");
    var divMediaContainer =
        document.getElementsByClassName("media-container")[0];
    var tabVideoButton = document.getElementsByClassName("tab-video")[0];
    tabVideoButton.classList.remove("selected");
    var tabLineupButton = document.getElementsByClassName("tab-lineup")[0];
    tabLineupButton.classList.add("selected");
    var divVideoTab = document.getElementsByClassName("video-tab")[0];
    divVideoTab.parentNode.removeChild(divVideoTab);
    var divSelectedBg = document.getElementsByClassName("selected-bg")[0];
    divSelectedBg.style.transform = "translateX(100%)";
    var divLineUpTab = create("div", { className: "lineup-tab" });
    var divImageContainer = create("div", { className: "img-container" });
    var divImgWrap = create("div", { className: "img-wrap" });
    var divImgWrapInside = create("div");
    divImgWrapInside.setAttribute(
        "style",
        "display: block; overflow: hidden; position: absolute; inset: 0px; box-sizing: border-box; margin: 0px;"
    );
    var imgLineUp = create("img",{className:'video-lineup-img'});
    axios.get("/getDetail/" + videoID).then(function (response) {
        this.data = response.data;
        this.data.forEach(function (item) {
            imgLineUp.src = item.LineUpImagePath;
        });
    });

    imgLineUp.setAttribute("decoding", "async");
    imgLineUp.setAttribute("sizes", "100vw");
    ac(divImgWrapInside, imgLineUp);
    ac(divImgWrap, divImgWrapInside);
    ac(divImageContainer, divImgWrap);

    var divLineUpImg = create("div", { className: "line-up-img" });
    var divCrossHair = create("div", { className: "crosshair" });
    var svgCrossHair = document.createElementNS(
        "http://www.w3.org/2000/svg",
        "svg"
    );
    svgCrossHair.setAttributeNS(null, "viewBox", "0 0 43 44");
    svgCrossHair.setAttributeNS(null, "width", "43");
    svgCrossHair.setAttributeNS(null, "height", "44");
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

    ac(svgCrossHair, pathCrossHair);
    ac(divCrossHair, svgCrossHair);
    ac(divLineUpImg, divCrossHair);

    ac(divLineUpTab, divImageContainer);
    ac(divLineUpTab, divLineUpImg);
    ac(divMediaContainer, divLineUpTab);
    ac(divVideoLineupWrapper, divMediaContainer);
}

function displayComment(videoID) {
    var divDisplayComment = document.getElementById("display_comment");
    var divCommentWrapper = create("div", { className: "comment-wrapper" });
    var imgCommentAvatar = create("img", {
        className: "comment-avatar",
    });
    var divCommentNicknameWrapper = create("div", {
        className: "comment-nickname-wrapper",
    });
    var divCommentBodyWrapper = create("div", {
        className: "comment-body-wrapper",
    });
    axios.get("/getCommentByVideoId/" + videoID).then(function (response) {
        this.data = response.data;
        this.data.forEach(function (item) {
            imgCommentAvatar.setAttribute("src", item.comment_sender_avatar);

            var divCommentNickName = create("div");
            divCommentNickName.setAttribute(
                "style",
                "display:flex; align-items:center"
            );
            var aCommentNickName = create("a", {
                textContent: item.comment_sender_name,
            });
            aCommentNickName.setAttribute("style", "color: blue")
            ac(divCommentNickName, aCommentNickName);
            ac(divCommentNicknameWrapper, divCommentNickName);

            var divCommentBody = create("div");
            divCommentBody.setAttribute(
                "style",
                "display:flex; align-items:center"
            );
            var pCommentBody = create("p", { textContent: item.comment });
            ac(divCommentBody, pCommentBody);
            ac(divCommentBodyWrapper, divCommentBody);
        });
        if(response.data == ''){
            divDisplayComment.setAttribute('style','display:none');
        }
    });
    ac(divCommentWrapper, imgCommentAvatar);
    ac(divCommentWrapper, divCommentNicknameWrapper);
    ac(divCommentWrapper, divCommentBodyWrapper);
    ac(divDisplayComment, divCommentWrapper);
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

document
    .getElementsByTagName("textarea")[0]
    .addEventListener("change", function () {
        console.log("changed");
        var btnSubmit = document.getElementById("submit-btn");
        element.classList.remove("disabled");
    });

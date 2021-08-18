window.onload = function () {
    window.sessionStorage.clear();
}

function addResultImageToPreview() {
    var nadepage = document.getElementById('create-nade-page');
    var divImageAdder = create("div", { id: 'image-adder' });
    var divImageUploader = create("div", { className: 'image-uploader' });

    //input 
    var inputResultImg = create("input");
    inputResultImg.type = "file";
    inputResultImg.setAttribute("hidden", "true");
    inputResultImg.setAttribute("accept", "image/jpeg");
    inputResultImg.onchange = function () {
        clearPlaceHolderDiv();
        encodeImageFileAsURL(this, 'resultImagePreview');
        createButtonSaveImage();
        directResultImageToPreview();
    }

    var divSelectButtons = create("div", { className: 'file-selector-btn' });
    var btnCancel = create("button", { className: 'btn-cancel' });
    var btnSelectImage = create("button", { className: 'btn-select-img' });

    btnCancel.innerHTML = "Cancel";
    btnCancel.setAttribute('type', 'button');
    btnCancel.onclick = function () {
        closeUploadImage('image-adder');
    };
    btnSelectImage.innerHTML = "Upload image";
    btnSelectImage.setAttribute('type', 'button');
    btnSelectImage.onclick = function () {
        inputResultImg.click();
    }

    var divPlaceholder = create("div", { id: 'place-holder' });
    var divMessage = create("div", { className: 'message' });
    var divLineUpMessage = create("div", { className: 'line-up-message' });
    var MessageH3 = create("h3");
    MessageH3.innerHTML = "Guideline"
    var MessageUL = create("ul");
    var MessageLI1 = create("li");
    MessageLI1.innerHTML = "Image must be 16:9 Ratio";
    var MessageLI2 = create("li");
    MessageLI2.innerHTML = "Remove your hud (cl_drawhud 0; r_drawviewmodel 0;)";
    var MessageLI3 = create("li");
    MessageLI3.innerHTML = "Take screenshot";

    var divImageDisplay = create("div", { className: 'img-crop' });
    var imgResultPreview = create("img", { id: 'resultImagePreview' });

    ac(divImageDisplay, imgResultPreview);
    ac(MessageUL, MessageLI1);
    ac(MessageUL, MessageLI2);
    ac(MessageUL, MessageLI3);
    ac(divLineUpMessage, MessageH3);
    ac(divLineUpMessage, MessageUL);
    ac(divMessage, divLineUpMessage);
    ac(divPlaceholder, divMessage);

    ac(divSelectButtons, btnCancel);
    ac(divSelectButtons, btnSelectImage);

    ac(divImageUploader, inputResultImg);
    ac(divImageUploader, divSelectButtons);
    ac(divImageUploader, divPlaceholder);
    ac(divImageUploader, divImageDisplay);
    ac(divImageAdder, divImageUploader);
    ac(nadepage, divImageAdder);

}

function addLineUpImageToPreview() {
    var nadepage = document.getElementById('create-nade-page');
    var divLineUpAdder = create("div", { id: 'lineup-adder' });
    var divImageUploader = create("div", { className: 'image-uploader' });

    //input 
    var inputResultImg = create("input");
    inputResultImg.type = "file";
    inputResultImg.setAttribute("hidden", "true");
    inputResultImg.setAttribute("accept", "image/jpeg");
    inputResultImg.onchange = function () {
        clearPlaceHolderDiv();
        encodeImageFileAsURL(this, 'lineupImagePreview');
        createButtonSaveImage();
        directLineUpImageToPreview();
    }


    var divSelectButtons = create("div", { className: 'file-selector-btn' });
    var btnCancel = create("button", { className: 'btn-cancel' });
    var btnSelectImage = create("button", { className: 'btn-select-img' });

    btnCancel.innerHTML = "Cancel";
    btnCancel.setAttribute('type','button');
    btnCancel.onclick = function () {
        closeUploadImage('lineup-adder');
    };
    
    btnSelectImage.innerHTML = "Upload image";
    btnSelectImage.setAttribute('type','button');
    btnSelectImage.onclick = function () {
        inputResultImg.click();
    }

    var divPlaceholder = create("div", { id: 'place-holder' });
    var divMessage = create("div", { className: 'message' });
    var divLineUpMessage = create("div", { className: 'line-up-message' });
    var MessageH3 = create("h3");
    MessageH3.innerHTML = "Guideline"
    var MessageUL = create("ul");
    var MessageLI1 = create("li");
    MessageLI1.innerHTML = "Image must be 16:9 Ratio";
    var MessageLI2 = create("li");
    MessageLI2.innerHTML = "Aim at the position";
    var MessageLI3 = create("li");
    MessageLI3.innerHTML = "Remove your hud (cl_drawhud 0; r_drawviewmodel 0;)";
    var MessageLI4 = create("li");
    MessageLI4.innerHTML = "Take screenshot";

    var divImageDisplay = create("div", { className: 'img-crop' });
    var imgResultPreview = create("img", { id: 'lineupImagePreview' });

    ac(divImageDisplay, imgResultPreview);
    ac(MessageUL, MessageLI1);
    ac(MessageUL, MessageLI2);
    ac(MessageUL, MessageLI3);
    ac(MessageUL, MessageLI4);
    ac(divLineUpMessage, MessageH3);
    ac(divLineUpMessage, MessageUL);
    ac(divMessage, divLineUpMessage);
    ac(divPlaceholder, divMessage);

    ac(divSelectButtons, btnCancel);
    ac(divSelectButtons, btnSelectImage);

    ac(divImageUploader, inputResultImg);
    ac(divImageUploader, divSelectButtons);
    ac(divImageUploader, divPlaceholder);
    ac(divImageUploader, divImageDisplay);
    ac(divLineUpAdder, divImageUploader);
    ac(nadepage, divLineUpAdder);
}

function directResultImageToPreview() {
    var btnSave1 = document.getElementsByClassName('btn-save')[0];
    btnSave1.onclick = function () {
        var divResultImage = document.getElementsByClassName('result-img')[0];
        var divImgWrap1 = create('div', { className: 'img-wrap' });
        var ImgResult = create('img', { className: 'images' });
        ImgResult.setAttribute("src", resultImagePreview.src);
        ac(divImgWrap1, ImgResult);
        ac(divResultImage, divImgWrap1);
        var inputResultImgHidden = create('input',{name:'result-img'});
        inputResultImgHidden.setAttribute('type','hidden');
        inputResultImgHidden.setAttribute('value',resultImagePreview.src);
        ac(divResultImage,inputResultImgHidden);
        closeUploadImage('image-adder');
    }
}

function directLineUpImageToPreview() {
    var btnSave1 = document.getElementsByClassName('btn-save')[0];

    btnSave1.onclick = function () {

        var divThumbImg = document.getElementsByClassName('thumb-img')[0];
        var divLineUpBorder = create("div", { className: 'lineup-border' });
        var divLineUpImgWrap = create("div", { className: 'lineup-img' });
        var divImageWrapper2 = create("div", { className: 'img-wrap' });
        var divLineUpImg = create("img", { className: 'images' });
        divLineUpImg.setAttribute("src", lineupImagePreview.src);
        var inputLineUpImgHidden = create('input',{name:'lineup-img'});
        inputLineUpImgHidden.setAttribute('type','hidden');
        inputLineUpImgHidden.setAttribute('value',lineupImagePreview.src);
        ac(divThumbImg,inputLineUpImgHidden);
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

        ac(divLineUpImgWrap, ac(divImageWrapper2, divLineUpImg));
        ac(svgCrossHair, pathCrossHair);
        ac(divCrossHair, svgCrossHair);
        ac(divLineUpImgWrap, divCrossHair);
        ac(divThumbImg, divLineUpBorder);
        ac(divThumbImg, divLineUpImgWrap);

        closeUploadImage('lineup-adder');
    }
}

function displayIframe(){
    var divBack = document.getElementsByClassName("back")[0];
    var divVidPreview = create("div", {
        className: 'video-preview'
    });
    var iframe = create("iframe");
    iframe.setAttribute("src", getIframeLink() + "?controls=0&&speed=2");
    iframe.setAttribute("frameborder", 0);
    iframe.setAttribute("style", "width:100%;height:100%;position:absolute;top:0,left:0");
    ac(divVidPreview, iframe)
    ac(divBack,divVidPreview);
}

function selectPositionOnMap() {
    var mapSelect = document.getElementById("mapselection");
    var mapValue = mapSelect.options[mapSelect.selectedIndex].text;
    var btnPosSelection = document.getElementById("pos-sel");
    btnPosSelection.setAttribute('style', 'cursor:pointer; opacity:1');
    btnPosSelection.onclick = function () {
        var divMapPosSelector = document.getElementById("overview-pos");

        var divPositionModal = create("div", { className: 'position-modal' });
        var divPositionModalContent = create("div", { className: 'position-modal-content' });
        var divPositionModalContentTitle = create("div", { className: 'modal-title' });
        divPositionModalContentTitle.innerHTML = "Click on the map where the land nades";
        var divPositionModalImage = create("div", { className: 'map-image', style: 'position:relative' });
        var imagePositionModal = create("img", { style: 'height:400px;width:480px; margin-bottom: 8px' });
        imagePositionModal.src = "../maps-image/" + mapValue + ".jpg";

        var divPositionModalButton = create("div", { className: 'position-modal-btns', style: 'display:flex' });
        var btnPositionModalCancel = create("button", { className: 'btn-cancel' });
        btnPositionModalCancel.innerHTML = "Cancel";
        btnPositionModalCancel.setAttribute('type','button');
        btnPositionModalCancel.onclick = function () {
            closeModal();
        }

        var btnPositionModalSave = create("button", { className: 'btn-save' });
        btnPositionModalSave.setAttribute('style', 'opacity:0.5;cursor:context-menu');
        btnPositionModalSave.innerHTML = "Save";
        btnPositionModalSave.setAttribute('type','button');

        if (sessionStorage.getItem('posiTop') === null || sessionStorage.getItem('posiLeft') === null) {
            var divPoint = create("div", { className: 'point' });
        } else {
            var divPoint = create("div", { className: 'point' });
            divPoint.setAttribute('style', 'top:' + sessionStorage.getItem('posiTop') + 'px; left:' + sessionStorage.getItem('posiLeft') + 'px');
            ac(divPositionModalImage, divPoint);
            
        }
        imagePositionModal.onclick = function (event) {
            var coordY = event.offsetY;
            var coordX = event.offsetX;
            divPoint.setAttribute('style', 'top:' + coordY + 'px; left:' + coordX + 'px');
            ac(divPositionModalImage, divPoint);

            btnPositionModalSave.setAttribute('style', 'opacity:1;cursor: pointer');
            btnPositionModalSave.onclick = function () {
                sessionStorage.setItem("posiTop", coordY);
                sessionStorage.setItem("posiLeft", coordX);
                closeModal();
                var inputPosTopHidden = create('input',{name:'TopPosSelection'});
                inputPosTopHidden.setAttribute('type','hidden');
                inputPosTopHidden.setAttribute('value',sessionStorage.getItem('posiTop'));
                var inputPosLeftHidden = create('input',{name:'LeftPosSelection'});
                inputPosLeftHidden.setAttribute('type','hidden');
                inputPosLeftHidden.setAttribute('value',sessionStorage.getItem('posiLeft'));
                ac(divMapPosSelector,inputPosTopHidden);
                ac(divMapPosSelector,inputPosLeftHidden);
            }
        }

        ac(divPositionModalImage, imagePositionModal);
        ac(divPositionModalContent, divPositionModalContentTitle);
        ac(divPositionModalContent, divPositionModalImage);
        ac(divPositionModalButton, btnPositionModalCancel);
        ac(divPositionModalButton, btnPositionModalSave);
        ac(divPositionModalContent, divPositionModalButton);
        ac(divPositionModal, divPositionModalContent);
        ac(divMapPosSelector, divPositionModal);
    }
}

function changeTitle() {
    var nadeValue = document.getElementById('typeselection').options[document.getElementById('typeselection').selectedIndex].text;
    document.getElementById("nade-end-input").onkeyup = function () {
        document.getElementsByClassName("main-title")[0].innerHTML = document.getElementById("nade-end-input").value + " " + nadeValue;
    }

    document.getElementById("thrown-from-input").onkeyup = function () {
        document.getElementsByClassName("sub-title")[0].innerHTML = 'from ' + document.getElementById("thrown-from-input").value;
    }
}

function getIframeLink() {
    var link = document.getElementById("videourlselection").value;
    var linkGenerate = link.slice(0, 19) + "ifr" + link.slice(18);
    return linkGenerate;
}


function closeUploadImage(adderTargetId) {
    var targetAdder = document.getElementById(adderTargetId);
    targetAdder.parentNode.removeChild(targetAdder);
}

function encodeImageFileAsURL(element, targetId) {
    var file = element.files[0];
    var reader = new FileReader();
    var target = document.getElementById(targetId);
    reader.readAsDataURL(file);
    reader.onloadend = function () {
        target.src = reader.result;
    }
}

function clearPlaceHolderDiv() {
    var divPlaceholder = document.getElementById("place-holder");
    divPlaceholder.parentNode.removeChild(divPlaceholder);
}

function createButtonSaveImage() {
    var divButtons = document.getElementsByClassName('file-selector-btn')[0];
    var btnSave = create("button", { className: 'btn-save' });
    btnSave.innerHTML = 'Save';
    btnSave.setAttribute('type','button');
    ac(divButtons, btnSave);
}

function create(tagName, props) {
    return Object.assign(document.createElement(tagName), (props || {}));
}

function ac(p, c) {
    p.appendChild(c);
    return p;
}

function closeModal() {
    var divPositionModal = document.getElementsByClassName('position-modal')[0];
    divPositionModal.parentNode.removeChild(divPositionModal);
}

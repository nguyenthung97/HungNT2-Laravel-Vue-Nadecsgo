import axios from 'axios'

export function getPosByMapNameAndBombID(mapname, bombId){
    var url = "/getPos/" + mapname + "/" + bombId;
    axios.get( url, { mapname: this.mapName, bombId: this.bombId })
        .then( response => {
            this.results = response.data;
        }
    );
}

export function getIframeLink(link) {
    var linkGenerate = link.slice(0, 19) + "ifr" + link.slice(18);
    return linkGenerate;
}


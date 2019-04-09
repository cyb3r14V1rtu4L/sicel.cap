/**
 * Created by Cyberio on 3/06/17.
 */
var i;
var a;
var newMarkers = [];
var resultsArray = [];
var visibleMarkersId = [];
var visibleMarkersOnMap = [];
var markerCluster;
var lastInfobox;
var map;

map = new GMaps({
    el:'#map',
    lat: 40.673265064134675,
    lng: -73.48288125406341,
    zoomControl : false,
    zoomControlOpt: {
        style : 'SMALL',
        position: 'TOP_LEFT'
    },
    idle: function(e) {

        if( markerCluster !== undefined ){
            markerCluster.clearMarkers();
        }

        var ajaxData = {
            optimized_loading: 1,
            north_east_lat: map.getBounds().getNorthEast().lat(),
            north_east_lng: map.getBounds().getNorthEast().lng(),
            south_west_lat: map.getBounds().getSouthWest().lat(),
            south_west_lng: map.getBounds().getSouthWest().lng()
        };
        loadData(ajaxData);
    }
});


function loadData(data){
    $.ajax({
        url: '/App/Layout/assets/external/data.php',
        dataType: "json",
        method: "POST",
        data: data,
        cache: false,
        success: function(markers){

           map.removeMarkers();
           placeMarkers(markers);

        },
        error : function (e) {
            console.log(e);
        }
    });
}


function placeMarkers(markers) {

    newMarkers = [];
    for( i = 0; i < markers.length; i++ ){

        var marker;
        var markerContent = document.createElement('div');
        var thumbnailImage;

        if( markers[i]["marker_image"] !== undefined ){
            thumbnailImage = 'App/Layout/'+markers[i]["marker_image"];
        }
        else {
            thumbnailImage = "/App/Layout/assets/img/items/default.png";
        }

        if( markers[i]["featured"] === 1 ){
            markerContent.innerHTML =
                '<div class="marker" data-id="'+ markers[i]["id"] +'">' +
                '<div class="title">'+ markers[i]["title"] +'</div>' +
                '<div class="marker-wrapper">' +
                '<div class="tag"><i class="fa fa-check"></i></div>' +
                '<div class="pin">' +
                '<div class="image" style="background-image: url('+ thumbnailImage +');"></div>' +
                '</div>' +
                '</div>' +
                '</div>';
        }
        else {
            markerContent.innerHTML =
                '<div class="marker" data-id="'+ markers[i]["id"] +'">' +
                '<div class="title">'+ markers[i]["title"] +'</div>' +
                '<div class="marker-wrapper">' +
                '<div class="pin">' +
                '<div class="image" style="background-image: url('+ thumbnailImage +');"></div>' +
                '</div>' +
                '</div>';
        }
        renderRichMarker(i);

    }

    // Create marker using RichMarker plugin -------------------------------------------------------------------

    function renderRichMarker(i){

         marker = new RichMarker({
                position: new google.maps.LatLng( markers[i]["latitude"], markers[i]["longitude"] ),
                map: map,
                draggable: false,
                content: markerContent,
                flat: true
            });

            map.addMarker(marker);

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                        openSidebarDetail( $(this.content.firstChild).attr("data-id") );
                }
            })(marker, i));
            newMarkers.push(marker);

    }

}


function openInfobox(id, _this, i){
    $.ajax({
        url: "/App/Layout/assets/external/infobox.php",
        dataType: "html",
        data: { id: id },
        method: "POST",
        success: function(results){
            infoboxOptions = {
                content: results,
                disableAutoPan: false,
                pixelOffset: new google.maps.Size(-135, -50),
                zIndex: null,
                alignBottom: true,
                boxClass: "infobox-wrapper",
                enableEventPropagation: true,
                closeBoxMargin: "0px 0px -8px 0px",
                closeBoxURL: "assets/img/close-btn.png",
                infoBoxClearance: new google.maps.Size(1, 1)
            };

            if( lastInfobox != undefined ){
                lastInfobox.close();
            }

            newMarkers[i].infobox = new InfoBox(infoboxOptions);
            newMarkers[i].infobox.open(map, _this);
            lastInfobox = newMarkers[i].infobox;

            setTimeout(function(){
                //$("div#"+ id +".item.infobox").parent().addClass("show");
                $(".item.infobox[data-id="+ id +"]").parent().addClass("show");
            }, 10);

            google.maps.event.addListener(newMarkers[i].infobox,'closeclick',function(){
                $(lastClickedMarker).removeClass("active");
            });
        },
        error : function () {
            console.log("error");
        }
    });
}

$(".marker").on("mouseenter", function(){
    var id = $(this).attr("data-id");
    $(".results-wrapper .results-content .result-item[data-id="+ id +"] a" ).addClass("hover-state");
}).on("mouseleave", function(){
    var id = $(this).attr("data-id");
    $(".results-wrapper .results-content .result-item[data-id="+ id +"] a" ).removeClass("hover-state");
});
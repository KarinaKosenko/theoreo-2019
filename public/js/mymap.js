ymaps.ready(function () {
    let myMap = new ymaps.Map("map",{
        center : points[0],
        zoom : 10,
        controls : ['zoomControl'],
        behaviors : []
    });

    let   pointCollection = new ymaps.GeoObjectCollection(null, {
        iconColor : '#049D53',
    });

    points.forEach(function (point) {
        console.log(point);
        pointCollection.add(new ymaps.Placemark(point,{
            balloonContentHeader: point[2]
        }));
    });

    ymaps.util.requireCenterAndZoom(myMap.getType(),
        ymaps.util.bounds.fromPoints(points),
        myMap.container.getSize())
        .then(function (result) {
            $zoom=result.zoom-1;
            if($zoom>14){
                $zoom=14;
            }
            myMap.setCenter(result.center, $zoom);
        });
    myMap.geoObjects.add(pointCollection);
});
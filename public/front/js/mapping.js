function initMap(){
  // Map options
  var options = {
    zoom:10,
    center:{lat:25.354826,lng:51.183884}
  }

  // New map
  var map = new google.maps.Map(document.getElementById('map'), options);

  // Listen for click on map
  // google.maps.event.addListener(map, 'click', function(event){
  //   // Add marker
  //   addMarker({coords:event.latLng});
  // });

  var markers = [
    <?php
    $sql= "SELECT * FROM `category` WHERE main='$cat'";
    $result= $conn->query($sql);

    while($row=$result->fetch_assoc()){
      $cate=$row ['sub'];
      $sql= "SELECT * FROM `details` WHERE type='$cate'";
      $result1= $conn->query($sql);

      while($row1=$result1->fetch_assoc()){
      ?>

    {


        coords:{lat:<?php echo $row1 ['lat']; ?>,lng:<?php echo $row1 ['lng']; ?>},
        content:'<h5><?php echo $row1 ['Name']; ?></h5><?php echo $row1 ['Address']; ?>'



    },
    <?php
  }}
   ?>

  ];

  // Loop through markers
  for(var i = 0;i < markers.length;i++){
    // Add marker
    addMarker(markers[i]);
  }

  // Add Marker Function
  function addMarker(props){
    var marker = new google.maps.Marker({
      position:props.coords,
      map:map,
      //icon:props.iconImage
    });

    // Check for customicon
    if(props.iconImage){
      // Set icon image
      marker.setIcon(props.iconImage);
    }

    // Check content
    if(props.content){
      var infoWindow = new google.maps.InfoWindow({
        content:props.content
      });

      marker.addListener('click', function(){
        infoWindow.open(map, marker);
      });
    }
  }
}

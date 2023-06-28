var nearby_search = document.getElementById('location-link');
nearby_search.addEventListener('click', function(event){
    
    if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(
        position => {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            //nominate API 
            const url = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`;
            
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const address = data.address;
                    const district =  address.county;
                    const latitude= data.lat;
                    const longitude= data.lon;
                    
                    nearby_search.setAttribute('href',"district_page.php?district="+district);
                })
                .catch(error => {
                    console.log('Error:', error);
                    // Handle the error accordingly
                });
        },
        error => {
            console.log('Geolocation Error:', error.message);
            // Handle the geolocation error accordingly
        }
    );
} else {
    console.log('Geolocation is not supported by this browser.');
    // Handle the case where Geolocation API is not available
}
});
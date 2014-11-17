function changeProvince(province, city, town, location){
    if(0 == province.length) return false;
    
    province.change(function() {
        var id = parseInt($(this).val());
        // change city
        if(0 == city.length) return false;
        city.empty();
        city.append('<option value="0">loding......</option>');
        $.getJSON("/city/cities", {'id':id}, function(data) {
            city.empty();
            $.each(data, function(key, value) {
                city.append('<option value="' + key + '">' + value + '</option>');
            });
        });
        changeCity(city, town, location);
    });
}

function changeCity(city, town, location){
    if(0 == city.length) return false;
    
    city.change(function() {
        var id = parseInt($(this).val());
        // change town
        if(0 == town.length) return false;
        town.empty();
        $.getJSON("/town/towns", {'id':id}, function(data) {
            town.empty();
            $.each(data, function(key, value) {
                    town.append('<option value="' + key + '">' + value + '</option>');
            });
        });
        changeTown(town, location);
    });
}

function changeTown(town, location){
    if(0 == town.length) return false;
    
    town.change(function() {
        var id = parseInt($(this).val());
        // change town
        if(0 == location.length) return false;
        location.empty();
        var locationValue = town.find("option:first").val();
        $.getJSON("/location/locations", {'id':id}, function(data) {
            $.each(data, function(key, value) {
                location.append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        });
    });
}
function initSelect(province, city, town, location){
    if(0 == province.length) return false;

    var provinceValue = province.find("option:first").val();
    $.getJSON("/province/provinces", '', function(data) {
        $.each(data, function(key, value) {
            if(provinceValue != value.id){
                province.append('<option value="' + value.id + '">' + value.name + '</option>');
            }
        });
    });

    changeProvince(province, city, town, location);
}

function changeProvince(province, city, town, location){
    if(0 == province.length) return false;
    
    province.change(function() {
        var id = parseInt($(this).val());
        // change city
        if(0 == city.length) return false;
        city.empty();
        var cityValue = city.find("option:first").val();
        $.getJSON("/city/cities", {'id':id}, function(data) {
            $.each(data, function(key, value) {
                if(cityValue != value.id){
                    city.append('<option value="' + value.id + '">' + value.name + '</option>');
                }
            });
        });
        changeCity(city, town, location);
    });

    province.trigger('change');
}

function changeCity(city, town, location){
    if(0 == city.length) return false;
    
    city.change(function() {
        var id = parseInt($(this).val());
        // change town
        if(0 == town.length) return false;
        town.empty();
        var townValue = town.find("option:first").val();
        $.getJSON("/town/towns", {'id':id}, function(data) {
            $.each(data, function(key, value) {
                if(cityValue != value.id){
                    town.append('<option value="' + value.id + '">' + value.name + '</option>');
                }
            });
        });
        changeTown(town, location);
    });

    city.trigger('change');
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
    town.trigger('change');
}
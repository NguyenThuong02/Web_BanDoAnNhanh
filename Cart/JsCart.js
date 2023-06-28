$(document).ready(function() {
    $(".address_district").change(function() {
        var idDistrict = $(".address_district").val();
        $.post("insertOrder1.php", { idDistrictA: idDistrict }, function(data) {
            $(".address_ward").html(data);
        })
    })
})
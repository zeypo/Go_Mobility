;(function(window)
{
    gmapGestion = function(){

        var self = this;

        this.init = function()
        {
            
        }

        this.predicatePlace = function(input)
        {
            var input   = document.getElementById(input);
            var options = {componentRestrictions: {country: 'fr'}};
            new google.maps.places.Autocomplete(input, options);
        }
    }

    window.gmapGestion = gmapGestion;

})(window);
(function($) {
    $(document).ready(function() {
        $('<tr class="form-field"></tr>').append($('<th scope="row">New field</th>')).append(
            $('<td></td>').append(
                $('<select id="release-list" onchange="add_name_everywhere(this)" name="blog[created_nursery_Name]"></select>')
            ).append(
                $('<p>Explanation about your new field</p>')
            )
        ).insertAfter('#wpbody-content table tr:eq(2)');

        //This was part of the old way to display the nurseries. I dont need it anymore. 
        /*$.getJSON('../../cache/cache.json', function(data) {
            var select = $('#release-list');
            $('<option/>').attr('value', '').attr('selected', 'selected').attr('disabled','disabled').html('Select a nursery').appendTo(select);
            $.each(data, function(key, val){
                $('<option/>').attr('value', val.Id).html(val.Name).appendTo(select);
            });
        });*/
        //
        $.post('../../wp-content/plugins/addFieldOnSiteCreationPanel/get-admin-email.php', null, function(response){
            document.getElementById("admin-email").value = response;
        });
        $.post('../../wp-content/plugins/addFieldOnSiteCreationPanel/get_dropdown.php', null, function(response){
            var select = $('#release-list');
            $(response).appendTo(select);
        });
        //Hide other fields
        $('.form-required').css('display', 'none');
    });
   /* function add_name_everywhere(element){
        var dropdown_text = $(element).val();
        $('#site-address').val(dropdown_value);
        $('#regular-text').val(dropdown_value);
    }*/
})(jQuery);
function add_name_everywhere(element){
    var text = element.options[element.selectedIndex].text;
    document.getElementById("site-address").value = text.replace(" ", "-").toLowerCase();
    document.getElementById("site-title").value = text;
}
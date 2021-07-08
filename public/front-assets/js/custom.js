$(document).on('change', '#KCSEMeanGrade', function (e) { 
    $('#category').val('');
    $('#courses').val('');
    $('#courses').html('<option value="">Select Level First</option>');
    return;
});

$(document).on('change', '#category', function (e) { 
    e.preventDefault();
    var cat_id = $(this).val();
        if(cat_id != '')
        {
            var grade = $('#KCSEMeanGrade').val();
            if(grade=='')
            {
                alert('Select your grade');
                $(this).val('');
                return;
            }

            $.ajax({
                url:base_url+'/get-courses/'+cat_id+'/'+grade,
                method:"GET",
                success:function(response) {
                   $('#courses').html(response);   
                   //$('#courses').selectpicker('refresh');   
                },
                error:function(response){
                    console.log('error');
                },
                complete: function () {
                    //console.log('complete');
                }
            });
        }
});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
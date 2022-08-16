function snaps(id) {

    $('#snapsModal').modal('show');
   
    $('#hstoryid').val('');
    $('#hstoryid').val(id);
    readSnapsData(id);

    $('input[name="snapselect"]').click(function () {
        if (this.value == "1") {
            $(".snapsvideo").hide();
            $(".snapsimage").show();
            $(".videointernal").hide();
            $(".videoexternal").hide();

        } else {
            $(".snapsvideo").show();
            $(".snapsimage").hide();
            $(".videointernal").show();
            $(".videoexternal").hide();

        }
    });

    $('input[name="storyvideotype"]').click(function () {
        if (this.value == "1") {
            $(".videoexternal").hide();
            $(".videointernal").show();
        } else {
            $(".videoexternal").show();
            $(".videointernal").hide();
        }
    });

    $('#snapsModal').on('hidden.bs.modal', function () {
        $('#Snapsform')[0].reset();
        $('#submitsnapsbtn').html('Add');
        $('#hssid').val('');
        $('#hstoryid').val('');
        $('#himageid').val('');
        $('#hvideoid').val('');
        $(".snapsvideo").hide();
        $(".snapsimage").show();
        $(".videointernal").hide();
        $(".videoexternal").hide();
        $('.print-error-msg').hide();
        $('#snapsModalLabel').html('Add Story');
        $('label[class="error"]').remove();
        $("#Snapsform").removeClass("was-validated");
        $('select').removeClass('error');
    }); 





        // if (teamx == teamy) {
        //   Swal.fire("Error", "You Can't Select Same Team At a Time !", "error");
        //   return false;
        // }
        
    $('form[id="Snapsform"]').validate({
        
        submitHandler: function(form) {
           
            var formData = new FormData($('#Snapsform')[0]);

            var storyimagex = $("#storyimage").val();
            var browse_filex = $("#browse_file").val();
            var embadedcodex = $("#embadedcode").val();

        if (storyimagex == '' &&  browse_filex == '' && embadedcodex == '') {
          Swal.fire("Plese Select Image Or Video.", " ", "error");
          return false;
        }

            showloader();
            $.ajax({
                type: 'POST',
                url: BASE_URL + '/' + ADMIN + '/snaps/add',
                // method: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (responce) {
                    var data = JSON.parse(responce);
                    if (data.status == 1) {
                        $('#hssid').val('');
                        $('#himageid').val('');
                        $('#hvideoid').val('');
                        $('#storyimage').val('');
                        $('#browse_file').val('');
                        $('#embadedcode').val('');
                        $('#storyvideo').val('');
                        // $('#snapsModal').modal('hide');
                        successMsg(data.msg);
                        readSnapsData(id);
                        hideloader();
                    } else if (data.status == 0) {
                        printErrorMsg(data.error)
                        hideloader();
                    }
                    else {
                        errorMsg(data.msg);
                        hideloader();
                    }
                }
            });
        }
      });
  
}


function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each(msg, function (key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
}

function readSnapsData(id) {
    var story_id = id;

    $('#snapsTable').DataTable({
        processing: true,
        "bDestroy": true,
        "bAutoWidth": false,
        serverSide: true,
        "ajax": {
            type: 'POST',
            url: BASE_URL + '/' + ADMIN + '/snaps/datatable',
            data: {
                "_token": $("[name='_token']").val(),
                story_id,
            },

        },
        columns: [
            { data: 'mediatype', name: 'mediatype' },
            { data: 'media', name: 'media' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
}

function delete_snaps(id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            showloader();
            $.ajax({
                url: BASE_URL + '/' + ADMIN + '/snaps/delete',
                type: 'POST',
                data: {
                    'id': id,
                    "_token": $("[name='_token']").val(),
                },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status == 1) {
                        successMsg(data.msg);
                        $('#snapsModal').modal('hide');
                        // readSnapsData(storyid)
                        hideloader();
                    } else {
                        errorMsg(data.msg);
                        hideloader();
                    }
                }
            });
        }
    });
}


// function edit_snaps(id) {
//     showloader();
//     $.ajax({
//         url: BASE_URL + '/' + ADMIN + '/snaps/edit',
//         type: 'POST',
//         data: {
//             "_token": $("[name='_token']").val(),
//             'id': id,
//         },
//         success: function (responce) {
//             $('#hssid').val();
//             var data = JSON.parse(responce);
//             if (data.status == 1) {
//                 console.log(data)
//                 var result = data.user;
//                 console.log(data.user)
//                 $('#snapsModal').modal('show');
//                 $('#submitsnapsbtn').html('Update');
//                 $('#snapsModalLabel').html('Update Story');
//                 $('#hssid').val(result.id);
//                 $('#himageid').val(result.storyimage);
//                 $("#browseFileesimage").attr("src", $("#himageid").val());

//                 $('#hvideoid').val(result.storyvideo);
//                 $('#name').val(result.name);
//                 if (result.storyvideotype == "1") {
//                     $("#browse_file").prop("checked", true);
//                     $("#browseFilees").attr("src", $("#hvideoid").val());
//                     $(".videointernal").show();
//                     $(".videoexternal").hide();

//                   } else if(result.storyvideotype == "0"){
//                     $("#embadedcode").prop("checked", true);
//                     $('.embadedcodees').val(result.storyvideo);
//                     $(".videoexternal").show();
//                     $(".videointernal").hide();

//                   }else{
//                     $("#embadedcode").prop("checked", false);
//                     $("#browse_file").prop("checked", false);
//                   }

//                 hideloader();
//             }
//         }
//     });
// }






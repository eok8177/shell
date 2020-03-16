require('./bootstrap');

// ---------- Methods ---------- //
$(function () {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  //Delete record
  $('.delete').on('click', function (e) {
    if (!confirm('Are you sure you want to delete?')) return false;
  e.preventDefault();
    $.post({
      type: 'DELETE',  // destroy Method
      url: $(this).attr("href")
    }).done(function (data) {
      console.log(data);
      location.reload(true);
    });
  });

  //Change status of record
  $('.status').on('click', function (e) {
    e.preventDefault();
    var item = $(this);
    $.post({
      type: 'PUT',
      url: $(this).attr('href'),
        // data: {},
        dataType: 'json'
      }).done(function (data) {
        if (data.status == 1) {
          item.removeClass('fa-times-circle').addClass('fa-check-circle');
        } else {
          item.removeClass('fa-check-circle').addClass('fa-times-circle');
        }
        if (item.hasClass('reload')) location.reload(true);
      });
  });

  // CK Editor
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+ $('meta[name="csrf-token"]').attr('content'),
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+ $('meta[name="csrf-token"]').attr('content'),
    allowedContent: true
  };
  $('.editor').ckeditor(options);

  //laravel file manager
  $('.lfm').filemanager('image');

  $('.lfm').on('click', function(){
    var $container = $(this).closest('.image-lfm');
    $container.find('.delete-image').removeClass('d-none');
  });
  //Delete uploaded image in form
  $('.delete-image').on('click', function(){
    var $container = $(this).closest('.image-lfm');
    $container.find('.image-input').val(null);
    $container.find('.image-src').attr('src', '');
    $(this).removeClass('d-none');
    $(this).addClass('d-none');
  });

});


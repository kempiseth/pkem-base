function delete_user(userid){
    $.post({
        url: '',
        data: {_ajax: 'deleteUser', userid: userid},
        success: function(result){
            if ($.trim(result)=='OK') {
                $('tr[userid="'+userid+'"]').remove();
            }
        },
    });
}

$(function(){
    $('div.task div.title').click(function(){
        $(this).parent().find('div.content').toggle('slow');
    });
    $('table#select-user img.icon[action="delete"]').click(function(){
        var userid = $(this).parent().parent().attr('userid');
        delete_user(userid);
    });
});

$(function(){
    $('div.task div.title').click(function(){
        $(this).parent().find('div.content').toggle('slow');
    });
});

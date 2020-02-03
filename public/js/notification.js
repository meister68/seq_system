
 
$(document).ready(function(){
    if(count == 0){
        $('#notifCount').text('')   
    }
}); 

function getTimeStamp()
 {
     let timestamp = new Date(Date.now())
     let date = timestamp.getDate() < 9 ? `0${timestamp.getDate()}` :  timestamp.getDate()
     let month = timestamp.getMonth()+1 < 9 ? `0${timestamp.getMonth()+1}` :  timestamp.getMonth()+1
     return `${date}-${month}-${timestamp.getFullYear()}` 
 
 }

function addComment(data) 
{
    
    let comment = `<div id="commentId"><div class="form-group"><strong class="float-left text-justify">${data.username}</strong>
    <p id="nonUserBody" class="text-justify">${data.body}</p></div><br clear="all"/></div>`
    
    if(user_id==data.user_id){
        comment = comment.replace("commentId" , "boxComment1")
        comment = comment.replace("float-left" , "float-right")
        $('.card-body').append(comment);
    }else{
        comment = comment.replace("commentId" , "boxComment2")
        $('.card-body').append(comment);
    }
}

var pusher = new Pusher('59a1d10e99c58e2524f0',
{
    cluster: 'ap1',
    encrypted: true
});

function sendNotification(data){
    let count = parseInt( $('#notifCount').text())
    if(isNaN(count)){
        count = 0
    }
    count+=1
    let timestamp =  getTimeStamp()
    $('#notifCount').text(count)
    let message = ` <li class="list-group-item list-group-item-secondary"> <a
    href="/content/${data.post_id}"><strong><span>${data.username}</span></strong>
    commented on your post</a><span class="timestamps">${timestamp}</span></li>`
    $('.message').prepend(message)
}


var channel = pusher.subscribe('post'+post_id);
channel.bind('App\\Events\\CommentEvent',addComment)

var channel2 = pusher.subscribe('user'+user_id);
channel2.bind('App\\Events\\NotificationEvent',sendNotification)



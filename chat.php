<?php
    session_start();
    include 'db.php';
?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            const sender = "<?php echo $_SESSION["name"]?> ";
            var receiver = '', count=0;
            var url = "http://localhost/Social_Media_Web/send.php";
            var url2 = "http://localhost/Social_Media_Web/show.php";
            $(document).ready(function(){
                display();
                $('form').submit(function(e){
                    console.log("message = "+$('#textmssg').val()+" sender= "+sender+" receiver= "+receiver+" count="+count);
                    count=0;
                    document.getElementById('message').innerHTML='';
                    $.post(url, {
                        message: $('#textmssg').val(),
                        sender: sender,
                        receiver: receiver
                    });
                    $('#textmssg').val('');
                    myFunc(receiver);
                    myFunc(receiver);
                    return false;
                })
            });
            function display(){
                $.get(url2+'?num=1', function(res){
                      if(res.items){
                            res.items.forEach(it=>{
                                $('.friendlist').append(renderAccount(it));
                            })
                        }; 
                });
            }
            function load(){
                console.log('counter = '+count);
                console.log('?sender=' +sender.trim()+'&receiver='+receiver+'&count='+count);
                if(count==0){
                console.log('insi ded counter = '+count);
                $.get(url+'?sender=' +sender.trim()+'&receiver='+receiver+'&count='+count, function(result){
                    document.getElementById('message').innerHTML='';
                    if(result.items){
                        console.log('inside results.items');
                        result.items.forEach(item=>{
                            count=item.id;
                            console.log('count value = '+count);
                            $('#message').append(renderMessage(item));
                            $('#message').append("<br><br><br><br><br><br><br>");
                        })
                        console.log('After forEach');
                        document.getElementById('message').scrollTo(0, document.body.scrollHeight);
                        $('#message').animate({scrollTop: $('#message')[0].scrollHeight});
                        console.log('After forEach count = '+count);
                    };
                    console.log('just before load()');
                    console.log('after load() in load()')
                });
            }
            }
            function renderAccount(item){
                return `<div class='acc' ><button onclick="myFunc('${item.name}')">${item.name}</button></div>`;
            }
            function myFunc(uname){
                var userName = uname;
                receiver=userName;
                count=0;
                console.log('inside myFunc()');
                document.getElementById('message').innerHTML='';
                load();
            } 
            function renderMessage(item){
                let time = new Date(item.time);
                time = `${time.getHours()}:${time.getMinutes()} ${time.getDate()}/${time.getMonth()}/${time.getFullYear()}`;
                var Send = item.sender.toString().trim();
                console.log('Send='+Send+'Sender='+sender.trim()+"end");
                var mmm = item.message.toString();
                if(Send == sender.trim()){
                    return `<div class='msg1' style="float:right;"><p style="font-size: 20px;"><strong>${item.sender}</strong> ${time}</p><br><p style="font-size: 20px;">${item.message} </p><br></div>`;
                }
                else{
                    return `<div class='msg2' style="float:left;"><p style="font-size: 20px;"><strong>${item.sender}</strong> ${time}</p><br><p style="font-size: 20px;">${item.message} </p><br></div>`;
                }
            }
            
        </script>
        <title>Chat</title>
        <link rel="stylesheet" href="chat.css">
    </head>
    <body>
        <div class="navbar">
            <button class="home"><a href="home.php" style="text-decoration:none; color:white;">Home</a></button>
            <span style='font-family: sans-serif; color: #FFFFFF; float: right;'><span class='display-4'><?php echo $_SESSION['name'] ?></span></span>
                <a class="btn-signout" href="logout.php">Signout</a>
        </div>
        <div class="container">
            <div class="friendlist">
                <h2 style='font-family: sans-serif; text-align:center; padding: 10px;'>Common List</h2>
            </div>
            <div id='message'>
                
            </div>
        </div>
        <div class="outer-type">
            <div class="type">
                <form>
                    <textarea class="enter-mssg" type="text" id='textmssg' name="message" placeholder="Enter Message"></textarea>
                    <button class="btn-send">SEND</button>
                </form>
            </div>
        </div>
    </body>
</html>
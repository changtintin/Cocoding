
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <span id = "title"></span>
    
</body>
</html>

<script>
    
    function request(){ 
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'a.php?test=ok');
        xhr.onload = function(){
            console.log(xhr.status); // 200
            document.getElementById("title").innerHTML =  xhr.responseText;
        }         
        xhr.send();                                            
    }
    setInterval(request, 2000);
                               
</script>  
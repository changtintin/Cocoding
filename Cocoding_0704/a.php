<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Tatiana">

    <title>COCODING - User Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../admin/css/bootstrap.main.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../admin/css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Loader CSS -->
    <link href="../admin/css/loader.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    <!-- Latest compiled and minified Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- include summernote css/js -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="../admin/css/summernote.css">
    
    <script src="../admin/js/scripts.js"></script>

</head>

<body>
<style>
body {width: 5000px}
.select-editable {position:relative; background-color:white; border:solid grey 1px;  width:300px; height:30px;}
.select-editable select {position:absolute; top:0px; left:0px; font-size:20px; border:none; width:300px; margin:0;}
.select-editable input {position:absolute; top:0px; left:0px; width:100px; padding:1px; font-size:20px; border:none;}
.select-editable select:focus, .select-editable input:focus {outline:none;}
</style>

<body>
<h1>The Window Object</h1>
<h2>The scrollBy() Method</h2>

<p>Click to scroll the document.</p>

<p>Look at the horizontal scrollbar to see the effect.</p>

<button onclick="scrollWin()" style="position:fixed">Scroll 100px horizontally!</button>
<br><br>
<select id="editable-select">
                <option>Alfa Romeo</option>
                <option>Audi</option>
                <option>BMW</option>
                <option>Citroen</option>
            </select>
<script>
function scrollWin() {
  window.scrollBy(100, 0);
}
</script>

<input type="text" name="myText" value="Norway" selectBoxOptions="Canada;Denmark;Finland;Germany;Mexico;Norway;Sweden;United Kingdom;United States">


<div class="select-editable">
  <select onchange="this.nextElementSibling.value=this.value">
    <option value=""></option>
    <option value="115x175 mm">115x175 mm</option>
    <option value="120x160 mm">120x160 mm</option>
    <option value="120x287 mm">120x287 mm</option>
  </select>
  <input type="text" name="format" value=""/>
</div>



<div class="container">
  <h1>Testing - Editable Drop Down</h1>
  <form>

    <h3>New test</h3>
    <div class="row">
      <div class="col-sm-3">
        <div class="input-group dropdown">
          <input type="text" class="form-control countrycode dropdown-toggle" value="(+47)">
          <ul class="dropdown-menu">
            <li><a href="#" data-value="+47">Norway (+47)</a></li>
            <li><a href="#" data-value="+1">USA (+1)</a></li>
            <li><a href="#" data-value="+55">Japan (+55)</a></li>
          </ul>
          <span role="button" class="input-group-addon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></span>
        </div>
      </div>
      <div class="col-sm-9">
        <input type="txt" class="form-control" value="23456789" id="phone1">
      </div>
    </div>
  </form>
</div>


<script>
  $(function() {
  $('.dropdown-menu a').click(function() {
    console.log($(this).attr('data-value'));
    $(this).closest('.dropdown').find('input.countrycode')
      .val('(' + $(this).attr('data-value') + ')');
  });
});
</script>
</body>
</html>
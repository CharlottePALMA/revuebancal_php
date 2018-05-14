<meta charset="utf-8">
<meta name="robots" content="noindex">
<link href="../css/reset.css" rel="stylesheet">
<link href="../css/bancal.grid_admin.css" rel="stylesheet">
<link href="../css/bancal_admin.css" rel="stylesheet">
<link rel="icon" href="../img/Favicon.png" type="image/png" sizes="16x16"> 
<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="../js/jquery.js"></script>
<?php include('../includes/jquery.php'); ?>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({
    selector: '.tynimce',
    plugins : 'advlist autolink link image lists charmap print preview',
});</script>
<script>
        $(function(){
        
            $('#mettreB').click(function(){
                $('#brouillon').attr('value', '1');
                $('form').submit();
            });
            
            $('#mettreP').click(function(){
                $('#brouillon').attr('value', '2');
                $('form').submit();
            });
        })
    </script>

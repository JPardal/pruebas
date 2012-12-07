<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>
<?php foreach($js_files as $file): ?>

        <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<style type='text/css'>
body
{
        font-family: Arial;
        font-size: 14px;
}
a {
        color: blue;
        text-decoration: none;
        font-size: 14px;
}
a:hover
{
        text-decoration: underline;
}
</style>
</head>
<body>
<!-- Beginning header -->
       
<!-- End of header-->
        <div style='height:20px;'></div>
        <div>
                <?php echo $output; ?>

        </div>
<!-- Beginning footer -->
<div>Footer</div>
<!-- End of Footer -->
</body>
</html>
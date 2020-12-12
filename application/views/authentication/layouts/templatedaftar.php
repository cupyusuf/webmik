<!DOCTYPE html>
<html>

<head>
    <title><?= $title; ?></title>
    <!-- meta -->
    <?php require_once('_meta.php') ;?>

    <!-- css -->
    <?php require_once('_css.php') ;?>
</head>

<body class="hold-transition">
    <div class="wrapper login-page register-page">
        <?php echo $contents ;?>
    </div>
    <!-- js -->
    <?php require_once('_js.php') ;?>
</body>

</html>
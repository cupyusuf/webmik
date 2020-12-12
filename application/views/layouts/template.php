<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <!-- meta -->
    <?php require_once('_meta.php') ;?>

    <!-- css -->
    <?php require_once('_css.php') ;?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- header
        <?php require_once('_nav.php') ;?>
        <!-- sidebar -->
        <?php require_once('_sidebar.php') ;?>
        <!-- content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <?php echo $contents ;?>
            </section>
        </div>
        <!-- footer -->
        <?php require_once('_footer.php') ;?>

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- js -->
    <?php require_once('_js.php') ;?>
</body>

</html>
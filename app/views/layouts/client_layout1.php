<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo (!empty($page_title))?$page_title:'Trang Chủ' ?></title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT ?>/public/assets/clients/css/style.css">
</head>
<body>
<!--cách 1 dùng include hoặc requid-->
<!--cách  2 dùng $this->render() hoặc view-->
    <?php
    $this->render('components/header');
    ?>
<!--header-->

<!--content-->

<?php
$this->render($content,$sub_content) ?>
<!--end content-->


<!--footer-->
<?php
$this->render('components/footer');
?>
<script src="<?php echo _WEB_ROOT ?>/public/assets/clients/js/script.js"></script>
</body>
</html>
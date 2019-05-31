<html>
    <head>
        <title>test01</title>
    </head>
    <body>
        <?php $var = "<script src=./test01.js> </script>"; ?>
        <?php echo $var; ?>
        <script src="/assets/js/ReferrerKiller.js"></script>

<span id="noreferer"></span>

<script>
document.getElementById('noreferer').innerHTML = ReferrerKiller.imageHtml('http://a.hiphotos.baidu.com/ting/pic/item/3bf33a87e950352aa210e8635043fbf2b2118b6c.jpg');
</script>
    </body>
</html>

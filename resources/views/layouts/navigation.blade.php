<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 01.09.16
 * Time: 17:56
 */
$navigation = new \App\category();
$navigation = $navigation->all()->toArray();
?>
<?php foreach ($navigation as $_nav): ?>
<a href="<?php echo url('/catalog/'.$_nav['url_key']) ?>">
    <?php echo $_nav['name'] ?>
</a><br/>
<?php endforeach; ?>


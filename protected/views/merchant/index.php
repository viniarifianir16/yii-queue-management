<h1>Available Merchants</h1>
<ul>
    <?php foreach ($merchants as $merchant): ?>
        <li>
            <?php echo CHtml::link($merchant->name, array('merchant/view', 'id' => $merchant->id)); ?>
        </li>
    <?php endforeach; ?>
</ul>
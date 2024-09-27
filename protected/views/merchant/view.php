<h1><?php echo $merchant->name; ?></h1>
<p>Location: <?php echo $merchant->location; ?></p>
<h3>Services</h3>
<ul>
    <?php foreach ($services as $service): ?>
        <li>
            <?php echo CHtml::link($service->name, array('queue/create', 'service_id' => $service->id)); ?>
        </li>
    <?php endforeach; ?>
</ul>
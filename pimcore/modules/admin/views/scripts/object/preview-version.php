<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="/pimcore/static/css/object_versions.css"/>

</head>

<body>


<?php $fields = $this->object->geto_class()->getFieldDefinitions(); ?>

<table class="preview" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Key</th>
        <th>Value</th>
    </tr>

    <tr class="system">
        <td>Path</td>
        <td>o_path</td>
        <td><?php echo $this->object->getFullpath(); ?></td>
    </tr>
    <tr class="system">
        <td>Published</td>
        <td>o_published</td>
        <td><?php echo Zend_Json::encode($this->object->getPublished()); ?></td>
    </tr>

    <tr class="">
        <td colspan="3">&nbsp;</td>
    </tr>

<?php $c = 0; ?>
<?php foreach ($fields as $fieldName => $definition) { ?>
    <?php if($definition instanceof Object_Class_Data_Localizedfields) { ?>
        <?php foreach(Pimcore_Tool::getValidLanguages() as $language) { ?>
            <?php foreach ($definition->getFieldDefinitions() as $lfd) { ?>
                <tr<?php if ($c % 2) { ?> class="odd"<?php } ?>>
                    <td><?php echo $lfd->getTitle() ?> (<?php echo $language; ?>)</td>
                    <td><?php echo $lfd->getName() ?></td>
                    <td><?php echo $lfd->getVersionPreview($this->object->getValueForFieldName($fieldName)->getLocalizedValue($lfd->getName(), $language)) ?></td>
                </tr>
            <?php
                $c++;
            } ?>
        <?php } ?>
    <?php } else { ?>
        <tr<?php if ($c % 2) { ?> class="odd"<?php } ?>>
            <td><?php echo $definition->getTitle() ?></td>
            <td><?php echo $definition->getName() ?></td>
            <td><?php echo $definition->getVersionPreview($this->object->getValueForFieldName($fieldName)) ?></td>
        </tr>
    <?php } ?>
<?php $c++;
} ?>
</table>


</body>
</html>
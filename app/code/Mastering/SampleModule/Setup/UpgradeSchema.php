<?php

namespace Mastering\SampleModule\Setup;

use Mastering\SampleModule\Setup\UpgradeSchemaInterface;
use Mastering\SampleModule\Setup\ModuleContextInterface;
use Mastering\SampleModule\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')){
            $setup->getConnection()->addColumn(
                $setup->getTable('mastering_sample_item'),
                'descripcion',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' => 'Item Description'
                ]
            );
        }
        

        $setup->endSetup();
    }
}
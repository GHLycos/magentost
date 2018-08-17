<?php

namespace Mastering\SampleModule\Setup;

use Mastering\SampleModule\Setup\ModuleContextInterface;
use Mastering\SampleModule\Setup\ModuleDataSetupInterface;
use Mastering\SampleModule\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')){
            $setup->getConnection()->update(
                $setup->getTable('mastering_sample_item'),
                [
                    'descripcion' => 'Default description'
                ],
                $setup->getConnection()->quoteInto('id = ?', 1)
            );
        }        

        $setup->endSetup();
    }
}
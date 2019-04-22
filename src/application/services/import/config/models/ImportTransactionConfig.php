<?php

namespace EventEspresso\AttendeeImporter\application\services\import\config\models;

use EE_Model_Field_Base;
use EEM_Base;
use EEM_Registration;
use EEM_Transaction;

/**
 * Class ImportTransactionConfig
 *
 * Description
 *
 * @package     Event Espresso
 * @author         Mike Nelson
 * @since         $VID:$
 *
 */
class ImportTransactionConfig extends ImportModelConfigBase
{


    /**
     * Gets the model this configuration is for
     * @since $VID:$
     * @return EEM_Base
     */
    public function getModel()
    {
        return EEM_Transaction::instance();
    }

    /**
     * Gets the names of the fields on this model that are mapped.
     * @since $VID:$
     * @return string[]
     */
    public function fieldNamesMapped()
    {
        return [];
    }
}
// End of file ImportTransactionConfig.php
// Location: EventEspresso\AttendeeImporter\application\services\import\config\models/ImportTransactionConfig.php

<?php if (!defined('EVENT_ESPRESSO_VERSION')) {
    exit('No direct script access allowed');
}

/**
 * Class  EED_Attendee_Importer
 *
 * This is where miscellaneous action and filters callbacks should be setup to
 * do your addon's business logic (that doesn't fit neatly into one of the
 * other classes in the mock addon)
 *
 * @package            Event Espresso
 * @subpackage        eea-attendee-importer
 * @author                Brent Christensen
 *
 * ------------------------------------------------------------------------
 */
class EED_Attendee_Importer extends EED_Module
{
    /**
     * @var EE_Attendee_Importer_Config
     */
    protected $config;


    /**
     * @return EED_Attendee_Importer
     */
    public static function instance()
    {
        return parent::get_instance(__CLASS__);
    }


    /**
     *    set_hooks - for hooking into EE Core, other modules, etc
     *
     * @access    public
     * @return    void
     */
    public static function set_hooks()
    {
    }

    /**
     *    set_hooks_admin - for hooking into EE Admin Core, other modules, etc
     *
     * @access    public
     * @return    void
     */
    public static function set_hooks_admin()
    {
    }

    /**
     *    run - initial module setup
     *
     * @access    public
     * @param  WP $WP
     * @return    void
     */
    public function run($WP)
    {
    }
}
// End of file EED_Attendee_Importer.module.php
// Location: /wp-content/plugins/eea-attendee-importer/EED_Attendee_Importer.module.php
<?php

namespace EventEspresso\AttendeeImporter\core\services\import;


/**
 * Class ImportTypeInterface
 *
 * Interface for classes that describe a particular job type. These are properties shared between a web UI and CLI
 * command.
 *
 * @package     Event Espresso
 * @author         Mike Nelson
 * @since         $VID:$
 *
 */
interface ImportTypeManagerInterface
{
    /**
     * Gets the name of this import type (translated).
     * @since $VID:$
     * @return string
     */
    public function getName();

    /**
     * Gets the slug for this import type.
     * @since $VID:$
     * @return string
     */
    public function getSlug();

    /**
     * Gets a string of HTML describing this import type.
     * @since $VID:$
     * @return string
     */
    public function getDescription();

    /**
     * @since $VID:$
     * @return ImportUnitCommandInterface
     */
    public function getImportCommand();

    /**
     * @since $VID:$
     * @return mixed
     */
    public function getConfig();

    /**
     * @since $VID:$
     * @return mixed
     */
    public function saveConfig();

    /**
     * @since $VID:$
     * @return string
     */
    public function getPathToFiles();

    /**
     * @since $VID:$
     * @return mixed
     */
    public function getUrlToFiles();
}
// End of file ImportTypeInterface.php
// Location: EventEspresso\core\services\import/ImportTypeInterface.php
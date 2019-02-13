<?php

namespace EventEspresso\AttendeeImporter\core\domain\services\commands;

use EE_Attendee;
use EE_Error;
use EE_Registration;
use EventEspresso\core\exceptions\InvalidEntityException;
use EventEspresso\core\services\commands\CommandInterface;
use EventEspresso\core\services\commands\CompositeCommandHandler;

/**
 * Class CreateAttendeeCommandHandler
 * generates and validates an Attendee
 *
 * @package       Event Espresso
 * @author        Brent Christensen
 */
class ImportCsvRowCommandHandler extends CompositeCommandHandler
{


    /**
     * @param CommandInterface $command
     * @return EE_Attendee
     * @throws EE_Error
     * @throws InvalidEntityException
     */
    public function handle(CommandInterface $command)
    {
        /** @var ImportCsvRowCommand $command */
        if (! $command instanceof ImportCsvRowCommand) {
            throw new InvalidEntityException(get_class($command), 'EventEspresso\AttendeeImporter\core\domain\services\commands\ImportCsvRowCommand');
        }
        // TODO: Use commands to...
        // Create an attendee
        $attendee = $this->commandBus()->execute(
            $this->commandFactory()->getNew(
                'EventEspresso\AttendeeImporter\core\domain\services\commands\AttendeeFromCsvRowCommand',
                $command->csvRow()
            )
        );

        // Create a transaction
        // Get a ticket
        // Get an event
        // Create a registration
        // Create answers
        // Create a registration-answer row
        // Create line items
        return null;
    }


    /**
     * find_existing_attendee
     *
     * @param EE_Registration $registration
     * @param  array          $attendee_data
     * @return EE_Attendee
     */
    private function findExistingAttendee(EE_Registration $registration, array $attendee_data)
    {
        $existing_attendee = null;
        // does this attendee already exist in the db ?
        // we're searching using a combination of first name, last name, AND email address
        $ATT_fname = ! empty($attendee_data['ATT_fname'])
            ? $attendee_data['ATT_fname']
            : '';
        $ATT_lname = ! empty($attendee_data['ATT_lname'])
            ? $attendee_data['ATT_lname']
            : '';
        $ATT_email = ! empty($attendee_data['ATT_email'])
            ? $attendee_data['ATT_email']
            : '';
        // but only if those have values
        if ($ATT_fname && $ATT_lname && $ATT_email) {
            $existing_attendee = $this->attendee_model->find_existing_attendee(
                array(
                    'ATT_fname' => $ATT_fname,
                    'ATT_lname' => $ATT_lname,
                    'ATT_email' => $ATT_email,
                )
            );
        }
        return apply_filters(
            'FHEE_EventEspresso_core_services_commands_attendee_CreateAttendeeCommandHandler__findExistingAttendee__existing_attendee',
            $existing_attendee,
            $registration,
            $attendee_data
        );
    }


    /**
     * _update_existing_attendee_data
     * in case it has changed since last time they registered for an event
     *
     * @param EE_Attendee $existing_attendee
     * @param  array      $attendee_data
     * @return EE_Attendee
     * @throws EE_Error
     */
    private function updateExistingAttendeeData(EE_Attendee $existing_attendee, array $attendee_data)
    {
        // first remove fname, lname, and email from attendee data
        // because these properties will be exactly the same as the returned attendee object,
        // since they were used in the query to get the attendee object in the first place
        $dont_set = array('ATT_fname', 'ATT_lname', 'ATT_email');
        // now loop thru what's left and add to attendee CPT
        foreach ($attendee_data as $property_name => $property_value) {
            if (! in_array($property_name, $dont_set, true)
                && $this->attendee_model->has_field($property_name)
            ) {
                $existing_attendee->set($property_name, $property_value);
            }
        }
        // better save that now
        $existing_attendee->save();
        return $existing_attendee;
    }


    /**
     * create_new_attendee
     *
     * @param EE_Registration $registration
     * @param  array          $attendee_data
     * @return EE_Attendee
     * @throws EE_Error
     */
    private function createNewAttendee(EE_Registration $registration, array $attendee_data)
    {
        // create new attendee object
        $new_attendee = EE_Attendee::new_instance($attendee_data);
        // set author to event creator
        $new_attendee->set('ATT_author', $registration->event()->wp_user());
        $new_attendee->save();
        return $new_attendee;
    }
}
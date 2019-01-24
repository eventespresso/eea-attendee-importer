<?php

namespace EventEspresso\AttendeeImporter\core\domain\services\commands;

use EE_Attendee;
use EE_Error;
use EE_Registration;
use EEM_Attendee;
use EventEspresso\core\exceptions\InvalidEntityException;
use EventEspresso\core\services\commands\CommandHandler;
use EventEspresso\core\services\commands\CommandInterface;

/**
 * Class CreateAttendeeCommandHandler
 * generates and validates an Attendee
 *
 * @package       Event Espresso
 * @author        Brent Christensen
 */
class RegistrationPaymentFromCsvRowCommandHandler extends CommandHandler
{


    /**
     */
    public function __construct()
    {
    }


    /**
     * @param CommandInterface $command
     * @return EE_Attendee
     * @throws EE_Error
     * @throws InvalidEntityException
     */
    public function handle(CommandInterface $command)
    {
        /** @var RegistrationPaymentFromCsvRowCommand $command */
        if (! $command instanceof RegistrationPaymentFromCsvRowCommand) {
            throw new InvalidEntityException(get_class($command), 'CreateAttendeeCommand');
        }
//        $this->commandBus()->execute(
//            $this->commandFactory()->getNew(
//                'EventEspresso\core\services\commands\transaction\CreateTransactionCommand'
//            )
//        );
        // TODO: Use commands to...
        // Create an attendee
        // Create a transaction
        // Get a ticket
        // Get an event
        // Create a registration
        // Create answers
        // Create a registration-answer row
        // Create line items
        return null;
    }
}

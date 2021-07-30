<?php

declare(strict_types=1);

namespace App\Usecase;

use App\Entity\Customer;
use App\Events\PublishProcessor;
use Illuminate\Support\Facades\Event;

class UserPurchasedBook
{
    const DISABLE_NOTIFICATION = 23;

    public function run(Customer $customer)
    {
        //Event::dispatch(new PublishProcessor($customer->getId()));

        if ($customer->getStatus() === self::DISABLE_NOTIFICATION){
            if (Event::hasListeners(PublishProcessor::class)){
                Event::forget(PublishProcessor::class);
            }
        }
        Event::dispatch(new PublishProcessor($customer->getId()));
    }
}

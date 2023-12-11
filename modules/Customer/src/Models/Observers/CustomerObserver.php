<?php

namespace Modules\Customer\src\Models\Observers;

use Modules\Customer\src\Models\Customer;

class CustomerObserver
{
    /**
     * Hook into customer deleting event.
     *
     * @param Customer $customer
     * @return void
     */
    public function deleting(Customer $customer)
    {
        $customer->carelogs()->detach();
    }
}
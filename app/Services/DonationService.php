<?php



namespace App\Services;

use App\Models\Donation;
use App\Transformers\AppSerializer;
use App\Transformers\DonationTransformer;

class DonationService
{
    public function all()
    {
        $donations = Donation::with(['contacts', 'contacts.contact_type', 'bank_accounts', 'bank_accounts.bank'])->get();
        $donations = \fractal($donations, new DonationTransformer, new AppSerializer)->toArray();

        return $donations;
    }
}

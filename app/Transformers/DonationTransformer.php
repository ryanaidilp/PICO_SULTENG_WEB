<?php



namespace App\Transformers;

use App\Models\Donation;
use League\Fractal\TransformerAbstract;

class DonationTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [
        'accounts', 'contacts',
    ];

    /**
     * List of resources possible to include.
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Donation $donation)
    {
        return [
            'id' => (int) $donation->id,
            'title' => $donation->title,
            'description' => $donation->description,
            'initiator' => $donation->initiator,
            'url' => $donation->url,
            'image' => $donation->image,
            'accept_noncash' => $donation->accept_noncash,
            'delivery_address' => $donation->delivery_address ?? '',
        ];
    }

    public function includeAccounts(Donation $donation)
    {
        return $this->collection($donation->bank_accounts, new BankAccountTransformer);
    }

    public function includeContacts(Donation $donation)
    {
        return $this->collection($donation->contacts, new ContactTransformer);
    }
}

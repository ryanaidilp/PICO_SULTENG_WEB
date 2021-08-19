<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\BankAccount;
use League\Fractal\TransformerAbstract;

class BankAccountTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
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
    public function transform(BankAccount $bank_account)
    {
        return [
            'id'   => (int) $bank_account->id,
            'name' => $bank_account->account_name,
            'number' => $bank_account->account_number,
            'bank'  => $bank_account->bank->name,
            'bank_logo' => $bank_account->bank->logo,
        ];
    }
}

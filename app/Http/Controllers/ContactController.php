<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Transformers\ContactTransformer;
use Illuminate\Http\Request;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use App\Http\Controllers\ApiController;

class ContactController extends ApiController
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function getListContact($userId, Manager $fractal, ContactTransformer $contactTransformer)
    {
        $contacts = $this->contact->where('user_id', $userId)->get();

        $collection = new Collection($contacts, $contactTransformer);

        $data = $fractal->createData($collection)->toArray();

        return $this->respond($data);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Client;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch($this->method())
        {
            case 'PATCH':
            case 'PUT':
            {
                // where 'cliente' is the placeholder for the client id of the route
                
                $client = Client::find($this->id);
                
                return $client->user_id == $this->user()->id || $this->user()->hasRole('master');
            }
            case 'GET':
            case 'POST':
            {
                return true;
            }
            default:
            {
                break;
            }
        }

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

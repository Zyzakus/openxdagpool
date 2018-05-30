<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSettings extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'pool_created_at' => 'required|date',
			'pool_name' => 'required',
			'header_background_color' => 'required|regex:/^#[a-f0-9]{6}$/siu',

			'pool_domain' => 'required',
			'pool_port' => 'required|numeric|min:1|max:65535',
			'website_domain' => 'required',

			'contact_email' => 'required|email',
			'important_message_until' => 'nullable|date',

			'reference_miner_address' => 'nullable|regex:/^[a-z0-9\/+]{32}$/siu|not_in:AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA',
			'reference_miner_hashrate' => 'nullable|numeric|min:0',
		];
	}
}

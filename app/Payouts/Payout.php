<?php

namespace App\Payouts;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use App\FoundBlocks\FoundBlock;

class Payout extends Model
{
	protected $fillable = ['found_block_id', 'made_at', 'made_at_milliseconds', 'recipient', 'amount'];
	protected $dates = ['made_at', 'created_at', 'updated_at'];

	/* relations */
	public function foundBlock()
	{
		return $this->belongsTo(FoundBlock::class);
	}

	/* attributes */
	public function getPreciseMadeAtAttribute()
	{
		return Carbon::parse($this->made_at->format('Y-m-d H:i:s') . '.' . sprintf('%06d', $this->made_at_milliseconds * 1000)); // Carbon doesn't support setting micro directly, we need to call parse again
	}

	public function getSenderAttribute()
	{
		return $this->foundBlock->address;
	}

	public function getShortSenderAttribute()
	{
		return substr($this->sender, 0, 5) . '...' . substr($this->sender, -5);
	}

	public function getShortRecipientAttribute()
	{
		return substr($this->recipient, 0, 5) . '...' . substr($this->recipient, -5);
	}

	/* setters */
	public function setPreciseMadeAtAttribute(Carbon $value)
	{
		$this->made_at = $value;
		$this->made_at_milliseconds = floor($value->micro / 1000);
	}
}

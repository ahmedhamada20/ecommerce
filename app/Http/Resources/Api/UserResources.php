<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'type' => $this->type,
            'email' => $this->email,
            'wallet_balance' => $this->wallet_balance,
            'gender' => $this->gender,
            'code_country' => $this->code_country,
            'whatsapp_phone' => $this->whatsapp_phone,
            'profile_picture' =>$this->profile_picture != null ? asset('storage/'.$this->profile_picture) : null,
            'date_of_birth' => $this->date_of_birth,
            'fb_link' => $this->fb_link,
            'tw_link' => $this->tw_link,
            'in_link' => $this->in_link,
            'google_id' => $this->google_id,
            'facebook_id' => $this->facebook_id,
            'create_dates' => [
                'created_at_human' => $this->created_at->diffForHumans(),
                'created_at' => $this->created_at->format('y-m-d h:i:s')
            ],
            'update_dates' => [
                'updated_at_human' => $this->updated_at->diffForHumans(),
                'updated_at' => $this->updated_at->format('y-m-d h:i:s')
            ]
        ];
    }
}

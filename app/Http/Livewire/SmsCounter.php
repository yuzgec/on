<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SmsCounter extends Component
{
    public $counter;

    public function counter(){

        $curl = curl_init(); 

            curl_setopt_array($curl,[
            CURLOPT_URL => 'https://smsgw.mutlucell.com/smsgw-ws/gtcrdtex',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '<?xml version="1.0" encoding="UTF-8"?><smskredi  ka="'.config('settings.sms_kullanici').'" pwd="'.config('settings.sms_pass').'"  />',
            CURLOPT_HTTPHEADER => array( 'Content-Type: text/xml' ),
            ]); 

            $counter = curl_exec($curl); 

            //dd($counter);

            curl_close($curl);
            $this->counter = $counter;

    }

    public function render()
    {
        return view('livewire.sms-counter');
    }
}

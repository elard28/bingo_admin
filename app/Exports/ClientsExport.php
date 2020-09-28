<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ClientsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $clients =  Client::select('name','dni','foreign','email','cellphone','num_card_purchase','payment_institution','validated_timestamp','count_cards')
        	->where('validated','1')
        	->orderBy('validated_timestamp','ASC')
        	->get();

        foreach ($clients as $client)
        {
        	if($client->foreign == 0)
        		$client->foreign = 'Peruano';
        	else $client->foreign = 'Extranjero';
        	
        	$cards = '';
        	for($i = 0; $i < $client->num_card_purchase; $i++)
        	{
        		$num = $client->count_cards+$i+1;
        		$cards .= str_pad($num, 5, 0, STR_PAD_LEFT) . ' ';
        	}
        	$client->count_cards = $cards;
        }

    	return $clients;
    }

    public function headings():array
    {
        return ['Nombres Y Apellidos', 'DNI', 'Nacionalidad', 'Correo', 'Teléfono', 'Num. de Tarjetas', 'Institución de Pago', 'Validado','Tarjetas'];
    }
}

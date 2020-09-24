<?php

namespace App\Http\Controllers;

use App\Client;
use DB;
use Mail;
use Auth;
use Yajra\Datatables\DataTables;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$clients = Client::get();
        return view('clients.index', ['clients' => $clients]);*/

        /*if ($request->ajax())
        {

        }*/
        
        return view('clients.index');
    }

    public function indextable()
    {
        return DataTables::of(Client::get())
            ->addColumn('actions', function(Client $client) {
                    $actions = '<a href="' . route('client.edit',$client->id) .'" class="btn btn-primary btn-circle btn-sm" title="Editar"><i class="fas fa-pen"></i>';
                    if($client->validated == '1')
                        $actions = $actions . '<a href="' . route('client.resend_cardboards',$client->id) .'" class="btn btn-success btn-circle btn-sm" title="Reenviar cartones"><i class="fas fa-envelope"></i>';
                    return $actions;
                })
            ->editColumn('voucher', function(Client $client) {
                    if($client->voucher)
                        return /*'<img src="../../vouchers/' . $client->voucher . '" height="75">'*/
'<a hclass="dropdown-item" href="#" data-toggle="modal" data-target="#voucher'.$client->id.'" class="btn btn-info btn-circle btn-sm" >
<i class="fas fa-sticky-note"></i>

  <div class="modal fade" id="voucher'.$client->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#4e73df;">
          <h5 class="modal-title" id="exampleModalLabel">
            Voucher de '.$client->name.'
          </h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <img src="../../vouchers/'.$client->voucher.'" height="300">
          </div>
        </div>
      </div>
    </div>
  </div>';

                    else return '-';
                })
            ->editColumn('validated', function(Client $client) {
                    if($client->validated)
                        return $client->validated_timestamp;
                    return '<a href="' . route('client.to_validate',$client->id) .'" class="btn btn-warning btn-circle btn-sm" title="Validar"><i class="fas fa-bell"></i>';
                })
            ->rawColumns(['voucher', 'validated', 'actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $value = url()->previous();
        //setcookie("urlback", $value);
        session(['url.intended' => url()->previous()]);

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->input('name');
        $nc = $request->input('num_card_purchase');
        $eml = $request->input('email');

        $image = $request->file('voucher');
        $imagename = null;
        if($image)
        {
            $imagename = time() . $image->getClientOriginalname();
            $destinationPath = public_path('vouchers');
            $request->merge(['voucher' => $imagename]);
            $image->move($destinationPath, $imagename);
        }

        Client::create($request->input());

        Mail::send('email.confirm', ['name' => $nm, 'num_cards' => $nc], function ($message) use($eml) {
            $message->from('correoenvio2021@gmail.com', 'Bingo');
            $message->subject('Confirmacion de pago');
            $message->to($eml);
        });
        
        //return redirect()->route('client')->with('status','Nuevo cliente creado.');
        
        return redirect(session('url.intended'))->with('status','Registro completado.');

        /*if(Auth::user())
          return redirect()->route('client')->with('status','Nuevo cliente creado.');
        else
          return view('welcome')->with('status','Registro completado.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $pi = ['Yape' => 'Yape', 'Lukita' => 'Lukita', 'Blim' => 'Blim', 'Tarjeta de credito' => 'Tarjeta de credito', 'Deposito bancario' => 'Deposito bancario'];
        //dd($client->name);
        return view('clients.edit', ['client' => $client, 'pi' => $pi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->input());
        $client = Client::findOrFail($id);
        $client->name = $request->input('name');
        $client->dni = $request->input('dni');
        $client->foreign = $request->input('foreign');
        $client->email = $request->input('email');
        $client->cellphone = $request->input('cellphone');
        $client->num_card_purchase = $request->input('num_card_purchase');
        $client->payment_institution = $request->input('payment_institution');

        $image = $request->file('voucher');
        $imagename = null;
        if($image)
        {
            $imagename = time() . $image->getClientOriginalname();
            $destinationPath = public_path('vouchers');
            //$request->merge(['voucher' => $imagename]);
            $image->move($destinationPath, $imagename);

            $client->voucher = $imagename;
        }

        $client->save();

        return redirect()->route('client')->with('status','Datos del cliente ' . $client->name . ' actualizados.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('client')->with('status','Cliente ' . $client->name . ' eliminado.');
    }


    public function to_validate($id)
    {
        $count_cards = Client::where('validated','1')->sum('num_card_purchase');

        $client = Client::find($id);
        $client->validated = '1';
        //$client->validated_timestamp = DB::raw('now()');
        $client->validated_timestamp = \Carbon\Carbon::now('America/Lima')->toDateTimeString();
        $client->count_cards = $count_cards;
        $client->save();

        $cards = [];
        for($i = 0; $i < $client->num_card_purchase; $i++)
        {
            $num = $count_cards+$i+1;
            $cards[$i] = 'cardboards/out-' . str_pad($num, 5, 0, STR_PAD_LEFT) . '.pdf';
        }
        
        $nm = $client->name;
        $nc = $client->num_card_purchase;
        $eml = $client->email;
        Mail::send('email.cardboards', ['name' => $nm, 'num_cards' => $nc], function ($message) use($eml,$cards) {
            $message->from('correoenvio2021@gmail.com', 'Bingo');
            $message->subject('Envio de cartones de bingo');
            foreach ($cards as $card) {
                $message->attach($card);
            }
            $message->to($eml);
        });

        return redirect()->route('client')->with('status','Cliente ' . $client->name . ' validado');
    }

    public function resend_cardboards($id)
    {
        $client = Client::find($id);
        $count_cards = $client->count_cards;

        $cards = [];
        for($i = 0; $i < $client->num_card_purchase; $i++)
        {
            $num = $count_cards+$i+1;
            $cards[$i] = 'cardboards/out-' . str_pad($num, 5, 0, STR_PAD_LEFT) . '.pdf';
        }
        
        $nm = $client->name;
        $nc = $client->num_card_purchase;
        $eml = $client->email;
        Mail::send('email.cardboards', ['name' => $nm, 'num_cards' => $nc], function ($message) use($eml,$cards) {
            $message->from('correoenvio2021@gmail.com', 'Bingo');
            $message->subject('Envio de cartones de bingo');
            foreach ($cards as $card) {
                $message->attach($card);
            }
            $message->to($eml);
        });

        return redirect()->route('client')->with('status','Reenviado los cartones al cliente ' . $client->name . '.');
    }

    public function help_desk(Request $request)
    {
        /*$eml = 'nombre123@correo.com';
        $emd = strrchr($eml,'@');
        $eml = str_replace($emd, "@yopmail.com", $eml);
        dd($eml);*/

        $from = $request->input('from');
        $name = $request->input('name');
        $comment = $request->input('comment');

        //$comment = str_replace('\r\n', '</p><p>', $comment);
        
        $cm = '';
        $comment = explode("\r\n", $comment);
        foreach($comment as $c)
            $cm .= '<p>'.$c.'</p>';
        //dd($cm);

        $eml = 'jsantisteban@ucsp.edu.pe';
        Mail::send('email.help-desk', ['from' => $from, 'name' => $name, 'comment' => $cm], function ($message) use($eml) {
            $message->from('correoenvio2021@gmail.com', 'Bingo');
            $message->subject('Mesa de ayuda');
            $message->to($eml);
        });

        return redirect(url('/'))->with('status','Mensaje enviado.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Mail\SendMailMuaVe;
use App\Models\Customer;
use App\Models\GheBan;
use App\Models\GiaoDich;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GiaoDichController extends Controller
{
    public function auto()
    {
        $now = Carbon::now()->format('d/m/Y');
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $response = $client->post('http://api.danangseafood.vn/api',
            [
                'body' => json_encode(
                    [
                        'begin'           => $now,
                        'end'             => $now,
                        'username'        => '0345884657',
                        'password'        => 'Itsend0807+',
                        'accountNumber'   => '9345884657',
                    ]
            )]
        );
        $result = json_decode($response->getBody()->getContents(), true);
        if($result && $result['success'] == true) {
            $data = $result['results'];
            foreach($data as $key => $value) {
                $giaoDich = GiaoDich::where('Reference', $value['Reference'])->first();
                if(!$giaoDich) {
                    $gd = GiaoDich::create([
                        'Reference' => $value['Reference'],
                        'Description' => $value['Description'],
                        'Amount' => $value['Amount'],
                    ]);
                    if(strpos($value['Description'], 'HD') > 0) {
                        $vitri = strpos($value['Description'], 'HD');
                        $maGiaoDich = Str::substr($value['Description'], $vitri, strlen($value['Description']) - $vitri);

                        $gheBan = GheBan::where('ma_giao_dich', $maGiaoDich)->get();

                        if($gheBan->count('id') * 15 <= $value['Amount']) {
                            GheBan::where('ma_giao_dich', $maGiaoDich)->update([
                                'id_bill_ngan_hang'  => $gd->id,
                            ]);

                            $customer = Customer::where('id', $gheBan[0]->id_khach_hang)->first();
                            $data['ho_va_ten'] = $customer->ho_va_ten;

                            Mail::to($customer->email)->send(new SendMailMuaVe($data));
                        }
                    }
                }
            }
        }
    }
}

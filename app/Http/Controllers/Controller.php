<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function venturo()
    {
        $sumdate = [];
        $generalarray = [];
        $summonth = [];
        $sumtotal= 0;
        
        $response2 = Http::get('https://tes-web.landa.id/intermediate/menu');
        $data2 = $response2->json();
        $response = Http::get('http://tes-web.landa.id/intermediate/transaksi?tahun=2021');
        $data = $response->json();

        
        foreach ($data2 as $menuu) {
            foreach ($data as $datum) {
                if (!empty($datum['menu'])) {
                    $sumdate[0] = $menuu['menu'];
                    if ($datum['menu'] == $menuu['menu']) {
                        $time = strtotime($datum['tanggal']);
                        $mount = date('m',$time);
                        $mountint = (int)$mount;

                        if (!isset($sumdate[$mountint])) {
                            $sumdate[$mountint] = $datum['total'];
                        }else{
                            $sumdate[$mountint] += $datum['total'];
                        }
                        
                        if (!isset($summonth[$mountint])) {
                            $summonth[$mountint] = $datum['total'];
                        }else{
                            $summonth[$mountint] += $datum['total'];
                        }
                        $sumtotal += $datum['total'];
                    }
                }
                
            }
            $sumdate[13] = array_sum($sumdate);
            array_push($generalarray,$sumdate);
            $sumdate=[];
        }
        $summonth[0] = "Total";
        $summonth[13] = $sumtotal;
        array_push($generalarray, $summonth);
        dd($generalarray);
        return view('agung',compact('generalarray'));
    }
}

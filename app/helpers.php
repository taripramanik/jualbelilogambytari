<?php
    use Carbon as Karbon;
    use App\Transaction;
    use Auth as Auuuth;
    use App\Withdraw;

    function get_jumlah_sampah_per_hari() {
        $hari_ini = Karbon::now()->dayOfWeek - 1;
        $startDate = Karbon::now()->addDays('-' . $hari_ini);
        $endDate = Karbon::now()->addDays(6 - $hari_ini);

        $data = Transaction::where('id_user', Auuuth::user()->id)->whereBetween('tanggal', [$startDate, $endDate])->get();

        $jumlahSampah = 0;
        foreach($data as $dataTransaksi) {
            $jumlahSampah = $jumlahSampah + (int)$dataTransaksi->berat;
        }
        return $jumlahSampah;
    }

    function get_sampah_dari_antares() {
        $endpoint = "/~/antares-cse/antares-id/SmartTrashBag/IRSensor?fu=1&ty=4&drt=1";
        $client = new \GuzzleHttp\Client([
            'verify' => false,
            'base_uri' => "https://platform.antares.id:8443"
        ]);
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                "X-M2M-Origin" => "3df8d08f673087db:2990c74376e22e46",
                "Content-Type" => "application/json",
                "Accept" => "application/json"
            ]
        ]);
        
        $response = json_decode($response->getBody()->getContents(), true);
        $data = $response["m2m:uril"];
        $data = array_slice($data, 0, 10);
        $pasukan = [];
        foreach($data as $index => $dtx) {
            $cl = new \GuzzleHttp\Client([
                'verify' => false,
                'base_uri' => "https://platform.antares.id:8443"
            ]);
            $res = $cl->request('GET', '/~' . $dtx, [
                'headers' => [
                    "X-M2M-Origin" => "3df8d08f673087db:2990c74376e22e46",
                    "Content-Type" => "application/json",
                    "Accept" => "application/json"
                ]
            ]);
            $res = json_decode($res->getBody()->getContents(), true);
            $res = json_decode($res["m2m:cin"]["con"]);
            if(is_object($res->data)) array_push($pasukan, $res->data->W);
            else array_push($pasukan, $res->data);
        }
        return $pasukan;
    }

    function get_sampah_dari_antares_v2() {
        $endpoint = "/~/antares-cse/antares-id/SmartTrashBag/IRSensor?fu=1&ty=4&drt=1";
        $client = new \GuzzleHttp\Client([
            'verify' => false,
            'base_uri' => "https://platform.antares.id:8443"
        ]);
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                "X-M2M-Origin" => "3df8d08f673087db:2990c74376e22e46",
                "Content-Type" => "application/json",
                "Accept" => "application/json"
            ]
        ]);
        
        $response = json_decode($response->getBody()->getContents(), true);
        $data = $response["m2m:uril"];
        $data = array_slice($data, 0, 25);
        $pasukan = [];
        foreach($data as $index => $dtx) {
            $cl = new \GuzzleHttp\Client([
                'verify' => false,
                'base_uri' => "https://platform.antares.id:8443"
            ]);
            $res = $cl->request('GET', '/~' . $dtx, [
                'headers' => [
                    "X-M2M-Origin" => "3df8d08f673087db:2990c74376e22e46",
                    "Content-Type" => "application/json",
                    "Accept" => "application/json"
                ]
            ]);
            $res = json_decode($res->getBody()->getContents(), true);
            $res = json_decode($res["m2m:cin"]["con"]);
            $udahDiProses = Transaction::where('source', $dtx)->first();
            if(isset($res->data) && is_null($udahDiProses)) {
                if(is_object($res->data)) array_push($pasukan, [
                    "berat" => abs($res->data->W),
                    "source" => $dtx
                ]);
                else array_push($pasukan, [
                    "berat" => abs($res->data),
                    "source" => $dtx
                ]);
            }
        }
        return $pasukan;
    }

    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
    }

    function getSaldo() {
        $transaksi = Transaction::where('id_user', Auth::user()->id)->get();
        $saldo = 0;
        foreach($transaksi as $data) {
            $saldo += $data->harga_total;
        }
        $dataPencairan = Withdraw::where('status', '!=' ,'DIAJUKAN')->get();
        foreach($dataPencairan as $dataa) {
            $saldo -= $dataa->total_pencairan;
        }
        return $saldo;
    }

    function punyaPengajuanPencairan() {
        return count(Withdraw::where('status', 'DIAJUKAN')->get()) > 0;
    }
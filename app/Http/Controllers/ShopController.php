<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShopCart;
use App\Models\Order;
use App\Models\ProductCategory;
use App\Models\Basket;
use App\Http\Requests\PayRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Models\City;


use Mlevent\Fatura\Enums\Currency;
use Mlevent\Fatura\Enums\InvoiceType;
use Mlevent\Fatura\Enums\Unit;
use Mlevent\Fatura\Gib;
use Mlevent\Fatura\Models\InvoiceModel;
use Mlevent\Fatura\Models\InvoiceItemModel;


class ShopController extends Controller
{
    public function store(){

            //dd(date('d/m/Y'));
            // MutluCell API URL
            $curl = curl_init();
            curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://smsgw.mutlucell.com/smsgw-ws/sndblkex',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => '<?xml version="1.0" encoding="UTF-8"?>
                                                <smspack ka="OnPefrmarts" pwd="dance3624." org="ONDANCE">
                                                    <mesaj>
                                                            <metin>DENEME SMS..</metin>
                                                            <nums>05332802852</nums>
                                                    </mesaj>
                                                </smspack>',
                    CURLOPT_HTTPHEADER => array( 'Content-Type: text/xml' ),
            ));
            $response = curl_exec($curl);

            curl_close($curl);


          /*   foreach (Cart::instance('shopping')->content() as $item) {
                $b[] = [$item->name, $item->price, $item->qty];
            }

            dd($b); */


        return view('frontend.shop.index');
    }

    public function product($slug){
        $Detail = Product::where('slug', $slug)->firstOrFail();
        views($Detail)->cooldown(60)->record();

        return view('frontend.shop.product',compact('Detail'));
    }

    public function category($slug){
        $Detail = ProductCategory::where('slug', $slug)->firstOrFail();
        //dd($Detail);
        
        $Products= Product::whereHas('categories', function ($query) use ($Detail) {
            $query->where('categories.id', $Detail->id);
        })
        ->where('status', 1)
        ->with(['categories' => function ($query) {
            $query->select('id', 'parent_id');
        }])
        ->orderBy('sku', 'asc')
        ->paginate(100);

        //dd($Products);
        return view('frontend.shop.category',compact('Detail', 'Products'));
    }

    public function addtocart(Request $request)
    {
        $p = Product::find($request->id);
        Basket::create(['product_id' => $p->id]);
        Cart::instance('shopping')->add(
            [
                'id' => $p->id,
                'name' => $p->title,
                'price' => $p->price,
                'weight' => 0,
                'qty' => 1,
                'options' => [
                    'image' => (!$p->getFirstMediaUrl('page')) ? '/resimyok.jpg' : $p->getFirstMediaUrl('page', 'small'),
                    'cargo' => 0,
                    'campagin' => null,
                    'category' => $p->firstCategoryName,
                    'size' => ($request->size) ? $request->size : null,
                    'color' => ($request->color) ? $request->color : null,
                    'url' => $p->slug,
                    'student' => $request->student
                ]
            ]);
        //alert()->image('Image Title!','Image Description','Image URL','Image Width','Image Height','Image Alt');
        session()->flash('msg', 'Successfully done the operation.');

        return redirect()->back()->with('success', $p->title.' sepetinize başarıyla eklenmiştir.');
    }

    public function checkout()
    {
        $Province = DB::table('sehir')->get();
        return view('frontend.shop.checkout',compact('Province'));
    }

    public function pay(PayRequest $request){

        $merchant_id 	= env('PAYTR_MERCHANT_ID');
        $merchant_key 	= env('PAYTR_MERCHANT_KEY');
        $merchant_salt	= env('PAYTR_MERCHANT_SALT');

        //dd($request->all());

        #
        ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
        $email = $request->input('email');

    
        $payment_amount	=  str_replace(array('.', ','), '', Cart::instance('shopping')->total() ); //9.99 için 9.99 * 100 = 999 gönderilmelidir.
        //dd($payment_amount);
        #
        ## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        $merchant_oid = time();
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
        $user_name = $request->input('firstname').' '.$request->input('surname');
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
        $user_address = $request->input('address');
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
        $user_phone = $request->input('phone');
        #
        ## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_ok_url = route('success',['merchant_oid' => $merchant_oid]);
        #
        ## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_fail_url = route('failed',['merchant_oid' => $merchant_oid]);
        #
        ## Müşterinin sepet/sipariş içeriği
        $user_basket = "";

        foreach (Cart::instance('shopping')->content() as $item) {
            $b[] = [$item->name, $item->price, $item->qty];
        }
        #
        $user_basket = base64_encode(json_encode($b));

        ## Kullanıcının IP adresi
        if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
    
        ## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
        ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
        $user_ip=$ip;
        ##
    
        ## İşlem zaman aşımı süresi - dakika cinsinden
        $timeout_limit = "30";
    
        ## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
        $debug_on = 1;
    
        ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
        $test_mode = 0;
    
        $no_installment	= 0; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın
    
        ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
        ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
        $max_installment = 0;
    
        $currency = "TL";
        
        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        $hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
        $paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
        $post_vals=array(
                'merchant_id'=>$merchant_id,
                'user_ip'=>$user_ip,
                'merchant_oid'=>$merchant_oid,
                'email'=>$email,
                'payment_amount'=>$payment_amount,
                'paytr_token'=>$paytr_token,
                'user_basket'=>$user_basket,
                'debug_on'=>$debug_on,
                'no_installment'=>$no_installment,
                'max_installment'=>$max_installment,
                'user_name'=>$user_name,
                'user_address'=>$user_address,
                'user_phone'=>$user_phone,
                'merchant_ok_url'=>$merchant_ok_url,
                'merchant_fail_url'=>$merchant_fail_url,
                'timeout_limit'=>$timeout_limit,
                'currency'=>$currency,
                'test_mode'=>$test_mode
            );
        
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1) ;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        
            // XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
            // aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
            //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            
        $result = @curl_exec($ch);
    
        if(curl_errno($ch))
            die("PAYTR IFRAME connection error. err:".curl_error($ch));
    
        curl_close($ch);
        
        $result=json_decode($result,1);

        $province = DB::table('sehir')->where('id', $request->province)->first();

        //dd($province);

        if($result['status']=='success'){
            $New = new ShopCart;
            $New->cart_id =  $merchant_oid;
            $New->user_id =  1;
            $New->basket_total =  $payment_amount / 100;
            $New->name =  $request->input('firstname');
            $New->surname =  $request->input('surname');
            $New->email =  $request->input('email');
            $New->tckn =  $request->input('tckn');
            $New->phone =  $request->input('phone');
            $New->address =  $request->input('address');
            $New->province = $province->sehir_title;
            $New->city =  $request->input('city');
            $New->note =  $request->input('note');
            $New->basket_status =  'Ödenmedi';
            $New->save();


            foreach (Cart::instance('shopping')->content() as $item) { 
                $Order = new Order;
                $Order->cart_id =  $merchant_oid;
                $Order->product_id =  $item->id;
                $Order->name =  $item->name;
                $Order->qty =  $item->qty;
                $Order->price =  $item->price;
                $Order->color =  $item->options->color;
                $Order->size =  $item->options->size;
                $Order->ticket_name =  $item->options->student;
                $Order->save();
            } 

            $token=$result['token'];

        }  else{
            die("PAYTR IFRAME failed. reason:".$result['reason']);

        }      
      
        return view('frontend.shop.pay',compact('token'));   

    }


    public function save(Request $request){

        $data = request()->all();


        ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
        ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.

        $merchant_key 	= env('PAYTR_MERCHANT_KEY');
        $merchant_salt	= env('PAYTR_MERCHANT_SALT');

        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        
        ## POST değerleri ile hash oluştur.
        $hash = base64_encode( hash_hmac('sha256', $data['merchant_oid'].$merchant_salt.$data['status'].$data['total_amount'], $merchant_key, true) );
        #
        ## Oluşturulan hash'i, paytr'dan gelen post içindeki hash ile karşılaştır (isteğin paytr'dan geldiğine ve değişmediğine emin olmak için)
        ## Bu işlemi yapmazsanız maddi zarara uğramanız olasıdır.
        if( $hash != $data['hash'] )
            die('PAYTR notification failed: bad hash');
        ###########################################################################

        ## BURADA YAPILMASI GEREKENLER
        ## 1) Siparişin durumunu $data['merchant_oid'] değerini kullanarak veri tabanınızdan sorgulayın.
        ## 2) Eğer sipariş zaten daha önceden onaylandıysa veya iptal edildiyse  echo "OK"; exit; yaparak sonlandırın.

        /* Sipariş durum sorgulama örnek
           $durum = SQL
           if($durum == "onay" || $durum == "iptal"){
                echo "OK";
                exit;
            }
         */
       
        if( $data['status'] == 'success' ) { ## Ödeme Onaylandı

            $Shop = ShopCart::where('cart_id', request('merchant_oid'))->first();

            $Shop->basket_status = 'Ödendi';
            $Shop->basket_total = $data['total_amount'] / 100;

         /*    $gib = (new Gib)->setTestCredentials()
            ->login(); */
            $gib = (new Gib)->setCredentials('64207395', '362425')
            ->login();
            $invoice = new InvoiceModel(
                tarih            : date('d/m/Y'),       // ☑️ Opsiyonel @string      @default=(dd/mm/yyyy)
                saat             : date('H:i:s'),         // ☑️ Opsiyonel @string      @default=(hh/mm/ss)
                paraBirimi       : Currency::TRY,      // ☑️ Opsiyonel @Currency    @default=Currency::TRY
                dovizKuru        : 0,              // ☑️ Opsiyonel @float       @default=0
                faturaTipi       : InvoiceType::Satis, // ☑️ Opsiyonel @InvoiceType @default=InvoiceType::Satis
                vknTckn          : $Shop->tckn,      // ✴️ Zorunlu   @string
                vergiDairesi     : '',                 // ✅ Opsiyonel @string
                aliciUnvan       : $Shop->name,                 // ✅ Opsiyonel @string
                aliciAdi         : $Shop->name,             // ✴️ Zorunlu   @string
                aliciSoyadi      : $Shop->surname,           // ✴️ Zorunlu   @string
                mahalleSemtIlce  : 'Konak',          // ✴️ Zorunlu   @string
                sehir            : 'İzmir',            // ✴️ Zorunlu   @string
                ulke             : 'Türkiye',          // ✴️ Zorunlu   @string
                adres            : '',   // ✅ Opsiyonel @string
                siparisNumarasi  : '',                 // ✅ Opsiyonel @string
                siparisTarihi    : '',                 // ✅ Opsiyonel @string
                irsaliyeNumarasi : '',                 // ✅ Opsiyonel @string
                irsaliyeTarihi   : '',                 // ✅ Opsiyonel @string
                fisNo            : '',                 // ✅ Opsiyonel @string
                fisTarihi        : '',                 // ✅ Opsiyonel @string
                fisSaati         : '',                 // ✅ Opsiyonel @string
                fisTipi          : '',                 // ✅ Opsiyonel @string
                zRaporNo         : '',                 // ✅ Opsiyonel @string
                okcSeriNo        : '',                 // ✅ Opsiyonel @string
                binaAdi          : '',                 // ✅ Opsiyonel @string
                binaNo           : '',                 // ✅ Opsiyonel @string
                kapiNo           : '',                 // ✅ Opsiyonel @string
                kasabaKoy        : '',                 // ✅ Opsiyonel @string
                postaKodu        : '',                 // ✅ Opsiyonel @string
                tel              : '',     // ✅ Opsiyonel @string
                fax              : '',                 // ✅ Opsiyonel @string
                eposta           : '',     // ✅ Opsiyonel @string
                not              : '',              // ✅ Opsiyonel @string
            );
            
            
            // Ürün/Hizmetler
            $cartItems = Cart::instance('shopping')->content();

            // Sepet içeriklerini dönüştürüp faturaya ekle
            foreach ($cartItems as $cartItem) {
                // Her bir cart item için bir InvoiceItemModel nesnesi oluştur
                $invoiceItem = new InvoiceItemModel(
                    malHizmet: $cartItem->name, // Sepet öğesinin adı
                    miktar: $cartItem->qty, // Miktar
                    birim: Unit::Adet, // Bu örnekte her zaman 'Adet' olarak kabul edilmiştir
                    birimFiyat: $cartItem->price, // Birim fiyatı
                    kdvOrani: 20, // KDV oranı, varsayılan bir değer
                    iskontoOrani: 0, // İskonto oranı, eğer varsa bu bilgiyi de sepet öğesinden alabilirsiniz
                    iskontoTipi: 'İskonto', // İskonto tipi, varsayılan bir değer
                    iskontoNedeni: '' // İskonto nedeni, eğer varsa bu bilgiyi de sepet öğesinden alabilirsiniz
                );
            
                // Oluşturulan InvoiceItemModel nesnesini faturaya ekle
                $invoice->addItem($invoiceItem);
            }


            if ($gib->createDraft($invoice)) {
                $invoice->getUuid(); // 04e17398-468d-11ed-b3cb-4ccc6ae28384
            }

            $Shop->invoice_id = $invoice->getUuid();
            $Shop->save();
            $gib->logout();


            ## BURADA YAPILMASI GEREKENLER
            ## 1) Siparişi onaylayın.
            ## 2) Eğer müşterinize mesaj / SMS / e-posta gibi bilgilendirme yapacaksanız bu aşamada yapmalısınız.
            ## 3) 1. ADIM'da gönderilen payment_amount sipariş tutarı taksitli alışveriş yapılması durumunda
            ## değişebilir. Güncel tutarı $data['total_amount'] değerinden alarak muhasebe işlemlerinizde kullanabilirsiniz.



        } else { ## Ödemeye Onay Verilmedi

            $update = ShopCart::where('cart_id', request('merchant_oid'))->first();
            if ($update !== null) {
                $update->basket_status = 'Ödenmedi';
                $update->basket_total = $data['total_amount'];
                $update->error_code = $data['failed_reason_code'];
                $update->error_message = $data['failed_reason_msg'];
                $update->save();
            }
            ## BURADA YAPILMASI GEREKENLER
            ## 1) Siparişi iptal edin.
            ## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz aşağıdaki değerleri kullanabilirsiniz.
            ## $data['failed_reason_code'] - başarısız hata kodu
            ## $data['failed_reason_msg'] - başarısız hata mesajı

        }


        ## Bildirimin alındığını PayTR sistemine bildir.
        echo "OK";
        Cart::instance('shopping')->destroy();
        exit;

    }

    public function success(){

        if(!request('merchant_oid') && request('merchant_oid') == null ){
            return redirect()->route('home');
        }

        $Shop = ShopCart::where('cart_id', request('merchant_oid'))->first();
        $Order = Order::where('cart_id', request('merchant_oid'))->get();

        return view('frontend.shop.success', compact('Shop', 'Order'));
    }

    public function failed(){
        echo 'Ödeme Alınamadı';
    }


    public function getDistricts(City $city)
    {
        return response()->json($city->districts);
    }

}

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


class ShopController extends Controller
{
    public function store(){
        return view('frontend.shop.index');
    }

    public function product($slug){
        $Detail = Product::where('slug', $slug)->firstOrFail();
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
        alert()->success($p->title.' sepetinize eklendi', 'Başarıyla '.SWEETALERT_MESSAGE_CREATE);
        //alert()->image('Image Title!','Image Description','Image URL','Image Width','Image Height','Image Alt');
        session()->flash('msg', 'Successfully done the operation.');

        return redirect()->back();
    }

    public function checkout(){

        return view('frontend.shop.checkout');
    }

    public function pay(PayRequest $request){



        $merchant_id 	= env('PAYTR_MERCHANT_ID');
        $merchant_key 	= env('PAYTR_MERCHANT_KEY');
        $merchant_salt	= env('PAYTR_MERCHANT_SALT');
        #
        ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
        $email = $request->input('email');

        $deger = str_replace('.', '', Cart::instance('shopping')->total());
        $deger = strstr($deger, ',', true);
        $payment_amount	=  $deger = (int)$deger * 100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.

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
        $merchant_ok_url = route('save');
        #
        ## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_fail_url = route('save');
        #
        ## Müşterinin sepet/sipariş içeriği
        $user_basket = "";

        foreach (Cart::instance('shopping')->content() as $item) {
            $b[] = [$item->name, $item->price, $item->qty];
        }
        #
        $user_basket = base64_encode(json_encode([$b]));

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
            
        if($result['status']=='success'){
            $New = new ShopCart;
            $New->cart_id =  $merchant_oid;
            $New->user_id =  1;
            $New->basket_total =  $payment_amount / 100;
            $New->name =  $request->input('firstname');
            $New->surname =  $request->input('surname');
            $New->email =  $request->input('email');
            $New->phone =  $request->input('phone');
            $New->address =  $request->input('address');
            $New->province =  $request->input('province');
            $New->city =  $request->input('city');
            $New->note =  $request->input('note');
            $New->basket_status =  'Pending';
            $New->save();


            foreach (Cart::instance('shopping')->content() as $item) { 
                $Order = new Order;
                $Order->cart_id =  $merchant_oid;
                $Order->product_id =  $item->id;
                $Order->name =  $item->name;
                $Order->qty =  $item->qty;
                $Order->price =  $item->price;
                $Order->save();
            } 

            $token=$result['token'];

        }  else{
            die("PAYTR IFRAME failed. reason:".$result['reason']);

        }      
      
        return view('frontend.shop.pay',compact('token'));   

    }


    public function save(Request $request){

        dd($request->all(), request()->all(), $_POST);

        $data = $_POST;
        ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
        ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.

        $merchant_key 	= env('PAYTR_MERCHANT_KEY');
        $merchant_salt	= env('PAYTR_MERCHANT_SALT');

        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        
        ## POST değerleri ile hash oluştur.
        $hash = base64_encode( hash_hmac('sha256', request('merchant_oid').$merchant_salt.request('status').request('total_amount'),$merchant_key, true) );
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

            $Update = ShopCart::where('cart_id', request('merchant_oid') )->first();
            $update->status = 'Ödendi';
            $Update->save();


            return redirect->route('home');
     

            ## BURADA YAPILMASI GEREKENLER
            ## 1) Siparişi onaylayın.
            ## 2) Eğer müşterinize mesaj / SMS / e-posta gibi bilgilendirme yapacaksanız bu aşamada yapmalısınız.
            ## 3) 1. ADIM'da gönderilen payment_amount sipariş tutarı taksitli alışveriş yapılması durumunda
            ## değişebilir. Güncel tutarı $data['total_amount'] değerinden alarak muhasebe işlemlerinizde kullanabilirsiniz.



        } else { ## Ödemeye Onay Verilmedi

            ## BURADA YAPILMASI GEREKENLER
            ## 1) Siparişi iptal edin.
            ## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz aşağıdaki değerleri kullanabilirsiniz.
            ## $data['failed_reason_code'] - başarısız hata kodu
            ## $data['failed_reason_msg'] - başarısız hata mesajı

        }

        ## Bildirimin alındığını PayTR sistemine bildir.
        echo "OK";
        exit;

    }

}

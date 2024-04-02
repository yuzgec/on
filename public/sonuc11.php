<?php 
use App\Models\ShopCart;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

$post = $_POST;

####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.

$merchant_key 	= env('PAYTR_MERCHANT_KEY');
$merchant_salt	= env('PAYTR_MERCHANT_SALT');

####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######

## POST değerleri ile hash oluştur.
$hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
#
## Oluşturulan hash'i, paytr'dan gelen post içindeki hash ile karşılaştır (isteğin paytr'dan geldiğine ve değişmediğine emin olmak için)
## Bu işlemi yapmazsanız maddi zarara uğramanız olasıdır.
if( $hash != $post['hash'] )
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
    if($Update){
        $Update->basket_status = 'Ödendi';
        $Update->save(); 
    }
     

    ## BURADA YAPILMASI GEREKENLER
    ## 1) Siparişi onaylayın.
    ## 2) Eğer müşterinize mesaj / SMS / e-posta gibi bilgilendirme yapacaksanız bu aşamada yapmalısınız.
    ## 3) 1. ADIM'da gönderilen payment_amount sipariş tutarı taksitli alışveriş yapılması durumunda
    ## değişebilir. Güncel tutarı $data['total_amount'] değerinden alarak muhasebe işlemlerinizde kullanabilirsiniz.



} else { ## Ödemeye Onay Verilmedi


    $Update = ShopCart::where('cart_id', request('merchant_oid') )->first();
    if($Update){
        $Update->basket_status = 'Ödenmedi';
        $Update->save(); 
    }

    ## BURADA YAPILMASI GEREKENLER
    ## 1) Siparişi iptal edin.
    ## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz aşağıdaki değerleri kullanabilirsiniz.
    ## $data['failed_reason_code'] - başarısız hata kodu
    ## $data['failed_reason_msg'] - başarısız hata mesajı

}

## Bildirimin alındığını PayTR sistemine bildir.
echo "OK";
exit;

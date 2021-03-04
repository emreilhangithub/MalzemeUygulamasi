<?php
/**
 * Developer =  Mustafa Emre İlhan
 * Company = BTI Bilişim Danışmanlık ve Yazılım
 * Mission = Junior Software Developerer
 * 4.12.2020 10:57
 */


class Oop {

    /*
    Ders 1 Oop.php
    Ders 2 Sayilar.php
    Ders 3 MirasVeren.php extend
    Ders 4 Exde.php baska librarden baska librayi exden miras aldık
    Hatalı Libim.phpde __construct çalışmadı
    */

    /*
     * __construct kurucu method sınıfın baslatıldıgında otamatik olarak calısan ilk fonksiyondur
     * __destruct yıkıcı method işlem bitince o zaman da __destruct calısır
     *
    */

    /*
    Public
    Bir metod veya değişken public olarak tanımladığında o üyeye ilgili sınıfın her yerinden erişebilirsiniz.
     Aynı zamanda sınıftan türeyen bir sınıf içersinden de erişilebilir.
    1)Dışarıdan erişilebilir
    2)Class içenden erişilebilir
    3)Miras alınan sınıfdan erişilebilir
    methodlar ile public olarak tanımladıgımız methodlara dısardan ulasırız yani sınıf ile
    */

    /*
     Private
       1)Dışarıdan erişelemez yani sınıfın dısından sınıfı baslatıp erişemeyiz method içinde geçerli
       2)Class içenden erişilebilir
       3)Miras alınan sınıfdan erişilemez
     */

    /*
    Protected
    Protected özelliği atanan bir değişken veya metot, sadece sınıf içerisinden veya türetilen bir sınıf
    içerisinden erişilebilir..
    Yani bir sınıf extend ettiği sınıfın protected üyelerine erişebilir ama private üyelerine erişemez.
       1)Dışarıdan erişelemez
       2)Class içenden erişilebilir
       3)Miras alınan sınıfdan erişilebilir
    */

    //Değişkenler Ve Sabitler (Özellik)
    public $urunadi="Samsung Note 8"; //public sınıf tarafından erişilir
    public $fiyat ="1000";
    public $test="this";
    const KDV=18;//sabit

    //Fonksiyonlar (METHOD)
  public  function urunAdiGetir()
    {
       //return "MackBook";
        return $this->urunadi; //getir urunun adını 

        //$this sınıf değişkenlerine direk ulaşmamızı sağlıyor
        //$this içinde aktif olarak bulundugu clası temsil eder
        //Bir nesne bağlamı içinden bir yöntem çağırmak için $this diye bir sözde değişken kullanılır.
        //PHP'de çağıran nesneyi ifade eden ayrılmış bir anahtar sözcüktür
    }

    public  function fiyatGetir()
    {
        return $this->fiyat;

    }

    public  function KdvOrani()
    {
        return self::KDV;

    }

    public  function KdvHesaplama()
    {
      return  $this->fiyat/100*self::KDV;

    }

    public  function KdvDahil()
    {
        return  $this->fiyatGetir()+$this->KdvHesaplama();
        //return  ($this->fiyat/100*self::KDV)+$this->fiyat; 2.yontem

    }

    public  function denemeGetir($id)
    {
        return $this->fiyat=$id;

    }

    public  function testGetir($id=6)
    {
        return $this->fiyat=$id;

    }

/*
    Final () =  Final class uc extends = final bir daha miras alınamayacagı anlamına gelir  method ve sınıflarda

    Static() = public static dersen daha kolay erişebilir olur ve sınıf tanımlamadan Deneme::selamla(); yazabilirsin
    ve sadece static olarak tanımlanan özelliklere erişebilirim yani publice erişlemez p.statice erişlir
    self::$isim diyerek ulasabılırsın sadece

    Abstract =  abstract tanımlarsan  içinde tanımladıklarını baska bir sınıfta miras almak istesen
    o mirasın içindede aynı özellikleri vermek zorundasın

    Namespace = isimler karısmaması için kullanılır klasorlerde aynı isimler olabılıyor ama
    biz cagırarak kullanacagımız için yani dosyaları dahil edecegimiz için kullanmamısız

   İnterface = sınıfın adını kullanmıyoruz direk interface diyoruz miras alabiliyor
   interface sınıfa(clasa) mirasbırakma class implaments isim diyerek ederiz
   interface sınıflar sadece public özellikler barındırır private protected almaz
    abstact tanımalarkende abtract yazmıyor gorunmeyen abract vardır public yazmamız yeterlidir
*/


}

$urun = new Oop;//sınıfır baslatırız veya new $Oop() 2 yontem vardır burda biz 1 kullandık
//$urun değişkeni bana Oop clasındaki özelliklere kullanma erişme izni veriyor yani yeni bir nesne tanımlyacagımızı belirtiyoruz
//new yeni demek $urun = new Oop; Oop kutuuphanesindeki nesnleri kullanancam yeni bir obje tanımlayacagım bunu da $urun değişkeniyle gerçekleştirecegim 

//$urun->urunadi = "Iphone x"; //nesneye(obje)yeni bir değer atarız
/*
echo $urun->urunadi.PHP_EOL; //içersindeki objeye ulasmak için -> diyerek ulasırız php eol bir alt satıra gecer
echo $urun->fiyat.PHP_EOL;
echo $urun::KDV.PHP_EOL; //sabiti ekrana yazdırır parent gibi düşün
echo $urun->urunAdiGetir(); //sınıf içersinde fonksiyonu cagırdık
echo $urun->KdvOrani(); //buda diger yonetimdir fonkisyon içinde cagırıp oyle basarız ekrana
*/

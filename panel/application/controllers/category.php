<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$db="clas dısındaki değişken  cagırma"; //global değişken olusturduk
define('DEFINE','clas dısında define cagırma'); //define (sabit) oluşturduk

$uyeler = [
    [
    'uye_id'=>1,
    'uye_adi'=>'Şahin sucuk',
    'referans' => 0
    ],
      [
          'uye_id'=>2,
          'uye_adi'=>'fatma fatma',
          'referans' => 0
      ],
      [
          'uye_id'=>3,
          'uye_adi'=>'mustafa ersever',
          'referans' => 1
      ],
      [
          'uye_id'=>4,
          'uye_adi'=>'filiz ersever',
          'referans' => 1
      ],
      [
          'uye_id'=>5,
          'uye_adi'=>'muzazez burak',
          'referans' => 2
      ],
      [
          'uye_id'=>6,
          'uye_adi'=>'sebahattin burak',
          'referans' => 2
      ],
      [
          'uye_id'=>7,
          'uye_adi'=>'Eslem burak',
          'referans' => 6
      ],
      [
          'uye_id'=>8,
          'uye_adi'=>'volkan burak',
          'referans' => 3
      ]
];

class category extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("oturum_data")) {
            $this->session->set_flashdata("login_hata","Sayfalara Erişebilmek İçin Giriş Yap");
            redirect(base_url().'login');
        }

        $this->db2 = $this->load->database('diger', TRUE);

        /* $this->load->library(array('Someclass', 'ExampleClass',
            'MethodKullanimi','Car','Oop','Sayilar'
        )); */

        $this->load->library('Someclass');
        $this->load->library('ExampleClass');
        $this->load->library('MethodKullanimi');
        $this->load->library('Car');
        $this->load->library('Oop');
        $this->load->library('Sayilar');
        $this->load->library('MirasVeren');
        $this->load->library('Exde');

        // $this->load->library('someclass'); //someclass kütüphanesini cagırdık
        // $this->load->library('ExampleClass'); //example kütüphanesini cagırdık
        $this->load->model("ReceivedorderModel");

    }




    /* Çagrılan Fonksiyon Başlangıc*/

    public function json_encode_tr($string)
    {
        return json_encode($string, JSON_UNESCAPED_UNICODE);
    }

    public function writeMsg()
    {
        echo "ilk fonksiyonumuzu cagırdık";
        echo "<br>";
    }


    public function myTest2()
    {
        $x=5;
        echo "<p>myTest2 Olan Değişkeni getir = $x</p>";
    }



    function familyName($fname) {
        echo "İsminiz = $fname <br>";
    }
    function familyDate($fname, $year) {
        echo "İsminiz = $fname Doğum Tarihiniz = $year <br>";
    }


    function addNumbers($a,$b) {

        return $a + $b;
        //Bir işlevin bir değer döndürmesine izin vermek için şu return ifadeyi kullanılır
    }

    public function setHeight($minheight=100) //içine girersen girdigin veriyi yazar yoksa varsayılanı alır
    {
        echo "Sayı: $minheight <br>";
    }

    function sum($x, $y) {
        $z = $x + $y;
        return $z;
    }

    function float($x, $y) {
        $z = $x + $y;
        return $z;
    }

    function flint($a,$b) {
        return (int)($a + $b); //floatı integera dondurur
    }

    function add_five(&$value) {
        $value += 5; //girilen sayıya bunu ekler
    }


    function array_getir($id) {
        
       $arr= [
            'user'=>$this->session->oturum_data['user'],
            'email'=>$this->session->oturum_data['email'],
            'isActive'=>$this->session->oturum_data['isActive'],
            'registerdate'=>$this->session->oturum_data['registerdate'],
            'password'=>md5($this->session->oturum_data['password']), //md5 yaptık gosterilen parayı
            'authority'=>$this->session->oturum_data['authority']
        ];

        $test="mustafa";


        if ($id=!null && $id==1)
        {
            echo "1 numaralı kullanıcı <br>"; 
            return $arr;
        }

        else
        {
         echo "1 numaralı Kullanici degil <br>"; 
           return $arr;
        }

    }

    public function globald()//clas dısındaki veriyi cagırmaclas dısında define cagırma
    {
        global $db;
        return $db.DEFINE;
    }

    function referansListesi($uyelistesi,$referansId=0) {
        echo "<ul>";

        foreach ($uyelistesi as $uye)
            if ($uye['referans'] == $referansId)
            {
            echo "<li>". $uye['uye_adi'];
                $this->referansListesi($uyelistesi,$uye['uye_id']);
                echo "</li>";
            }


        echo "</ul>";
    }

    function veriTabaniListe($title,$parent_id=0) {
        echo "<ul>";

        foreach ($title as $uye)
                if ($uye['parent_id'] == $parent_id)
                {
                    echo "<li>". $uye['id'] . " = ".$uye['title'].$uye['parent_id'];
                    $this->veriTabaniListe($title,$uye['id']); //Recursive Call
                    echo "</li>";
                }


        echo "</ul>";
    }

    /* Burda Siparişler fonksiyon olusturduk category/siparisler içersinde verilen sipairşleri gosterdik  */
    public function siparisler() //siarişlerin hepsini gosterir burada

    {

         $listele = $this->ReceivedorderModel->select(); 

        $viewData = array(
        'listele' => $listele);

       print_r($viewData);    
    
    }


    /* Çagrılan Fonksiyon Bitiş*/

    public function index()    {
       
    $kullanici = $this->session->oturum_data['userid'];

       //$getir =  $this->array_getir($kullanici);

       //print_r($getir);

        foreach ($this->array_getir($kullanici) as $key => $value)
        {
            echo $key."=".$value."<br>";
        }

        /* Dizeler String */
        echo "<hr>";
        echo strlen("Hello world!")."<br>"; // bir dizenin uzunluğunu döndürür.
        echo str_word_count("Hello world!")."<br>"; //bir dizedeki kelimelerin sayar.
        echo strrev("Hello world!")."<br>";//bir dizeyi ters çevirir.
        echo strpos("Hello world!", "world")."<br>";//Dize İçinde Bir Metni Ara
        echo str_replace("world", "Dolly", "Hello world!")."<br>";
        echo "<hr>";
        //bir dizedeki bazı karakterleri diğer bazı karakterlerle değiştirir. bulamazsa değişmez
        //hello world son kısımda aranacak kelimeyi yazarsın ama bu uzun yol $değiş tanımla direk onun içinde ara
        /*
        strstr($test,'bundansonra'); // bundan sonra yazından sonrasını alır
        strpos($test,'aranacakkelime'); //aranacak kelimenin poziyonunu belli eder yani kaçtan basladıgını
        ucwords($test); // Baş harfleri büyük yapar
        ucfirst($test); //Metnin ilk kelimesinin baş harfini büyük harfe dönüştürür.
        strtolower($test); //Bütün karakterleri küçük harfe dönüştürür.
        strtoupper($test); //Bütün karakterleri büyük harfe dönüştürür.
        trim($test); //Boşlukları siler
        trim($test,'*');// trim istedigimiz karakterleride siler
        ltrim($test); // Soldaki boşlukları siler
        rtrim($test); // Sağdaki boşlukları siler
        substr($testx,0,10); //0 dan baslar 10 a kadar yazıyı keser
        str_repeat(('yaz'),3); //istedgin kadar aynı yazıdan yazar
        */

        /*Sayılar Numberic */
        $x = 59.85;
        var_dump(is_int($x));//değişkenin türünün tams olup olmadığını kontrol eder degilse false // is_double  is_float is_int da calısır
        var_dump(is_numeric($x));//Değişkenin sayısal olmadığını kontrol edin:
        $int_cast = (int)$x;  echo $int_cast;//Float ve string'i tam sayıya çevir:
        echo(pi())."<br>"; //pi sayısını ekrana basar
        echo(min(0, 150, 30, 20, -8, -200))."<br>"; //en düşük değeri bulur bize
        echo(max(0, 150, 30, 20, -8, -200))."<br>";
        echo(abs(-6.7))."<br>"; //pozitif yapar
        echo(sqrt(64))."<br>";//sayının karekökünü verir
        echo(round(0.60))."<br>";//yuvarlama yapar
        echo(rand());//random sayı
        $a=rand(10, 100); //random sayı 10, ile 100 arasında
        $b=rand(1, 10); echo"<br>"; // 1 ile 10 arasında
        echo $a."<br>";
        echo $b."<br>";
        $toplam=$a+$b;
        echo "Toplam =".$toplam."<br>";
        for ($i=1; $i<=$b; $i++) //$b ye kadar rastgele dongu yapar
        {
            echo $i."<br>";
        }



        /* Operatörler */
        $adana=5;
        $urfa=3;
        $x=10; //c 10 a eşittir demektedir
        $x += 100; //üzerine 100 ilave et for dongusundede boyle kullanırız bunları $x+=2 yani 2 şer artır dongude
        $x -= 20; //20 çıkart 	x = x - y yani demek $toplam gibi dusun
        $x  *= 10; //çarpar
        $x  /= 10; //boler
        $x  %= 4; //kalan
        echo $adana % $urfa."<br>";  //% işareti bize kalanı verir 5/3 bolumunden kalan 2 dir
        echo $adana ** $urfa."<br>";//** işereti bize kuvvetini alır 5 in 3üncü kuvveti 125dir
        echo "x=".$x."<br>";
        $y=3;
        echo "y=$y"."<br>";
        echo  "(X*y)=".$y*$x;//kalan ile y'yi carpar bize eşittir 6
        //$x *= $y; aynı şeye denk geldi
        echo "<hr>";

        $zirve=2; //var drump ile değişkenin türünü ögrenirsin int 2 yazar
        var_dump($zirve);
        $selam=2;
        $merhaba="2";
        var_dump($merhaba);

        //string(1) "2"
        echo "<br>";

        // ?: işaretidir bu if else yerine kullanılır sadece
        // İç içe de kullanılabilir
        // echo ((true ? 'true' : false) ? 't' : 'f');
        $ekranabas = $zirve == $selam ? "Birbirne Eşit":"Birbirne Eşit Değil"; //eşit mi
        $aynitur = $zirve ===	$merhaba ? "Aynı Tür":"Aynı Tür Degil"; //aynı tür mü
        $derleme = $zirve !== $selam ? "eşit değil ve aynı tür degil":"eşit ve  aynı tür"; // eşit degilse veya aynı türde degilse

        //$derleme = $zirve !=	$selam ? "Eşit degil":"eşit"; //aynı tür mü
        // != eşit degilse <> eşit degilse
        //$x <=> $y
        //$ X'in $ y'den küçük, ona eşit veya büyük olmasına bağlı olarak sıfırdan küçük,
        // sıfıra eşit veya sıfırdan büyük bir tamsayı döndürür. PHP 7'de sunulmuştur.
        echo $ekranabas."<br>";
        echo $aynitur."<br>";
        echo $derleme."<br>";

        $x = 11;
        echo ++$x."<br>";
        //$ X'i birer birer artırır, sonra $ x değerini döndürür
        //$x++ $ X döndürür, sonra $ x'i birer birer artırır

        $x = 100;
        $y = 50;

        if ($x == 100 xor $y == 5) {  //xor ikisinden birden dogru degilse
            echo "ikisinden birden dogru degilse"; // &&and ||or
        }
        else {
            echo "ikiside dogru";
        }

        echo "<br>";

        $txt1 = 10;
        $txt2 = 35;
        echo $txt1."<br>"; //10 yazar
        $txt1 .= $txt2;//txt 1 e ekleme yapar
        echo $txt1."<br>"; //ekrana 1035 basar normalde burarada 10 yazması lazımdı
        echo $txt2."<br>"; //35 yazar

        //"??" (veya null kaynaşma) işleci, PHP 7 ve sonrasında kullanılabilir.
        // Null coalescing	Boş birleştirme


        echo 0 ?: 1 ?: 2 ?: 3; //1 yani sıfır dısında her seyi gorur
        echo 1 ?: 0 ?: 3 ?: 2; //1
        echo 2 ?: 1 ?: 0 ?: 3; //2
        echo 3 ?: 2 ?: 1 ?: 0; //3

        echo "<br>";


        /* DateTime*/

        //date_default_timezone_set('Europe/Istanbul');
        //config içine tanımlarız
        $t = date("H:i");
        echo "Şuan Saat = $t <br>";
        $t2="11:11";
        echo "İstedigimiz Saat = $t2 <br>";

        if ($t < $t2) { //mevcud saatteten büyükse
            echo "Daha zaman var";
        }
        elseif ($t == $t2)
        {
            echo "Tam Zamanı Şimdi";
        }
        else {

            echo "Zaman doldu :(( ";

        }
        echo "<hr>";


        /* Kontroller İf-else-switch */
        $favcolor = "aa";

        switch ($favcolor) {
            case "red":
                echo "Your favorite color is red!";
                break;
            case "blue":
                echo "Your favorite color is blue!";
                break;
            case "green":
                echo "Your favorite color is green!";
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";

        }


        $a = 0;

        switch(++$a) { //ayı bir artırıp ona gore işlem sagladık
            case 3: echo 3; break;
            case 2: echo 2; break;
            case 1: echo 1; break;
            default: echo "No match!"; break;
        }

        echo "<hr>";

        //4 dongu vardır  foreach  for while do...while


        /* Döngüler*/
        $x = 1;

        while($x <= 5) {
            echo "The While is: $x <br>";
            $x++;
        }

        $x = 1;

        do {
            echo "The DoWhile is: $x <br>";
            $x++;
        } while ($x <= 5);

        //foreachDöngü - Bir dizideki her bir öğesi için bir kod bloğu içinden Döngüler.

        $colors = array("red", "green", "blue", "yellow");

        foreach ($colors as $value) {
            echo "$value <br>";
        }

        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

        foreach($age as $x => $val) {
            echo "$x = $val<br>";
        }

        for ($x = 0; $x < 10; $x++) {
            if ($x == 4) { //eğer x 4 e eşitse
                break;//bundan sonrasını atlar continue; //değeri atlar
            }
            echo "The number is: $x <br>";
        }

        /* foreach db2 veri cekme */

        echo "foreach db2 veri cekme= " . "<br>";

        $test = $this->db2->get("personel")->row();

        $viewData = array('test' => $test );

        foreach ($test as $key => $value) {
            echo "$key = $value <br>";
        }
        echo "<hr>";



        /* TODO PHP_NOT
       Değişkenler, bilgi depolamak için "kaplar" dır.
       #yorum satırı oluyor
       . Birleştirme yapar
       , ile koyarsak "" içine yazılan şeyleri array gibi ayrı ayrı alır
       print ile echo aynı işlemi görür
       dize "Hello world!"; 'Hello world!'; iki şekildede kullanılır
       int tamsayı dır $x = 5985;
       $x = true; //booleon true mi false mi
       //define sabitleyici demek  echo BASEPATH; diye de yazdıgın değişkeni cagırsın istersen
           */

        /* TODO GET İNSTANCE */

        $this->someclass->some_method();

        $this->someclass->call_method();

        echo "Kısa kullanım intance = "; $this->exampleclass->istance_method1();

        echo "Kısa kullanım intance = "; $this->exampleclass->istance_method2();


        /* TODO Fonksiyon Başlangıc*/
        //Bir fonksiyon, bir programda tekrar tekrar kullanılabilen bir ifade bloğudur.
        //Bir fonlsiyon adı, bir harf veya alt çizgiyle başlamalıdır.
        $this->writeMsg();
        $this->familyName("emre");
        $this->familyDate("Hege", "1975");
        $this->familyDate("Stale", "1978");
        $this->familyDate("Kai Jim", "1983");
        echo  $this->addNumbers(5, 6);
        $this->myTest2();
        $this->setHeight(350);
        $this->setHeight(); // will use the default value of 50
        $this->setHeight(135);
        $this->setHeight(80);
        $this->setHeight(80);
        echo "5 + 10 = " . $this->sum(5, 10) . "<br>";
        echo "7 + 13 = " . $this->sum(7, 13) . "<br>";
        echo "2 + 4 = " . $this->sum(2, 4). "<br>";
        echo $this->float(1.2, 5.2). "<br>";
        echo $this->flint(1.2, 5.2). "<br>";
        $num = 2;
        $this-> add_five($num);
        echo $num;
        echo "<hr>";


        echo $this->globald()."<br>";

        global $uyeler;
        echo $this->referansListesi($uyeler)."<br>";


        $bas = $this->db->get("category")->result_array();
        /*
        foreach ($bas as $b)
        {
            echo $b->title;
        }

        echo "<hr>";
        print_r($bas);
        */

        echo $this->veriTabaniListe($bas)."<br>";

        /*  Fonksiyon Bitiş*/


        /* TODO Oop Kullanımı Başla */

        //$this->oop(); // bu sekilde cagırınca direk oop kütüphanesini ekrana fiyatı bastı

        echo "<hr>";

        $this->methodkullanimi->ilk_method("Ahmet");
        $this->methodkullanimi->ikinci_method("Yesil");
        echo $this->oop->urunAdiGetir()."<br>";
        echo $this->oop->fiyatGetir()."<br>";
        echo $this->oop->KdvOrani()."<br>";
        echo $this->oop->KdvHesaplama()."<br>";
        echo $this->oop->KdvDahil()."<br>";
        echo $this->oop->denemeGetir(7)."<br>";
        echo $this->oop->testGetir()."<br>";

        echo "<hr>";

        /*  Oop Kullanımı Bitiş */

        $meta['title']='Emre İlhan';
        $meta['desc']='ahmet şeker';

        print_r($meta); //arrayi komple bastık
        echo $meta['desc']; //sadece arraydeki desci basar

        $dizi = ['bir','iki','uc'];

         $array = implode('@',$dizi); //arrayi(dizi) stringe cevirir

         echo $array;

         $array2 = explode('@',$array);//stringi diziye cevirir

         print_r($array2); //count($dizi) dersek dizi deki sayıyı ekrana basar

        $nana = array(
            'test'
        );
        print_r($nana);
        echo $nana[0]."<br>";

        if (is_array($nana))//array olup olmadıgını kontrol eder fonksiyonda kullanımı daha kolaydır
        {
            echo "Bu bir arraydir <br>";
        }
        else {echo "array degildir";}



        $ahmet="string";
        echo $this->car->message($ahmet); //libraryden messagı cagırır ve bir arraymi kontrol eder

        /* shuffle random olarak arrayi yeniler
        $testa=['sahin','fatma'];
        shuffle($testa);
        echo $testa[0];
        */

        /* array_combine birleştirme işlemi yapar 1.arrayi key 2.arrayi value yapar
        $testa=['sahin','fatma'];
        $testb=['1','2'];
        $comb =  array_combine($testa,$testb);
        print_r($comb);
            array_count_values(); // dizi içinde tekrar eden verileri gosterir
            array_flip($dizia); // key ile value yer değiştirir
            array_key_exists('iki',$testa); //dizi keyinden ikiyi arar bulursa if içinde echo ile basarız
            array_merge($testa,$testb) ;//iki diziyi birleştir
            array_rand($testa,2);//iki tane random olarak deger doner
            array_reverse($dizi); //valueleri 'ters' sıralama yapar
            array_search('aranacak',$testa); //dizide arar bulursa ekrana basar
            in_array('aranacak',$testa); //dizide arar bulursa true bulmazsa false döner
            array_shift($testa); //dizisinin ilk elemanını çıkartır diziyi yeniden indisler
            array_pop($testa); //dizisinin son  elemanını çıkartır diziyi yeniden indisler
            array_slice($testa,2); //dizinin girdigin degerdeki elemanı atlar
            array_sum($testa); //dizideki sayıları toplar ve sonucu basar eğer key koyarsan onları sayar
            array_product($testa); //dizideki sayıları çarpar
            array_unique($testa); //aynı donen degerleri atlar sadece 1 tanesini alır
            array_values($testa); // anahtar kelime yani keyleri görmezden gelip 0 dan baslar
            array_push($testa,'eklenecek'); //diziye yeni deger ekler
            array_unshift($testa,'eklenecek'); //dizinin en basına değer ekler
            array_keys($testa); //keyleri alır value yapar ve keyi 0 dan baslatır
            current($testa); //ilk elemanı almaya yarar
            end($testa); //son elemanı almaya yarar
            next($testa); //sonraki elemanı almaya yarar
            prev($testa); //önceki elemanı almaya yarar
            reset($testa); //başa dondurur sonra next dersin
            extract($testa); echo $sahin; // dizi normalde eco ile calısmaz bu komut ile tek anahtarı cagırsın
            asort($testa); // değeri valueyi  küçükten büyüge sıralar
            arsort ($testa); // değeri valueyi  büyükten küçüge  sıralar
            ksort($testa); // anahtarı key  küçükten büyüge sıralar
            krsort  ($testa); // anahtarı key  büyükten küçüge  sıralar
        */

        $testa=['','sahin','fatma','emre'];
        $testb=array_filter($testa,function ($deger) { //dizideki bos degeri es gecer ve istedigin değeri getirir
           if ($deger == 'emre')
           {
               return $deger;
           }
        });

        print_r($testb);

extract($testa);



        /* var_dump kullanımı */

        echo "Var_dump kullanımı= ". "<br>";

        $cars = array("Volvo","BMW","Toyota",true);

        var_dump($cars);

        echo "<hr>";

        /* result row result_array row_arrra kullanımı  */

        echo "result row result_array row_arrra kullanımı = " . "<br>";
        $result = $this->db2->get("personel")->result(); // std class object olarak geldi

        $resultarray = $this->db2->get("personel")->result_array(); //array olarak geldi

        $row = $this->db2->get("personel")->row(); // std class object olarak tek veri geldi

        $rowarray = $this->db2->get("personel")->row_array(); // array olarak tek veri geldi

        $viewData = array('result' => $result ,
            'resultarray' => $resultarray ,
            'row' => $row ,
            'rowarray' => $rowarray
        );

        print_r($viewData);

        echo "<hr>";

        $cars = array("Volvo", "BMW", "Toyota");
        echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
        //for dongusude kullanılabılır burada

        $age = array("Peter"=>"35", "Ben"=>"37", "Ben"=>"43");
        echo "Peter is " . $age['Ben'] . " years old. <br>";

        $ads = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

        foreach($ads as $x => $x_value) {
            echo "Key=" . $x . ", Value=" . $x_value;
            echo "<br>";
        }

        $carsfdafsdas = array("Volvo", "BMW", "Toyota");
        print_r( $carsfdafsdas);


        /*
        sort($carsfdafsdas);
        sort() - dizileri artan sırada sırala
        rsort() - dizileri azalan düzende sıralayın
        asort() - ilişkisel dizileri değere göre artan düzende sıralayın
        ksort() - ilişkisel dizileri anahtara göre artan sırada sıralayın
        arsort() - ilişkisel dizileri değere göre azalan düzende sıralayın
        krsort() - ilişkisel dizileri anahtara göre azalan sırayla sıralayın
        */
        echo "<br>";
        echo "Today is " . date("Y/m/d") . "<br>";
        echo "The time is " . date("h:i:sa");
        /*
        Y=Gün M=Ay D=gün
        */

        $d=mktime(11, 14, 54, 8, 12, 2014);
        echo "Created date is " . date("Y-m-d h:i:sa", $d);
        //Mktime () ile bir Tarih olustursun
        //PHP mktime()işlevi, bir tarih için Unix zaman damgasını döndürür.
        //mktime(hour, minute, second, month, day, year)

        $d=strtotime("10:30pm April 15 2014");
        echo "Created date is " . date("Y-m-d h:i:sa", $d);

       echo date("Y-m-d",strtotime("-1 day"));//1 gun oncesini alır

        $d=strtotime("next Saturday");//tomorrow +3 Months
        echo date("Y-m-d h:i:sa", $d) . "<br>";

        $startdate = strtotime("Saturday");//cumartesiye gel diyor
        $enddate = strtotime("+6 weeks", $startdate); //üzerine 6 gun ekle

        while ($startdate < $enddate) {
            echo date("M d", $startdate) . "<br>";
            $startdate = strtotime("+1 week", $startdate);
        }

 //include("Footer.php); require









        //count($cars); Dizinin uzunlugunu alır

        /* Json kullanımı   */

        // $array= array(array('turkish' => 'üğışçöÜĞİŞÇÖ'), array('chinese' => '我爱你'), array('arabic' => 'أنا أحبك'));
        /*
		$encodedTr = json_encode_tr($array);
		echo "Türkçe Encoded Json: ";
		var_dump($encodedTr);
		echo '<hr>';
        */







    }
}








/* TODO CODEIGNITER ARRAYLARI
//1
$query = $this->db2->query("SELECT * FROM personel");

		foreach ($query->result() as $row)
		{
		    echo $row->Personelid;
		      echo $row->isim;
		      echo $row->soyisim;
		}

		*/


/* //2

$query = $this->db2->query("SELECT * FROM personel");

if ($query->num_rows() > 0)
{
   foreach ($query->result() as $row)
   {
      echo $row->Personelid;
      echo $row->isim;
      echo $row->soyisim;
   }
}
*/

/*  //3
$query = $this->db2->query("SELECT * FROM personel");

foreach ($query->result('Personelid') as $row)
{
    echo $row->isim; // attributu cagırdık yani tablodaki ismi
     echo $row->reverse_name();   //personel id yukardaki clas içinden fonksiyonu cagırdık

}
*/

/* //4
$query = $this->db2->query("SELECT * FROM personel");

if ($query->num_rows() > 0)
{
   $row = $query->row();

   echo $row->Personelid;
   echo $row->isim;
   echo $row->soyisim;
}
*/

/* //5
$query = $this->db2->query("SELECT * FROM personel");

if ($query->num_rows() > 0)
{
   $row = $query->row_array();//() içine yazılan şeyler satırını belirtir 5 dersen 5.satırı getirir

   echo $row['Personelid'];
   echo $row['isim'];
   echo $row['soyisim'];
}
*/

/* //6

$query = $this->db2->query("SELECT * FROM personel");

        if ($query->num_rows() > 0) // eğer satır sayısı 0 dan buyukse
{
              $row = $query->row(5) ; //5.satırı getir
              echo "Satır Sayısı" .  $query->num_rows() . "<br>";
              echo "Sütun Sayısı" . $query->num_fields();

              echo "<br>";
              echo $row->Personelid . "<br>";
           echo $row->isim . "<br>";
           echo $row->soyisim . "<br>";

} */

/* //7

 $this->db2->query("SELECT * FROM personel");

  echo "Satır Sayısı" .  $query->num_rows() . "<br>";

  echo "Sütun Sayısı" . $query->num_fields();

 */
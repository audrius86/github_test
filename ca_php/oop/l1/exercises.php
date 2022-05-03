<?php
//class Fruit {
//    public $name;
//    public $color;
//
//    function __construct($name, $color) {
//        $this->name = $name;
//        $this->color = $color;
//    }
//    function get_name() {
//        return $this->name;
//    }
//    function get_color() {
//        return $this->color;
//    }
//}
//
//$apple = new Fruit("Apple", "red");
//echo $apple->get_name();
//echo "<br>";
//echo $apple->get_color();
//

//<!-- * 1. Sukurkite klasę, kuri skaičiuotų keturkampio plotą, perimetrą ir įstrižainę.-->
//<!--Klasės pavadinimas: Rectangle-->
//<!--Į konstruktorių paduodama: int $length, int $width-->
//<!--Metodai:-->
//<!--- calculateArea()-->
//<!--- calculatePerimeter()-->
//<!--- calculateDiagonal()-->
//<!---->
//<!---->
//<!---->
use JetBrains\PhpStorm\Pure;

class Rectangle
{
    public int $length;
    public int $width;

    function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    function calculateArea(): int
    {
        return $this->length * $this->width;
    }

    function calculatePerimeter(): int
    {
        return 2 * ($this->length + $this->width);
    }

    function calculateDiagonal(): float|int
    {
        return sqrt(pow($this->length, 2) + pow($this->width, 2));
    }
}

//$rect1 = new Rectangle(3, 4);
//echo "Rectangle area: " . ($rect1->calculateArea()) . PHP_EOL;
//echo "Rectangle perimeter: " . ($rect1->calculatePerimeter()) . PHP_EOL;
//echo "Rectangle diagonal: " . ($rect1->calculateDiagonal()) . PHP_EOL;


/*-->

<!--2. Sukurkite klasę pavadinimu Vehicle. Jos konstruktorius turėtų priimti: string $name, string $type, int $price, int $yearlyFixedDepreciation (fiksuota pinigų suma, kuria atpinga automobilis per metus)-->
<!--Pridėkite klasei metodą 'calculateDepreciation', kuris priimtų int $year. Šis metodas turėtų paskaičiuoti, kiek nuvertėjo tr. priemonė per X metų.-->
<!--Pridėkite klasei metodą 'setPrice'. Jis turėtų priimti int $price. Iškvietus šį metodą turėtų būti pakeista kaina.
*/

class Vehicle
{
    public string $name;
    public string $type;
    public int $price;
    public int $yearlyFixedDepreciation;

    function __construct($name, $type, $price, $yearlyFixedDepreciation)
    {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->yearlyFixedDepreciation = $yearlyFixedDepreciation;
    }

    function getVehicleName(): string
    {
        return $this->name;
    }

    function calculateDepreciation(int $year): float|int
    {
        return $this->price - ($year * $this->yearlyFixedDepreciation);
    }

    function getPrice(): int
    {
        return $this->price;
    }

    function setPrice(int $price)
    {
        $this->price = $price;
    }

}

$vehicle = new Vehicle("Volvo", "S80", 100000, 1200);
////echo "Car " . $car->getVehicleName() . " price after 10 years is: " . $car->calculateDepreciation(10);
//echo $car->getPrice() . PHP_EOL;
//echo $car->setPrice($car->calculateDepreciation(10));
//echo $car->getPrice() . PHP_EOL;



/*
<!--3. Sukurkite klasę pavadinimu Driver. Jos konstruktorius turėtų priimti: string $name, string $surname, DateTime $dateOfBirth.-->
<!--DateTime tipas reiškia, kad konstruktorius tikisi gauti datos objektą. Kaip gauti datos objektą? Kurti ji su new DateTime(...) arba su funkcija date_create ar pan.-->
<!--Klasės metodai:-->
<!--getFullName() - turėtų grąžinti pilną vairuotojo vardą (string tipo reikšmė), kur vardas atskirtas nuo pavardės tarpu.-->
<!--getDateOfBirth() - turėtų grąžinti pilną vairuotojo gimimo datą (DateTime)-->
<!---->
<!--Sukurkite klasę VehicleRegistration. Jos konstruktorius turėtų priimti: Vehicle $vehicle, Driver $driver.-->
<!--Klasės metodai:-->
<!--isRegistrationValid() - metodas turi grąžinti true, jeigu vairuotojas nėra senesnis, nei 90 metų, arba, jeigu automobilio kaina nėra didesnė nei 500 000 eur. Kitu atveju grąžinti false.-->
<!---->
*/

class Driver{
    public string $name;
    public string $surname;
    public DateTime $dateOfBirth;

    function __construct($name, $surname, $dateOfBirth){
        $this->name = $name;
        $this->surname = $surname;
        $this->dateOfBirth = $dateOfBirth;
    }

    function getFullName():string
    {
        return $this->name . ' ' . $this->surname;
    }

    function getDateOfBirth():DateTime
    {
        return $this->dateOfBirth;
    }
}

$driver = new Driver("Audrius", "Bareisis", new DateTime('1986-03-14'));

//echo $driver->getFullName() .PHP_EOL;
//echo ($driver->getDateOfBirth())->format('Y-m-d');

class VehicleRegistration{

    public Vehicle $vehicle;
    public Driver $driver;

    function __construct(Vehicle $vehicle, Driver $driver){
        $this->vehicle = $vehicle;
        $this->driver = $driver;
    }

    function isRegistrationValid():bool
    {
    if(($this->vehicle)->getPrice() < 500000 and ((new DateTime('now'))->format('Y-m-d') - (($this->driver)->getDateOfBirth())->format('Y-m-d') < 90)){
        return true;
    }else{
        return false;
    }
    }
}

$registration = new VehicleRegistration($vehicle, $driver);

var_dump($registration->isRegistrationValid());



/*
<!--4. Sukurkite klasių hierarchiją. Cart, CartItem, CartDiscount, Customer. Dešinėje pusėje pavyzdys, kaip turi veikti kodas:-->
<!---->
<!--Cart:-->
<!--metodai:-->
<!--__construct(Customer $customer)-->
<!--addItem(CartItem $cartItem) - turi leisti pridėti CartItem objektą. Galite saugoti CartItem'us masyve, klasės Cart viduje-->
<!--addDiscount(CartDiscount $cartDiscount) - turi leisti pridėti CartDiscount objektus-->
<!--getTotal() - turi grąžinti visą krepšelio sumą su pritaikytomis nuolaidomis. Suapvalinkite iki 2 skaičių po kablelio-->
<!--Skaičiuojant total nuolaidos sumuojasi. Turi būti pritaikomos tik tos nuolaidos, kurių customerLevel sutampa su krepšelio-->
<!--kliento leveliu,-->
<!---->
<!--CartDiscount-->
<!--metodai:-->
<!--__construct(int $percent, string $userLevel)-->
<!--getDiscountPercent() - nuolaidos procentas pvz.: 15-->
<!--getCustomerLevel() - gali būti 'A', 'B' arba 'C'-->
<!---->
<!--CartItem-->
<!--metodai:-->
<!--__construct(string $name, int $price)-->
<!--getName() - prekės pavadinimas pvz.: 'Iphone 13'-->
<!--getPrice() - prekė kaina pvz.: 1300 (naudokite int)-->
<!---->
<!--Customer-->
<!--metodai:-->
<!--__construct(string $name, string $surname, string $level)-->
<!--getFullName()-->
<!--getLevel() - gali būti 'A', 'B' arba 'C'-->
<!---->
<!--Kaip turėtų būti kviečiamas kodas:-->
<!---->
<!--//$customer = new Customer('John', 'Smith', 'A');-->
<!--//$cart = new Cart($customer);-->
<!--//-->
<!--//$iphone = new CartItem('Iphone 13', 1300);-->
<!--//$airpods = new CartItem('Airpods Pro', 200);-->
<!--//$cart->addItem($iphone);-->
<!--//$cart->addItem($airpods);-->
<!--//-->
<!--//$cartDiscount1 = new CartDiscount(15, 'A');-->
<!--//$cart->addDiscount($cartDiscount1);-->
<!--//$cartDiscount2 = new CartDiscount(2, 'A');-->
<!--//$cart->addDiscount($cartDiscount2);-->
<!--//$cartDiscount3 = new CartDiscount(20, 'B');-->
<!--//$cart->addDiscount($cartDiscount2);-->
<!--//-->
<!--//$total = $cart->getTotal();-->
<!--//var_dump($total); // 1249.5-->
<!--//-->
<!--//5.  Sukurkite programą skirtą valdyti parkingą. Naudokite objektinį programavimą t.y. klases.-->
<!--//Turbūt pakaks dviejų klasių - Parking ir Car. Duomenys turi būti saugomi faile.-->
<!--//----------------------------------------------->
<!--//php -f parking.php park_car NKA_123-->
<!--//Car ABC_123 parked!-->
<!--//----------------------------------------------->
<!--//php -f parking.php park_car FTA_122-->
<!--//Car FTA_122 parked!-->
<!--//----------------------------------------------->
<!--//php -f parking.php list_cars-->
<!--//Parked cars:-->
<!--//NKA_123-->
<!--//FTA_122-->
<!--//-->
<!--//6. Sukurkite paprastą todo aplikaciją. Naudokite objektinį programavimą. Aplikacija turi turėti 3 funkcijas:-->
<!--//- add - pridėti naują todo-->
<!--//- list - atvaizduoti visus todo-->
<!--//- complete - pažymėti kažkurį todo kaip padarytą. Padarytus todo galima arba trinti, arba pridėti požymį "completed"-->
<!--//-->
<!--//Aplikacijos kvietimo pavyzdžiai:-->
<!--//-------------------------------------------------------------------------->
<!--//php -f todo.php add "nuplauti automobilų" "2022-03-29 15:00"-->
<!--//todo added!-->
<!--//-------------------------------------------------------------------------->
<!--//php -f todo.php list-->
<!--//****-->
<!--//id: 0-->
<!--//nuplauti automobili-->
<!--//2022-03-29 15:00-->
<!--//-------------------------------------------------------------------------->
<!--//php -f todo.php add "apsilankymas pas kirpeją" "2022-04-15 12:00"-->
<!--//todo added!-->
<!--//-------------------------------------------------------------------------->
<!--//php -f todo.php list-->
<!--//****-->
<!--//id: 0-->
<!--//nuplauti automobilų-->
<!--//2022-03-29 15:00-->
<!--//****-->
<!--//id: 1-->
<!--//apsilankymas pas kirpeją-->
<!--//2022-04-15 12:00-->
<!--//-------------------------------------------------------------------------->
<!--//© 2022 GitHub, Inc.-->
<!--//Terms-->
<!--//Privacy-->
<!--//Security-->
<!--//Status-->
<!--//Docs-->
<!--//Contact GitHub-->
<!--//Pricing-->
<!--//API-->
<!--//Training-->
<!--//Blog-->
<!--//About-->
<!--//-->
<!--// */